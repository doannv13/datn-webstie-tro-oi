<?php

use App\Models\CategoryRoom;
use App\Models\District;
use App\Models\Post;
use App\Models\RoomPost;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

if (!function_exists('upload_file')) {
    function upload_file($folder, $file)
    {
        return 'storage/' . Storage::put($folder, $file);
    }
}

if (!function_exists('delete_file')) {
    function delete_file($pathFile)
    {
        $pathFile = str_replace('storage/', '', $pathFile);
        return Storage::exists($pathFile) ? Storage::delete($pathFile) : null;
    }
}
function timeposts($times)
{
    $dateString = $times;
    // Tách ra ngày và thời gian
    list($date, $time) = explode(' ', $dateString);
    // Tạo đối tượng Carbon từ ngày và thời gian
    $carbonDate = Carbon::createFromFormat('Y-m-d H:i:s', "$date $time");

    $postedTime = $carbonDate;
    $currentTime = Carbon::now();
    return $postedTime->diffForHumans($currentTime);
}
function countAcreage($min, $max)
{
    return RoomPost::whereBetween('acreage', [$min, $max])->where('status', 'accept')->count();
}

function countPrice($min, $max)
{
    return RoomPost::whereBetween('price', [$min, $max])->where('status', 'accept')->count();
}


function countPriceGreatThan10M(){
    return RoomPost::where('price', '>=', 10000000)->where('status', 'accept')->count();
}

function countAcreageGreatThan45(){
    return RoomPost::where('acreage', '>=', 75)->where('status', 'accept')->count();
}

function countDistrict($name){
    return RoomPost::join('districts', 'room_posts.district_id', '=', 'districts.id')
        ->where('districts.name', '=', $name)
        ->count();
}
function category_rooms()
{
    return CategoryRoom::all();
}
function districts()
{
    return District::all();
}
function room_posts()
{

    $query = RoomPost::with('facilities')
        ->where('status', 'accept')
        ->whereIn('service_id', [1, 2, 3])
        ->where('time_end', '>', Carbon::now())
        ->orderBy(DB::raw('FIELD(service_id, 1, 2, 3)'))
        ->inRandomOrder()
        ->paginate(10); // Phân trang trực tiếp trên truy vấn

    return $query;
}



function categories()
{
    return CategoryRoom::withCount('roomPosts')
        ->having('room_posts_count', '>', 0)
        ->paginate(4);
}
function posts()
{
    return Post::latest()->paginate(5);
}
function countPostServiceId($service_id){
    $count = RoomPost::where('service_id', $service_id)->count();
    return $count;
}
// $room_postss = RoomPost::latest()->with('facilities')->paginate(10);

// $categories = CategoryRoom::withCount('roomPosts')
//     ->having('room_posts_count', '>', 0)
//     ->paginate(4);

// $posts = Post::latest()->paginate(5);
