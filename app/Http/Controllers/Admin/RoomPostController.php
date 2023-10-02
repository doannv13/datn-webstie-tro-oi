<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\RoomPostRequest;
use App\Models\CategoryRoom;
use App\Models\City;
use App\Models\District;
use App\Models\Facility;
use App\Models\FacilityRoom;
use App\Models\ImageRoom;
use App\Models\RoomPost;
use App\Models\Services;
use App\Models\Surrounding;
use App\Models\SurroundingRoom;
use App\Models\Ward;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RoomPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category_rooms = CategoryRoom::all();
        $data = RoomPost::query()->latest()->get();
        return view('admin.room-post.edit', compact('data', 'category_rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryRooms = CategoryRoom::query()->latest()->get();
        $services = Services::query()->latest()->get();
        $facilities = Facility::query()->latest()->get();
        $surrounding = Surrounding::query()->latest()->get();
        $category_rooms = CategoryRoom::all();
        $wards = Ward::all();
        $districts = District::all();
        return view('admin.room-post.create', compact('categoryRooms', 'facilities', 'surrounding', 'services', 'category_rooms', 'wards', 'districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomPostRequest $request)
    {
        // dd($request->file('image'));
        try {

            if ($request->hasFile('imageroom')) {
                $uploadFile = upload_file('room', $request->file('imageroom'));
            }
            $ward = new Ward();
            $ward->fill([
                'name' => $request->ward_id,
            ]);
            $ward->save();

            $district = new District();
            $district->fill([
                'name' => $request->district_id,
                'ward_id' => $ward->id,
            ]);
            $district->save();
            $city = new City();
            $city->fill([
                'name' => $request->city_id,
                'district_id' => $district->id,
            ]);
            $city->save();

            $model = new RoomPost();
            $model->fill([
                'name' => $request->name,
                'price' => $request->price,
                'address' => $request->address,
                'address_full' => $request->address_full,
                'acreage' => $request->acreage,
                'empty_room' => $request->empty_room,
                'description' => $request->description,
                'image' => $uploadFile,
                'managing' => $request->managing,
                'user_id' => 1,
                'service_id' => 1,
                'ward_id' => $ward->id,
                'district_id' => $district->id,
                'city_id' => $city->id,
                'category_room_id' => $request->category_room_id,
                'fullname' => $request->fullname,
                'phone' => $request->phone,
                'email' => $request->email,
                'zalo' => $request->zalo
            ]);
            $model->save();
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $uploadFiles = upload_file('room/image', $image);
                    $imageModel = new ImageRoom();
                    $imageModel->room_id = $model->id;
                    $imageModel->name = $uploadFiles;
                    $imageModel->save();
                }
            }

            foreach ($request->surrounding as $surrounding) {
                $surround = new SurroundingRoom();
                $surround->room_id = $model->id;
                $surround->surrounding_id = $surrounding;
                $surround->save();
            }
            foreach ($request->facility as $facility) {
                $surround = new FacilityRoom();
                $surround->room_id = $model->id;
                $surround->facility_id = $facility;
                $surround->save();
            }
            Toastr::success('Thêm tin đăng phòng thành công', 'Thành công');
            return redirect()->route('room-post.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Toastr::error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $postroom = RoomPost::query()->findOrFail($id);
        $categoryRooms = CategoryRoom::query()->latest()->get();
        $facilities = Facility::query()->latest()->get();
        $facilityrooms = FacilityRoom::query()->where('room_id', $id)->get();
        foreach ($facilityrooms as $facilityroom) {
            $facilityArray[] = $facilityroom->facility_id;
        }
        $surrounding = Surrounding::query()->latest()->get();
        $surroundingooms = SurroundingRoom::query()->where('room_id', $id)->get();
        foreach ($surroundingooms as $surroundingoom) {
            $surroundingArray[] = $surroundingoom->surrounding_id;
        }
        $wards = Ward::query()->find($id);
        $districts = District::query()->find($id);
        $cities = City::query()->find($id);
        // dd($cities);
        return view('admin.room-post.edit', compact('postroom', 'categoryRooms', 'facilities', 'surrounding', 'facilityArray', 'surroundingArray', 'wards', 'districts', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomPostRequest $request, string $id)
    {
        try {

            if ($request->hasFile('imageroom')) {
                $uploadFile = upload_file('room', $request->file('imageroom'));
            }
            $model = RoomPost::query()->findOrFail($id);


            $model->fill([
                'name' => $request->name,
                'price' => $request->price,
                'address' => $request->address,
                'address_full' => $request->address_full,
                'acreage' => $request->acreage,
                'empty_room' => $request->empty_room,
                'description' => $request->description,
                'managing' => $request->managing,
                'user_id' => 1,
                'service_id' => 1,
                'category_room_id' => $request->category_room_id,
                'fullname' => $request->fullname,
                'phone' => $request->phone,
                'email' => $request->email,
                'zalo' => $request->zalo
            ]);
            $oldImg = $model->imageroom;
            if (\request()->hasFile('imageroom')) {
                $model->imageroom = upload_file('room', $request->file('imageroom'));
            }
            $model->save();
            if (\request()->hasFile('imageroom') && $oldImg) {
                delete_file($oldImg);
            }
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $uploadFiles = upload_file('room/image', $image);
                    $imageModel = new ImageRoom();
                    $imageModel->room_id = $model->id;
                    $imageModel->image = $uploadFiles;
                    $imageModel->save();
                }
            }
            $model->surrounds()->sync($request->surrounding);
            $model->facilities()->sync($request->facility);
            $ward = Ward::find($model->ward->id);;
            $ward->update([
                'name' => $request->ward_id,
            ]);
            $ward->save();
            $district = District::find($model->district->id);
            $district->update([
                'name' => $request->district_id,
                'ward_id' => $ward->id,
            ]);
            $district->save();
            $city = City::find($model->city->id);
            $city->update([
                'name' => $request->city_id,
                'district_id' => $district->id,
            ]);
            $city->save();
            Toastr::success('Sửa tin đăng phòng thành công', 'Thành công');
            return redirect()->route('room-post.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Toastr::error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        try {
            FacilityRoom::query()->where('room_id', $id)->delete();
            SurroundingRoom::query()->where('room_id', $id)->delete();
            RoomPost::query()->findOrFail($id)->delete();
            Toastr::success('Tin đăng được thêm vào thùng rác thành công', 'Thành công');
            return redirect()->route('room-post.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Toastr::error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }


    public function deleted()
    {
        $data = RoomPost::onlyTrashed()->get();
        return view('admin.room-post.deleted', compact('data'));
    }

    public function permanentlyDelete(String $id)
    {
        try {
            $coupon = RoomPost::where('id', $id);
            $coupon->forceDelete();
            $facility = FacilityRoom::query()->where('room_id', $id);
            $facility->forceDelete();

            $surrounding = SurroundingRoom::query()->where('room_id', $id);
            $surrounding->forceDelete();
            Toastr::success('Xoá tin đăng thành công', 'Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Toastr::error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }

    public function restore(String $id)
    {
        try {
            $facility = FacilityRoom::query()->onlyTrashed()->where('room_id', $id);
            $facility->restore();

            $surrounding = SurroundingRoom::query()->onlyTrashed()->where('room_id', $id);
            $surrounding->restore();

            $RoomPost = RoomPost::query()->onlyTrashed()->findOrFail($id);
            $RoomPost->restore();

            Toastr::success('Khôi phục tin đăng thành công', 'Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Toastr::error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }
}
