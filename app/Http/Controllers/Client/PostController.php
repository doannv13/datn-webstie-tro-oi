<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CategoryRoom;
use App\Models\Post;
use App\Models\RoomPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room_posts = RoomPost::latest()->with('facilities')->paginate(10);
        $data = Post::query()->latest()->paginate(4);
        $categories = CategoryRoom::withCount('roomPosts')
            ->having('room_posts_count', '>', 0)
            ->paginate(4);
        $posts = Post::latest()->paginate(5);
        // dd($room_posts[0]->facilities);
        return view('client.post.index', compact('data', 'categories', 'posts', 'room_posts'));
    }


    function postDetail(String $id)
    {
        $room_posts = RoomPost::latest()->with('facilities')->paginate(10);
        $categories = CategoryRoom::withCount('roomPosts')
            ->having('room_posts_count', '>', 0)
            ->paginate(4);
        $posts = Post::latest()->paginate(4);

        $data = Post::query()->findOrFail($id);
        $data->increment('view');
        return view('client.post.detail', compact('data', 'categories', 'posts', 'room_posts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
