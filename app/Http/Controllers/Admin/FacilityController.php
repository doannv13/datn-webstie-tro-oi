<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FacilityRequest;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Facility::query()->latest()->get();
        return view('admin.facility.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.facility.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FacilityRequest $request)
    {
        try {
            $model = new Facility();
            $model->fill($request->except('icon'));
            if ($request->hasFile('icon')) {
                $model->icon = upload_file(OBJECT_FACILITY, $request->file('icon'));
            }else{
                $model->icon = 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcT7TiLhYLLSXgfz-TPjFR50a7J_PzqFjXNm41zbdPbYUREBFKj3';
            }
            $model->save();
            $notification = array(
                "message" => "Thêm mới thành công!",
                "alert-type" => "success",
            );
            return to_route('facilities.index')->with($notification);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            $notification = array(
                "message" => "Thêm mới không thành công!",
                "alert-type" => "error",
            );
            return back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Facility::query()->findOrFail($id);
        return view('admin.facility.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(FacilityRequest $request, string $id)
    {
        try {
            $data = Facility::query()->findOrFail($id);
            $data->fill(\request()->except('icon'));
            $oldImg = $data->icon;
            if (\request()->hasFile('icon')) {
                $data->icon = upload_file(OBJECT_FACILITY, \request()->file('icon'));
            }
            $data->save();

            if(\request()->hasFile('icon') && $oldImg){
                delete_file($oldImg);
            }

            $notification = array(
                "message" => "Cập nhật thành công!",
                "alert-type" => "success",
            );
            return to_route('facilities.index')->with($notification);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            $notification = array(
                "message" => "Cập nhật không thành công!",
                "alert-type" => "error",
            );
            return back()->with($notification);
        }
    }

    /**
     * SoftDeleted the specified resource from storage.
     */

    public function destroy(string $id)
    {
        try {
            $data = Facility::query()->findOrFail($id);
            $data->delete();
            // delete_file($data->icon);
            $notification = array(
                "message" => "Xoá thành công!",
                "alert-type" => "success",
            );
            return to_route('facilities.index')->with($notification);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            $notification = array(
                "message" => "Xoá không thành công!",
                "alert-type" => "error",
            );
            return back()->with($notification);
        }
    }

    /**
     * Danh sách đã xoá mềm
     */

    public function listDeleted(){
            $data = Facility::onlyTrashed()->get();
            return view('admin.facility.delete', compact('data'));
    }

    /**
     * Xoá vĩnh viễn
     */

    public function permanentlyDelete($id)
    {
        try {
            $facility = Facility::where('id', $id);
            // $oldImg = $facility->icon;
            $facility->forceDelete();
            // if($oldImg){
            //     delete_file($oldImg);
            // }
            $notification = array(
                "message" => "Đã xoá vĩnh viễn!",
                "alert-type" => "success",
            );
            return redirect()->back()->with($notification);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            $notification = array(
                "message" => "Xoá không thành công!",
                "alert-type" => "error",
            );
            return back()->with($notification);
        }
    }

    /**
     * Thêm lại item trong thùng rác vào danh sách
     */

    public function restore($id){

        try {
            $softDeletedFacility = Facility::onlyTrashed()->find($id);
            $softDeletedFacility->restore();
            $notification = array(
                "message" => "Thêm lại thành công!",
                "alert-type" => "success",
            );
            return redirect()->back()->with($notification);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            $notification = array(
                "message" => "Thêm lại không thành công!",
                "alert-type" => "error",
            );
            return back()->with($notification);
        }
    }
}
