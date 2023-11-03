<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ReportPostController extends Controller
{
   public function index(){
      $post = Post::query()->count();
      $post_today = Post::query()->whereDate('created_at', today())->count();
      $total_post= Post::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total_posts'))->groupBy('date')->orderBy('date')->get();
      $total_views = Post::sum('view');
      $total_views_today = Post::whereDate('created_at', today())->sum('view');
      return view('admin.report.post.index', compact('post', 'post_today', 'total_post', 'total_views','total_views_today'));
   }
}
