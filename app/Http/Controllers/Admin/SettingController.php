<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;



class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::query()->findOrFail(1);
        return view('admin.setting.edit', compact('data'));
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
    public function update(SettingRequest $request, string $id)
    {
        $data = Setting::query()->findOrFail(1);
        try {
            $oldImg = $data->logo; // Lưu ảnh cũ

            $data->fill(\request()->except('logo'));

            if (\request()->hasFile('logo')) {
                $newImg = upload_file('settings', \request()->file('logo')); // Tải lên ảnh mới
                $data->logo = $newImg;
            }

            $data->save();

            // Kiểm tra nếu có ảnh mới và ảnh cũ tồn tại, thì xóa ảnh cũ
            if (\request()->hasFile('logo') && $oldImg) {
                delete_file($oldImg);
            }
            toastr()->success('Cập nhật cài đặt thành công!');

            return back()
                ->with('status', Response::HTTP_OK);
        } catch (\Exception $exception) {
            Log::error('Exception', [$exception]);
            toastr()->error('Cập nhật cài đặt thất bại!');

            return back()
                ->with('status', Response::HTTP_BAD_REQUEST);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
