<header class="top-header" id="top-header-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-8 col-sm-7 col-7">
                <div class="list-inline">
                    <a href="tel:+{{ $global_setting ? $global_setting->support_phone : '' }}"><i class="fa fa-phone"></i>Cần hỗ trợ?
                        {{ $global_setting ? $global_setting->support_phone : '' }}</a>
                    <a href="tel:{{ $global_setting ? $global_setting->email : '' }}" class="d-none-768"><i class="fa fa-envelope"></i>{{ $global_setting ? $global_setting->email : '' }}</a>
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
                    <button type="button" class="btn text-white bg-select-group p-0 d-flex align-items-center" data-bs-display="static" aria-expanded="false">
                        <img class="rounded-circle" style="width:30px;height:30px" src="{{ auth()->user()->avatar ? asset(auth()->user()->avatar) : 'https://worldapheresis.org/wp-content/uploads/2022/04/360_F_339459697_XAFacNQmwnvJRqe1Fe9VOptPWMUxlZP8.jpeg' }}" alt="Header Avatar">
                        <span class="d-xl-inline-block ms-1 dropdown-toggle">{{ Auth::user()->name }}</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div>
                            @if (Auth::user())
                            @if (Auth::user()->role === 'vendor')
                            <a class="dropdown-item" href="{{route('room-posts.index')}}">Vào trang quản lí</a>
                            @elseif (Auth::user()->role === 'admin')
                            <a class="dropdown-item" href="{{ route('home-admin') }}">Vào admin</a>
                            @endif
                            @endif
                            <a class="dropdown-item" href="{{ route('changeinfo.edit', auth()->user()->id) }}">Cập
                                nhật tài khoản</a>
                            @if (Auth::user())
                            <a class="dropdown-item" href="{{ route('changepassword.edit', auth()->user()->id) }}">Đổi mật khẩu</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

                    @if ($global_setting && $global_setting->logo && asset($global_setting->logo))
                    <img src="{{ asset($global_setting->logo) }}" alt="logo" height="80px">
                    @else
                    <img src="{{ asset('no_image.jpg') }}" alt="logo" height="80px">
                    @endif
                </a>

                <div class="navbar-collapse collapse w-100 justify-content-center" id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}" id="navbarDropdownMenuLink" aria-expanded="false">
                                Trang chủ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('search-filter') }}" id="navbarDropdownMenuLink2" aria-expanded="false">
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
                    <button class="btn btn-5" style="font-size: 13px" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                        <i class="fa-solid fa-wallet fa-2xl" style="color: #f18e1e;"></i>
                        Point @if (auth()->user())
                        : {{number_format(auth()->user()->point)}}
                        @endif
                    </button>

                </div>


                <div class="d-none-992 d-none-768 nav navbar-nav w-100 justify-content-end">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('list-bookmark') }}"><i class="fa fa-bookmark-o me-2 fs-4 text-main"></i></a>
                        <a href="{{route('room-posts.create')}}" class="btn btn-5" style="font-size: 13px">
                            Đăng tin
                        </a>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="" class="d-md-block d-xl-none d-lg-none justify-content-end"><i class="fa fa-bookmark-o me-2 fs-4"></i></a>

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
                <li><a href="{{ route('search-filter') }}">Phòng cho thuê</a></li>
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
        <form action="{{ route('search-filter') }}" method="POST">
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-md-4 col-sm-6">



                    <div class="input-group">
                        <span class="input-group-text input-group-i px-3" style="width: 50px;">
                            <i class="fa fa-search text-white"></i>
                        </span>
                        <input type="text" name="name_filter" id="name_filter" class="form-control bg-input-group" value="{{ request('name_filter') }}" placeholder="Nhập tên phòng..." style="height: 58px" />

                    </div>


                </div>
                <div class="col-md-8">



                    <div class="row g-3">
                        <div class="col-md-6 col-sm-6 col-lg-2">
                            <div class="form-floating">
                                <select name="room_type_filter" style="font-size: 14px" id="room_type_filter" class="form-select bg-select-group">
                                    <option value="all" {{ request('room_type_filter') == 'all' ? 'selected' : '' }}>Tất cả</option>
                                    @if (isset($category_rooms))
                                    @if (count($category_rooms) > 0)
                                    @foreach ($category_rooms as $category_room)
                                    <option value="{{ $category_room->id }}" {{ request('room_type_filter') == $category_room->id ? 'selected' : '' }}>
                                        {{ $category_room->name }}
                                    </option>
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
                                <select class="form-select bg-select-group" style="font-size: 14px" id="district_filter" name="district_filter">

                                    <option value="all" selected>Tất cả</option>

                                    @if (isset($districts))
                                    @if (count($districts) > 0)
                                    @foreach ($districts as $district)
                                    <option value="{{ $district }}" {{ request('district_filter') == $district ? 'selected' : '' }}>
                                        {{ $district }}
                                    </option>
                                    @endforeach
                                    @else
                                    <option value="" disabled>Không có dữ liệu khu vực</option>
                                    @endif
                                    @endif
                                </select>

                                <label for="floatingSelect2">Khu vực</label>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-6 col-lg-2">
                            <div class="form-floating">

                                <select name="price_filter" id="price_filter" style="font-size: 14px" class="form-select bg-select-group">
                                    <option value="all" {{ request('price_filter') == 'all' ? 'selected' : '' }}>
                                        Tất cả</option>
                                    <option value="range_price1" {{ request('price_filter') == 'range_price1' ? 'selected' : '' }}>Dưới 1 triệu</option>
                                    <option value="range_price2" {{ request('price_filter') == 'range_price2' ? 'selected' : '' }}>Từ 1 đến 2 triệu</option>
                                    <option value="range_price3" {{ request('price_filter') == 'range_price3' ? 'selected' : '' }}>Từ 2 đến 3 triệu</option>
                                    <option value="range_price4" {{ request('price_filter') == 'range_price4' ? 'selected' : '' }}>Từ 3 đến 5 triệu</option>
                                    <option value="range_price5" {{ request('price_filter') == 'range_price5' ? 'selected' : '' }}>Từ 5 đến 7 triệu</option>
                                    <option value="range_price6" {{ request('price_filter') == 'range_price6' ? 'selected' : '' }}>Từ 7 đến 10 triệu</option>
                                    <option value="range_price7" {{ request('price_filter') == 'range_price7' ? 'selected' : '' }}>Trên 10 Triệu
                                    </option>
                                </select>

                                <label for="floatingSelect3">Mức giá</label>
                            </div>
                        </div>

                        <div class="col-md-5 col-sm-5 col-lg-3">
                            <div class="form-floating">
                                <select name="acreage_filter" id="acreage_filter" style="font-size: 14px" class="form-select bg-select-group">
                                    <option value="allAcreage" {{ request('acreage_filter') == 'allAcreage' ? 'selected' : '' }}>Tất cả</option>
                                    <option value="range_acreage1" {{ request('acreage_filter') == 'range_acreage1' ? 'selected' : '' }}>Dưới 15m²</option>
                                    <option value="range_acreage2" {{ request('acreage_filter') == 'range_acreage2' ? 'selected' : '' }}>Từ 15m² đến 25m²</option>
                                    <option value="range_acreage3" {{ request('acreage_filter') == 'range_acreage3' ? 'selected' : '' }}>Từ 25m² đến 45m²</option>
                                    <option value="range_acreage4" {{ request('acreage_filter') == 'range_acreage4' ? 'selected' : '' }}>Từ 45m² đến 75m² </option>
                                    <option value="range_acreage5" {{ request('acreage_filter') == 'range_acreage5' ? 'selected' : '' }}>Trên 75m² </option>
                                </select>
                                <label for="floatingSelect4">Diện tích</label>
                            </div>
                        </div>


                        {{-- update --}}
                        {{-- <div class="col-md-5 col-sm-5 col-lg-2" style="width: 15.5%;">
                            <div class="">
                                <select name="" id="" style="font-size: 14px" class="form-select bg-select-group py-2">
                                    <option value="" >Sắp xếp</option>
                                    <option value="">Mới nhất</option>
                                    <option value="" >Giá tăng dần</option>
                                    <option value="" >Giá giảm dần</option>
                                    <option value="" >Diện tích tăng dần</option>
                                    <option value="" >Diện tích giảm dần</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-md-6 col-sm-6 col-lg-1 p-2 ">
                            <center>
                        <a class="" href="{{ route('search-filter', ['district_filter' => 'all', 'price_filter' => 'all', 'acreage_filter' => 'all', 'name_filter' => '']) }}"><i class="fa-solid fa-arrows-rotate fa-xl" style="color: #f46315;"></i>
                        </a>

                            </center>
                        </div>
                        <button type="submit" class="col-md-6 col-sm-6 col-lg-2 btn-2 p-1 text-center">Tìm
                            kiếm
                        </button>
                        {{-- <button type="submit" class="col-md-6 col-sm-6 col-lg-2 btn-2 text-center" style="height: 40px; display: flex; align-items: center; justify-content: center; width: 15.5%;">
                            Tìm kiếm
                        </button> --}}
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- start modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> -->

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-warning" id="exampleModalLabel"><i class="fa-solid fa-wallet fa-2xl" style="color: #f18e1e;"></i>
                    Point
                    @if (auth()->user())
                    : {{number_format(auth()->user()->point)}}
                    @endif
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h1 class="fs-4 text text-info">Nạp Point Vào Tài Khoản</h1>
                    <div class="row">

                        <div class="py-3 px-3 " style="background-color: #F0FCF5;">
                            <p class="fs-6 text text-secondary">Tặng <span class="text-danger">+ 5%</span> cho giá
                                trị nạp từ 20,000 đ đến 300,000 đ</p>
                            <p class="fs-6 text text-secondary">Tặng <span class="text-danger">+ 7%</span> cho giá
                                trị nạp từ 300,000 đ đến 1,000,000 đ</p>
                            <p class="fs-6 text text-secondary">Tặng <span class="text-danger">+ 10%</span> cho giá
                                trị nạp trên 1,000,000 đ</p>
                        </div>
                        <div class="py-3">
                            <label class="fs-6 text fw-semibold">Chọn số tiền nạp  : <span class="text-danger">1.000 VND sẽ tương ứng 1 Point</span> </label>
                            <div class="p-1 d-flex  gap-1">
                                <input type="button" class="btn" value="20,000" name="price" style="background-color: orange;color:white">
                                <input type="button" class="btn" value="50,000" name="price" style="background-color: orange;color:white">
                                <input type="button" class="btn" value="100,000" name="price" style="background-color: orange;color:white">
                                <input type="button" class="btn" value="200,000" name="price" style="background-color: orange;color:white">
                                <input type="button" class="btn" value="300,000" name="price" style="background-color: orange;color:white">
                                <input type="button" class="btn" value="500,000" name="price" style="background-color: orange;color:white">
                                <input type="button" class="btn" value="1,000,000" name="price" style="background-color: orange;color:white">
                                <input type="button" class="btn" value="2,000,000" name="price" style="background-color: orange;color:white">
                            </div>
                        </div>

                        <div class="p-2">
                            <div class="d-flex justify-content-between">
                                <label class="fw-bold fs-6 text text-primary">Số tiền muốn nạp <span class="text-danger">*</span></label>
                                {{-- <label class="text-danger">Tối thiểu 20,000</label> --}}
                            </div>
                            <input type="text" class="form-control" type="number" value="20,000" id="input-price" onchange="myChange()" disabled>

                        </div>
                        {{--Mã giảm giá--}}
                        <div class="d-flex justify-content-between p-2">
                            <label class=" fs-6 text fw-semibold">Mã giảm giá: </label> <br>
                            <div>
                                <input type="text" id="discount-code" placeholder="Nhập mã giảm giá">
                                <button id="apply-discount">Áp dụng mã</button>
                            </div>
                        </div>
                        <div  class="d-flex justify-content-between px-2">
                            <label class=" fs-6 text fw-semibold"></label> <br>
                            <div id="discount-message"></div>
                        </div>
                        <div  class="d-flex justify-content-between p-2">
                            <label class=" fs-6 text fw-semibold">Số tiền giảm:</label> <br>
                            <div class="d-flex">
                                <label id="discount_amount_sale" class="fw-bold text-danger me-1">0</label>
                                <span> VND</span>
                            </div>
                            <div id="discount_amount" hidden></div>
                            <div id="type_discount" hidden></div>
                            <div id="status_coupon" hidden></div>
                        </div>
                        <div  class="d-flex justify-content-between p-2">
                            <label class=" fs-6 text fw-semibold">Số tiền cần nạp sau khi giảm:</label> <br>
                            <div class="fw-medium" id=""><span id="total_amount" class="fw-bolder" style="color: #E24343;"></span> VND</div>
                        </div>
                        <div class="d-flex justify-content-between p-2">
                            <label class=" fs-6 text fw-semibold">Số Points thưởng: <span id="sale" class="text-success fw-bold">+5%</span> </label>
                            <div class="d-flex">
                                <label id="sale-price" class="fw-bold text-danger me-1">1</label>
                                <span> Points</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between p-2">
                            <label class=" fs-6 text fw-semibold">Tổng Points nhận:</label>
                            <div>
                                <label id="total" class="fw-bold text-danger">21 </label><span> Points</span>

                            </div>
                        </div>
                        <div class="col  ">
                            <p class="text-primary fw-bold fs-5 text">Phương Thức Nạp Point <span class="text-danger">*</span></p>
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="type-pay" checked>
                                    <label class="form-check-label fw-semibold">
                                        Chuyển khoản online
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="3" name="type-pay">
                                    <label class="form-check-label fw-semibold">
                                        Thanh toán VN PAY
                                    </label>
                                    <img src="{{ asset('fe/img/pay/image_2.png') }}" style="max-width: 24px; max-height: 24px;">
                                </div>

                            </div>

                            @if (auth()->user())
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalToggle-1" id="btn-pay" class="btn text-white mt-4 fw-semibold px-4 py-2 fs-5 text" style="background-color:  #FCAF17; ">Nạp Point</button>
                            @else
                            <label for="" class="text-danger">Vui lòng đăng nhập</label>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
<!-- start modal QR -->

<div class="modal fade" id="exampleModalToggle-1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-warning" id="exampleModalLabel">Thanh Toán Online
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('points.store') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="container mx-auto p-5" style="max-width: 700px;">
                        <!-- content -->
                        <div class="d-flex justify-content-evenly p-3 gap-5">
                            <div class="text-center">
                                <p class="fw-bolder">Quét QR để thanh toán hóa đơn.</p>
                                <img src="{{asset('fe/img/pay/image_10.png')}}" style="max-width: 200px; max-height: 200px;">
                                <p class="fw-medium">Ngân hàng: MB</p>
                                <p class="fw-medium">STK:0345673127</p>
                            </div>
                            <div class="">
                                <p class="fw-medium">Khách hàng: <span style="color: #E24343;" class="fw-bolder">{{ auth()->check() ? auth()->user()->name : '' }}</span></p>
                                <input type="text" hidden value="{{ auth()->check() ? auth()->user()->id : '' }}" name="user_id">
                                <input type="text" hidden value="transfer" name="payment_method">
                                <input type="text" hidden id="total_point" name="point">
                                <input type="text" hidden id="verification" name="verification">
                                <p class="fw-medium" id="">Số tiền thanh toán: <span id="total_amount1" class="fw-bolder" style="color: #E24343;"></span> VND</p>
                                <p class="fw-medium" id="noi_dung">Nội dung: <span class="fw-bolder" style="color: #E24343;"></span></p>
                            </div>

                        </div>
                        <center>
                            <button onclick="return confirm('Xác nhận đã thanh toán thành công?')" type="submit" style="background-color: #FCAF17;" class="btn text-white mt-4 fw-semibold px-3 py-2 m-2 ">Đã Thanh toán</button>
                        </center>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
<!-- end modal QR -->


<!-- Search area box 1 end -->
<!-- script -->
@push('scripts')
<script>
    function notification() {
        var confirmation = confirm('Xác nhận thanh toán');
        if (confirmation) {
            // document.getElementById("notification").style.display = "block"
            //    toastr.success('Đã thanh toán thành công!')
        }
        document.getElementById("notification").style.display = "block"
    }
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


    const prices = document.getElementsByName("price");
    const input_price = document.getElementById('input-price');
    const sale = document.getElementById('sale');
    const sale_price = document.getElementById('sale-price');
    const discount_amount = document.getElementById('discount_amount'); //Giá trị giảm trong db coupon
    const discount_amount_sale = document.getElementById('discount_amount_sale'); //Số tiền được giảm khi nạp tiền
    const type_discount = document.getElementById('type_discount'); //Loại coupon percent:phần trăm, price:số tiền
    const status_coupon = document.getElementById('status_coupon'); //Trạng thái mã giảm giá

    //Fix giá trị mặc định 20k
    if (document.getElementById('total_amount').innerText == ('')) {
        document.getElementById('total_amount').innerText = ('20.000'.replace(/,/g, "").toLocaleString());
    }
    if (document.getElementById('total_amount1').innerText == ('')) {
        document.getElementById('total_amount1').innerText = ('20.000'.replace(/,/g, "").toLocaleString());
    }
    if (document.getElementById('total_point').value == ('')) {
        document.getElementById('total_point').value = ('20,000'.replace(/,/g, "").toLocaleString());
    }


    for (let i = 0; i < prices.length; i++) {
        prices[i].style.backgroundColor = "none"

        prices[i].addEventListener('click', function() {
            input_price.value = prices[i].value
            if (20000 <= input_price.value.replace(/,/g, "") && input_price.value.replace(/,/g, "") < 300000) {
                sale.innerText = "+5%";
                sale_price.innerText = (input_price.value.replace(/,/g, "") * 0.00005).toLocaleString()
                total.innerText = (input_price.value.replace(/,/g, "") * 1.05).toLocaleString()
                document.getElementById('total').innerText = (input_price.value.replace(/,/g, "") * 1.05 / 1000).toLocaleString();
                document.getElementById('total_point').value = input_price.value;
                document.getElementById('total_amount').innerText = input_price.value
                document.getElementById('total_amount1').innerText = input_price.value
            } else if (300000 <= input_price.value.replace(/,/g, "") && input_price.value.replace(/,/g, "") < 1000000) {
                sale.innerText = "+7%";
                sale_price.innerText = (input_price.value.replace(/,/g, "") * 0.00007).toLocaleString()
                total.innerText = (input_price.value.replace(/,/g, "") * 1.07).toLocaleString()
                document.getElementById('total_point').value = input_price.value;
                document.getElementById('total').innerText = (input_price.value.replace(/,/g, "") * 1.07 / 1000).toLocaleString();
                document.getElementById('total_amount').innerText = input_price.value
                document.getElementById('total_amount1').innerText = input_price.value
            } else if (1000000 <= input_price.value.replace(/,/g, "")) {
                sale.innerText = "+10%";
                sale_price.innerText = (input_price.value.replace(/,/g, "") * 0.0001).toLocaleString()
                total.innerText = (input_price.value.replace(/,/g, "") * 1.1).toLocaleString()
                console.log((input_price.value.replace(/,/g, "") * 1.1).toLocaleString());
                document.getElementById('total_point').value = input_price.value;
                document.getElementById('total').innerText = (input_price.value.replace(/,/g, "") * 1.1 / 1000).toLocaleString();
                document.getElementById('total_amount').innerText = input_price.value
                document.getElementById('total_amount1').innerText = input_price.value
            }
        });
    }



    function myChange() {
        const prices = document.getElementsByName('price')
        console.log(prices)
        for (let index = 0; index < prices.length; index++) {
            const price = prices[index];
            price.style.backgroundColor = 'red';
        }
    }
</script>
<!-- Thêm id vào phần tử để dễ dàng cập nhật nội dung -->

<script>
    function generateRandomString(length, hasLetters, hasNumbers) {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let result = '';

        if (hasLetters) {
            for (let i = 0; i < length - 2; i++) {
                result += characters.charAt(Math.floor(Math.random() * 52));
            }
        }

        if (hasNumbers) {
            for (let i = 0; i < 2; i++) {
                result += characters.charAt(Math.floor(52 + Math.random() * 10));
            }
        }

        return result;
    }

    // Tạo chuỗi ngẫu nhiên: 3 chữ cái và 2 số
    const randomContent = generateRandomString(5, true, true);

    // Cập nhật nội dung phần tử
    document.getElementById("noi_dung").querySelector("span").textContent = randomContent;
    document.getElementById("verification").value = randomContent;


    // Mã giảm giá
    $(document).ready(function () {
        $("#apply-discount").on("click", function () {
            var discountCode = $("#discount-code").val();

            $.ajax({
                url: '/apply-discount', // Route mà bạn đã định nghĩa
                method: "POST",
                data: { discount_code: discountCode, _token: '{{ csrf_token() }}' },
                success: function (response) {
                    $("#discount-message").html(response.message);
                    $("#discount_amount").html(response.discount_amount);
                    $("#type_discount").html(response.type_discount);
                    $("#status_coupon").html(response.status_coupon);

                    // Xử lý thay đổi tiền
                    if(document.getElementById('type_discount').innerText == 'percent' && document.getElementById('status_coupon').innerText == 'active'){ // Phần trăm
                        document.getElementById('discount_amount_sale').innerText =  (input_price.value.replace(/,/g, "") * document.getElementById('discount_amount').innerText / 100).toLocaleString();
                        document.getElementById('total_amount').innerText =  (input_price.value.replace(/,/g, "") - document.getElementById('discount_amount_sale').innerText*1000).toLocaleString();
                        document.getElementById('total_amount1').innerText =  (input_price.value.replace(/,/g, "") - document.getElementById('discount_amount_sale').innerText*1000).toLocaleString();
                        document.getElementById('total_point').value =  (input_price.value.replace(/,/g, "") - document.getElementById('discount_amount_sale').innerText*1000);
                    }

                    if(document.getElementById('type_discount').innerText == 'price' && document.getElementById('status_coupon').innerText == 'active'){ //Giá cố định
                        document.getElementById('discount_amount_sale').innerText =  document.getElementById('discount_amount').innerText.toLocaleString();
                        document.getElementById('total_amount').innerText =  (input_price.value.replace(/,/g, "") - document.getElementById('discount_amount_sale').innerText).toLocaleString();
                        document.getElementById('total_amount1').innerText =  (input_price.value.replace(/,/g, "") - document.getElementById('discount_amount_sale').innerText).toLocaleString();
                        document.getElementById('total_point').value =  (input_price.value.replace(/,/g, "") - document.getElementById('discount_amount_sale').innerText);
                    }

                    if(document.getElementById('type_discount').innerText == ''){ // Phần trăm
                        document.getElementById('discount_amount_sale').innerText =  0;
                        document.getElementById('total_amount').innerText =  (input_price.value.replace(/,/g, "")-0).toLocaleString(); //Hiển thị lúc app mã
                        document.getElementById('total_amount1').innerText =  (input_price.value.replace(/,/g, "")-0).toLocaleString(); // Hiển thị QR
                        document.getElementById('total_point').value =  (input_price.value.replace(/,/g, "")-0); //Nạp trong ví
                    }
                },
                error: function () {
                    $("#discount-message").html("Lỗi trong quá trình xử lý mã giảm giá.");
                }
            });

        });
    });


</script>

@endpush


<!-- Search area box 1 end -->
