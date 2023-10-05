<header class="top-header" id="top-header-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-8 col-sm-7 col-7">
                <div class="list-inline">
                    <a href="tel:+55-4XX-634-7071"><i class="fa fa-phone"></i>Need Support? +00-4X6-634-781</a>
                    <a href="tel:info@themevessel.com" class="d-none-768"><i
                            class="fa fa-envelope"></i>info@themevessel.com</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5 col-5">
                @guest
                    <ul class="top-social-media pull-right ">
                        <li>
                            <a href="/client-login" onclick><i class="fa fa-sign-in me-1"></i>Đăng nhập</a>
                        </li>
                        <li>
                            <a href="/client-signup"><i class="fa fa-user me-1"></i>Đăng ký</a>
                        </li>
                    </ul>
                @else
                    @if (Auth::user())
                        <div class="dropdown pull-right">
                            <button type="button" class="btn text-white bg-select-group p-0 d-flex align-items-center"
                                data-bs-display="static" aria-expanded="false">
                                <img class="rounded-circle" style="width:30px;height:30px"
                                    src="{{ auth()->user()->avatar ? asset(auth()->user()->avatar) : 'https://worldapheresis.org/wp-content/uploads/2022/04/360_F_339459697_XAFacNQmwnvJRqe1Fe9VOptPWMUxlZP8.jpeg' }}"
                                    alt="Header Avatar">
                                <span class="d-xl-inline-block ms-1 dropdown-toggle">{{ Auth::user()->name }}</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div>
                                    @if (Auth::user())
                                        @if (Auth::user()->role === 'vendor')
                                            <a class="dropdown-item" href="">Vào trang quản lí</a>
                                        @elseif (Auth::user()->role === 'admin')
                                            <a class="dropdown-item" href="{{ route('home-admin') }}">Vào admin</a>
                                        @endif
                                    @endif
                                    <a class="dropdown-item" href="{{ route('changeinfo.edit', auth()->user()->id) }}">Cập
                                        nhật tài khoản</a>
                                    @if (Auth::user())
                                        <a class="dropdown-item"
                                            href="{{ route('changepassword.edit', auth()->user()->id) }}">Đổi mật khẩu</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Đăng xuất
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>


                        </div>
                    @endif
                @endguest
            </div>
        </div>
    </div>
