<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Coupon::query()->latest()->get();
        return view('admin.coupon.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        try {
            $model = new Coupon();
            $model->fill($request->all());
            $model->save();
            $notification = array(
                "message" => "Add coupon successfully",
                "alert-type" => "success",
            );
            return to_route('coupon.index')->with($notification);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            $notification = array(
                "message" => "Add coupon unsuccessfully",
                "alert-type" => "error",
            );
            return back()->with($notification);
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
        $data = Coupon::query()->findOrFail($id);
        return view('admin.coupon.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, string $id)
    {
        try {
            $model = Coupon::query()->findOrFail($id);
            $model->fill($request->all());
            $model->save();
            $notification = array(
                "message" => "Add coupon successfully",
                "alert-type" => "success",
            );
            return to_route('coupon.index')->with($notification);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            $notification = array(
                "message" => "Add coupon unsuccessfully",
                "alert-type" => "error",
            );
            return back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        try {
            $coupon->delete();
            return redirect()->back()->with('msg', ['success' => true, 'message' => 'Category deleted successfully']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('msg', ['success' => false, 'message' => 'Thao tác không thành công']);
        }
    }

    public function deleted()
    {
        $data = Coupon::onlyTrashed()->get();
        return view('admin.coupon.delete', compact('data'));
    }

    public function permanentlyDelete(String $id)
    {
        try {
            $coupon = Coupon::where('id', $id);
            $coupon->forceDelete();
            return redirect()->back()->with('msg', ['success' => true, 'message' => 'Category deleted successfully']);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('msg', ['success' => false, 'message' => 'Thao tác không thành công']);
        }
    }

    public function restore(String $id)
    {
        $restore = Coupon::query()->onlyTrashed()->findOrFail($id);
        $restore->restore();
        return redirect()->back();
    }
}
