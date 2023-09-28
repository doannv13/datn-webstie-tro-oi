<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::query()->latest()->get();
        return view('admin.post.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        try {
            $model = new Post();
            $slug = Str::slug($request->title);
            $model->slug = $slug;
            $model->fill($request->except('image'));
            if ($request->hasFile('image')) {
                $model->image = upload_file(OBJECT_POST, $request->file('icon'));
            }else{
                $model->image = 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcT7TiLhYLLSXgfz-TPjFR50a7J_PzqFjXNm41zbdPbYUREBFKj3';
            }
            $model->save();
            Toastr::success('Thao tác thành công', 'Thành công');
            return to_route('post.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
