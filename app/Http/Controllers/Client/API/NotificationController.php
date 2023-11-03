<?php

namespace App\Http\Controllers\Client\API;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // $user = Auth::user();
        // // dd($user);
        // $user_id=$user->id;
        $user = User::find(1);
        $notifications = $user->notifications;
      

        // $notifications = Notification::where('user_id', 2)
        //     ->whereNull('read_at')
        //     ->get();
        $newArray = [];

        // Lặp qua mảng JSON và thêm các cặp giá trị vào mảng mới
        foreach ($notifications as $item) {
            $id = $item->id;
            $name = $item->user->name;
            $message = $item->message;
            $avata = $item->user->avatar;
            $read_at = $item->read_at;
            $created_at_about = timeposts($item->created_at);
            $newArray[] = ['id' => $id, 'name' => $name, 'message' => $message, 'avata' => $avata, 'read_at' => $read_at, 'created_at_about' => $created_at_about];
        }
        $newArray = array_reverse($newArray);
        return response()->json(
            $newArray,
        );
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
