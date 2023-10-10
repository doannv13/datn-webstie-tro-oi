@extends('client.layouts.master')
@section('content')
    <!-- Blog body start -->
    <div class="blog-body content-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-12 col-sm-12" style="max-height: 100%;">
                    <div class="sidebar" style="height: 100%;">

                        <!-- Archives start -->
                        <div class="sidebar-widget archives">
                            <div class="main-title-2">
                                <h1>Quản lý</h1>
                            </div>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-newspaper px-2"></i><a href="{{ route('room-posts.index') }}">Quản lý
                                        tin đăng</a></li>
                                <li><i class="fas fa-edit px-2"></i><a href="{{ route('room-posts.create') }}">Đăng tin
                                        mới</a></li>
                                        <li><i class="fas fa-list-alt px-2"></i><a href="{{ route('points.history') }}">Lịch sử giao dịch</a></li>
                                <li><i class="fas fa-store px-2"></i><a href="#">Dịch vụ</a></li>
                                <li><i class="fas fa-store px-2"></i><a href="{{ route('room-posts-deleted') }}">Thùng
                                        rác</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-lg-10 col-md-12 col-sm-12">
                    @yield('main')
                </div>
            </div>
        </div>
    </div>
@endsection
