@extends('client/layouts/master')
@section('content')
<!-- Sub banner start -->
<div class="sub-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Tìm Kiếm</h1>
        </div>
        <nav class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Room Search</li>
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

                    @foreach ($room as $item)
                    <div class="row hotel-box-list-2">
                        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12" style="position: relative;">
                            <a href="#" class=""
                               style="position: absolute; top: 15px ; right: 25px;z-index: 999;">
                                <svg xmlns="http://www.w3.org/2000/svg" height="2em"
                                     viewBox="0 0 384 512">
                                    <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>svg {
                                        fill: #F4A460
                                    }</style>
                                    <path d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"/>
                                </svg>
                            </a>
                            <div class="photo-thumbnail p-lg-2 p-sm-2">
                                <div class="">
                                    <img src="{{ asset('fe/img/room/img-10.jpg')}}" alt="photo" class="img-fluid w-100">
                                    <a href="rooms-details.html">
                                        <span class="blog-one__plus"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7 col-sm-12">
                            <div class="heading mt-2">
                                <div class="main-title-2 clearfix">
                                    <a href="rooms-details.html" class="pull-left"><h5>{{ $item->name }}</h5></a>
                                    <span style="color: #F4A460;font-size: 15px;"
                                          class="pull-right">{{ $item->price }}/Tháng</span>
                                </div>
                                <span style="color: #F4A460;font-size: 15px;"
                                          class="pull-right">Diện tích: {{ $item->areage }}</span>
                                <span style="color: #F4A460;font-size: 15px;"
                                          class="pull-right">Khu vực: {{ $item->wards_id }}</span>
                                <span style="color: #F4A460;font-size: 15px;"
                                          class="pull-right">Loại phòng: {{ $item->id_cate_room }}</span>
                                <p>Lorem ipsum dolor sit amet, conser adipiscing elit. Maecenas in pulvinar neque. Nulla
                                    ....</p>
                            </div>
                            <hr class="mt-3">
                            <div class="heading-rooms gap-5 text-sm-center align-items-center row">
                                <div class="row text-sm-center">
                                    <div class="col-md-8 col-6 d-flex">
                                        <div class=""
                                             style=" background-image: url(https://picsum.photos/200);background-size: contain;  background-repeat: no-repeat; border-radius: 50%; border: 2px solid #a1a1a1; height: 45px; margin: 5px; padding: 10px;  width:45px;">
                                        </div>
                                        <div class="text-center  ">
                                            <a>Nguyễn Quang Phúc</a>
                                            <p class="">Đăng hôm nay </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <button style="background-color: #F4A460" class="btn rounded-3">
                                            <div class=" d-flex gap-2 align-items-center">
                                                <i class="fa fa-phone"></i>
                                                <a href="tel:0477-0477-8556-552">0477 8556 </a>
                                            </div>
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    @endforeach

                </div>
                {{$room->links()}}
                <div class="row hbl-2 g-0 p-lg-3">
                    <h3> Tìm theo từ khóa</h3>
                    <div class="sidebar-widget tags-box">
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
            <div class="col-lg-4 col-md-12 col-sm-5">

                <div class="sidebar ">
                    <div class="social-media sidebar-widget clearfix">
                        <div class="photo-thumbnail p-2">
                            <div class=" ">
                                <img src="{{ asset('fe/img/room/img-7.jpg') }}" alt="photo" class="img-fluid w-100">
                                <a href="rooms-details.html">
                                    <span class="blog-one__plus"></span>
                                </a>
                            </div>
                        </div>
                        <div class="photo-thumbnail p-2">
                            <div class=" ">
                                <img src="{{ asset('fe/img/room/img-7.jpg') }}" alt="photo" class="img-fluid w-100">
                                <a href="rooms-details.html">
                                    <span class="blog-one__plus"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Search area box 3 start -->
                    <!-- Lọc theo cate -->
                    <!-- filter price -->
                    <div class="sidebar-widget search-area-box-3 clearfix ">
                        <h3>Lọc theo giá</h3>
                        <form>
                            <div class="mb-3">
                                <label for="priceRange" class="form-label">Chọn khoảng giá:</label>
                                <input type="range" class="form-range" id="priceRange" min="0" max="1000" step="10">
                                <div class="d-flex justify-content-between">
                                    <span>Từ: $<span id="minPriceValue">0</span></span>
                                    <span>Đến: $<span id="maxPriceValue">1000</span></span>
                                </div>
                            </div>
                            <button type="submit" style="background-color: #F4A460" class="btn">Lọc</button>
                        </form>
                    </div>
                    <div class="sidebar-widget category-posts">
                        <div class="main-title-2">
                            <h1>Khu vực </h1>
                        </div>
                        <ul class="list-unstyled list-cat">
                            <li><a href="#">Hà Đông<span>(45)</span></a></li>
                            <li><a href="#">Đống Đa <span>(21)</span></a></li>
                            <li><a href="#">Nam Từ Liêm <span>(23)</span></a></li>
                            <li><a href="#">Thanh Xuân<span>(19)</span></a></li>
                            <li><a href="#">Mỹ Đình <span>(19)</span></a></li>
                            <li><a href="#">Other <span>(22)</span></a></li>
                        </ul>
                    </div>
                    <div class="sidebar-widget category-posts">
                        <div class="main-title-2">
                            <h1>Diện tích </h1>
                        </div>
                        <ul class="list-unstyled list-cat">
                            <li><a href="#">Dưới 25m2<span>(45)</span></a></li>
                            <li><a href="#">Từ 25m2-40m2 <span>(21)</span></a></li>
                            <li><a href="#">Từ 40m2-70m2 <span>(23)</span></a></li>
                            <li><a href="#">Từ 70m2-100m2<span>(19)</span></a></li>
                            <li><a href="#">Từ 100m2-200m2 <span>(19)</span></a></li>
                            <li><a href="#">Trên 200m2<span>(22)</span></a></li>
                        </ul>
                    </div>

                    <div class="social-media sidebar-widget clearfix">
                        <div class="photo-thumbnail p-2">
                            <div class=" ">
                                <img src="{{ asset('fe/img/room/img-14.jpg') }}" alt="photo" class="img-fluid w-100">
                                <a href="rooms-details.html">
                                    <span class="blog-one__plus"></span>
                                </a>
                            </div>
                        </div>
                        <div class="photo-thumbnail p-2">
                            <div class=" ">
                                <img src="{{ asset('fe/img/room/img-16.jpg') }}" alt="photo" class="img-fluid w-100">
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
