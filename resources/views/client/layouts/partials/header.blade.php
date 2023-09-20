<header class="top-header" id="top-header-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-8 col-sm-7 col-7">
                <div class="list-inline">
                    <a href="tel:+55-4XX-634-7071"
                    ><i class="fa fa-phone"></i>Need Support? +00-4X6-634-781</a
                    >
                    <a href="tel:info@themevessel.com" class="d-none-768"
                    ><i class="fa fa-envelope"></i>info@themevessel.com</a
                    >
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5 col-5">
                <ul class="top-social-media pull-right">
                    <li>
                        <a
                            href="javascript:void(0);"
                            class="sign-in"
                            data-bs-toggle="modal"
                            data-bs-target="#login"
                        ><i class="fa fa-sign-in me-1"></i>Đăng nhập</a
                        >
                    </li>
                    <li>
                        <a
                            href="javascript:void(0);"
                            data-bs-toggle="modal"
                            data-bs-target="#signup"
                            class="sign-in"
                        ><i class="fa fa-user me-1"></i>Đăng ký</a
                        >
                    </li>
                </ul>
            <!-- <div class="dropdown pull-right">
                  <button type="button" class="btn text-white bg-select-group p-0"
                      data-bs-toggle="dropdown"  data-bs-display="static" aria-expanded="false">
                      <img class="rounded-circle" width="30px" {{ asset('fe/src="https') }}://picsum.photos/200"
                          alt="Header Avatar">
                      <span class="d-xl-inline-block ms-1 dropdown-toggle">Nguyen</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end">
                      <div>
                          <a class="dropdown-item" href="">Thông tin tài khoản</a>
                          <a class="dropdown-item" href="">Cập nhật tài khoản</a>
                          <a class="dropdown-item" href="">Đổi mật khẩu</a>
                          <a class="dropdown-item text-danger" href="">Đăng xuất</a>
                      </div>
                  </div>
              </div> -->
            </div>
        </div>
    </div>
</header>

<!-- Main header start -->
<header class="main-header" id="main-header-1">
    <div class="container">
        <nav
            class="navbar navbar-expand-lg navbar-light bg-light"
            style="z-index: 0"
        >
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('fe/img/logos/logo.png') }}" alt="logo" height="80px" />
                </a>

                <div
                    class="navbar-collapse collapse w-100 justify-content-center"
                    id="navbar"
                >
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a
                                class="nav-link"
                                href="#"
                                id="navbarDropdownMenuLink"
                                aria-expanded="false"
                            >
                                Trang chủ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="#"
                                id="navbarDropdownMenuLink2"
                                aria-expanded="false"
                            >
                                Phòng cho thuê
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="#"
                                id="navbarDropdownMenuLink2"
                                aria-expanded="false"
                            >
                                Tin tức
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="#"
                                id="navbarDropdownMenuLink2"
                                aria-expanded="false"
                            >
                                Bảng giá dịch vụ
                            </a>
                        </li>
                    </ul>
                </div>
                <div
                    class="d-none-992 d-none-768 nav navbar-nav w-100 justify-content-end"
                >
                    <div class="d-flex align-items-center">
                        <a href=""
                        ><i class="fa fa-bookmark-o me-2 fs-4 text-main"></i
                            ></a>
                        <button class="btn btn-5" style="font-size: 13px">
                            Đăng tin
                        </button>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a
                        href=""
                        class="d-md-block d-xl-none d-lg-none justify-content-end"
                    ><i class="fa fa-bookmark-o me-2 fs-4"></i
                        ></a>

                    <button class="navbar-toggler" id="drawer" type="button">
                        <span class="fa fa-bars"></span>
                    </button>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->

<!-- Sidenav start -->
<nav
    id="sidebar"
    class="nav-sidebar sidebar-heading-section"
    style="z-index: 10"
>
    <!-- Close btn-->
    <div id="dismiss">
        <i class="fa fa-close"></i>
    </div>
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <img src="{{ asset('fe/img/logos/logo.png') }}" alt="sidebarlogo" />
        </div>
        <div class="sidebar-navigation">
            <ul class="menu-list">
                <li><a href="#" class="active pt0">Trang chủ</a></li>
                <li><a href="#">Phòng cho thuê</a></li>
                <li><a href="#">Tin tức</a></li>
                <li><a href="#">Bảng giá dịch vụ</a></li>
            </ul>
        </div>
        <div class="get-in-touch">
            <div class="sidebar-contact-info">
                <div class="">
                    <button class="btn btn-5">Đăng tin</button>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- Sidenav end -->

<!-- Search area box 1 start -->
<div class="border-top shadow-sm bg-body py-4 mb-4">
    <div class="container">
        <form method="GET">
            <div class="row g-3 align-items-center">
                <div class="col-md-4 col-sm-6">
                    <div class="input-group">
                <span class="input-group-text input-group-i">
                  <i class="fa fa-search text-white"></i>
                </span>
                        <input
                            type="text"
                            class="form-control bg-input-group"
                            placeholder="Tìm kiếm ..."
                        />
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <div class="form-floating">
                                <!-- <select
                                  class="form-select bg-select-group"
                                  id="floatingSelect1"
                                  aria-label="Floating label select example"
                                >
                                  <option selected>Tất cả</option>
                                  <option value="1">One</option>
                                  <option value="2">Two</option>
                                  <option value="3">Three</option>
                                </select> -->
                                <select class="form-select bg-select-group" id="dselect-example1" >
                                    <option selected>Tất cả</option>
                                    <option value="chrome">Chrome</option>
                                    <option value="firefox">Firefox</option>
                                    <option value="safari">Safari</option>
                                    <option value="edge">Edge</option>
                                    <option value="opera">Opera</option>
                                    <option value="brave">Brave</option>
                                </select>
                                <label for="dselect-example1">Loại phòng</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <div class="form-floating">
                                <select
                                    class="form-select bg-select-group"
                                    id="floatingSelect2"
                                    aria-label="Floating label select example"
                                >
                                    <option selected>Tất cả</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="floatingSelect2">Khu vực</label>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <div class="form-floating">
                                <select
                                    class="form-select bg-select-group"
                                    id="floatingSelect3"
                                    aria-label="Floating label select example"
                                >
                                    <option selected>Tất cả</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="floatingSelect3">Mức giá</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <div class="form-floating">
                                <select
                                    class="form-select bg-select-group"
                                    id="floatingSelect4"
                                    aria-label="Floating label select example"
                                >
                                    <option selected>Tất cả</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="floatingSelect4">Diện tích</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Search area box 1 end -->
