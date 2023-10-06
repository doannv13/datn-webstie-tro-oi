@extends('client/layouts/master')
@section('content')
    <!-- Content -->
<!-- Blog body start -->
<div class="blog-body content-area-15">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                @if (isset($data))
                    <div class="blog-1 blog-big mb-50">
                        <div class="blog-image">
                            <img src="{{asset($data->image) }}" alt="Ảnh tin tức" class="img-fluid w-100" style="height: 500px;">
                            <div class="profile-user">
                                <img src="{{ asset($data->user->avatar) }}" alt="user">
                            </div>
                            <div class="date-box" style="width: 116px;height: 70px">
                                <span>{{ $data->updated_at }}</span>
                            </div>
                        </div>
                        <div class="detail">
                            <div class="post-meta clearfix">
                                <ul>
                                    <li>
                                        <strong><a href="#">By: {{ $data->user->name }}</a></strong>
                                    </li>
                                    <li class="float-right"><a href="#"><i class="fa fa-eye"></i></a>{{ number_format($data->view) }}</li>
                                </ul>
                            </div>
                            <h3>
                                <a href="blog-details.html">{{ $data->metaTitle }}</a>
                            </h3>
                            <blockquote>
                                {{ $data->metaDescription }}
                            </blockquote>
                           <br>
                            <h3>
                                <a href="blog-details.html">{{ $data->title }}</a>
                            </h3>
                            <div class="row mb-30">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <p>{!! $data->description !!}</p>
                                </div>
                            </div>
                           <div class="row clearfix tag-shere">
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    <!-- Tags box start -->
                                    <div class="tags-box hidden-mb-10">
                                        <h2>Tags</h2>
                                        <ul class="tags">
                                            <li><a href="#">Rooms</a></li>
                                            <li><a href="#">Promotion</a></li>
                                            <li><a href="#">Travel</a></li>
                                        </ul>
                                    </div>
                                @endif

                                <!-- Tags box end -->
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                <!-- Blog Share start -->
                                <div class="blog-share">
                                    <h2>Share</h2>
                                    <ul class="social-list">
                                        <li><a href="#" class="facebook-bg"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" class="twitter-bg"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" class="google-bg"><i class="fab fa-google"></i></a></li>
                                        <li><a href="#" class="rss-bg"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                </div>
                                <!-- Blog Share end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12">
                @include('client.layouts.partials.r-sidebar')
            </div>
        </div>
    </div>
</div>
<!-- Blog body end -->
@endsection
