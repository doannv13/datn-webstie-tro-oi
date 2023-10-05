<?php

use App\Models\CategoryRoom;
use App\Models\District;
use Illuminate\Support\Facades\Storage;

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


function category_rooms()
{
    return CategoryRoom::all();
}
function districts()
{
    return District::all();
}
