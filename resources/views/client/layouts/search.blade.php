@extends('client/layouts/master')
@section('title', 'Tìm kiếm')
@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Tìm Kiếm</h1>
            </div>
            <nav class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Tìm kiếm phòng</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Sub Banner end -->



    <!-- Rooms detail section start -->
    <div class="content-area-15 rooms-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-7">
                    <div class="rooms-detail-info ">
                        <div class="heading-rooms row hotel-box-list-2 clearfix pb-3">
                            <div class="pull-left pt-2">
                                @if ($totalResults)
                                    <h6>Kết quả: {{ $totalResults }} tin đăng phòng</h6>
                                    <div class="pt-3 d-flex gap-2">

                                        <p>
                                            @if ($selectedDistrict != 'all')
                                                <i class="fa-solid fa-location-dot fa-lg " style="color: #f46b10;"></i>
                                                Nhà cho thuê tại {{ $selectedDistrict }}
                                            @else
                                                <i class="fa-solid fa-location-dot fa-lg " style="color: #f46b10;"></i>
                                                Đang lọc tất cả khu vực
                                            @endif
                                        </p>

                                    </div>
                                @elseif($totalResults == 0)
                                    <h6>Kết quả: Không tìm thấy tin đăng phòng nào!</h6>
                                    <p>Vui lòng tìm kiếm theo </p>
                                @endif
                            </div>
                        </div>
                        @foreach ($room as $item)
                            <div class="row hotel-box-list-2">
                                <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12" style="position: relative;">
                                    <a href="#" class=""
                                        style="position: absolute; top: 15px ; right: 25px;z-index: 999;">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 384 512">
                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <style>
                                                svg {
                                                    fill: #F4A460
                                                }
                                            </style>
                                            <path
                                                d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z" />
                                        </svg>
                                    </a>
                                    <div class="photo-thumbnail p-lg-2 p-sm-2">
                                        <div class="">
                                            <img src="{{ $item->image }}" alt="photo" class="img-fluid w-100">
                                            <a href="rooms-details.html">
                                                <span class="blog-one__plus"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-7 col-md-7 col-sm-12">
                                    <div class="heading mt-2">
                                        <div class="clearfix">
                                            <a href="rooms-details.html" class="">
                                                <h5 style="font-size: 16px">{!! strlen($item->name) > 70 ? substr(strip_tags($item->name), 0, 70) . ',...' : $item->name !!}</h5>
                                            </a>
                                            <span style="color: #F4A460;font-size: 14px;">Giá:
                                                {{ str_replace(',', '.', number_format($item->price)) }}/tháng</span>
                                            <span style="color: #F4A460;font-size: 14px;">| Diện tích:
                                                {{ $item->acreage }}m vuông</span>
                                        </div>
                                        <p style="font-size: 14px" class="mb-0">{!! strlen($item->description) > 210
                                            ? substr(strip_tags($item->description), 0, 210) . ',...'
                                            : $item->description !!}</p>
                                        <p style="color: #F4A460;font-size: 14px;" class="mb-0">
                                            <i class="fa-solid fa-location-dot fa-lg " style="color: #f46b10;"></i>
                                            {{ $item->address_full }}
                                        </p>
                                        <hr>
                                    </div>

                                    <div class="heading-rooms gap-5 align-items-center row">
                                        <div class="row">
                                            <div class="col-md-7 col-6 d-flex">
                                                <div class=""
                                                    style=" background-image: url(https://picsum.photos/200);background-size: contain;  background-repeat: no-repeat; border-radius: 50%; border: 2px solid #a1a1a1; height: 30px; margin: 5px; padding: 10px;  width:30px;">
                                                </div>
                                                <div class="">
                                                    <h6 class="mb-0" style="font-size: 14px">{{ $item->fullname }}</h6>
                                                    <p style="font-size: 12px" class="">Đăng ngày:
                                                        {{ $item->created_at->format('d-m-Y') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-6">
                                                <button style="background-color: #F4A460" class="btn rounded-3">
                                                    <div class=" d-flex gap-2 align-items-center text-white">
                                                        <i class="fa fa-phone"></i>
                                                        <a
                                                            style="font-size: 14px">0{{ str_replace(',', ' ', number_format($item->phone)) }}</a>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>
                    {{-- {{$room->links()}} --}}
                    {{ $room->appends([
                            'price_filter' => $selectedPrice,
                            'acreage_filter' => $selectedAcreage,
                            'room_type_filter' => $selectedRoomType,
                            'district_filter' => $selectedDistrict,
                            'name_filter' => $search,
                        ])->links() }}

                    <div class="heading-rooms row hotel-box-list-2 clearfix pb-3">
                        <div class="tags-box p-2">
                            @if (isset($tags))
                            @if (count($tags) > 0)
                                <h6>Tìm theo từ khóa</h6>
                                <ul class="pt-3 d-flex gap-2 tags">
                                    @foreach ($tags as $tag)
                                            <li><a
                                                    href="{{ route('search-fillter', ['name_filter' => $tag, 'district_filter' => $selectedDistrict, 'price_filter' => $selectedPrice, 'acreage_filter' => $selectedAcreage]) }}">{{ $tag }}</a>
                                            </li>
                                        @endforeach

                                        </ul>
                                @else
                                <h6>Không có từ khoá tìm kiếm nào</h6>
                            @endif
                        @endif
                        </div>
                    </div>
                    

                </div>
                <div class="col-lg-4 col-md-12 col-sm-5">

                    <div class="sidebar">
                        
                        <div class="sidebar-widget category-posts">

                            <div class="main-title-2 d-flex justify-content-between gap-2 ">
                                <h1>Lọc theo giá </h1>
                                <button class="btn btn-4" style="background-color: #F4A460;">
                                    <a
                                        href="{{ route('search-fillter', ['district_filter' => 'all', 'price_filter' => 'all', 'acreage_filter' => 'all', 'name_filter' => '']) }}" class="text-white"><i class="fe-refresh-ccw"></i> Đặt lại
                                    </a>
                                </button>
                            </div>
                            <ul class="list-unstyled list-cat">
                                <li><a
                                        href="{{ route('search-fillter', ['price_filter' => 'range_price1', 'district_filter' => $selectedDistrict, 'acreage_filter' => $selectedAcreage, 'name_filter' => $search]) }}">Dưới
                                        1 triệu<span>({{ countPrice(0, 1000000) }})</span></a></li>
                                <li><a
                                        href="{{ route('search-fillter', ['price_filter' => 'range_price2', 'district_filter' => $selectedDistrict, 'acreage_filter' => $selectedAcreage, 'name_filter' => $search]) }}">1
                                        triệu - 2,5 triệu<span>({{ countPrice(1000000, 2500000) }})</span></a></li>
                                <li><a
                                        href="{{ route('search-fillter', ['price_filter' => 'range_price3', 'district_filter' => $selectedDistrict, 'acreage_filter' => $selectedAcreage, 'name_filter' => $search]) }}">2,5
                                        triệu - 4 triệu<span>({{ countPrice(2500000, 4000000) }})</span></a></li>
                                <li><a
                                        href="{{ route('search-fillter', ['price_filter' => 'range_price4', 'district_filter' => $selectedDistrict, 'acreage_filter' => $selectedAcreage, 'name_filter' => $search]) }}">Trên
                                        4 triệu<span>({{ countPrice(4000000, 100000000) }})</span></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-widget category-posts">
                            <div class="main-title-2">
                                <h1>Khu vực</h1>
                            </div>
                            <ul class="list-unstyled list-cat">
                                @if (isset($districts))
                                    @if (count($districts) > 0)
                                        @foreach ($districts as $district)
                                            <li>
                                                <a
                                                    href="{{ route('search-fillter', ['district_filter' => $district, 'price_filter' => $selectedPrice, 'acreage_filter' => $selectedAcreage, 'name_filter' => $search]) }}">
                                                    {{ $district }} <span> ({{ countDistrict($district) }})
                                                    </span></a>
                                            </li>
                                        @endforeach
                                    @else
                                        <li>Không có dữ liệu khu vực</li>
                                    @endif
                                @endif
                            </ul>
                        </div>

                        <div class="sidebar-widget category-posts">
                            <div class="main-title-2">
                                <h1>Diện tích </h1>
                            </div>
                            <ul class="list-unstyled list-cat">
                                <li><a
                                        href="{{ route('search-fillter', ['acreage_filter' => 'range_acreage1', 'district_filter' => $selectedDistrict, 'price_filter' => $selectedPrice, 'name_filter' => $search]) }}">Dưới
                                        20m²<span>({{ countAcreage(0, 20) }})</span></a></li>
                                <li><a
                                        href="{{ route('search-fillter', ['acreage_filter' => 'range_acreage2', 'district_filter' => $selectedDistrict, 'price_filter' => $selectedPrice, 'name_filter' => $search]) }}">20m²
                                        - 30m² <span>({{ countAcreage(20, 30) }})</span></a></li>
                                <li><a
                                        href="{{ route('search-fillter', ['acreage_filter' => 'range_acreage3', 'district_filter' => $selectedDistrict, 'price_filter' => $selectedPrice, 'name_filter' => $search]) }}">30m²-
                                        45m² <span>({{ countAcreage(30, 45) }})</span></a></li>
                                <li><a
                                        href="{{ route('search-fillter', ['acreage_filter' => 'range_acreage4', 'district_filter' => $selectedDistrict, 'price_filter' => $selectedPrice, 'name_filter' => $search]) }}">Trên
                                        45m²<span>({{ countAcreage(45, 10000) }})</span></a></li>
                            </ul>
                        </div>

                        <div class="social-media sidebar-widget clearfix">
                            <div class="photo-thumbnail p-2">
                                <div class=" ">
                                    <img src="{{ asset('fe/img/room/img-14.jpg') }}" alt="photo"
                                        class="img-fluid w-100">
                                    <a href="rooms-details.html">
                                        <span class="blog-one__plus"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="photo-thumbnail p-2">
                                <div class=" ">
                                    <img src="{{ asset('fe/img/room/img-16.jpg') }}" alt="photo"
                                        class="img-fluid w-100">
                                    <a href="rooms-details.html">
                                        <span class="blog-one__plus"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- tags box start -->

                    </div>
                </div>
            </div>
            <div>
            </div>
        </div>
    </div>
    <!-- Rooms detail section end -->
@endsection
