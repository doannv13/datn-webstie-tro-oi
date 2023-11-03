@extends('admin.layouts.master')
@section('title', 'Bài viết')
@section('content')

    <div class="row">
        <form class="d-flex gap-2 mb-2" action="{{ 'admin-report-post' }}" method="post">
            @csrf
            @method('post')
            <div class="mt-1">
                <label for="example-disable" class="form-label">Bắt đầu</label>
                <input type="datetime-local" name="date_start" class="form-control"
                    value="@if (isset($date_start)) {{ $date_start }} @endif">
            </div>
            <div class="mt-1">
                <label for="example-disable" class="form-label">Kết thúc</label>
                <input type="datetime-local" name="date_end" class="form-control"
                    value="@if (isset($date_end)) {{ $date_end }} @endif">
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Xem báo cáo</button>
            </div>
        </form>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                        </div>
                    </div>

                    <h4 class="header-title mt-0 mb-4">Tổng bài viết</h4>

                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1 float-start" dir="ltr">
                            <h2>{{ $post }}</h2>
                        </div>

                        <div class="widget-detail-1 text-end">
                            <h3 class="fw-normal pt-2 mb-1"> {{ $post_today }} </h3>
                            <p class="text-muted mb-1">Hôm nay</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                        </div>
                    </div>

                    <h4 class="header-title mt-0 mb-4">Tổng số lượt xem</h4>

                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1 float-start" dir="ltr">
                            <h2>{{ $total_views }}</h2>
                        </div>
                        <div class="widget-detail-1 text-end">
                            <h3 class="fw-normal pt-2 mb-1"> {{ $total_views_today }} </h3>
                            <p class="text-muted mb-1">Hôm nay</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                        </div>
                    </div>

                    <h4 class="header-title mt-0 mb-3">Bài viết tổng quan</h4>
                    <div id="revenue-chart"></div>
                </div>
            </div>

        </div><!-- end col-->
    </div>
@endsection

@push('scripts')
    <script>
        // Dữ liệu mẫu


        // Tạo biểu đồ

        var total_post = {!! json_encode($total_post) !!};
        const roompostData = [];
        total_post.forEach(function(total_post) {
            roompostData.push({
                date: total_post.date,
                revenue: total_post.total_posts
            });
        });
        //     const revenueData = [
        //     { date: '2023-10-13', revenue: 100 },
        //     { date: '2023-10-14', revenue: 200 },
        //     { date: '2023-10-15', revenue: 300 },
        //     { date: '2023-10-16', revenue: 400 },
        //     { date: '2023-10-17', revenue: 500 },
        //     { date: '2023-10-18', revenue: 600 },
        //     { date: '2023-10-19', revenue: 700 },
        //     { date: '2023-10-20', revenue: 800 },
        //     // Thêm các dòng dữ liệu khác tương ứng với các ngày khác
        // ];

        // Định nghĩa mảng các ngày
        const dates = roompostData.map(data => data.date);

        // Định nghĩa mảng các doanh thu
        const revenues = roompostData.map(data => data.total_posts);

        // Tạo biểu đồ sử dụng Morris.js
        new Morris.Line({
            element: 'revenue-chart',
            data: roompostData,
            xkey: 'date',
            ykeys: ['revenue'],
            labels: ['Tin đăng'],
            lineColors: ['#337ab7'],
            xLabelAngle: 45, // Góc xoay của nhãn ngày
            parseTime: false // Vô hiệu hóa tự động phân tích thời gian
        });
    </script>
@endpush
