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
                                    <p>Vui lòng tìm kiếm theo thông tin khác.</p>
                                @endif
                            </div>
                        </div>
                        @foreach ($room as $item)
                            <div class="row hotel-box-list-2">
                                <?php
                                $user_id = null; // Khởi tạo $user_id bằng null nếu người dùng chưa đăng nhập
                                $isBookmarked = false; // Khởi tạo $isBookmarked bằng false nếu người dùng chưa đăng nhập
                                if (Auth::check()) {
                                    $user_id = auth()->user()->id;
                                    $isBookmarked = \App\Models\Bookmark::where('user_id', $user_id)
                                        ->where('room_post_id', $item->id)
                                        ->exists();
                                }
                                ?>
                                <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12" style="position: relative;">
                                    @if ($isBookmarked)
                                    <form action="{{ route('unbookmark', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button style="position: absolute; top: 15px; right: 15px; z-index: 999; background: none; border: none">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <style>
                                                    svg {
                                                        fill: #f4a460
                                                    }
                                                </style>
                                                <path d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9-4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z" />
                                            </svg>
                                        </button>
                                    </form>
                                    @else
                                    <form action="{{ route('bookmark', $item->id) }}" method="post">
                                        @csrf
                                        <button style="position: absolute; top: 15px; right: 15px; z-index: 999; background: none; border: none">
                                            <button style="position: absolute; top: 15px ; right: 15px;z-index: 999;background:none;border:none">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <style>
                                                        svg {
                                                            fill: #f4a460
                                                        }
                                                    </style>
                                                    <path d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z" />
                                                </svg>
                                            </button>
                                        </button>
                                    </form>
                                    @endif
                                    <div class="photo-thumbnail p-lg-2 p-sm-2">
                                        <div class="" style="position: relative;">
                                                @if($item->service_id===1&&$item->time_end>$currentDateTime)
                                                    <label style="text-align: center;color:white;font-weight: 800; background: linear-gradient(45deg, orange, red);position: absolute;top:100px;left:-40px;width:200px;height:30px;z-index:50;padding:2px;border-radius:20%;transform: rotate(-40deg);transform-origin: 0 0;font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";">Phòng tốt</label>
                                                @elseif ($item->service_id===2&&$item->time_end>$currentDateTime)
                                                    <label style="text-align: center;color:white;font-weight: 800; background: linear-gradient(45deg, green, yellow);position: absolute;top:100px;left:-40px;width:200px;height:30px;z-index:50;padding:2px;border-radius:20%;transform: rotate(-40deg);transform-origin: 0 0;font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";">Phòng tốt</label>
                                                @elseif($item->service_id===3&&$item->time_end>$currentDateTime)
                                                    <label style="text-align: center;color:white;font-weight: 800; background: linear-gradient(45deg, pink, blue);position: absolute;top:100px;left:-40px;width:200px;height:30px;z-index:50;padding:2px;border-radius:20%;transform: rotate(-40deg);transform-origin: 0 0;font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";">Phòng tốt</label>
                                                @endif
                                                <a  href="{{ route('room-post-detail', $item->id) }}">
                                            <img src="{{ $item->image }}" alt="photo" style="height:200px" class="img-fluid w-100">


                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-7 col-md-7 col-sm-12">
                                    <div class="heading mt-2">
                                        <div class="clearfix">
                                            <a  href="{{ route('room-post-detail', $item->id) }}" class="">
                                                <h5 style="font-size: 16px;color:{{ $item->service_id&&$item->time_end>$currentDateTime ? $item->service->color : ''}};">
                                                {!! strlen($item->name) > 70 ? substr(strip_tags($item->name), 0, 70) . ',...' : $item->name !!}</h5>
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
                                                    href="{{ route('search-filter', ['name_filter' => $tag, 'district_filter' => $selectedDistrict, 'price_filter' => $selectedPrice, 'acreage_filter' => $selectedAcreage]) }}">{{ $tag }}</a>
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
                        @foreach ($global_sidebar_top_ad as $item)
                            <div class="social-media sidebar-widget clearfix">
                                <a href="{{ $item->url }}">
                                    <div class="photo-thumbnail p-2">
                                        <div class="">
                                            @if ($item->image && asset($item->image))
                                                <img class="w-100" src="{{ asset($item->image) }}" alt="photo"
                                                    height="200px">
                                            @else
                                                <img class=" w-100" src="{{ asset('no_image.jpg') }}" alt="photo"
                                                    height="200px">
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                        <div class="sidebar-widget category-posts">

                            <div class="main-title-2 d-flex justify-content-between gap-2 ">
                                <h1>Lọc theo giá </h1>
                            </div>
                            <ul class="list-unstyled list-cat">
                                <li><a
                                        href="{{ route('search-filter', ['price_filter' => 'range_price1', 'district_filter' => $selectedDistrict, 'acreage_filter' => $selectedAcreage, 'name_filter' => $search]) }}">Dưới
                                        1 triệu<span>({{ countPrice(0, 1000000) }})</span></a></li>
                                <li><a
                                        href="{{ route('search-filter', ['price_filter' => 'range_price2', 'district_filter' => $selectedDistrict, 'acreage_filter' => $selectedAcreage, 'name_filter' => $search]) }}">1
                                        triệu - 2,5 triệu<span>({{ countPrice(1000000, 2500000) }})</span></a></li>
                                <li><a
                                        href="{{ route('search-filter', ['price_filter' => 'range_price3', 'district_filter' => $selectedDistrict, 'acreage_filter' => $selectedAcreage, 'name_filter' => $search]) }}">2,5
                                        triệu - 4 triệu<span>({{ countPrice(2500000, 4000000) }})</span></a></li>
                                <li><a
                                        href="{{ route('search-filter', ['price_filter' => 'range_price4', 'district_filter' => $selectedDistrict, 'acreage_filter' => $selectedAcreage, 'name_filter' => $search]) }}">Trên
                                        4 triệu<span>({{ countPriceGreatThan4M() }})</span></a></li>
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
                                                    href="{{ route('search-filter', ['district_filter' => $district, 'price_filter' => $selectedPrice, 'acreage_filter' => $selectedAcreage, 'name_filter' => $search]) }}">
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
                                        href="{{ route('search-filter', ['acreage_filter' => 'range_acreage1', 'district_filter' => $selectedDistrict, 'price_filter' => $selectedPrice, 'name_filter' => $search]) }}">Dưới
                                        20m²<span>({{ countAcreage(0, 20) }})</span></a></li>
                                <li><a
                                        href="{{ route('search-filter', ['acreage_filter' => 'range_acreage2', 'district_filter' => $selectedDistrict, 'price_filter' => $selectedPrice, 'name_filter' => $search]) }}">20m²
                                        - 30m² <span>({{ countAcreage(20, 30) }})</span></a></li>
                                <li><a
                                        href="{{ route('search-filter', ['acreage_filter' => 'range_acreage3', 'district_filter' => $selectedDistrict, 'price_filter' => $selectedPrice, 'name_filter' => $search]) }}">30m²-
                                        45m² <span>({{ countAcreage(30, 45) }})</span></a></li>
                                <li><a
                                        href="{{ route('search-filter', ['acreage_filter' => 'range_acreage4', 'district_filter' => $selectedDistrict, 'price_filter' => $selectedPrice, 'name_filter' => $search]) }}">Trên
                                        45m²<span>({{ countAcreageGreatThan45() }})</span></a></li>
                            </ul>
                        </div>

                      @foreach ($global_sidebar_bottom_ad as $item)
                            <div class="social-media sidebar-widget clearfix">
                                <a href="{{ $item->url }}">
                                    <div class="photo-thumbnail p-2">
                                        <div class="">
                                            @if ($item->image && asset($item->image))
                                                <img class="w-100" src="{{ asset($item->image) }}" alt="photo"
                                                    height="200px">
                                            @else
                                                <img class=" w-100" src="{{ asset('no_image.jpg') }}" alt="photo"
                                                    height="200px">
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

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