</header>
<!-- Main header start -->
<header class="main-header" id="main-header-1">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="z-index: 0">

            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('fe/img/logos/logo.png') }}" alt="logo" height="80px" />
                </a>

                <div class="navbar-collapse collapse w-100 justify-content-center" id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink" aria-expanded="false">
                                Trang chủ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink2" aria-expanded="false">
                                Phòng cho thuê
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink2" aria-expanded="false">
                                Tin tức
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink2" aria-expanded="false">
                                Bảng giá dịch vụ
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="d-none-992 d-none-768 nav navbar-nav w-100 justify-content-end">
                    <button class="btn btn-5" style="font-size: 13px" data-bs-toggle="modal"
                        data-bs-target="#exampleModalToggle">
                        <i class="fa-solid fa-wallet fa-2xl" style="color: #f18e1e;"></i>
                        Point: 10.000
                    </button>

                </div>


                <div class="d-none-992 d-none-768 nav navbar-nav w-100 justify-content-end">
                    <div class="d-flex align-items-center">
                        <a href="bookmark"><i class="fa fa-bookmark-o me-2 fs-4 text-main"></i></a>
                        <button class="btn btn-5" style="font-size: 13px">
                            Đăng tin
                        </button>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="" class="d-md-block d-xl-none d-lg-none justify-content-end"><i
                            class="fa fa-bookmark-o me-2 fs-4"></i></a>

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
<nav id="sidebar" class="nav-sidebar sidebar-heading-section" style="z-index: 10">
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
        <form action="{{ route('search-fillter') }}" method="POST">
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-md-4 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-text input-group-i px-3" style="width: 50px;">
                            <i class="fa fa-search text-white"></i>
                        </span>
                        <input type="text" name="name_filter" id="name_filter"
                            class="form-control bg-input-group" value="{{ request('name_filter') }}"
                            placeholder="Nhập tên phòng..." style="height: 58px" />

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md-6 col-sm-6 col-lg-2">
                            <div class="form-floating">


                                <select name="room_type_filter" id="room_type_filter"
                                    class="form-select bg-select-group" id="floatingSelect3"
                                    aria-label="Floating label select example">
                                    <option value="all"
                                        {{ request('room_type_filter') == 'all' ? 'selected' : '' }}>Tất cả</option>
                                    @if (isset($category_rooms))
                                        @if (count($category_rooms) > 0)
                                            @foreach ($category_rooms as $category_room)
                                                <option value="{{ $category_room->id }}"
                                                    {{ request('room_type_filter') == $category_room->id ? 'selected' : '' }}>
                                                    {{ $category_room->name }}</option>
                                            @endforeach
                                        @else
                                            <option value="" disabled>Không có dữ liệu loại phòng</option>
                                        @endif
                                    @endif
                                </select>
                                <label for="dselect-example1">Loại phòng</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-2">
                            <div class="form-floating">
                                <select class="form-select bg-select-group" id="district_filter"
                                    name="district_filter">

                                    <option value="all" selected>Tất cả</option>

                                    @if (isset($districts))
                                        @if (count($districts) > 0)
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}"
                                                    {{ request('district_filter') == $district->id ? 'selected' : '' }}>
                                                    {{ $district->name }}</option>
                                            @endforeach
                                        @else
                                            <option value="" disabled>Không có dữ liệu khu vực</option>
                                        @endif
                                    @endif
                                </select>

                                <label for="floatingSelect2">Khu vực</label>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <div class="form-floating">

                                <select name="price_filter" id="price_filter" class="form-select bg-select-group"
                                    id="floatingSelect3" aria-label="Floating label select example">
                                    <option value="all" {{ request('price_filter') == 'all' ? 'selected' : '' }}>
                                        Tất cả</option>
                                    <option value="range_price1"
                                        {{ request('price_filter') == 'range_price1' ? 'selected' : '' }}>Từ 0 -> 1
                                        Triệu</option>
                                    <option value="range_price2"
                                        {{ request('price_filter') == 'range_price2' ? 'selected' : '' }}>1 Triệu ->
                                        2.5 Triệu</option>
                                    <option value="range_price3"
                                        {{ request('price_filter') == 'range_price3' ? 'selected' : '' }}>2.5 Triệu ->4
                                        Triệu</option>
                                    <option value="range_price4"
                                        {{ request('price_filter') == 'range_price4' ? 'selected' : '' }}>Trên 4 Triệu
                                    </option>
                                </select>

                                <label for="floatingSelect3">Mức giá</label>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-lg-3">
                            <div class="form-floating">

                                <select name="areage_filter" id="areage_filter" class="form-select bg-select-group"
                                    id="floatingSelect3" aria-label="Floating label select example">
                                    <option value="allAreage"
                                        {{ request('areage_filter') == 'allAreage' ? 'selected' : '' }}>Tất cả</option>
                                    <option value="range_areage1"
                                        {{ request('areage_filter') == 'range_areage1' ? 'selected' : '' }}>Dưới 20m
                                        vuông</option>
                                    <option value="range_areage2"
                                        {{ request('areage_filter') == 'range_areage2' ? 'selected' : '' }}>20m vuông
                                        -> 30m vuông</option>
                                    <option value="range_areage3"
                                        {{ request('areage_filter') == 'range_areage3' ? 'selected' : '' }}>20m vuông
                                        -> 45m vuông</option>
                                    <option value="range_areage4"
                                        {{ request('areage_filter') == 'range_areage4' ? 'selected' : '' }}>Trên 45m
                                        vuông</option>

                                </select>
                                <label for="floatingSelect4">Diện tích</label>
                            </div>
                        </div>
                        <button type="submit" class="col-md-6 col-sm-6 col-lg-2 btn-2 p-1 text-center">Tìm
                            kiếm</button>


                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
