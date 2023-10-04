<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryPostRequest;
use App\Models\CategoryPost;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = CategoryPost::query()->latest()->get();
        return view('admin.categorypost.index',compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categorypost.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryPostRequest $request)
    {
        try {
            $model = new CategoryPost();

            $slug = Str::slug($request->name);
            $model->slug = $slug;

            $model->fill($request->all());
            $model->save();
            Toastr::success('Thao tác thành công', 'Thành công');
            return to_route('categorypost.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Toastr::error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryPost $categoryPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = CategoryPost::query()->findOrFail($id);
        return view('admin.categorypost.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryPostRequest $request, string $id)
    {
        try {
            $model = CategoryPost::query()->findOrFail($id);

            $slug = Str::slug($request->name);
            $model->slug = $slug;

            $model->fill($request->all());
            $model->save();

            Toastr::success('Thao tác thành công', 'Thành công');
            return to_route('categorypost.index');
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
            $model = CategoryPost::query()->findOrFail($id);
            $model->delete();
            Toastr::success('Post đã chuyển vào thùng rác', 'Thành công');

            return to_route('categorypost.index');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Toastr::error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }

    public function deleted()
    {
        $model = CategoryPost::query()->onlyTrashed()->get();
        return view('admin.categorypost.delete', compact('model'));
    }

    public function restore(string $id)
    {
        try {
            $restore = CategoryPost::query()->onlyTrashed()->findOrFail($id);
            $restore->restore();
            Toastr::success('Khôi phục thành công', 'Thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Toastr::error('Khôi phục thất bại', 'Thất bại');
            return back();
        }
    }

    public function permanentlyDelete(String $id)
    {
        try {
            $categorypost = CategoryPost::query()->withTrashed()->findOrFail($id);
            $categorypost->forceDelete();
            Toastr::success('Xoá thành công', 'Thành công');

            return back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Toastr::error('Thao tác thất bại', 'Thất bại');
            return back();
        }
    }
    public function changeStatus(Request $request)
    {
        try {
            $categorypost = CategoryPost::find($request->categorypost_id);
            $categorypost->status = $request->status;
            $categorypost->save();
            return response()->json(['success' => 'Thay đổi trạng thái thành công']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['error' => 'Thay đổi trạng thái thất bại']);
        }
    }
}
