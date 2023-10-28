<?php

namespace App\Http\Controllers\Client;

use App\Events\CancelEvent;
use App\Events\NotificationEvent;
use App\Events\SuccessEvent;
use App\Http\Controllers\Controller;
use App\Models\CategoryRoom;
use App\Models\District;
use App\Models\Coupon;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category_rooms = CategoryRoom::all()->where('status', 'active');
        $districts = District::whereHas('roomPosts', function ($query) {
            $query->where('status', 'accept');
        })->distinct()->pluck('name');
        $data = Transaction::with('user')
            ->where('action', 'import')
            ->latest()
            ->paginate(10);
        return view('admin.transaction.index',compact('data', 'category_rooms', 'districts'));
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
        $model = new Transaction();
        $model->fill($request->all());
        $model->point = (int)str_replace(',', '', $model->point);
        $model->action ='import';
        $model->save();
        toastr()->success('Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.','Đơn hàng sẽ được xác nhận sớm');
        if($model->action==='import'){
            event( new NotificationEvent($request->verification));
        }
        return back();
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
    public function updateStatus(Request $request, $id)
    {
        $newStatus = $request->input('status');
        $model = Transaction::find($id);
        $model->status = $newStatus;
        $model->save();
        toastr()->success('Chỉnh sửa thành công','thành công');
        if($newStatus==='accept'){
            $user = User::findOrFail($model->user_id);
            if($model->point<300000){
                $user->point +=($model->point+ (5/100)*$model->point)/1000;
            }elseif($model->point>=300000 && $model->point<1000000){
                $user->point +=($model->point+ (7/100)*$model->point)/1000;
            }elseif($model->point>=1000000 && $model->point<=2000000){
                $user->point +=($model->point+ (10/100)*$model->point)/1000;
            }
            $user->save();
            event( new SuccessEvent($user));
        }elseif($newStatus==='cancel'){
            $user= User::findOrFail($model->user_id);
            event( new CancelEvent($user));
        }
        return back();
    }
    public function history(){

        $category_rooms = CategoryRoom::all()->where('status', 'active');
        $districts = District::whereHas('roomPosts', function ($query) {
            $query->where('status', 'accept');
        })->distinct()->pluck('name');
        $data = Transaction::with('user')
        ->where('user_id', auth()->user()->id)
        ->paginate(10);
    return view('client.transaction.historyPoint',compact('data', 'category_rooms', 'districts'));
    }

    // Mã giảm giá
    public function applyDiscount(Request $request)
    {
        $discountCode = $request->input('discount_code');

        // Kiểm tra mã giảm giá trong cơ sở dữ liệu
        $discount = Coupon::where('name', $discountCode)->first();
        // Kiểm tra và xử lý mã giảm giá tại đây, ví dụ:
        if ($discount) {
            $discountAmount = $discount->value; // Lấy giá trị giảm giá từ cơ sở dữ liệu
            $typeDiscount = $discount->type;
            return response()->json([
                'message' => 'Mã giảm giá đã được áp dụng!',
                'discount_amount' => $discountAmount,
                'type_discount' => $typeDiscount
            ]);

//            return response()->json(['message' => 'Mã giảm giá đã được áp dụng!']);
        } else {
            return response()->json([
                'message' => 'Mã giảm giá không hợp lệ.',
                'discount_amount' => 0,
                'type_discount' => ''
            ]);
        }
    }

    
}
