@extends('admin.layouts.master')
@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Room Details</h1>
            </div>
            <nav class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Room Details</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Rooms detail section start -->
    <div class="content-area-15 rooms-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-xs-12">
                    <div class="rooms-detail-info">
                        <!-- Heading courses start -->

                        {{-- {{ dd($roomposts) }} --}}
                        <!-- Heading courses end -->
                        <!-- sidebar start -->
                        <div class="rooms-detail-slider">
                            <!--  Rooms detail slider start -->
                            <div class="rooms-detail-slider mb-40 ">
                                <div class="slider slider-for pb-sm-3">
                                    <div><img src="{{ asset($roomposts->image) }}" class="w-100 img-fluid" alt="photo">
                                    </div>
                                    {{-- <div><img src="{{ asset('fe/img/room/img-1.jpg') }}" class="w-100 img-fluid"
                                            alt="photo"></div>
                                    <div><img src="{{ asset('fe/img/room/img-5.jpg') }}" class="w-100 img-fluid"
                                            alt="photo"></div>
                                    <div><img src="{{ asset('fe/img/room/img-6.jpg') }}" class="w-100 img-fluid"
                                            alt="photo"></div>
                                    <div><img src="{{ asset('fe/img/room/img-3.jpg') }}" class="w-100 img-fluid"
                                            alt="photo"></div> --}}
                                </div>
                                <hr>
                                <div class="slider slider-nav d-lg-grid gap-3">
                                    @foreach ($images as $image)
                                        <div class="p-1"><img src=" {{ asset($image->name) }}" class="img-fluid"
                                                alt="photo">
                                        </div>
                                    @endforeach
                                    {{-- 
                                    <div class="p-1"><img src="{{ asset('fe/img/room/img-1.jpg') }}" class="img-fluid"
                                            alt="photo">
                                    </div>
                                    <div class="p-1"><img src="{{ asset('fe/img/room/img-5.jpg') }}" class="img-fluid"
                                            alt="photo">
                                    </div>
                                    <div class="p-1"><img src="{{ asset('fe/img/room/img-6.jpg') }}" class="img-fluid"
                                            alt="photo">
                                    </div>
                                    <div class="p-1"><img src="{{ asset('fe/img/room/img-3.jpg') }}" class="img-fluid"
                                            alt="photo">
                                    </div> --}}
                                </div>
                                <hr>
                            </div>
                            <!-- Rooms detail slider end -->

                            <!-- Rooms description start -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <!-- Rooms details section start -->
                                    <div class="rooms-detail-slider ">
                                        <div class="heading-rooms  clearfix mb-50">
                                            <div class="pull-left">
                                                <h3>{{ $roomposts->name }}</h3>
                                                <p>
                                                    <i class="fa fa-map-marker"></i>{{ $roomposts->address_full }}
                                                </p>
                                            </div>
                                            <div class="pull-right">
                                                <h3><span>${{ $roomposts->price }}/Tháng</span></h3>
                                            </div>
                                        </div>

                                        <!-- Rooms description start -->
                                        <div class="rooms-description mb-30">
                                            <!-- Title -->
                                            <div class="main-title-2">
                                                <h1>Mô tả chi tiết</h1>
                                            </div>
                                            <!-- paragraph -->
                                            <p class="mb-0">{!! $roomposts->description !!}</p>
                                        </div>
                                        <!-- Rooms description end -->

                                        <!-- Amenities start -->
                                        <div class="amenities mb-10">
                                            <div class="main-title-2">
                                                <h1>Tiện ích có sẵn</h1>
                                            </div>

                                            <div class="row">
                                                @foreach ($roomposts->facilities as $key => $value)
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="condition">
                                                            <li>
                                                                <i class="flaticon-air-conditioning"></i>{{ $value->name }}
                                                            </li>


                                                        </ul>
                                                    </div>
                                                @endforeach
                                                {{-- <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        <li>
                                                            <i class="flaticon-bed"></i>2 Bedroom
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-person-learning-by-reading"></i>Free
                                                            Newspaper
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-swimming-silhouette"></i>Use of pool
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-graph-line-screen"></i>TV
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-no-smoking-sign"></i>No Smoking
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        <li>
                                                            <i class="flaticon-room-service"></i>Room Service
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-breakfast"></i>Breakfast
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-phone-receiver"></i>Telephone
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-bed"></i>2 Bedroom
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-wifi-connection-signal-symbol"></i>Free Wi-Fi
                                                        </li>
                                                    </ul>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="amenities mb-10">
                                            <div class="main-title-2">
                                                <h1>Khu vực xung quanh</h1>
                                            </div>

                                            <div class="row">
                                                @foreach ($roomposts->surrounds as $key => $value)
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="condition">

                                                            <li>
                                                                <i class="flaticon-air-conditioning"></i>{{ $value->name }}
                                                            </li>
                                                            {{-- <li>
                                                                <i class="flaticon-balcony-and-door"></i>Balcony
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-weightlifting"></i>Gym
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-parking"></i>Parking
                                                            </li>
                                                        <li>
                                                            <i class="flaticon-sunbed"></i>Beach View
                                                        </li> --}}
                                                        </ul>
                                                    </div>
                                                @endforeach
                                                {{-- <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        <li>
                                                            <i class="flaticon-bed"></i>2 Bedroom
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-person-learning-by-reading"></i>Free
                                                            Newspaper
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-swimming-silhouette"></i>Use of pool
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-graph-line-screen"></i>TV
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-no-smoking-sign"></i>No Smoking
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <ul class="condition">
                                                        <li>
                                                            <i class="flaticon-room-service"></i>Room Service
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-breakfast"></i>Breakfast
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-phone-receiver"></i>Telephone
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-bed"></i>2 Bedroom
                                                        </li>
                                                        <li>
                                                            <i class="flaticon-wifi-connection-signal-symbol"></i>Free Wi-Fi
                                                        </li>
                                                    </ul>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <!-- Amenities end -->
                                        <!-- Similar room start -->
                                        <div class="similar-rooms">
                                            <div class="blog-section content-area comon-slick">
                                                <!-- Main title -->
                                                <div class="main-title-2">
                                                    <h1>Phòng tương tự</h1>
                                                </div>
                                                <div class="slick row comon-slick-inner wow fadeInUp delay-04s"
                                                    data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                                                    @foreach ($caterooms as $cateroom)
                                                        <div class="item slide-box">
                                                            <div class="hotel-box " style="position: relative;">
                                                                <a href="#" class=""
                                                                    style="position: absolute; top: 15px ; right: 15px;z-index: 999;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" height="2em"
                                                                        viewBox="0 0 384 512">
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
                                                                <!-- Photo thumbnail -->
                                                                <div class="photo-thumbnail" style="position: relative;">
                                                                    <div class="text-white"
                                                                        style="position: absolute; bottom:10px ; left: 15px;z-index: 100;">
                                                                        {{ $cateroom->price }}
                                                                    </div>
                                                                    <div class="photo">
                                                                        <img style="height: 200px"
                                                                            src="{{ asset($cateroom->image) }}"
                                                                            alt="photo" class="img-fluid w-100">
                                                                        <a href="rooms-details-3.html">
                                                                            <label class=""
                                                                                style="cursor: pointer; font-size: 20px;"
                                                                                for="">Xem chi tiết</label>
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <!-- Detail -->
                                                                <div class="detail clearfix">
                                                                    <h3>
                                                                        <a
                                                                            href="rooms-details.html">{{ $cateroom->name }}</a>
                                                                    </h3>
                                                                    <p class="location">
                                                                        <a href="rooms-details.html">
                                                                            <i
                                                                                class="fa fa-map-marker"></i>{{ $cateroom->address_full }}
                                                                        </a>
                                                                    </p>
                                                                    <div class="fecilities ">
                                                                        <ul class="row">
                                                                            <li class="">
                                                                                <i class="flaticon-bed"></i>
                                                                                <p>Beds</p>
                                                                            </li>
                                                                            <li class="">
                                                                                <i class="flaticon-air-conditioning"></i>
                                                                                <p> AC</p>
                                                                            </li>
                                                                            <li class="">
                                                                                <i class="flaticon-graph-line-screen"></i>
                                                                                <p>TV</p>
                                                                            </li>
                                                                            <li class="">
                                                                                <i class="flaticon-weightlifting"></i>
                                                                                <p>GYM</p>
                                                                            </li>
                                                                            <li class="">
                                                                                <i
                                                                                    class="flaticon-wifi-connection-signal-symbol"></i>
                                                                                <p>Wi-fi</p>
                                                                            </li>
                                                                            <li class="">
                                                                                <i class="flaticon-parking"></i>
                                                                                <p>Parking</p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    {{-- <div class="item slide-box">
                                                        <div class="hotel-box " style="position: relative;">
                                                            <a href="#" class=""
                                                                style="position: absolute; top: 15px ; right: 15px;z-index: 999;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="2em"
                                                                    viewBox="0 0 384 512">
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
                                                            <!-- Photo thumbnail -->
                                                            <div class="photo-thumbnail" style="position: relative;">
                                                                <div class="text-white"
                                                                    style="position: absolute; bottom:10px ; left: 15px;z-index: 100;">
                                                                    $567.99
                                                                </div>
                                                                <div class="photo">
                                                                    <img style="height: 200px" src="img/events/img-5.jpg"
                                                                        alt="photo" class="img-fluid w-100">
                                                                    <a href="rooms-details-3.html">
                                                                        <label class=""
                                                                            style="cursor: pointer; font-size: 20px;"
                                                                            for="">Xem chi tiết</label>
                                                                    </a>
                                                                </div>

                                                            </div>
                                                            <!-- Detail -->
                                                            <div class="detail clearfix">
                                                                <h3>
                                                                    <a href="rooms-details.html">Luxury Room</a>
                                                                </h3>
                                                                <p class="location">
                                                                    <a href="rooms-details.html">
                                                                        <i class="fa fa-map-marker"></i>123 Kathal
                                                                        St. Tampa City,
                                                                    </a>
                                                                </p>
                                                                <div class="fecilities ">
                                                                    <ul class="row">
                                                                        <li class="">
                                                                            <i class="flaticon-bed"></i>
                                                                            <p>Beds</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-air-conditioning"></i>
                                                                            <p> AC</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-graph-line-screen"></i>
                                                                            <p>TV</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-weightlifting"></i>
                                                                            <p>GYM</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i
                                                                                class="flaticon-wifi-connection-signal-symbol"></i>
                                                                            <p>Wi-fi</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-parking"></i>
                                                                            <p>Parking</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item slide-box">
                                                        <div class="hotel-box " style="position: relative;">
                                                            <a href="#" class=""
                                                                style="position: absolute; top: 15px ; right: 15px;z-index: 999;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="2em"
                                                                    viewBox="0 0 384 512">
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
                                                            <!-- Photo thumbnail -->
                                                            <div class="photo-thumbnail" style="position: relative;">
                                                                <div class="text-white"
                                                                    style="position: absolute; bottom:10px ; left: 15px;z-index: 100;">
                                                                    $567.99
                                                                </div>
                                                                <div class="photo">
                                                                    <img style="height: 200px"
                                                                        src="img/facilties/img-3.jpg" alt="photo"
                                                                        class="img-fluid w-100">
                                                                    <a href="rooms-details-3.html">
                                                                        <label class=""
                                                                            style="cursor: pointer; font-size: 20px;"
                                                                            for="">Xem chi tiết</label>
                                                                    </a>
                                                                </div>

                                                            </div>
                                                            <!-- Detail -->
                                                            <div class="detail clearfix">
                                                                <h3>
                                                                    <a href="rooms-details.html">Luxury Room</a>
                                                                </h3>
                                                                <p class="location">
                                                                    <a href="rooms-details.html">
                                                                        <i class="fa fa-map-marker"></i>123 Kathal
                                                                        St. Tampa City,
                                                                    </a>
                                                                </p>
                                                                <div class="fecilities ">
                                                                    <ul class="row">
                                                                        <li class="">
                                                                            <i class="flaticon-bed"></i>
                                                                            <p>Beds</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-air-conditioning"></i>
                                                                            <p> AC</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-graph-line-screen"></i>
                                                                            <p>TV</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-weightlifting"></i>
                                                                            <p>GYM</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i
                                                                                class="flaticon-wifi-connection-signal-symbol"></i>
                                                                            <p>Wi-fi</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-parking"></i>
                                                                            <p>Parking</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item slide-box">
                                                        <div class="hotel-box " style="position: relative;">
                                                            <a href="#" class=""
                                                                style="position: absolute; top: 15px ; right: 15px;z-index: 999;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="2em"
                                                                    viewBox="0 0 384 512">
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
                                                            <!-- Photo thumbnail -->
                                                            <div class="photo-thumbnail" style="position: relative;">
                                                                <div class="text-white"
                                                                    style="position: absolute; bottom:10px ; left: 15px;z-index: 100;">
                                                                    $567.99
                                                                </div>
                                                                <div class="photo">
                                                                    <img style="height: 200px" src="img/banner/img-5.jpg"
                                                                        alt="photo" class="img-fluid w-100">
                                                                    <a href="rooms-details-3.html">
                                                                        <label class=""
                                                                            style="cursor: pointer; font-size: 20px;"
                                                                            for="">Xem chi tiết</label>
                                                                    </a>
                                                                </div>

                                                            </div>
                                                            <!-- Detail -->
                                                            <div class="detail clearfix">
                                                                <h3>
                                                                    <a href="rooms-details.html">Luxury Room</a>
                                                                </h3>
                                                                <p class="location">
                                                                    <a href="rooms-details.html">
                                                                        <i class="fa fa-map-marker"></i>123 Kathal
                                                                        St. Tampa City,
                                                                    </a>
                                                                </p>
                                                                <div class="fecilities ">
                                                                    <ul class="row">
                                                                        <li class="">
                                                                            <i class="flaticon-bed"></i>
                                                                            <p>Beds</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-air-conditioning"></i>
                                                                            <p> AC</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-graph-line-screen"></i>
                                                                            <p>TV</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-weightlifting"></i>
                                                                            <p>GYM</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i
                                                                                class="flaticon-wifi-connection-signal-symbol"></i>
                                                                            <p>Wi-fi</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-parking"></i>
                                                                            <p>Parking</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item slide-box">
                                                        <div class="hotel-box " style="position: relative;">
                                                            <a href="#" class=""
                                                                style="position: absolute; top: 15px ; right: 15px;z-index: 999;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="2em"
                                                                    viewBox="0 0 384 512">
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
                                                            <!-- Photo thumbnail -->
                                                            <div class="photo-thumbnail" style="position: relative;">
                                                                <div class="text-white"
                                                                    style="position: absolute; bottom:10px ; left: 15px;z-index: 100;">
                                                                    $567.99
                                                                </div>
                                                                <div class="photo">
                                                                    <img style="height:200px" src="img/banner/img-5.jpg"
                                                                        alt="photo" class="img-fluid w-100">
                                                                    <a href="rooms-details-3.html">
                                                                        <label class=""
                                                                            style="cursor: pointer; font-size: 20px;"
                                                                            for="">Xem chi tiết</label>
                                                                    </a>
                                                                </div>

                                                            </div>
                                                            <!-- Detail -->
                                                            <div class="detail clearfix">
                                                                <h3>
                                                                    <a href="rooms-details.html">Luxury Room</a>
                                                                </h3>
                                                                <p class="location">
                                                                    <a href="rooms-details.html">
                                                                        <i class="fa fa-map-marker"></i>123 Kathal
                                                                        St. Tampa City,
                                                                    </a>
                                                                </p>
                                                                <div class="fecilities ">
                                                                    <ul class="row">
                                                                        <li class="">
                                                                            <i class="flaticon-bed"></i>
                                                                            <p>Beds</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-air-conditioning"></i>
                                                                            <p> AC</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-graph-line-screen"></i>
                                                                            <p>TV</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-weightlifting"></i>
                                                                            <p>GYM</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i
                                                                                class="flaticon-wifi-connection-signal-symbol"></i>
                                                                            <p>Wi-fi</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-parking"></i>
                                                                            <p>Parking</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item slide-box">
                                                        <div class="hotel-box " style="position: relative;">
                                                            <a href="#" class=""
                                                                style="position: absolute; top: 15px ; right: 15px;z-index: 999;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="2em"
                                                                    viewBox="0 0 384 512">
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
                                                            <!-- Photo thumbnail -->
                                                            <div class="photo-thumbnail" style="position: relative;">
                                                                <div class="text-white"
                                                                    style="position: absolute; bottom:10px ; left: 15px;z-index: 100;">
                                                                    $567.99
                                                                </div>
                                                                <div class="photo">
                                                                    <img style="height: 200px" src="img/banner/img-5.jpg"
                                                                        alt="photo" class="img-fluid w-100">
                                                                    <a href="rooms-details-3.html">
                                                                        <label class=""
                                                                            style="cursor: pointer; font-size: 20px;"
                                                                            for="">Xem chi tiết</label>
                                                                    </a>
                                                                </div>

                                                            </div>
                                                            <!-- Detail -->
                                                            <div class="detail clearfix">
                                                                <h3>
                                                                    <a href="rooms-details.html">Luxury Room</a>
                                                                </h3>
                                                                <p class="location">
                                                                    <a href="rooms-details.html">
                                                                        <i class="fa fa-map-marker"></i>123 Kathal
                                                                        St. Tampa City,
                                                                    </a>
                                                                </p>
                                                                <div class="fecilities ">
                                                                    <ul class="row">
                                                                        <li class="">
                                                                            <i class="flaticon-bed"></i>
                                                                            <p>Beds</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-air-conditioning"></i>
                                                                            <p> AC</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-graph-line-screen"></i>
                                                                            <p>TV</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-weightlifting"></i>
                                                                            <p>GYM</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i
                                                                                class="flaticon-wifi-connection-signal-symbol"></i>
                                                                            <p>Wi-fi</p>
                                                                        </li>
                                                                        <li class="">
                                                                            <i class="flaticon-parking"></i>
                                                                            <p>Parking</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <a class="carousel-control-prev" href="#profile-slideshow" role="button"
                                                    data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#profile-slideshow" role="button"
                                                    data-bs-slide="next">
                                                    <span class="bg-dark carousel-control-next-icon"
                                                        aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </a>

                                            </div>
                                        </div>
                                        <!-- Similar room end -->
                                        <!-- Location start -->
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <!-- Location start  -->
                                                <div class="main-title-2">
                                                    <h1>Bản đồ</h1>
                                                </div>
                                                <div class="location w-100 sidebar-widget mb-sm-5">
                                                    <div class="map">
                                                        <!-- Main Title 2 -->
                                                        <div id="m  ap" class="contact-map" style="height: 662px;">
                                                            <iframe
                                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59615.81210587678!2d105.71104243751117!3d20.95298673967121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134532bef4bcdb7%3A0xbcc7a679fcba07f6!2zSMOgIMSQw7RuZywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1694537835765!5m2!1svi!2s"
                                                                width="100%" style="border:0;" allowfullscreen=""
                                                                loading="lazy"
                                                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Location comments end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Course details section end -->
                                </div>
                            </div>

                            <!-- Rooms description end -->
                        </div>
                        <!-- sidebar end -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-xs-12">
                    <div class="sidebar">
                        <!-- Search area box 3 start -->
                        <div class="sidebar-widget text-center search-area-box-3 clearfix">
                            <div class="contact-details">
                                <div class="contact-item  mb-3">
                                    <div class="mx-auto"
                                        style=" background-image: url(https://picsum.photos/200);background-size: contain;  background-repeat: no-repeat; border-radius: 50%; border: 2px solid #a1a1a1; height: 200px; margin: 20px; padding: 10px;  width:200px;">
                                    </div>
                                    <div>
                                        <h2> Được đăng bởi </h2>
                                        <p>{{ $roomposts->fullname }}</p>
                                        <a>
                                            <p class="text-decoration-underline"> Xem thêm bài đăng </p>
                                        </a>
                                    </div>
                                    <div class="heading-rooms  clearfix">
                                        <div class="contact-item  mb-3">

                                            <button style="background-color: #F4A460"
                                                class="mx-auto mt-3 btn align-items-center btn-4 ">
                                                <div class="icon d-flex align-items-center gap-lg-2">
                                                    <i class="fa fa-phone"></i>
                                                    <a href="tel:0477-0477-8556-552">{{ $roomposts->phone }}</a>
                                                </div>

                                            </button>
                                        </div>
                                        <div class="contact-item mt-3 mb-3">
                                            <button style="background-color: #F4A460"
                                                class="mx-auto mt-3  btn align-items-center btn-4 ">
                                                <div>
                                                    <p>Yêu cầu liên hệ lại</p>
                                                </div>
                                            </button>
                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>


                        <!-- Recent News start -->
                        <div class="sidebar-widget recent-news">
                            <div class="main-title-2">
                                <h1>Bài đăng gần đây</h1>
                            </div>
                            <div class="recent-news-item mb-3">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="img/small/img.jpg" alt="small-img">
                                    </a>
                                </div>
                                <div class="content">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Host a Family Party</a>
                                    </h3>
                                    <div class="listing-post-meta">
                                        $599,00 | <a href="#"><i class="fa fa-calendar"></i> Jan 12, 2021</a>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-news-item mb-3">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="img/small/img-2.jpg" alt="small-img">
                                    </a>
                                </div>
                                <div class="content">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Room with View</a>
                                    </h3>
                                    <div class="listing-post-meta">
                                        $599,00 | <a href="#"><i class="fa fa-calendar"></i> Aug 12, 2021</a>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-news-item">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="img/small/img-3.jpg" alt="small-img">
                                    </a>
                                </div>
                                <div class="content">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Double Room</a>
                                    </h3>
                                    <div class="listing-post-meta">
                                        $599,00 | <a href="#"><i class="fa fa-calendar"></i> Feb 12, 2021</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget recent-news">
                            <div class="main-title-2">
                                <h1>Nhà trọ nổi bật</h1>
                            </div>
                            <div class="recent-news-item mb-3">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="img/small/img.jpg" alt="small-img">
                                    </a>
                                </div>
                                <div class="content">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Host a Family Party</a>
                                    </h3>
                                    <div class="listing-post-meta">
                                        $599,00 | <a href="#"><i class="fa fa-calendar"></i> Jan 12, 2021</a>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-news-item mb-3">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="img/small/img-2.jpg" alt="small-img">
                                    </a>
                                </div>
                                <div class="content">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Room with View</a>
                                    </h3>
                                    <div class="listing-post-meta">
                                        $599,00 | <a href="#"><i class="fa fa-calendar"></i> Aug 12, 2021</a>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-news-item">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="img/small/img-3.jpg" alt="small-img">
                                    </a>
                                </div>
                                <div class="content">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Double Room</a>
                                    </h3>
                                    <div class="listing-post-meta">
                                        $599,00 | <a href="#"><i class="fa fa-calendar"></i> Feb 12, 2021</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget recent-news">
                            <div class="main-title-2">
                                <h1>Nhà trọ theo khu vực</h1>
                            </div>
                            <div class="recent-news-item mb-3">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="img/small/img.jpg" alt="small-img">
                                    </a>
                                </div>
                                <div class="content">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Host a Family Party</a>
                                    </h3>
                                    <div class="listing-post-meta">
                                        $599,00 | <a href="#"><i class="fa fa-calendar"></i> Jan 12, 2021</a>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-news-item mb-3">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="img/small/img-2.jpg" alt="small-img">
                                    </a>
                                </div>
                                <div class="content">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Room with View</a>
                                    </h3>
                                    <div class="listing-post-meta">
                                        $599,00 | <a href="#"><i class="fa fa-calendar"></i> Aug 12, 2021</a>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-news-item">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="img/small/img-3.jpg" alt="small-img">
                                    </a>
                                </div>
                                <div class="content">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Double Room</a>
                                    </h3>
                                    <div class="listing-post-meta">
                                        $599,00 | <a href="#"><i class="fa fa-calendar"></i> Feb 12, 2021</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget recent-news">
                            <div class="main-title-2">
                                <h1>Nhà môi giới nổi bật</h1>
                            </div>
                            <div class="recent-news mb-50">
                                <!-- Main title -->

                                <div class="recent-news-item mb-3">
                                    <div class="thumb">
                                        <a href="events-details.html">
                                            <img src="img/events/img-3.jpg" alt="small-img">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h3 class="media-heading">
                                            <a href="events-details.html">Nguyễn Quang Phúc</a>
                                        </h3>
                                        <div class="listing-post-meta">
                                            20 + bài đăng <a href="#"><i class="fa fa-eye"></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-news-item mb-3">
                                    <div class="thumb">
                                        <a href="events-details.html">
                                            <img src="img/events/img-3.jpg" alt="small-img">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h3 class="media-heading">
                                            <a href="events-details.html">Nguyễn Quang Phúc</a>
                                        </h3>
                                        <div class="listing-post-meta">
                                            20 + bài đăng <a href="#"><i class="fa fa-eye"></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-news-item ">
                                    <div class="thumb">
                                        <a href="events-details.html">
                                            <img src="img/events/img-3.jpg" alt="small-img">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h3 class="media-heading">
                                            <a href="events-details.html">Nguyễn Quang Phúc</a>
                                        </h3>
                                        <div class="listing-post-meta">
                                            20 + bài đăng <a href="#"><i class="fa fa-eye"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Category posts start -->


                        <!-- tags box start -->
                        <div class="sidebar-widget tags-box">
                            <div class="main-title-2">
                                <h1>Tags</h1>
                            </div>
                            <ul class="tags">
                                <li><a href="#">Rooms</a></li>
                                <li><a href="#">Promotion</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Gallery</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Video</a></li>
                                <li><a href="#">Audio</a></li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Rooms detail section end -->
@endsection