<!-- start modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-warning" id="exampleModalLabel"><i class="fa-solid fa-wallet fa-2xl"
                        style="color: #f18e1e;"></i>
                    Point: 10.000 </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h1 class="fs-4 text text-info">Nạp Point Vào Tài Khoản</h1>

                    <div class="row">
                        <hr>
                        <div class="py-3 px-3 " style="background-color: #F0FCF5;">
                            <p class="fs-6 text text-secondary">Tặng <span class="text-danger">+ 10%</span> cho giá
                                trị nạp từ 50.000 đ đến 1.000.000 đ</p>
                            <p class="fs-6 text text-secondary">Tặng <span class="text-danger">+ 20%</span> cho giá
                                trị nạp từ 1.000.000 đ đến 2.000.000 đ</p>
                            <p class="fs-6 text text-secondary">Tặng <span class="text-danger">+ 30%</span> cho giá
                                trị nạp trên 2.000.000 đ</p>
                        </div>
                        <div class="py-3">
                            <label class="fs-6 text fw-semibold">Chọn nhanh số tiền nạp </label>
                            <div class="p-2">
                                <input type="button" class="btn btn-primary" value="100000" name="price"
                                    onclick="myClick()">
                                <input type="button" class="btn btn-primary" value="200000" name="price"
                                    onclick="myClick()">
                                <input type="button" class="btn btn-primary" value="500000" name="price"
                                    onclick="myClick()">
                                <input type="button" class="btn btn-primary" value="1000000" name="price"
                                    onclick="myClick()">
                                <input type="button" class="btn btn-primary" value="2000000" name="price"
                                    onclick="myClick()">
                                <input type="button" class="btn btn-primary" value="5000000" name="price"
                                    onclick="myClick()">
                            </div>
                        </div>

                        <div class="p-2">
                            <div class="d-flex justify-content-between">
                                <label class="fw-bold fs-6 text text-primary">Số tiền muốn nạp <span
                                        class="text-danger">*</span></label>
                                <label class="text-secondary">Tối thiểu 10.000</label>
                            </div>
                            <input type="text" class="form-control" value="0" id="input-price"
                                onchange="myChange()">

                        </div>
                        <div class="d-flex justify-content-between p-2">
                            <label class=" fs-6 text fw-semibold">Số tiền thưởng <span id="sale"
                                    class="text-success fw-bold">0%</span></label>
                            <label id="sale-price" class="fw-bold text-danger">0</label>
                        </div>
                        <div class="d-flex justify-content-between p-2">
                            <label class=" fs-6 text fw-semibold">Tổng nhận</label>
                            <label id="total" class="fw-bold text-danger">0</label>
                        </div>
                        <div class="col  ">
                            <p class="text-primary fw-bold fs-5 text">Phương Thức Nạp Point <span
                                    class="text-danger">*</span></p>
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="type-pay"
                                        checked>
                                    <label class="form-check-label fw-semibold">
                                        Chuyển khoản online
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="3" name="type-pay">
                                    <label class="form-check-label fw-semibold">
                                        Thanh toán VN PAY
                                    </label>
                                    <img src="{{ asset('fe/img/pay/image_2.png') }}"
                                        style="max-width: 24px; max-height: 24px;">
                                </div>

                            </div>
                            <button type="button" onclick="onclick_Pay()" id="btn-pay"
                                class="btn text-white mt-4 fw-semibold px-4 py-2 fs-5 text"
                                style="background-color:  #FCAF17; ">Nạp Point</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->


