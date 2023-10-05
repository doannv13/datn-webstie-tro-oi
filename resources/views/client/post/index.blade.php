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
                                <img src="{{ $value->image }}" alt="img-2" class="img-fluid w-100 h-100">
                            </div>

                            <div class="profile-user">
                                <img src="img/avatar/avatar-1.jpg" alt="user">
                            </div>
                            <div class="date-box">
                                <span>09</span>Sep
                            </div>
                        </div>
                        <div class="detail">
                            <div class="post-meta clearfix">
                                <ul>
                                    <li>
                                        <strong><a href="#">By: Auro Navanth</a></strong>
                                    </li>
                                    <!-- <li class="float-right mr-0"><a href="#"><i class="fa fa-commenting-o"></i></a>205</li>
                                <li class="float-right"><a href="#"><i class="fa fa-calendar"></i></a>328</li> -->
                                </ul>
                            </div>
                            <h3>
                                <a href="blog-details.html">Kinh nghiệm thuê nhà trọ không bị lừa</a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, conser adipiscing elit. Maecenas in pulvinar neque. Nulla
                                finibus lobortis pulvinar. Donec a conser nulla. Nulla posuere sapien vitae lectus
                                suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis
                                fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum
                                facilisis massa, a consequat purus viverra a. Aliquam pellentesque nibh et nibh feugiat
                                gravida. Maecenas ultricies, diam vitae semper placerat,</p>
                        </div>
                    </div>
                            @endforeach
                        @endif
                    @endif

                    <div class="blog-1">
                        <div class="blog-image">
                            <img src="img/blog/img-5.jpg" alt="img-2" class="img-fluid w-100">
                            <div class="profile-user">
                                <img src="img/avatar/avatar-2.jpg" alt="user">
                            </div>
                            <div class="date-box">
                                <span>04</span>Sep
                            </div>
                        </div>
                        <div class="detail">
                            <div class="post-meta clearfix">
                                <ul>
                                    <li>
                                        <strong><a href="#">By: Auro Navanth</a></strong>
                                    </li>
                                    <!-- <li class="float-right mr-0"><a href="#"><i class="fa fa-commenting-o"></i></a>205</li>
                                <li class="float-right"><a href="#"><i class="fa fa-calendar"></i></a>328</li> -->
                                </ul>
                            </div>
                            <h3>
                                <a href="blog-details.html">Kinh nghiệm thuê nhà trọ không bị lừa</a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, conser adipiscing elit. Maecenas in pulvinar neque. Nulla
                                finibus lobortis pulvinar. Donec a conser nulla. Nulla posuere sapien vitae lectus
                                suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis
                                fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum
                                facilisis massa, a consequat purus viverra a. Aliquam pellentesque nibh et nibh feugiat
                                gravida. Maecenas ultricies, diam vitae semper placerat,</p>
                        </div>
                    </div>
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
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="sidebar">
                        <!-- Top 10 -->
                        @if ($room_posts)
                            @if (count($room_posts))
                                <div class="sidebar-widget recent-news">
                                    <div class="main-title-2">
                                        <h1>Top 10 phòng trọ</h1>
                                    </div>
                                    @foreach ($room_posts as $key => $post)
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
                                                    @if (count($post->facilities) > 0)
                                                        <ul class="row facilities-list clearfix">
                                                            @foreach ($post->facilities as $value)
                                                                <li class="col-2">
                                                                    <i class="flaticon-bed"></i>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                        @endif


                    <!-- Danh mục -->
                        <div class="sidebar-widget category-posts">
                            <div class="main-title-2">
                                <h1>Danh mục phòng</h1>
                            </div>
                            <ul class="list-unstyled list-cat">
                                @if ($categories)
                                    @foreach ($categories as $value)
                                        <li><a
                                                href="#">{{ $value->name }}<span>({{ $value->room_posts_count }})</span></a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <!-- Bài viết gần đây -->

                        @if ($posts)
                            @if (count($posts))
                                <div class="sidebar-widget recent-news">
                                    <div class="main-title-2">
                                        <h1>Bài viết gần đây</h1>
                                    </div>
                                    @foreach ($posts as $value)
                                        <div class="recent-news-item mb-3">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="{{ $value->image }}" alt="small-img">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3 class="media-heading">
                                                    <a href="rooms-details.html">{{ $value->title }}</a>
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
    <!-- Blog body end -->
@endsection
