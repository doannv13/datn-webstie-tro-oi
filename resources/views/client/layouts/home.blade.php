@extends('client.layouts.master')
@section('title', 'Trang chủ | Trọ Ơi')
@section('content')
<div class="content">
    <!-- Banner start -->
    @if (isset($banners) && count($banners) > 0)
    <div class="banner container" id="banner1" style="z-index: 0">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner" style="max-height: 700px;">
                @foreach ($banners as $key => $item)
                <div class="carousel-item item {{ $key === 0 ? 'active' : '' }}">
                    <a href="{{ $item->url }}">
                        @if ($item->image && asset($item->image))
                        <img src="{{ asset($item->image) }}" class="d-block w-100 h-100" alt="banner" style="max-height: 700px;height:700px">
                        @else
                        <img src="{{ asset('no_image.jpg') }}" class="d-block w-100 h-100" alt="banner" style="max-height: 700px;height:700px">
                        @endif
                        <div class="carousel-caption banner-slider-inner d-flex h-100">
                            <div class="carousel-content container align-self-center">
                                <div class="text-center">
                                    <div class="max-area2">
                                        <h1>{{ $item->title }}</h1>
                                        <p>
                                            {!! $item->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev" style="z-index: 1">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next" style="z-index: 1">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    @endif

    <!-- Banner end -->


    <!-- Hotel section start -->
    <div class="content-area hotel-section bg-grey">
        <div class="overlay">
            <div class="container">
                <!-- Main title -->
                @if(countRoomPostVip()>0)
                <div class="main-title">
                    <h1>Tin nổi bật</h1>
                    <p>
                        Danh sách những tin phòng có ưu đãi tốt.
                    </p>
                </div>
                <div class="row wow fadeInUp delay-04s">

                    @foreach ($room_post_vip as $key => $value)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="hotel-box" style="position: relative;" style="height:100%;">
                            <?php
                            $user_id = null; // Khởi tạo $user_id bằng null nếu người dùng chưa đăng nhập
                            $isBookmarked = false; // Khởi tạo $isBookmarked bằng false nếu người dùng chưa đăng nhập

                            if (Auth::check()) {
                                $user_id = auth()->user()->id;
                                $isBookmarked = \App\Models\Bookmark::where('user_id', $user_id)
                                    ->where('room_post_id', $value->id)
                                    ->exists();
                            }
                            $pathD = $isBookmarked ? 'M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9-4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z' : 'M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z';
                            ?>
                            <button style="position: absolute; top: 15px; right: 15px; z-index: 999; background: none; border: none">
                                <svg xmlns="http://www.w3.org/2000/svg" height="2em" class="{{ $isBookmarked ? 'unbookmark-button' : 'bookmark-button' }}" data-id="{{ $value->id }}" viewBox="0 0 384 512">
                                    <style>
                                        svg {
                                            fill: #f4a460;
                                        }
                                    </style>
                                    <path d="{{ $pathD }}">
                                    </path>
                                </svg>
                            </button>

                            <div class="photo-thumbnail" style="position: relative; height:50%;">
                                <div class="text-white fw-bolder fs-5" style="position: absolute; bottom:10px ; left: 15px;z-index: 100;">
                                    {{ number_format($value->price) }} VND/Tháng
                                </div>
                                @if ($value->service_id != null)
                                @if ($value->service->id === 1 && $value->time_end>$currentDateTime)
                                <label style="text-align: center;color:white;font-weight: 800; background: linear-gradient(45deg, orange, red);position: absolute;top:100px;left:-20px;width:200px;height:30px;z-index:50;padding:2px;border-radius:20%;transform: rotate(-40deg);transform-origin: 0 0;font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, " Segoe UI", Roboto, "Helvetica Neue" , Arial, "Noto Sans" , sans-serif, "Apple Color Emoji" , "Segoe UI Emoji" , "Segoe UI Symbol" , "Noto Color Emoji" ;">Phòng tốt</label>
                                @elseif ($value->service->id === 2 && $value->time_end>$currentDateTime)
                                <label style="text-align: center;color:white;font-weight: 800; background: linear-gradient(45deg, green, yellow);position: absolute;top:100px;left:-20px;width:200px;height:30px;z-index:50;padding:2px;border-radius:20%;transform: rotate(-40deg);transform-origin: 0 0;font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, " Segoe UI", Roboto, "Helvetica Neue" , Arial, "Noto Sans" , sans-serif, "Apple Color Emoji" , "Segoe UI Emoji" , "Segoe UI Symbol" , "Noto Color Emoji" ;">Phòng tốt</label>
                                @elseif($value->service->id === 3 && $value->time_end>$currentDateTime)
                                <label style="text-align: center;color:white;font-weight: 800; background: linear-gradient(45deg, pink, blue);position: absolute;top:100px;left:-20px;width:200px;height:30px;z-index:50;padding:2px;border-radius:20%;transform: rotate(-40deg);transform-origin: 0 0;font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, " Segoe UI", Roboto, "Helvetica Neue" , Arial, "Noto Sans" , sans-serif, "Apple Color Emoji" , "Segoe UI Emoji" , "Segoe UI Symbol" , "Noto Color Emoji" ;">Phòng tốt</label>
                                @endif
                                @endif
                                <div class="photo">
                                    <img src="{{ asset($value->image) }}" alt="photo" class="img-fluid w-100" style="height: 260px;">
                                    <a href="{{ route('room-post-detail', $value->id) }}">
                                        <label class="" style="cursor: pointer; font-size: 20px;" for="">Xem Chi Tiết</label>
                                    </a>
                                </div>

                            </div>
                            <!-- Detail -->
                            <div class="detail clearfix" style="height: 240px;">
                                <h3>
                                    <a style="color:{{ $value->service_id ? $value->service->color : '' }}" href="{{ route('room-post-detail', $value->id) }}">{{ $value->name }}</a>
                                </h3>
                                <p class="location">
                                    <a href="{{ route('room-post-detail', $value->id) }}">
                                        <i class="fa-solid fa-location-dot fa-lg " style="color: #f46b10;"></i>
                                        {{ substr($value->address_full, 0, 50) }}
                                    </a>
                                </p>
                                <div class="fecilities row">
                                    <ul class="d-flex justify-content-between">
                                        <p><span><i class="fas fa-expand me-2"></i></i>{{ $value->acreage }}
                                                m2</span>
                                        </p>
                                        <p><i class="far fa-clock me-2"></i>{{ timeposts($value->time_start) }}
                                        </p>
                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                @endif
                <!-- Tin thuong  -->
                <div class="main-title">
                    <h1>Tin Mới Nhất</h1>
                    <p>
                        Danh sách những tin phòng mới nhất.
                    </p>
                </div>
                <div class="row wow fadeInUp delay-04s">

                    @foreach ($room_post_new as $key => $value)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="hotel-box" style="position: relative;" style="height:100%;">
                            <?php
                            $user_id = null; // Khởi tạo $user_id bằng null nếu người dùng chưa đăng nhập
                            $isBookmarked = false; // Khởi tạo $isBookmarked bằng false nếu người dùng chưa đăng nhập

                            if (Auth::check()) {
                                $user_id = auth()->user()->id;
                                $isBookmarked = \App\Models\Bookmark::where('user_id', $user_id)
                                    ->where('room_post_id', $value->id)
                                    ->exists();
                            }
                            $pathD = $isBookmarked ? 'M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9-4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z' : 'M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z';
                            ?>
                            <button style="position: absolute; top: 15px; right: 15px; z-index: 999; background: none; border: none">
                                <svg xmlns="http://www.w3.org/2000/svg" height="2em" class="{{ $isBookmarked ? 'unbookmark-button' : 'bookmark-button' }}" data-id="{{ $value->id }}" viewBox="0 0 384 512">
                                    <style>
                                        svg {
                                            fill: #f4a460;
                                        }
                                    </style>
                                    <path d="{{ $pathD }}">
                                    </path>
                                </svg>
                            </button>

                            <div class="photo-thumbnail" style="position: relative; height:50%;">
                                <div class="text-white fw-bolder fs-5" style="position: absolute; bottom:10px ; left: 15px;z-index: 100;">
                                    {{ number_format($value->price) }} VND/Tháng
                                </div>
                                @if ($value->service_id != null)
                                @if ($value->service->id === 1 && $value->time_end>$currentDateTime)
                                <label style="text-align: center;color:white;font-weight: 800; background: linear-gradient(45deg, orange, red);position: absolute;top:100px;left:-20px;width:200px;height:30px;z-index:50;padding:2px;border-radius:20%;transform: rotate(-40deg);transform-origin: 0 0;font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, " Segoe UI", Roboto, "Helvetica Neue" , Arial, "Noto Sans" , sans-serif, "Apple Color Emoji" , "Segoe UI Emoji" , "Segoe UI Symbol" , "Noto Color Emoji" ;">Phòng tốt</label>
                                @elseif ($value->service->id === 2 && $value->time_end>$currentDateTime)
                                <label style="text-align: center;color:white;font-weight: 800; background: linear-gradient(45deg, green, yellow);position: absolute;top:100px;left:-20px;width:200px;height:30px;z-index:50;padding:2px;border-radius:20%;transform: rotate(-40deg);transform-origin: 0 0;font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, " Segoe UI", Roboto, "Helvetica Neue" , Arial, "Noto Sans" , sans-serif, "Apple Color Emoji" , "Segoe UI Emoji" , "Segoe UI Symbol" , "Noto Color Emoji" ;">Phòng tốt</label>
                                @elseif($value->service->id === 3 && $value->time_end>$currentDateTime)
                                <label style="text-align: center;color:white;font-weight: 800; background: linear-gradient(45deg, pink, blue);position: absolute;top:100px;left:-20px;width:200px;height:30px;z-index:50;padding:2px;border-radius:20%;transform: rotate(-40deg);transform-origin: 0 0;font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, " Segoe UI", Roboto, "Helvetica Neue" , Arial, "Noto Sans" , sans-serif, "Apple Color Emoji" , "Segoe UI Emoji" , "Segoe UI Symbol" , "Noto Color Emoji" ;">Phòng tốt</label>
                                @endif
                                @endif
                                <div class="photo">
                                    <img src="{{ asset($value->image) }}" alt="photo" class="img-fluid w-100" style="height: 260px;">
                                    <a href="{{ route('room-post-detail', $value->id) }}">
                                        <label class="" style="cursor: pointer; font-size: 20px;" for="">Xem Chi Tiết</label>
                                    </a>
                                </div>

                            </div>
                            <!-- Detail -->
                            <div class="detail clearfix" style="height: 240px;">
                                <h3>
                                    <a style="color:{{ $value->service_id ? $value->service->color : '' }}" href="{{ route('room-post-detail', $value->id) }}">{{ $value->name }}</a>
                                </h3>
                                <p class="location">
                                    <a href="{{ route('room-post-detail', $value->id) }}">
                                        <i class="fa-solid fa-location-dot fa-lg " style="color: #f46b10;"></i>
                                        {{ substr($value->address_full, 0, 50) }}
                                    </a>
                                </p>
                                <div class="fecilities row">
                                    <ul class="d-flex justify-content-between">
                                        <p><span><i class="fas fa-expand me-2"></i></i>{{ $value->acreage }}
                                                m2</span>
                                        </p>
                                        <p><i class="far fa-clock me-2"></i>{{ timeposts($value->time_start) }}
                                        </p>
                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{$room_post_new->links()}}



            </div>
        </div>
        <!-- Hotel section end -->

        <!-- staff section start -->
        <div class="content-area staff-section comon-slick">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1>Nhà Phát Triển </h1>
                    <p>
                        Nhà phát triển website.
                    </p>
                </div>
                <div class="slick row comon-slick-inner wow fadeInUp delay-04s" data-slick='{"slidesToShow": 4, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}], "dots": true, "dotClass": "slick-dots"}'>
                    <div class="item slide-box">
                        <div class="staff-box-4">
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ asset('fe/img/staff/img-5.jpg') }}" alt="staff" class="img-fluid w-100" />
                                    <div class="info">
                                        <h4>Nguyễn Đoàn</h4>
                                        <span>Hotel Developer</span>
                                    </div>
                                    <div class="overlay text-light">
                                        <h4><a href="staff.html">Nguyễn Đoàn</a></h4>
                                        <p>
                                            Btuff sight equal of my woody. Him children bringing
                                            goodness suitable she entirely put far daughter pushing
                                            point.
                                        </p>
                                        <ul>
                                            <li class="facebook">
                                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li class="google">
                                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item slide-box">
                        <div class="staff-box-4">
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ asset('fe/img/staff/img-6.jpg') }}" alt="staff" class="img-fluid w-100" />
                                    <div class="info">
                                        <h4>Trần Công</h4>
                                        <span>Hotel Director</span>
                                    </div>
                                    <div class="overlay text-light">
                                        <h4><a href="staff.html">Trần Công</a></h4>
                                        <p>
                                            Btuff sight equal of my woody. Him children bringing
                                            goodness suitable she entirely put far daughter pushing
                                            point.
                                        </p>
                                        <ul>
                                            <li class="facebook">
                                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li class="google">
                                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item slide-box">
                        <div class="staff-box-4">
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ asset('fe/img/staff/img-7.jpg') }}" alt="staff" class="img-fluid w-100" />
                                    <div class="info">
                                        <h4>Tuấn Anh</h4>
                                        <span>Hotel Developer</span>
                                    </div>
                                    <div class="overlay text-light">
                                        <h4><a href="staff.html">Hoàng tử cô đơn</a></h4>
                                        <p>
                                            Btuff sight equal of my woody. Him children bringing
                                            goodness suitable she entirely put far daughter pushing
                                            point.
                                        </p>
                                        <ul>
                                            <li class="facebook">
                                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li class="google">
                                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item slide-box">
                        <div class="staff-box-4">
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ asset('fe/img/staff/img-8.jpg') }}" alt="staff" class="img-fluid w-100" />
                                    <div class="info">
                                        <h4>Khánh Nguyên</h4>
                                        <span>Support Manager</span>
                                    </div>
                                    <div class="overlay text-light">
                                        <h4><a href="staff.html">Khánh Nguyên</a></h4>
                                        <p>
                                            Btuff sight equal of my woody. Him children bringing
                                            goodness suitable she entirely put far daughter pushing
                                            point.
                                        </p>
                                        <ul>
                                            <li class="facebook">
                                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li class="google">
                                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item slide-box">
                        <div class="staff-box-4">
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ asset('fe/img/staff/img-7.jpg') }}" alt="staff" class="img-fluid w-100  " />
                                    <div class="info">
                                        <h4>Quốc Việt</h4>
                                        <span>Hotel Manager</span>
                                    </div>
                                    <div class="overlay text-light">
                                        <h4><a href="staff.html">Quốc Việt</a></h4>
                                        <p>
                                            Btuff sight equal of my woody. Him children bringing
                                            goodness suitable she entirely put far daughter pushing
                                            point.
                                        </p>
                                        <ul>
                                            <li class="facebook">
                                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li class="google">
                                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item slide-box">
                        <div class="staff-box-4">
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ asset('fe/img/staff/img-7.jpg') }}" alt="staff" class="img-fluid w-100  " />
                                    <div class="info">
                                        <h4>Lê Minh Thảo</h4>
                                        <span>Hotel Manager</span>
                                    </div>
                                    <div class="overlay text-light">
                                        <h4><a href="staff.html">Lê Minh Thảo</a></h4>
                                        <p>
                                            Btuff sight equal of my woody. Him children bringing
                                            goodness suitable she entirely put far daughter pushing
                                            point.
                                        </p>
                                        <ul>
                                            <li class="facebook">
                                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li class="google">
                                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item slide-box">
                        <div class="staff-box-4">
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ asset('fe/img/staff/img-7.jpg') }}" alt="staff" class="img-fluid w-100  " />
                                    <div class="info">
                                        <h4>Quang Phúc</h4>
                                        <span>Hotel Manager</span>
                                    </div>
                                    <div class="overlay text-light">
                                        <h4><a href="staff.html">Quang Phúc</a></h4>
                                        <p>
                                            Btuff sight equal of my woody. Him children bringing
                                            goodness suitable she entirely put far daughter pushing
                                            point.
                                        </p>
                                        <ul>
                                            <li class="facebook">
                                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li class="google">
                                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
            </div>
        </div>
        <!-- staff section ebd -->

        <!-- Counters strat -->
        <div class="counters-4">
            <div class="container">
                <div class="row">
                    <div class="left align-self-center wow fadeInLeft delay-04s">
                        <!-- Main title -->
                        <div class="main-title main-title-4">
                            <h1>Thống Kê</h1>
                            <p>
                                Thống kê các mục mà website đang đi lên từng ngày
                            </p>
                        </div>
                    </div>
                    <div class="right float-end wow fadeInRight delay-04s">
                        <div class="counter-inner">
                            <div class="counter-box blue ml-0">
                                <h1 class="counter">{{ $count_room }}</h1>
                                <h5>Tin Đăng</h5>
                            </div>
                            <div class="counter-box">
                                <h1 class="counter">{{ $count_post }}</h1>
                                <h5>Bài Viết</h5>
                            </div>
                            <div class="counter-box green">
                                <h1 class="counter">{{ $count_user }}</h1>
                                <h5>Tài Khoản</h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counters strat -->

        <!-- Blog section start -->
        <div class="blog-section content-area comon-slick">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1>Bài Viết</h1>
                    <p>
                        Danh sách những bài viết mới nhất.
                    </p>
                </div>
                <div class="slick row comon-slick-inner wow fadeInUp delay-04s" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}], "dots": true, "dotClass": "slick-dots"}'>
                    @if (isset($posts))
                    @foreach ($posts as $key => $value)
                    <div class="item slide-box">
                        <div class="blog-1">
                            <div class="blog-image">
                                <img src="{{ asset($value->image) }}" alt="image" class="img-fluid w-100" style="max-height: 260px;" />
                                <div class="profile-user">
                                    <img src="{{ ($value->user->avatar) ?  asset($value->user->avatar) : asset('fe/img/logos/no-image-user.jpeg')}}" alt="user" />
                                </div>
                                <div class="date-box">
                                    @if (isset($value->created_at))
                                    <span>{{ $value->created_at->format('d') }}
                                    </span>{{ substr($value->created_at->format('F'), 0, 3) }}
                                    @endif
                                </div>

                            </div>
                            <div class="detail">
                                <div class="post-meta clearfix">
                                    <ul>
                                        <li>
                                            <strong><a href="{{ route('posts-detail', $value->id) }}">By: <span class="fw-bolder">{{ $value->user->name }}</span></a></strong>
                                        </li>
                                        <li class="float-right mr-0">
                                            <a href="{{ route('posts-detail', $value->id) }}"><i class="fa-regular fa-eye" style="color: #f28a36;"></i></a>{{ $value->view }}
                                        </li>

                                    </ul>
                                </div>
                                <h3>
                                    <a href="{{ route('posts-detail', $value->id) }}">{{ $value->title }}</a>
                                </h3>

                                <!-- <p class="location" >
                                                                                                                                                                                                                                                                                                        {{ $value->metaDescription }}
                                                                                                                                                                                                                                                                                                    </p> -->
                                <p> {{ substr($value->metaDescription, 0, 40) }}</p>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- Blog section end -->

        <!-- Partners 2 start -->
        <div class="partners-2 comon-slick">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div class="left-info">
                            <h2>Đối Tác</h2>
                            <p>
                                Những đối tác mang đến sự phát triển lâu dài.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="partners-inner">
                            <div class="slick row comon-slick-inner" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 2}}]}'>
                                <div class="item slide-box">
                                    <div class="partners-box">
                                        <img src="{{ asset('fe/img/brand/brand-1.png') }}" alt="brand" class="img-fluid" />
                                    </div>
                                </div>
                                <div class="item slide-box">
                                    <div class="partners-box">
                                        <img src="{{ asset('fe/img/brand/brand-2.png') }}" alt="brand" class="img-fluid" />
                                    </div>
                                </div>
                                <div class="item slide-box">
                                    <div class="partners-box">
                                        <img src="{{ asset('fe/img/brand/brand-3.png') }}" alt="brand" class="img-fluid" />
                                    </div>
                                </div>
                                <div class="item slide-box">
                                    <div class="partners-box">
                                        <img src="{{ asset('fe/img/brand/brand-4.png') }}" alt="brand" class="img-fluid" />
                                    </div>
                                </div>
                                <div class="item slide-box">
                                    <div class="partners-box">
                                        <img src="{{ asset('fe/img/brand/brand-5.png') }}" alt="brand" class="img-fluid" />
                                    </div>
                                </div>
                                <div class="item slide-box">
                                    <div class="partners-box">
                                        <img src="{{ asset('fe/img/brand/brand-6.png') }}" alt="brand" class="img-fluid" />
                                    </div>
                                </div>
                                <div class="item slide-box">
                                    <div class="partners-box">
                                        <img src="{{ asset('fe/img/brand/brand-4.png') }}" alt="brand" class="img-fluid" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Partners 2 end -->


        <!-- content -->
        @endsection
        @push('scripts')

        @endpush
