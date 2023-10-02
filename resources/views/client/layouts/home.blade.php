@extends('client.layouts.master')
@section('content')
<div class="content">
    <<!-- Banner start -->
        <div class="banner container" id="banner1" style="z-index: 0">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item item active">
                        <img class="d-block w-100 h-100" src="{{ asset('fe/img/banner/img-2.jpg') }}" alt="banner" />
                        <div class="carousel-caption banner-slider-inner d-flex h-100">
                            <div class="carousel-content container align-self-center">
                                <div class="text-center">
                                    <div class="max-area2">
                                        <h1>Welcome To Hotel Alpha</h1>
                                        <p>
                                            Lorem ipsum dolor sit amet, conconsectetuer adipiscing
                                            elit Lorem ipsum dolor sit amet, conconsectetuer
                                        </p>
                                        <a class="btn-lg btn-2" href="#">Get Started Now</a>
                                        <a class="btn-lg btn-1" href="#"><span>Learn More</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item item">
                        <img class="d-block w-100 h-100" src="{{ asset('fe/img/banner/img-1.jpg') }}" alt="banner" />
                        <div class="carousel-caption banner-slider-inner d-flex h-100">
                            <div class="carousel-content container align-self-center">
                                <div class="text-r">
                                    <div class="max-area2">
                                        <h1>Best Place To Find Room</h1>
                                        <p>
                                            Lorem ipsum dolor sit amet, conconsectetuer adipiscing
                                            elit Lorem ipsum dolor sit amet, conconsectetuer
                                        </p>
                                        <a class="btn-lg btn-2" href="#">Get Started Now</a>
                                        <a class="btn-lg btn-1" href="#"><span>Learn More</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item item">
                        <img class="d-block w-100 h-100" src="{{ asset('fe/img/banner/img-3.jpg') }}" alt="banner" />
                        <div class="carousel-caption banner-slider-inner d-flex h-100">
                            <div class="carousel-content container align-self-center">
                                <div class="text-l">
                                    <div class="max-area2">
                                        <h1>Best Place For Relux</h1>
                                        <p>
                                            Lorem ipsum dolor sit amet, conconsectetuer adipiscing
                                            elit Lorem ipsum dolor sit amet, conconsectetuer
                                        </p>
                                        <a class="btn-lg btn-2" href="#">Get Started Now</a>
                                        <a class="btn-lg btn-1" href="#"><span>Learn More</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        <!-- Banner end -->

        <!-- Hotel section start -->
        <div class="content-area hotel-section bg-grey">
            <div class="overlay">
                <div class="container">
                    <!-- Main title -->
                    <div class="main-title">
                        <h1>Our Best Rooms</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod
                        </p>
                    </div>
                    <div class="row wow fadeInUp delay-04s">
                        @if(isset($rooms))
                        @if(count($rooms)>0)
                        @foreach($rooms as $key =>$value)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="hotel-box " style="position: relative;">
                                <?php
                                    $user_id = null; // Khởi tạo $user_id bằng null nếu người dùng chưa đăng nhập
                                    $isBookmarked = false; // Khởi tạo $isBookmarked bằng false nếu người dùng chưa đăng nhập

                                    if (Auth::check()) {
                                        $user_id = auth()->user()->id;
                                        $isBookmarked = \App\Models\Bookmark::where('user_id', $user_id)
                                            ->where('room_post_id', $value->id)->exists();

                                    }
                                ?>


                                    @if ($isBookmarked)
                                    <form action="{{ route('unbookmark', $value->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button style="position: absolute; top: 15px; right: 15px; z-index: 999; background: none; border: none">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#f4a460}</style><path d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9-4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/></svg>
                                        </button>
                                    </form>
                                    @else
                                    <form action="{{ route('bookmark', $value->id) }}" method="post">
                                        @csrf
                                        <button style="position: absolute; top: 15px; right: 15px; z-index: 999; background: none; border: none">
                                            <button style="position: absolute; top: 15px ; right: 15px;z-index: 999;background:none;border:none">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#f4a460}</style><path d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"/></svg>
                                            </button>
                                        </button>
                                    </form>
                                    @endif
                                <!-- Photo thumbnail -->
                                <div class="photo-thumbnail" style="position: relative;">
                                    <div class="text-white" style="position: absolute; bottom:10px ; left: 15px;z-index: 100;">
                                        {{number_format($value->price)}} VND/Tháng
                                    </div>
                                    <div class="photo">
                                        <img src="{{ $value->image}}" alt="photo" class="img-fluid w-100">
                                        <a href="rooms-details.html">
                                            <label class="" style="cursor: pointer; font-size: 20px;" for="">Xem Chi Tiết</label>
                                        </a>
                                    </div>

                                </div>
                                <!-- Detail -->
                                <div class="detail clearfix">
                                    <h3>
                                        <a href="rooms-details.html">{{$value->name}}</a>
                                    </h3>
                                    <p class="location">
                                        <a href="rooms-details.html">
                                            <i class="fa fa-map-marker"></i>{{$value->address_full}}
                                        </a>
                                    </p>
                                    <div class="fecilities row">
                                        <ul>
                                            <li>
                                                <i class="flaticon-bed"></i> Beds
                                            </li>
                                            <li>
                                                <i class="flaticon-air-conditioning"></i>
                                                AC
                                            </li>
                                            <li>
                                                <i class="flaticon-graph-line-screen"></i>
                                                TV
                                            </li>
                                            <li>
                                                <i class="flaticon-weightlifting"></i>
                                                GYM
                                            </li>
                                            <li>
                                                <i class="flaticon-wifi-connection-signal-symbol"></i>
                                                Wi-fi
                                            </li>
                                            <li>
                                                <i class="flaticon-parking"></i>
                                                Parking
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @endif
                    </div>
                    <!-- Page navigation start -->
                    <div class="pagination-box-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="rooms-col-1.html">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="rooms-col-2.html">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link active" href="rooms-col-3.html">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="rooms-details.html"><i class="fa fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Page navigation end -->
                </div>
            </div>
        </div>
        <!-- Hotel section end -->

        <!-- staff section start -->
        <div class="content-area staff-section comon-slick">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1>Our Staff</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                        eiusmod
                    </p>
                </div>
                <div class="slick row comon-slick-inner wow fadeInUp delay-04s" data-slick='{"slidesToShow": 4, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}], "dots": true, "dotClass": "slick-dots"}'>
                    <div class="item slide-box">
                        <div class="staff-box-4">
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ asset('fe/img/staff/img-5.jpg') }}" alt="staff" class="img-fluid w-100" />
                                    <div class="info">
                                        <h4>Hartisona Roy</h4>
                                        <span>Hotel Developer</span>
                                    </div>
                                    <div class="overlay text-light">
                                        <h4><a href="staff.html">Hartisona Roy</a></h4>
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
                                        <h4>Karen Paran</h4>
                                        <span>Hotel Director</span>
                                    </div>
                                    <div class="overlay text-light">
                                        <h4><a href="staff.html">Karen Paran</a></h4>
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
                                        <h4>Hartisona Roy</h4>
                                        <span>Hotel Developer</span>
                                    </div>
                                    <div class="overlay text-light">
                                        <h4><a href="staff.html">Hartisona Roy</a></h4>
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
                                        <h4>Shakira Kaisar</h4>
                                        <span>Support Manager</span>
                                    </div>
                                    <div class="overlay text-light">
                                        <h4><a href="staff.html">Shakira Kaisar</a></h4>
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
                                        <h4>Maikel John</h4>
                                        <span>Hotel Manager</span>
                                    </div>
                                    <div class="overlay text-light">
                                        <h4><a href="staff.html">Maikel John</a></h4>
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
                            <h1>Hotel Statistics</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod
                            </p>
                        </div>
                    </div>
                    <div class="right float-end wow fadeInRight delay-04s">
                        <div class="counter-inner">
                            <div class="counter-box blue ml-0">
                                <h1 class="counter">1963</h1>
                                <h5>Guest Stay</h5>
                            </div>
                            <div class="counter-box">
                                <h1 class="counter">1854</h1>
                                <h5>Book Room</h5>
                            </div>
                            <div class="counter-box green">
                                <h1 class="counter">1823</h1>
                                <h5>Member Stay</h5>
                            </div>
                            <div class="counter-box cgreen">
                                <h1 class="counter">1756</h1>
                                <h5>Meals Served</h5>
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
                    <h1>Our Blog</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                        eiusmod
                    </p>
                </div>
                <div class="slick row comon-slick-inner wow fadeInUp delay-04s" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}], "dots": true, "dotClass": "slick-dots"}'>
                    <div class="item slide-box">
                        <div class="blog-1">
                            <div class="blog-image">
                                <img src="{{ asset('fe/img/blog/img-5.jpg') }}" alt="image" class="img-fluid w-100" />
                                <div class="profile-user">
                                    <img src="{{ asset('fe/img/avatar/avatar-1.jpg') }}" alt="user" />
                                </div>
                                <div class="date-box"><span>09</span>Sep</div>
                            </div>
                            <div class="detail">
                                <div class="post-meta clearfix">
                                    <ul>
                                        <li>
                                            <strong><a href="#">By: Auro Navanth</a></strong>
                                        </li>
                                        <li class="float-right mr-0">
                                            <a href="#"><i class="fa fa-commenting-o"></i></a>205
                                        </li>
                                        <li class="float-right">
                                            <a href="#"><i class="fa fa-calendar"></i></a>328
                                        </li>
                                    </ul>
                                </div>
                                <h3>
                                    <a href="blog-details.html">Standard Post Format Title</a>
                                </h3>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item slide-box">
                        <div class="blog-1">
                            <div class="blog-image">
                                <img src="{{ asset('fe/img/blog/img-4.jpg') }}" alt="image" class="img-fluid w-100" />
                                <div class="profile-user">
                                    <img src="{{ asset('fe/img/avatar/avatar-2.jpg') }}" alt="user" />
                                </div>
                                <div class="date-box"><span>06</span>Sep</div>
                            </div>
                            <div class="detail">
                                <div class="post-meta clearfix">
                                    <ul>
                                        <li>
                                            <strong><a href="#">By: Navanth Auro</a></strong>
                                        </li>
                                        <li class="float-right mr-0">
                                            <a href="#"><i class="fa fa-commenting-o"></i></a>205
                                        </li>
                                        <li class="float-right">
                                            <a href="#"><i class="fa fa-calendar"></i></a>328
                                        </li>
                                    </ul>
                                </div>
                                <h3>
                                    <a href="blog-details.html">Alpha Hotel Pars Studiorum</a>
                                </h3>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item slide-box">
                        <div class="blog-1">
                            <div class="blog-image">
                                <img src="{{ asset('fe/img/blog/img-5.jpg') }}" alt="image" class="img-fluid w-100" />
                                <div class="profile-user">
                                    <img src="{{ asset('fe/img/avatar/avatar-3.jpg') }}" alt="user" />
                                </div>
                                <div class="date-box"><span>14</span>Sep</div>
                            </div>
                            <div class="detail">
                                <div class="post-meta clearfix">
                                    <ul>
                                        <li>
                                            <strong><a href="#">By: Tanzim</a></strong>
                                        </li>
                                        <li class="float-right mr-0">
                                            <a href="#"><i class="fa fa-commenting-o"></i></a>205
                                        </li>
                                        <li class="float-right">
                                            <a href="#"><i class="fa fa-calendar"></i></a>328
                                        </li>
                                    </ul>
                                </div>
                                <h3>
                                    <a href="blog-details.html">Best Night Photo at Alpha Hotel
                                    </a>
                                </h3>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item slide-box">
                        <div class="blog-1">
                            <div class="blog-image">
                                <img src="{{ asset('fe/img/blog/img-6.jpg') }}" alt="image" class="img-fluid w-100" />
                                <div class="profile-user">
                                    <img src="{{ asset('fe/img/avatar/avatar-3.jpg') }}" alt="user" />
                                </div>
                                <div class="date-box"><span>14</span>Sep</div>
                            </div>
                            <div class="detail">
                                <div class="post-meta clearfix">
                                    <ul>
                                        <li>
                                            <strong><a href="#">By: Tanzim</a></strong>
                                        </li>
                                        <li class="float-right mr-0">
                                            <a href="#"><i class="fa fa-commenting-o"></i></a>205
                                        </li>
                                        <li class="float-right">
                                            <a href="#"><i class="fa fa-calendar"></i></a>328
                                        </li>
                                    </ul>
                                </div>
                                <h3>
                                    <a href="blog-details.html">Best Night Photo at Alpha Hotel
                                    </a>
                                </h3>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's
                                </p>
                            </div>
                        </div>
                    </div>
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
                            <h2>Our Partners</h2>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.
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
