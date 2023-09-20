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
        $data = CategoryPost::query()->latest()->get();
        return view('admin.categorypost.index',compact('data'));
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
        $data = CategoryPost::query()->findOrFail($id);
        return view('admin.categorypost.edit',compact('data'));
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
//    public function destroy(string $id)
//    {
//
//        try {
//            CategoryPost::query()->findOrFail($id)->delete();
//
//            return redirect()->back()->with('msg', ['success' => true, 'message' => 'Thao tác thành công ']);
//        } catch (\Exception $exception) {
//            Log::error($exception->getMessage());
//            return back()->with('msg', ['success' => false, 'message' => 'Thao tác không thành công']);
//        }
//    }

    public function destroy(CategoryPost $categorypost)
    {
        try {
            $categorypost->delete();
            Toastr::success('Thao tác thành công', 'Thành công');

            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Toastr::error('Thao tác đã được hủy', 'Hủy');
            return back();
        }
    }



    public function deleted()
    {
        $data = CategoryPost::onlyTrashed()->get();
        return view('admin.categorypost.delete', compact('data'));
    }

    public function permanentlyDelete(String $id)
    {
        try {
            $categorypost = CategoryPost::where('id', $id);
            $categorypost->forceDelete();
            toastr()->success('Thao tác thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            toastr()->error('Thao tác không thành công');
            return back();
        }
    }

    public function restore(String $id)
    {
        $model = CategoryPost::query()->onlyTrashed()->findOrFail($id);
        $model->restore();
        $categorypost_deleted = CategoryPost::onlyTrashed()->get();
        if (count($categorypost_deleted) == 0) {
            Toastr::error('Thao tác không thành công', 'Không thành công');

            return redirect()->route('categorypost.deleted');
        } else {
            Toastr::success('Thao tác thành công', 'Thành công');
            return redirect()->route('categorypost.deleted');
        }
    }

}
