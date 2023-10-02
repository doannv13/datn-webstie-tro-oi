@extends('client.layouts.master')
@section('content')

<!-- Content -->
<h2 style="text-align: center">Book mark</h2>
<!-- Blog body start -->
<div class="blog-body content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 d-flex flex-column">
                <!-- Blog box start -->
                {{-- <div class="row d-flex flex-wrap ">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="hotel-box " style="position: relative;">
                            <a href="#" class="" style="position: absolute; top: 15px ; right: 15px;z-index: 999;">
                                <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"/></svg>
                            </a>
                            <!-- Photo thumbnail -->
                            <div class="photo-thumbnail" style="position: relative;">
                                <div class="text-white" style="position: absolute; bottom:10px ; left: 15px;z-index: 100;">
                                    $567.99
                                </div>
                                <div class="photo">
                                    <img src="img/room/img-1.jpg" alt="photo" class="img-fluid w-100">
                                    <a href="rooms-details.html">
                                        <label class="" style="cursor: pointer; font-size: 20px;" for="">View detail</label>
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
                                        <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
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
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="hotel-box " style="position: relative;">
                            <a href="#" class="" style="position: absolute; top: 15px ; right: 15px;z-index: 999;">
                                <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"/></svg>
                            </a>
                            <!-- Photo thumbnail -->
                            <div class="photo-thumbnail" style="position: relative;">
                                <div class="text-white" style="position: absolute; bottom:10px ; left: 15px;z-index: 100;">
                                    $567.99
                                </div>
                                <div class="photo">
                                    <img src="img/room/img-1.jpg" alt="photo" class="img-fluid w-100">
                                    <a href="rooms-details.html">
                                        <label class="" style="cursor: pointer; font-size: 20px;" for="">View detail</label>
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
                                        <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
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
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="hotel-box " style="position: relative;">
                            <a href="#" class="" style="position: absolute; top: 15px ; right: 15px;z-index: 999;">
                                <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#F4A460}</style><path d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/></svg>
                            </a>
                            <!-- Photo thumbnail -->
                            <div class="photo-thumbnail" style="position: relative;">
                                <div class="text-white" style="position: absolute; bottom:10px ; left: 15px;z-index: 100;">
                                    $567.99
                                </div>
                                <div class="photo">
                                    <img src="img/room/img-1.jpg" alt="photo" class="img-fluid w-100">
                                    <a href="rooms-details.html">
                                        <label class="" style="cursor: pointer; font-size: 20px;" for="">View detail</label>
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
                                        <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
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

                </div> --}}
                <div class="row wow fadeInUp delay-04s">
                    @if(isset($data))
                    @if(count($data)>0)
                    @foreach($data as $key =>$value)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="hotel-box " style="position: relative;">
                                <form action="{{ route('unbookmarkbm', $value->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button style="position: absolute; top: 15px; right: 15px; z-index: 999; background: none; border: none">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#f4a460}</style><path d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9-4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/></svg>
                                    </button>
                                </form>
                            <!-- Photo thumbnail -->
                            <div class="photo-thumbnail" style="position: relative;">
                                <div class="text-white" style="position: absolute; bottom:10px ; left: 15px;z-index: 100;">
                                    {{number_format($value->roomPost->price)}} VND/Tháng
                                </div>
                                <div class="photo">
                                    <img src="{{ $value->roomPost->image}}" alt="photo" class="img-fluid w-100">
                                    <a href="rooms-details.html">
                                        <label class="" style="cursor: pointer; font-size: 20px;" for="">Xem Chi Tiết</label>
                                    </a>
                                </div>

                            </div>
                            <!-- Detail -->
                            <div class="detail clearfix">
                                <h3>
                                    <a href="rooms-details.html">{{$value->roomPost->name}}</a>
                                </h3>
                                <p class="location">
                                    <a href="rooms-details.html">
                                        <i class="fa fa-map-marker"></i>{{$value->roomPost->address_full}}
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

                <!-- Blog box end -->

                <!-- Phân trang -->
                {{ $data->links() }}
                <!-- End phân trang -->
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="sidebar">
                    <!-- Top 10 -->
                    @if($room_posts)
                        @if(count($room_posts))
                        <div class="sidebar-widget recent-news">
                            <div class="main-title-2">
                                <h1>Top 10 phòng trọ</h1>
                            </div>
                            @foreach ($room_posts as $key => $post)

                            @endforeach
                            <div class="recent-news-item mb-3">
                                <div class="thumb">
                                    <a href="#">
                                        <img src="{{ $post->image }}" alt="small-img">
                                    </a>
                                </div>
                                <div class="content">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">{{ $post->name }}</a>
                                    </h3>
                                    <div class="listing-post-meta">
                                        {{ $post->price }}
                                    </div>
                                    <div>
                                        @if(count($post->facilities)>0)
                                        <ul class="row facilities-list clearfix">
                                            @foreach ($value->facilities as $value)
                                                <li class="col-2">
                                                    <i class="flaticon-bed"></i>
                                                </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    @endif


                    <!-- Danh mục -->
                    <div class="sidebar-widget category-posts">
                        <div class="main-title-2">
                            <h1>Danh mục phòng</h1>
                        </div>
                        <ul class="list-unstyled list-cat">
                            @if($categories)
                                @foreach ($categories as $value)
                                    <li><a href="#">{{ $value->name }}<span>({{ $value->room_posts_count }})</span></a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>

                    <!-- Bài viết gần đây -->

                        @if($posts)
                            @if(count($posts))
                            <div class="sidebar-widget recent-news">
                                <div class="main-title-2">
                                    <h1>Bài viết gần đây</h1>
                                </div>
                                @foreach ($posts as $value)
                                    <div class="recent-news-item mb-3">
                                        <div class="thumb">
                                            <a href="#">
                                                <img src="{{ $value->image}}" alt="small-img">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h3 class="media-heading">
                                                <a href="rooms-details.html">{{ $value->title}}</a>
                                            </h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @endif
                        @endif


                    <!-- Tag -->
                    <div class="sidebar-widget tags-box">
                        <div class="main-title-2">
                            <h1>Tags</h1>
                        </div>
                        <ul class="tags">
                            <li><a href="#">Gần trường</a></li>
                            <li><a href="#">Khuyến mãi</a></li>
                            <li><a href="#">View đẹp</a></li>
                            <li><a href="#">Chung cư</a></li>
                            <li><a href="#">Nhà trọ</a></li>
                            <li><a href="#">Nam Từ Liêm</a></li>
                            <li><a href="#">Đống Đa</a></li>
                            <li><a href="#">Hồ Tây</a></li>
                        </ul>
                    </div>
                    <!-- Truyền thông -->
                    <div class="social-media sidebar-widget clearfix">
                        <div class="main-title-2">
                            <h1>Truyền thông</h1>
                        </div>
                        <ul class="social-list">
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="rss-bg"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
