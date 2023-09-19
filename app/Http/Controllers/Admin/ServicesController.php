<?php

namespace App\Http\Controllers\Admin;

use App\Models\Services;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ServicesRequest;

class ServicesController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        $services = Services::query()->latest()->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicesRequest $request)
    {
        //

        try {
            $model = new Services();
            $model->fill($request->all());
            $model->save();
            $notification = array(
                "message" => "Thêm gói dịch vụ thành công",
                "alert-type" => "success",
            );
            // return redirect()->route('services.index')->with($notification);
            return redirect()->route('services.index')->with('success', 'Thêm dịch vụ thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            $notification = array(
                "message" => "Thêm gói dịch vụ không thành công",
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
        //
        $services_one = Services::query()->findOrFail($id);
        return view('admin.services.edit', compact('services_one'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicesRequest $request, string $id)
    {
        //
        try {
            $model = Services::query()->findOrFail($id);
            $model->fill($request->all());
            $model->save();
            $notification = array(
                "message" => "Sửa gói dịch vụ thành công",
                "alert-type" => "success",
            );
            // return redirect()->route('services.index')->with($notification);
            return redirect()->route('services.index')->with('success', 'Sửa dịch vụ thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            $notification = array(
                "message" => "Sửa gói dịch vụ không thành công",
                "alert-type" => "error",
            );
            return back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $model = Services::query()->findOrFail($id);
            $model->delete();
            // return redirect()->back()->with('msg', ['success' => true, 'message' => 'Thao tác  thành công']);
            return redirect()->route('services.index')->with('success', 'Thao tác thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('msg', ['success' => false, 'message' => 'Thao tác không thành công']);
        }
    }
    public function deleted()
    {
        $services_deleted = Services::onlyTrashed()->get();
        return view('admin.services.deleted', compact('services_deleted'));
    }

    public function permanentlyDelete(String $id)
    {
        try {
            $model = Services::where('id', $id);
            $model->forceDelete();
            // return redirect()->back()->with('msg', ['success' => true, 'message' => 'Thao tác thành công']);
            // return redirect()->route('services.deleted')->with('success', 'Thao tác thành công');
            $services_deleted = Services::onlyTrashed()->get();
            if (count($services_deleted) == 0) {
                return redirect()->route('services.index')->with('success', 'Thao tác thành công');
            } else {
                return redirect()->route('services.deleted')->with('success', 'Thao tác thành công');
            }
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('msg', ['success' => false, 'message' => 'Thao tác không thành công']);
        }
    }

    public function restore(String $id)
    {
        $model = Services::query()->onlyTrashed()->findOrFail($id);
        $model->restore();
        $services_deleted = Services::onlyTrashed()->get();
        if (count($services_deleted) == 0) {
            return redirect()->route('services.index')->with('success', 'Thao tác thành công');
        } else {
            return redirect()->route('services.deleted')->with('success', 'Thao tác thành công');
        }
    }
}
