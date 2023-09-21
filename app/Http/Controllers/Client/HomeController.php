<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CategoryRoom;
use App\Models\Districts;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    //
    public function index(){
        $categories_room=CategoryRoom::query()->latest()->get();
        $districts=Districts::query()->latest()->get();
        return view('client.layouts.home',compact('categories_room','districts'));
    }
    public function filter_list(Request $request){
         $jsonData = $request->input();
         dd($jsonData);
    }
}
