@extends('client.layouts.master')
@section('title', $roomposts->name)
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
                <div class="col-lg-9 col-md-12 col-xs-12 sidebar">
                    <div class="rooms-detail-info">
                        <!-- Heading courses start -->

                        {{-- {{ dd($roomposts) }} --}}
                        <!-- Heading courses end -->
                        <!-- sidebar start -->
                        <div class="rooms-detail-slider">
                            <div class="rooms-detail-slider mb-40 comon-slick">
                                <div class="slider slider-for pb-sm-3 slick comon-slick-inner wow">
                                    <div><img src="{{ asset($roomposts->image) }}" class="w-100 img-main-slick img-fluid">
                                    </div>
                                    @foreach ($images as $image)
                                        <div class="p-1"><img src=" {{ asset($image->name) }}"
                                                class="w-100 img-main-slick img-fluid" alt="photo">
                                        </div>
                                    @endforeach
                                </div>
                                <hr>
                                <div class="slider slider-nav d-lg-grid gap-3">
                                    <div class="p-1">
                                        <img src="{{ asset($roomposts->image) }}" class="w-100 img-slick img-fluid"
                                            alt="photo">
                                    </div>
                                    @foreach ($images as $image)
                                        <div class="p-1"><img src=" {{ asset($image->name) }}"
                                                class="img-slick img-fluid" alt="photo">
                                        </div>
                                    @endforeach
                                </div>
                                <hr>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="heading-rooms">
                                        <h3>{{ $roomposts->name }}</h3>
                                        <p>
                                            <i class="fas fa-map-marker-alt me-2"></i>{{ $roomposts->address_full }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center my-3">
                                            <div class="div d-flex">
                                                <p class="pe-5"><span class="text-danger"><i
                                                            class="fas fa-tag fa-rotate-90 me-2 text-danger"></i>{{ number_format($roomposts->price) }}
                                                        VND/Tháng</span>
                                                </p>
                                                <p><span><i class="fas fa-expand me-2"></i></i>{{ $roomposts->acreage }}
                                                        m2</span>
                                                </p>
                                            </div>
                                            <div class="dev">
                                                <p><i class="far fa-clock me-2"></i>{{ timeposts($roomposts->created_at) }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="">
                                            <p for="">Danh mục: <span
                                                    class="fw-bold">{{ $roomposts->categoryroom->name }}</span></p>
                                        </div>
                                        <div class="mt-3 mb-3">

                                        </div>
                                    </div>
                                    <!-- Rooms details section start -->
                                    <div class="rooms-detail-slider ">
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
                                        <div class="amenities mb-30 ">
                                            <div class="main-title-2">
                                                <h1>Tiện ích có sẵn</h1>
                                            </div>

                                            <div class="row">
                                                @foreach ($roomposts->facilities as $key => $value)
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <i class="{{ $value->icon }} me-2"></i>{{ $value->name }}
                                                        {{-- <i class="{{ $value->icon }}"></i>{{ $value->name }} --}}
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="amenities mb-30">
                                            <div class="main-title-2">
                                                <h1>Khu vực xung quanh</h1>
                                            </div>

                                            <div class="row">
                                                @foreach ($roomposts->surrounds as $key => $value)
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <i class="{{ $value->icon }} me-2"></i>{{ $value->name }}
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>

                                        <div class="amenities mb-30">
                                            <div class="main-title-2">
                                                <h1>Đặc điểm tin đăng</h1>
                                            </div>
                                            <table class="table border">
                                                <tr>
                                                    <td>Mã tin đăng:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Loại tin đăng:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Ngày bắt đầu:</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Ngày kết thúc:</td>
                                                    <td></td>
                                                </tr>

                                            </table>


                                        </div>

                                        <!-- Amenities end -->
                                        <!-- Similar room start -->
                                        <div class="similar-rooms ">
                                            <div class="blog-section content-area comon-slick">
                                                <!-- Main title -->
                                                <div class="main-title-2">
                                                    <h1>Phòng tương tự</h1>
                                                </div>
                                                <div class="slick row comon-slick-inner wow fadeInUp delay-04s"
                                                    data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                                                    @if (isset($caterooms))
                                                        @if (count($caterooms) > 0)
                                                            @foreach ($caterooms as $key => $value)
                                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                                    <div class="hotel-box " style="position: relative;">
                                                                        <?php
                                                                        $user_id = null; // Khởi tạo $user_id bằng null nếu người dùng chưa đăng nhập
                                                                        $isBookmarked = false; // Khởi tạo $isBookmarked bằng false nếu người dùng chưa đăng nhập
                                                                        
                                                                        if (Auth::check()) {
                                                                            $user_id = auth()->user()->id;
                                                                            $isBookmarked = \App\Models\Bookmark::where('user_id', $user_id)
                                                                                ->where('room_post_id', $value->id)
                                                                                ->exists();
                                                                        }
                                                                        ?>


                                                                        @if ($isBookmarked)
                                                                            <form
                                                                                action="{{ route('unbookmark', $value->id) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button
                                                                                    style="position: absolute; top: 15px; right: 15px; z-index: 999; background: none; border: none">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        height="2em"
                                                                                        viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                                        <style>
                                                                                            svg {
                                                                                                fill: #f4a460
                                                                                            }
                                                                                        </style>
                                                                                        <path
                                                                                            d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9-4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z" />
                                                                                    </svg>
                                                                                </button>
                                                                            </form>
                                                                        @else
                                                                            <form
                                                                                action="{{ route('bookmark', $value->id) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                <button
                                                                                    style="position: absolute; top: 15px; right: 15px; z-index: 999; background: none; border: none">
                                                                                    <button
                                                                                        style="position: absolute; top: 15px ; right: 15px;z-index: 999;background:none;border:none">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            height="2em"
                                                                                            viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                                            <style>
                                                                                                svg {
                                                                                                    fill: #f4a460
                                                                                                }
                                                                                            </style>
                                                                                            <path
                                                                                                d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z" />
                                                                                        </svg>
                                                                                    </button>
                                                                                </button>
                                                                            </form>
                                                                        @endif
                                                                        <!-- Photo thumbnail -->
                                                                        <div class="photo-thumbnail"
                                                                            style="position: relative;">
                                                                            {{-- <div class="text-white"
                                                                                style="position: absolute; bottom:10px ; left: 15px;z-index: 100;">
                                                                                {{ number_format($value->price) }}
                                                                                VND/Tháng
                                                                            </div> --}}
                                                                            <div class="photo">
                                                                                <img src="{{ asset($value->image) }}"
                                                                                    alt="photo" class="img-fluid w-100">
                                                                                <a href="rooms-details.html">
                                                                                    <label class=""
                                                                                        style="cursor: pointer; font-size: 20px;"
                                                                                        for="">Xem Chi Tiết</label>
                                                                                </a>
                                                                            </div>

                                                                        </div>
                                                                        <!-- Detail -->
                                                                        <div class="detail clearfix">
                                                                            <h3>
                                                                                <a
                                                                                    href="rooms-details.html">{{ $value->name }}</a>
                                                                            </h3>
                                                                            <p class="location">
                                                                                <a href="rooms-details.html">
                                                                                    <i
                                                                                        class="fas fa-map-marker-alt me-2"></i>{{ $value->address_full }}
                                                                                </a>
                                                                            </p>
                                                                            <div class="fecilities row">
                                                                                {{-- <div
                                                                                    class="d-flex justify-content-between align-items-center mb-2"> --}}
                                                                                <p class="pe-5 pb-2"><span
                                                                                        class="text-danger"><i
                                                                                            class="fas fa-tag fa-rotate-90 me-2 text-danger"></i>{{ number_format($value->price) }}
                                                                                        Triệu/Tháng</span>
                                                                                </p>

                                                                                <p><span><i
                                                                                            class="fas fa-expand me-2 pb-2"></i></i>{{ $roomposts->acreage }}
                                                                                        m2</span>
                                                                                </p>
                                                                                {{-- </div> --}}

                                                                                <p><i
                                                                                        class="far fa-clock me-2"></i>{{ timeposts($value->created_at) }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    @endif

                                                </div>
                                                {{-- <a class="carousel-control-prev" href="#profile-slideshow" role="button"
                                                    data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#profile-slideshow" role="button"
                                                    data-bs-slide="next">
                                                    <span class="bg-dark carousel-control-next-icon"
                                                        aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </a> --}}

                                            </div>
                                        </div>
                                        <!-- Similar room end -->
                                        <!-- Location start -->
                                        <div class="row ">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <!-- Location start  -->
                                                <div class="main-title-2">
                                                    <h1>Bản đồ</h1>
                                                </div>
                                                <div class="location w-100 ">
                                                    <div class="map">
                                                        <!-- Main Title 2 -->
                                                        <div id="map" class="contact-map" style="height: 662px;">
                                                            <iframe
                                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59615.81210587678!2d105.71104243751117!3d20.95298673967121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134532bef4bcdb7%3A0xbcc7a679fcba07f6!2zSMOgIMSQw7RuZywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1694537835765!5m2!1svi!2s"
                                                                width="100%" height="75%" style="border:0;"
                                                                allowfullscreen="" loading="lazy"
                                                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Location comments end -->
                                            </div>
                                        </div>
                                        <div class="row clearfix tag-share">
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                <!-- Tags box start -->
                                                <div class="tags-box hidden-mb-10">
                                                    <h4>Tags</h4>
                                                    <ul class="tags">
                                                        <li><a href="#">Rooms</a></li>
                                                        <li><a href="#">Promotion</a></li>
                                                        <li><a href="#">Travel</a></li>
                                                    </ul>
                                                </div>

                                                <!-- Tags box end -->
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                <!-- Blog Share start -->
                                                <div class="blog-share">
                                                    <h4>Share</h4>
                                                    <ul class="social-list">
                                                        {!! $shareComponent !!}
                                                    </ul>
                                                </div>
                                                <!-- Blog Share end -->
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
                <div class="col-lg-3 col-md-12 col-xs-12" style="padding-right: 0">
                    <div class="sidebar">
                        <!-- Search area box 3 start -->
                        <div class="sidebar-widget text-center search-area-box-3 clearfix" style="padding: 12px">
                            <div class="contact-details">
                                <div class="row contact-item mb-3 align-items-center">
                                    <div class="col-md-4 mx-auto">
                                        <img src="{{ $roomposts->user->avatar ? asset($roomposts->user->avatar) : 'https://worldapheresis.org/wp-content/uploads/2022/04/360_F_339459697_XAFacNQmwnvJRqe1Fe9VOptPWMUxlZP8.jpeg' }}"
                                            alt=""style="background-size: contain;  background-repeat: no-repeat; border-radius: 50%; border: 2px solid #a1a1a1; height: 70px; width:70px;">


                                    </div>
                                    <div class="col-md-8">
                                        {{-- <h2> Được đăng bởi </h2> --}}
                                        <h5>{{ $roomposts->fullname }}</h5>
                                        <p><a href="">Xem thêm bài đăng</a></p>

                                    </div>
                                </div>
                                <div class="heading-rooms">
                                    <div class="contact-item mb-3">
                                        <div class="btn btn-primary text-center w-100">
                                            <i class="fa fa-phone fs-5 mx-2"></i>
                                            <a class="text-center text-light fs-6 fw-bold"
                                                href="tel:0477-0477-8556-552">{{ $roomposts->phone }}</a>
                                        </div>

                                    </div>


                                </div>

                            </div>


                        </div>
                    </div>

                    @include('client.layouts.partials.r-sidebar')
                    <!-- Tag -->
                    <div class="sidebar-widget tags-box">
                        <div class="main-title-2">
                            <h1>Tags</h1>
                        </div>
                        <ul class="tags">
                            @foreach ($roomposts->tags as $tag)
                                <li><a href="{{ route('tags-show', $tag->slug) }}">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Rooms detail section end -->
@endsection
