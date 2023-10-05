<div class="col-lg-4 col-md-12 col-sm-12">
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
