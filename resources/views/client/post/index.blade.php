@extends('client/layouts/master')
@section('content')
    <!-- Content -->
    <h2 style="text-align: center">Danh sách bài viết</h2>
    <!-- Blog body start -->
    <div class="blog-body content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <!-- Blog box start -->
                    @if (isset($data))
                        @if (count($data) > 0)
                            @foreach ($data as $key => $value)
                            <div class="blog-1">
                                <div class="blog-image">
                                    <div>
                                        <img src="{{ $value->image }}" alt="Ảnh tin tức" class="img-fluid w-100" style="height: 500px;">
                                    </div>

                                    <div class="profile-user">
                                        <img src="{{ $value->user->avatar }}" alt="user">
                                    </div>
                                    <div class="date-box" style="width: 116px;height: 70px">
                                        <span>{{ $value->updated_at }}</span>
                                    </div>
                                </div>
                                <div class="detail">
                                    <div class="post-meta clearfix">
                                        <ul>
                                            <li>
                                                <strong><a href="#">{{ $value->user->name }}</a></strong>
                                            </li>

                                            <li class="float-right"><a href="#"><i class="fa fa-eye"></i></a>{{ number_format($value->view) }}</li>
                                        </ul>
                                    </div>
                                    <h3>
                                        <a href="blog-details.html">{{ $value->metaTitle }}</a>
                                    </h3>
                                    <p>{{ $value->metaDescription }}</p>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    @endif
                    <!-- Blog box end -->

                    <!-- Phân trang -->
                    <div class="pagination-box">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>
                                </li>
                                <li class="page-item"><a class="page-link active" href="blog-right-sidebar.html">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="blog-right-sidebar.html">2</a></li>
                                <li class="page-item"><a class="page-link" href="blog-right-sidebar.html">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="blog-full-width.html"><i
                                            class="fa fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- End phân trang -->
                </div>

                @include('client.layouts.partials.r-sidebar')
        </div>
    </div>
    <!-- Blog body end -->
@endsection
