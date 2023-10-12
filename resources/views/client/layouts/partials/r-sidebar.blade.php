<div class="sidebar">
    @foreach ($global_sidebar_top_ad as $item)
        <div class="social-media sidebar-widget clearfix">
            <a href="{{ $item->url }}">
                <div class="photo-thumbnail p-2">
                    <div class="">
                        @if ($item->image && asset($item->image))
                            <img class="w-100" src="{{ asset($item->image) }}" alt="photo" height="200px">
                        @else
                            <img class=" w-100" src="{{ asset('no_image.jpg') }}" alt="photo" height="200px">
                        @endif
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    <!-- Top 10 -->
    @if (room_posts())
        @if (count(room_posts()))
            <div class="sidebar-widget recent-news" style="padding: 12px">
                <div class="main-title-2">
                    <h5>Top 10 phòng trọ</h5>
                </div>
                @foreach (room_posts() as $key => $post)
                    <div class="recent-news-item mb-3">
                        <div class="thumb">
                            <a href="#">
                                <img src="{{ asset($post->image) }}" alt="small-img" style="width: 80px; height: 80px;">
                            </a>
                        </div>
                        <div class="content">
                            <h5 class="media-heading">
                                <a
                                    href="{{ route('room-post-detail', $post->id) }}">{{ substr($post->name, 0, 30) }}...</a>
                            </h5>
                            <div class="listing-post-meta">
                                {{ number_format($post->price) }}
                                VND/Tháng
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
            <h5>Danh mục phòng</h5>
        </div>
        <ul class="list-unstyled list-cat">
            @if (categories())
                @foreach (categories() as $value)
                    <li><a href="#">{{ $value->name }}<span>({{ $value->room_posts_count }})</span></a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>

    <!-- Bài viết gần đây -->

    @if (posts())
        @if (count(posts()))
            <div class="sidebar-widget recent-news">
                <div class="main-title-2">
                    <h1>Bài viết gần đây</h1>
                </div>
                @foreach (posts() as $value)
                    <div class="recent-news-item mb-3">
                        <div class="thumb">
                            <a href="#">
                                <img src="{{ asset($value->image) }}" alt="small-img">
                            </a>
                        </div>
                        <div class="content">
                            <h3 class="media-heading">
                                <a href="{{ route('posts-detail', $value->id) }}">{{ substr($value->title,0,25)}}
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endif

    @foreach ($global_sidebar_bottom_ad as $item)
        <div class="social-media sidebar-widget clearfix">
            <a href="{{ $item->url }}">
                <div class="photo-thumbnail p-2">
                    <div class="">
                        @if ($item->image && asset($item->image))
                            <img class="w-100" src="{{ asset($item->image) }}" alt="photo" height="200px">
                        @else
                            <img class=" w-100" src="{{ asset('no_image.jpg') }}" alt="photo" height="200px">
                        @endif
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