<!-- Search area box 1 end -->
<!-- script -->
@push('scripts')
    <script>
        new DataTable('#tech-companies-1');
        var data = document.getElementById('data');

        function myOnchange() {
            var category_room = document.getElementById('dselect-example1');
            var district = document.getElementById('floatingSelect2');
            var price = document.getElementById('floatingSelect3');
            var acreage = document.getElementById('floatingSelect4');

            console.log(category_room.value)
            console.log(district.value)
            console.log(price.value)
            console.log(acreage.value)
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert("send sucess!")
                    let details = {
                        category_room: category_room.value,
                        district: district.value,
                        price: price.value,
                        acreage: acreage.value
                    };
                    console.log(JSON.stringify(details))
                }
            };
            xhttp.open("get", "trang-chu", true);
            xhttp.send();
        }

        function myClick() {
            var price = document.getElementsByName("price");
            var input_price = document.getElementById('input-price');
            var sale = document.getElementById('sale');
            var sale_price = document.getElementById('sale-price');
            console.log(price)
            for (let i = 0; i < price.length; i++) {
                price[i].addEventListener('click', function() {
                    input_price.value = price[i].value
                    if (10000 <= input_price.value && input_price.value < 1000000) {
                        sale.innerText = "+10%";
                        sale_price.innerText = String(parseFloat(input_price.value * 0.1)).replace(
                            /(.)(?=(\d{3})+$)/g, '$1,');
                        total.innerText = String(parseFloat(input_price.value, 1) + parseFloat(input_price.value *
                            0.1, 1)).replace(/(.)(?=(\d{3})+$)/g, '$1,')

                    } else if (1000000 <= input_price.value && input_price.value <= 2000000) {
                        sale.innerText = "+20%";
                        sale_price.innerText = String(parseFloat(input_price.value * 0.2, 1)).replace(
                            /(.)(?=(\d{3})+$)/g, '$1,')
                        total.innerText = String(parseFloat(input_price.value, 1) + parseFloat(input_price.value *
                            0.2, 1)).replace(/(.)(?=(\d{3})+$)/g, '$1,')

                    } else if (2000000 < input_price.value) {
                        sale.innerText = "+30%";
                        sale_price.innerText = String(parseFloat(input_price.value * 0.3, 1)).replace(
                            /(.)(?=(\d{3})+$)/g, '$1,')
                        total.innerText = String(parseFloat(input_price.value, 1) + parseFloat(input_price.value *
                            0.3, 1)).replace(/(.)(?=(\d{3})+$)/g, '$1,')
                    }

                });

            }


        }

        function myChange() {
            var input_price = document.getElementById('input-price');
            var sale = document.getElementById('sale');
            var sale_price = document.getElementById('sale-price');
            var total = document.getElementById('total')
            if (10000 <= input_price.value && input_price.value < 1000000) {
                sale.innerText = "+10%";
                sale_price.innerText = String(parseFloat(input_price.value * 0.1, 1)).replace(/(.)(?=(\d{3})+$)/g, '$1');
                total.innerText = String(parseFloat(input_price.value, 1) + parseFloat(input_price.value * 0.1, 1)).replace(
                    /(.)(?=(\d{3})+$)/g, '$1,')

            } else if (1000000 <= input_price.value && input_price.value <= 2000000) {
                sale.innerText = "+20%";
                sale_price.innerText = String(parseFloat(input_price.value * 0.2, 1)).replace(/(.)(?=(\d{3})+$)/g, '$1,')
                total.innerText = String(parseFloat(input_price.value, 1) + parseFloat(input_price.value * 0.2, 1)).replace(
                    /(.)(?=(\d{3})+$)/g, '$1,')

            } else if (2000000 < input_price.value) {
                sale.innerText = "+30%";
                sale_price.innerText = String(parseFloat(input_price.value * 0.3, 1)).replace(/(.)(?=(\d{3})+$)/g, '$1,')
                total.innerText = String(parseFloat(input_price.value, 1) + parseFloat(input_price.value * 0.3, 1)).replace(
                    /(.)(?=(\d{3})+$)/g, '$1,')
            } else {
                sale.innerText = "0%";
                sale_price.innerText = 0
                total.innerText = 0
            }
        }

        function onclick_Pay() {
            var checkbox = document.getElementsByName("type-pay");
            for (var i = 0; i < checkbox.length; i++) {
                if (checkbox[i].value == 1) {
                    location.replace("display-QR");
                }
            }
        }
    </script>
@endpush


<!-- Search area box 1 end -->
