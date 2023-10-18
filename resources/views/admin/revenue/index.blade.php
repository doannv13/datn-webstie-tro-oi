@extends('admin.layouts.master')
@section('title', 'Doanh Thu')
@section('content')

<div class="row">
    <form class="d-flex gap-2 mb-2" action="{{'admin-report-revenue'}}" method="post">
        @csrf
        @method('post')
        <div class="mt-1">
            <label for="example-disable" class="form-label">Thời gian</label>
            <input type="datetime-local" name="date_time" class="form-control" value="@if(isset($date_time)){{$date_time}}@endif">
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary waves-effect waves-light">Xem báo cáo</button>
        </div>
    </form>
    <div class="col-xl-3 col-md-6">

        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
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

                <h4 class="header-title mt-0 mb-4">Tổng Doanh Thu</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <h2>{{number_format($revenue)}}</h2>
                        <!-- <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 " data-bgColor="#F9B9B9" value="{{$revenue}}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" /> -->
                    </div>


                    <div class="widget-detail-1 text-end">
                        <h3 class="fw-normal pt-2 mb-1"> {{number_format($revenue_today)}} </h3>
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
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
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

                <h4 class="header-title mt-0 mb-3">Số hóa đơn hủy</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-end">
                        <span class="badge bg-success rounded-pill float-start mt-3"> {{number_format($bill)}}<i class="mdi mdi-trending-up"></i> </span>
                        <h2 class="fw-normal mb-1">{{number_format($bill_false)}} </h2>
                        <p class="text-muted mb-3">Tổng hóa đơn</p>
                    </div>
                    <div class="progress progress-bar-alt-success progress-sm">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="@if($bill!=0){{100-($bill_false%$bill)}}@else 100 @endif" aria-valuemin="0" aria-valuemax="100" style="width: @if($bill!=0){{100-($bill_false%$bill)}}@else 100 @endif%;">
                            <span class="visually-hidden">@if($bill!=0&&$bill_false!=0){{100-($bill_false%$bill)}}@else 100 @endif% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
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

                <h4 class="header-title mt-0 mb-4">Doanh thu mua dịch vụ</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <h2 class="fw-normal mb-1"> {{number_format($revenue_service)}}</h2>
                        <!-- <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#ffbd4a" data-bgColor="#FFE6BA" value="80" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" /> -->
                    </div>
                    <div class="widget-detail-1 text-end">
                        <h3 class="fw-normal pt-2 mb-1"> {{number_format($revenue_service_today)}}</h3>
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
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
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

                <h4 class="header-title mt-0 mb-3">TB doanh thu / HĐ</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-end">
                        <span class="badge bg-pink rounded-pill float-start mt-3">@if($bill!=0){{number_format($revenue/$bill)}}@else 0 @endif <i class="mdi mdi-trending-up"></i> </span>
                        <h3 class="fw-normal mb-1">@if ($bill_today!=0)
                            {{number_format($revenue_today/$bill_today)}}
                            @else
                            0
                            @endif
                        </h3>
                        <p class="text-muted mb-3">Hôm nay</p>
                    </div>
                    <div class="progress progress-bar-alt-pink progress-sm">
                        <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="@if ($bill_today!=0&&$bill!=0)
                        {{number_format(($revenue_today/$bill_today)/($revenue/$bill))}}
                        @else
                        100
                        @endif" aria-valuemin="0" aria-valuemax="100" style="width:@if($bill_today!=0&&$bill!=0) {{100-(($revenue_today/$bill_today)/($revenue/$bill))}}@else 100 @endif %;">
                            <span class="visually-hidden">@if($bill_today!=0&&$bill!=0){{100-(($revenue_today/$bill_today)/($revenue/$bill))}}@else 99 @endif % Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- end col -->

</div>
<div class="row">
    <div class="">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
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

                <h4 class="header-title mt-0 mb-3">Advanced Smil Animations</h4>

                <div id="smil-animations" class="ct-chart ct-golden-section"></div>
            </div>
        </div>

    </div><!-- end col-->


</div>
<!-- end row -->
@endsection

@push('scripts')
<script>
    new DataTable('#tech-companies-1');
</script>
@endpush