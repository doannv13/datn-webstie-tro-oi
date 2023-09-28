@extends('client.layouts.master')
@section('content')
    <!-- Blog body start -->
    <div class="blog-body content-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-12 col-sm-12" style="max-height: 100%;">
                    <div class="sidebar" style="height: 100%;">
                        <!-- Search box start -->
                        <div class="sidebar-widget search-box">
                            <form class="form-inline form-search" method="GET">
                                <div class="form-group">
                                    <label class="sr-only" for="textsearch3">Search</label>
                                    <input type="text" class="form-control" id="textsearch3" placeholder="Search">
                                </div>
                                <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!-- Archives start -->
                        <div class="sidebar-widget archives">
                            <div class="main-title-2">
                                <h1>Quản lý</h1>
                            </div>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-newspaper px-2"></i><a href="{{ route('room-post.index') }}">Quản lý
                                        tin đăng</a></li>
                                <li><i class="fas fa-edit px-2"></i><a href="{{ route('room-post.create') }}">Đăng tin
                                        mới</a></li>
                                <li><i class="fas fa-list-alt px-2"></i><a href="#">Lịch sử giao dịch</a></li>
                                <li><i class="fas fa-store px-2"></i><a href="#">Dịch vụ</a></li>
                                <li><i class="fas fa-store px-2"></i><a href="{{ route('room_deleted') }}">Thùng rác</a>
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
