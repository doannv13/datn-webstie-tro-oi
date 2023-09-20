<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRoomRequest;
use App\Models\CategoryRoom;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CategoryRoom::query()->orderByDesc('id')->get();
        return view('admin.categoryrooms.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categoryrooms.create');

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRoomRequest $request)
    {
        try {
            $model = new CategoryRoom();
            $slug = Str::slug($request->name);
            $model->slug = $slug;
            $model->fill($request->all());
            $model->save();
            Toastr::success('Thao tác thành công', 'Thành công');
            return to_route('categoryrooms.index');
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
        $data = CategoryRoom::query()->findOrFail($id);
        return view('admin.categoryrooms.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRoomRequest $request, string $id)
    {
        //
        try {
            $data = CategoryRoom::query()->findOrFail($id);
            $slug = Str::slug($request->name);
            $data->slug = $slug;
            $data->fill($request->all());
            $data->save();
           Toastr::success('Thao tác thành công', 'Thành công');
            return to_route('categoryrooms.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Toastr::error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        try {
            $categoryRoom = CategoryRoom::query()->findOrFail($id);
            $categoryRoom->delete();
            Toastr::success('Thao tác thành công', 'Thành công');
            return to_route('categoryrooms.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Toastr::error('Thao tác thất bại', 'Thất bại');

        }
    }

    public function deleted()
    {
        $data = CategoryRoom::onlyTrashed()->get();
        return view('admin.categoryrooms.deleted', compact('data'));
    }

    public function permanentlyDelete(string $id)
    {
        try {
            $model = CategoryRoom::where('id', $id);
            $model->forceDelete();
            Toastr::success('Thao tác thành công', 'Thành công');
            return to_route('categoryrooms.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Toastr::error('Thao tác thất bại', 'Thất bại');
        }
    }

    public function restore(string $id)
    {
        $model = CategoryRoom::query()->withTrashed()->findOrFail($id);
        $model->restore();
        $categoryrooms_deleted = CategoryRoom::onlyTrashed()->get();
        if (count($categoryrooms_deleted) == 0) {
            Toastr::error('Khôi phục không thành công', 'Không thành công');

            return redirect()->route('categoryrooms_deleted');
        } else {
            Toastr::success('Khôi phục thành công', 'Thành công');
            return redirect()->route('categoryrooms.deleted');
        }

    }
}
