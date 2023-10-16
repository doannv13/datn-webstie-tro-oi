@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">

        

        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0">Các tin theo gói dịch vụ </h4>

                        <div class="widget-chart text-center">
                            <div id="chart-container" style="height: 245px;">
                            </div>
                            <ul class="list-inline chart-detail-list mb-0">
                                <li class="list-inline-item">
                                    <h5 style="color: #66a3ed; font-size: 14px"><i class="fa fa-circle me-1"></i>Tin thường</h5>
                                </li>
                                <li class="list-inline-item">
                                    <h5 style="color: #f22424; font-size: 14px"><i class="fa fa-circle me-1"></i>VIP1</h5>
                                </li>
                                <li class="list-inline-item">
                                    <h5 style="color: #f2b424; font-size: 14px"><i class="fa fa-circle me-1"></i>VIP2</h5>
                                </li>
                                <li class="list-inline-item">
                                    <h5 style="color: #f72a79; font-size: 14px"><i class="fa fa-circle me-1"></i>VIP3</h5>
                                </li>
                            </ul>
                        </div>
                       
                        
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>
                        <h4 class="header-title mt-0">Tin đăng theo danh mục hoặc doanh thu</h4>
                        <div id="morris-bar-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>
                        <h4 class="header-title mt-0">Total Revenue</h4>
                        <div id="morris-line-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4"><a href="{{ route('category-rooms.index') }}"
                                class="text-dark">Danh mục tin đăng</a></h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050"
                                    data-bgColor="#F9B9B9" value="{{ $countCategoryRoomPostToActive }}" data-min="0"
                                    data-max="{{ $countCategoryRoomPost }}" data-skin="tron" data-angleOffset="180"
                                    data-readOnly="false" data-thickness=".15" />

                            </div>

                            <div class="widget-detail-1 text-end">
                                <h2 class="fs-5">Tổng: {{ $countCategoryRoomPost }}</h2>
                                <h2 class="fw-normal pt-2 mb-1 fs-5">Đang hoạt động: {{ $countCategoryRoomPostToActive }}</h2>
                                <p class="text-muted  mb-1">Tin trong ngày: {{ $countCategoryRoomPostToDay }}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4"><a href="{{ route('admin-room-posts.index') }}"
                                class="text-dark">Tin đăng phòng</a></h4>

                        <div class="widget-box-2">
                            <div class="widget-detail-2 text-end">
                                <span class="badge bg-pink rounded-pill float-start mt-3">Tổng: {{ $countRoomPost }} <i
                                        class="mdi mdi-trending-up"></i> </span>
                                <h2 class="fw-normal mb-1 fs-5">Đang hoạt động: {{ $countRoomPostToActive }} </h2>
                                <p class="text-muted mb-4">Tin trong ngày: {{ $countRoomPostToDay }}</p>
                            </div>
                            <div class="progress progress-bar-alt-pink progress-sm">
                                <div class="progress-bar bg-pink" role="progressbar"
                                    aria-valuenow="{{ $countRoomPostToActive }}" aria-valuemin="0"
                                    aria-valuemax="{{ $countRoomPost }}"
                                    style="width: {{ ($countRoomPostToActive / $countRoomPost) * 100 }}%;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4"><a href="{{ route('category-posts.index') }}"
                                class="text-dark">Danh mục bài viết</a></h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#faee43"
                                    data-bgColor="#f9f5b9" value="{{ $countCategoryPostToActive }}" data-min="0"
                                    data-max="{{ $countCategoryPost }}" data-skin="tron" data-angleOffset="180"
                                    data-readOnly="false" data-thickness=".15" />
                            </div>
                            <div class="widget-detail-1 text-end">
                                <h2 class="fs-5">Tổng: {{ $countCategoryPost }}</h2>
                                <h2 class="fw-normal pt-2 mb-1 fs-5">Đang hoạt động: {{ $countCategoryPostToActive }}</h2>
                                <p class="text-muted mb-1">Trong ngày: {{ $countCategoryPostToDay }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4"><a href="{{ route('posts.index') }}" class="text-dark">Bài
                                viết</a></h4>

                        <div class="widget-box-2">
                            <div class="widget-detail-2 text-end">
                                <span class="badge bg-warning rounded-pill float-start mt-3">Tổng: {{ $countPost }} <i
                                        class="mdi mdi-trending-up"></i> </span>
                                <h2 class="fw-normal mb-1 fs-5">Đang hoạt động: {{ $countPostToActive }} </h2>
                                <p class="text-muted mb-4">Trong ngày: {{ $countPostToDay }}</p>
                            </div>
                            <div class="progress progress-bar-alt-warning progress-sm">
                                <div class="progress-bar bg-warning" role="progressbar"
                                    aria-valuenow="{{ $countPostToActive }}" aria-valuemin="0"
                                    aria-valuemax="{{ $countPost }}"
                                    style="width: {{ ($countPostToActive / $countPost) * 100 }}%;">
                                    <span class="visually-hidden">77% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

        </div>
        <!-- end row -->

        <div class="row">

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0"><a href="{{ route('users.index') }}"
                                class="text-dark">Tài khoản: {{ $countAccount }}</a></h4>
                        <div class="row">
                            <div class="widget-chart-1 col-xl-6">
                                <div class="widget-detail-1">
                                    <h2 class="fs-6 badge bg-danger rounded-pill">Admin: {{ $countAccountAdmin }}</h2>
                                    <p class="text-muted" style="font-size: 11px">Tạo trong ngày: {{ $countAccountAdminToDay }}</p>
                                </div>
                            </div>
                            <div class="widget-chart-1 col-xl-6">
                                <div class="widget-detail-1">
                                    <h2 class="fs-6 badge bg-warning rounded-pill">Vendor: {{ $countAccountVendor }}</h2>
                                    <p class="text-muted" style="font-size: 11px">Tạo trong ngày: {{ $countAccountVendorToDay }}</p>
                                </div>
                            </div>
                            <div class="widget-chart-1 col-xl-6">
                                <div class="widget-detail-1">
                                    <h2 class="fs-6 badge bg-success rounded-pill"><a href="{{ route('roles.index') }}"
                                        class="text-white">Vai trò: {{ $countRole }}</a></h2>
                                </div>
                            </div>
                            <div class="widget-chart-1 col-xl-6">
                                <div class="widget-detail-1">
                                    <h2 class="fs-6 badge bg-info rounded-pill"><a href="{{ route('permissions.index') }}"
                                        class="text-white">Quyền: {{ $countPermission }}</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>
                        <h4 class="header-title mt-0">Khác</h4>
                            <div class="row">
                                <div class="widget-chart-1 col-xl-6">
                                    <div class="widget-detail-1">
                                        <h2 class="fs-6 badge bg-danger rounded-pill"><a href="{{ route('coupons.index') }}"
                                            class="text-white">Mã giảm giá: {{ $countCoupon }}</a></h2>
                                        <p class="text-muted" style="font-size: 11px">Hoạt động: {{ $countCouponToActive }}</p>
                                    </div>
                                </div>
                                <div class="widget-chart-1 col-xl-6">
                                    <div class="widget-detail-1">
                                        <h2 class="fs-6 badge bg-warning rounded-pill"><a href="{{ route('banners.index') }}"
                                            class="text-white">Banner: {{ $countBanner }}</a></h2>
                                        <p class="text-muted" style="font-size: 11px">Hoạt động: {{ $countBannerToActive }}</p>
                                    </div>
                                </div>
                                <div class="widget-chart-1 col-xl-6">
                                    <div class="widget-detail-1">
                                        <h2 class="fs-6 badge bg-success rounded-pill"><a href="{{ route('facilities.index') }}"
                                            class="text-white">Tiện ích: {{ $countFacility }}</a></h2>
                                    </div> 
                                </div>
                                <div class="widget-chart-1 col-xl-6">
                                    <div class="widget-detail-1">
                                        <h2 class="fs-6 badge bg-info rounded-pill"><a href="{{ route('surroundings.index') }}"
                                            class="text-white">Xung quanh: {{ $countSurrounding }}</a></h2>
                                    </div>
                                </div>
                                

                            </div>
                        
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4"><a href="{{ route('category-posts.index') }}"
                                class="text-dark">Danh mục bài viết</a></h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#faee43"
                                    data-bgColor="#f9f5b9" value="{{ $countCategoryPostToActive }}" data-min="0"
                                    data-max="{{ $countCategoryPost }}" data-skin="tron" data-angleOffset="180"
                                    data-readOnly="false" data-thickness=".15" />
                            </div>
                            <div class="widget-detail-1 text-end">
                                <h2 class="fs-5">Tổng: {{ $countCategoryPost }}</h2>
                                <h2 class="fw-normal pt-2 mb-1 fs-5">Đang hoạt động: {{ $countCategoryPostToActive }}</h2>
                                <p class="text-muted mb-1">Trong ngày: {{ $countCategoryPostToDay }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4"><a href="{{ route('posts.index') }}" class="text-dark">Bài
                                viết</a></h4>

                        <div class="widget-box-2">
                            <div class="widget-detail-2 text-end">
                                <span class="badge bg-warning rounded-pill float-start mt-3">Tổng: {{ $countPost }} <i
                                        class="mdi mdi-trending-up"></i> </span>
                                <h2 class="fw-normal mb-1 fs-5">Đang hoạt động: {{ $countPostToActive }} </h2>
                                <p class="text-muted mb-4">Trong ngày: {{ $countPostToDay }}</p>
                            </div>
                            <div class="progress progress-bar-alt-warning progress-sm">
                                <div class="progress-bar bg-warning" role="progressbar"
                                    aria-valuenow="{{ $countPostToActive }}" aria-valuemin="0"
                                    aria-valuemax="{{ $countPost }}"
                                    style="width: {{ ($countPostToActive / $countPost) * 100 }}%;">
                                    <span class="visually-hidden">77% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body widget-user">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 avatar-lg me-3">
                                <img src="{{ asset('be/assets/images/users/user-3.jpg') }}"
                                    class="img-fluid rounded-circle" alt="user">
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="mt-0 mb-1">Chadengle</h5>
                                <p class="text-muted mb-2 font-13 text-truncate">coderthemes@gmail.com</p>
                                <small class="text-warning"><b>Admin</b></small>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body widget-user">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 avatar-lg me-3">
                                <img src="{{ asset('be/assets/images/users/user-2.jpg') }}"
                                    class="img-fluid rounded-circle" alt="user">
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="mt-0 mb-1"> Michael Zenaty</h5>
                                <p class="text-muted mb-2 font-13 text-truncate">coderthemes@gmail.com</p>
                                <small class="text-pink"><b>Support Lead</b></small>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body widget-user">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 avatar-lg me-3">
                                <img src="{{ asset('be/assets/images/users/user-1.jpg') }}"
                                    class="img-fluid rounded-circle" alt="user">
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="mt-0 mb-1">Stillnotdavid</h5>
                                <p class="text-muted mb-2 font-13 text-truncate">coderthemes@gmail.com</p>
                                <small class="text-success"><b>Designer</b></small>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body widget-user">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 avatar-lg me-3">
                                <img src="{{ asset('be/assets/images/users/user-10.jpg') }}"
                                    class="img-fluid rounded-circle" alt="user">
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="mt-0 mb-1">Tomaslau</h5>
                                <p class="text-muted mb-2 font-13 text-truncate">coderthemes@gmail.com</p>
                                <small class="text-info"><b>Developer</b></small>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mb-3">Inbox</h4>

                        <div class="inbox-widget">

                            <div class="inbox-item">
                                <a href="#">
                                    <div class="inbox-item-img"><img
                                            src="{{ asset('be/assets/images/users/user-1.jpg') }}" class="rounded-circle"
                                            alt=""></div>
                                    <h5 class="inbox-item-author mt-0 mb-1">Chadengle</h5>
                                    <p class="inbox-item-text">Hey! there I'm available...</p>
                                    <p class="inbox-item-date">13:40 PM</p>
                                </a>
                            </div>

                            <div class="inbox-item">
                                <a href="#">
                                    <div class="inbox-item-img"><img
                                            src="{{ asset('be/assets/images/users/user-2.jpg') }}" class="rounded-circle"
                                            alt=""></div>
                                    <h5 class="inbox-item-author mt-0 mb-1">Tomaslau</h5>
                                    <p class="inbox-item-text">I've finished it! See you so...</p>
                                    <p class="inbox-item-date">13:34 PM</p>
                                </a>
                            </div>

                            <div class="inbox-item">
                                <a href="#">
                                    <div class="inbox-item-img"><img
                                            src="{{ asset('be/assets/images/users/user-3.jpg') }}" class="rounded-circle"
                                            alt=""></div>
                                    <h5 class="inbox-item-author mt-0 mb-1">Stillnotdavid</h5>
                                    <p class="inbox-item-text">This theme is awesome!</p>
                                    <p class="inbox-item-date">13:17 PM</p>
                                </a>
                            </div>

                            <div class="inbox-item">
                                <a href="#">
                                    <div class="inbox-item-img"><img
                                            src="{{ asset('be/assets/images/users/user-4.jpg') }}" class="rounded-circle"
                                            alt=""></div>
                                    <h5 class="inbox-item-author mt-0 mb-1">Kurafire</h5>
                                    <p class="inbox-item-text">Nice to meet you</p>
                                    <p class="inbox-item-date">12:20 PM</p>
                                </a>
                            </div>

                            <div class="inbox-item">
                                <a href="#">
                                    <div class="inbox-item-img"><img
                                            src="{{ asset('be/assets/images/users/user-5.jpg') }}" class="rounded-circle"
                                            alt=""></div>
                                    <h5 class="inbox-item-author mt-0 mb-1">Shahedk</h5>
                                    <p class="inbox-item-text">Hey! there I'm available...</p>
                                    <p class="inbox-item-date">10:15 AM</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-3">Latest Projects</h4>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Project Name</th>
                                        <th>Start Date</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Assign</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Adminto Admin v1</td>
                                        <td>01/01/2017</td>
                                        <td>26/04/2017</td>
                                        <td><span class="badge bg-danger">Released</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Adminto Frontend v1</td>
                                        <td>01/01/2017</td>
                                        <td>26/04/2017</td>
                                        <td><span class="badge bg-success">Released</span></td>
                                        <td>Adminto admin</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Adminto Admin v1.1</td>
                                        <td>01/05/2017</td>
                                        <td>10/05/2017</td>
                                        <td><span class="badge bg-pink">Pending</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Adminto Frontend v1.1</td>
                                        <td>01/01/2017</td>
                                        <td>31/05/2017</td>
                                        <td><span class="badge bg-purple">Work in Progress</span>
                                        </td>
                                        <td>Adminto admin</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Adminto Admin v1.3</td>
                                        <td>01/01/2017</td>
                                        <td>31/05/2017</td>
                                        <td><span class="badge bg-warning">Coming soon</span></td>
                                        <td>Coderthemes</td>
                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>Adminto Admin v1.3</td>
                                        <td>01/01/2017</td>
                                        <td>31/05/2017</td>
                                        <td><span class="badge bg-primary">Coming soon</span></td>
                                        <td>Adminto admin</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
    
    
@endsection
@push('scripts')
<script>
    // Xóa biểu đồ cũ nếu nó đã tồn tại
    var oldChart = document.getElementById('chart-container');
    while (oldChart.firstChild) {
        oldChart.removeChild(oldChart.lastChild);
    }

    // Tạo biểu đồ mới
    new Morris.Donut({
        element: 'chart-container',
        data: [
            {label: "VIP1", value: 30},
            {label: "VIP2", value: 40},
            {label: "VIP3", value: 20},
            {label: "Tin thường", value: 100},

        ],
        colors: ['#f22424', '#f2b424', '#f72a79', '#66a3ed']
    });
</script>
@endpush
