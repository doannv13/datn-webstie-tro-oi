<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">

            <img src="{{ asset('be/assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">

                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                    aria-expanded="false">Nowak Helme</a>

                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                    aria-expanded="false">Nowak Helme</a>

                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>

            <p class="text-muted left-user-info">Admin Head</p>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ asset('./be/#dashboard') }}" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Dashboard</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">- Thêm mới</a>
                            </li>
                            <li>
                                <a href="#">- Danh sách </a>
                            </li>
                            <li>
                                <a href="#">- Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ asset('./be/#baocao') }}" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Báo cáo</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="baocao">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">- Thêm mới</a>
                            </li>
                            <li>
                                <a href="#">- Danh sách </a>
                            </li>
                            <li>
                                <a href="#">- Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">Quản lý Phòng</li>
                <li>
                    <a href="{{ asset('./be/#dmp') }}" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Danh mục phòng </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="dmp">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('category-rooms.create') }}">- Thêm mới</a>
                            </li>
                            <li>
                                <a href="{{ route('category-rooms.index') }}">- Danh sách </a>
                            </li>
                            <li>
                                <a href="{{ route('category-rooms-deleted') }}">- Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ asset('./be/#tdp') }}" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Tin đăng phòng</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="tdp">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin-room-posts.create') }}">- Thêm mới</a>
                            </li>
                            <li>
                                <a href="{{ route('admin-room-posts.index') }}">- Danh sách </a>
                            </li>
                            <li>
                                <a href="{{ route('admin-room-posts-deleted') }}">- Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ asset('./be/#tienich') }}" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Tiện ích</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="tienich">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('facilities.create') }}">- Thêm mới</a>
                            </li>
                            <li>
                                <a href="{{ route('facilities.index') }}">- Danh sách </a>
                            </li>
                            <li>
                                <a href="{{ route('facilities-deleted') }}">- Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">Quản lý bài viết</li>

                <li>
                    <a href="{{ asset('./be/#dmbv') }}" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Danh mục bài viết </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="dmbv">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('category-posts.create') }}">- Thêm mới</a>
                            </li>
                            <li>
                                <a href="{{ route('category-posts.index') }}">- Danh sách </a>
                            </li>
                            <li>
                                <a href="{{ route('category-posts-deleted') }}">- Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ asset('./be/#bv') }}" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Bài viết </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="bv">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('posts.create') }}">- Thêm mới</a>
                            </li>
                            <li>
                                <a href="{{ route('posts.index') }}">- Danh sách </a>
                            </li>
                            <li>
                                <a href="{{ route('posts-deleted') }}">- Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#tag" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Tag</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="tag">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('tags.create') }}">- Thêm mới</a>
                            </li>
                            <li>
                                <a href="{{ route('tags.index') }}">- Danh sách </a>
                            </li>
                            <li>
                                <a href="{{ route('tags-deleted') }}">- Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">Quản lý tài khoản</li>

                <li>
                    <a href="{{ asset('./be/#tk') }}" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Tài khoản</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="tk">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">- Thêm mới</a>
                            </li>
                            <li>
                                <a href="#">- Danh sách </a>
                            </li>
                            <li>
                                <a href="#">- Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ asset('./be/#pq') }}" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Phân quyền</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="pq">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">- Thêm mới</a>
                            </li>
                            <li>
                                <a href="#">- Danh sách </a>
                            </li>
                            <li>
                                <a href="#">- Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">Quản lý đơn hàng</li>

                <li>
                    <a href="{{ asset('./be/#ttdh') }}" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Thông tin đơn hàng</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="ttdh">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">- Thêm mới</a>
                            </li>
                            <li>
                                <a href="#">- Danh sách </a>
                            </li>
                            <li>
                                <a href="#">- Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#coupon" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Mã giảm giá</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="coupon">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('coupons.create') }}">- Thêm mới</a>
                            </li>
                            <li>
                                <a href="{{ route('coupons.index') }}">- Danh sách </a>
                            </li>
                            <li>
                                <a href="{{ route('coupons-deleted') }}">- Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ asset('./be/#goidichvu') }}" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Gói dịch vụ</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="goidichvu">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('services.create') }}">- Thêm mới</a>
                            </li>
                            <li>
                                <a href="{{ route('services.index') }}">- Danh sách </a>
                            </li>
                            <li>
                                <a href="{{ route('services-deleted') }}">- Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">Setting</li>

                <li>
                    <a href="{{ asset('./be/#setting') }}" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="setting">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('settings.index') }}">- Danh sách </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#banner" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Banner</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="banner">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('banners.index') }}">- Danh sách </a>
                            </li>
                            <li>
                                <a href="{{ route('banners.create') }}">- Thêm mới</a>
                            </li>
                            <li>
                                <a href="{{ route('banners-deleted') }}">- Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#quangcao" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Quảng cáo</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="quangcao">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('advertisements.create') }}">- Thêm mới</a>
                            </li>
                            <li>
                                <a href="{{ route('advertisements.index') }}">- Danh sách </a>
                            </li>
                            <li>
                                <a href="{{ route('advertisements-deleted') }}">- Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
