<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportRevenueController extends Controller
{
    //
    public function index(){
       
        $revenue=Transaction::query()->where('status','accept')->where('action','import')->sum('point');
        $revenue_today = Transaction::where('status','accept')->where('action','import')->whereDate('created_at', today())->sum('point');
        $bill_today=Transaction::where('status','accept')->where('action','import')->whereDate('created_at', today())->count();
        $bill=Transaction::query()->where('action','import')->count();
        $bill_false=Transaction::query()->where('action','import')->where('status','cancel')->count();
        $revenue_service_today=Transaction::query()->where('action','export')->whereDate('created_at',today())->sum('point');
        $revenue_service=Transaction::query()->where('action','export')->sum('point');
        // dd($bill,$bill_false);
       return view('admin.revenue.index',compact('revenue','revenue_today','bill','bill_false','bill_today','revenue_service','revenue_service_today'));
    }
    public function fillterRevenue(Request $request)  {
        $date_time=$request->input('date_time');
        $query=Transaction::query();
        if($date_time!=null){
            $query->where('created_at','<=', $date_time);
        }else{
            $query->where('created_at','<=', Carbon::now());
        }
        $revenue=$query->where('status','accept')->where('action','import')->sum('point');//
        $revenue_service=Transaction::query()->where('created_at','<=', $date_time)->where('action','export')->sum('point');//
        $bill=$query->where('action','import')->count();//
        $bill_false=$query->where('action','import')->where('status','cancel')->count();//
        // dd($revenue_service,$bill,$bill_false);
        $revenue_today = Transaction::where('status','accept')->where('action','import')->whereDate('created_at', today())->sum('point');
        $bill_today=Transaction::where('status','accept')->where('action','import')->whereDate('created_at', today())->count();
       
        $revenue_service_today=Transaction::query()->where('action','export')->whereDate('created_at',today())->sum('point');      
        return view('admin.revenue.index',compact('revenue','revenue_today','bill','bill_false','bill_today','revenue_service','revenue_service_today','date_time'));
    }
}
