@extends('client.layouts.partials.l-sidebar')
@section('title', 'Lịch sử giao dịch')
@section('main')
<div class="row sidebar">
    <h4 class="my-3">Lịch sử giao dịch</h4>
    <hr class="dashed-line">
    <div class="col-lg-12 col-md-12 col-sm-12 py-4">
        <!-- Contact form start -->
        <div class="table-responsive">
            <table class="table align-middle" id="tech-companies-1">
                <thead class="table-light">
                    <th style="width:5%">STT</th>
                    <th style="width:15%">Hành động</th>
                    <th style="width:12%">Số tiền</th>
                    <th style="width:10%">Số point</th>
                    <th style="width:10%">Trạng thái</th>
                    <th style="width:10%">Gói</th>
                    <th style="width:10%">Nội dung</th>
                    <th style="width:10%">Thời gian</th>
                </thead>
                <tbody class="align-items-center p-4">
                    @foreach ($data as $key => $value)
                    <tr class="">
                        <td>{{ $key + 1 }}</td>
                        <td class="">
                            @if( $value->action ==='import')
                            Nạp tiền
                            @else
                            Mua dịch vụ
                            @endif

                        </td>
                        <td>
                            @if ($value->action ==='import')
                            <p class="d-flex text-success"> +{{ number_format( $value->price_promotion).' VND' }} </p>
                            @else
                            <p class="text-danger"> -{{ number_format( $value->point).' Point' }} </p>
                            @endif

                        </td>
                        <td>
                            {{ $value->point_persent ? $value->point_persent.' Point'  : '---' }}
                        </td>
                        <td>
                            @if($value->status ==='pending')
                            <p style="color: orange">
                                Đang chờ xử lí
                            </p>
                            @elseif ($value->status ==='accept')
                            <p style="color: green">Thành công</p>
                            @else
                            <p style="color: red">
                                Thất bại
                            </p>

                            @endif
                        </td>
                        <td>
                            @if ($value->action ==='export')
                            <p class=""> {{ $value->room_post->service->name }}</p>
                            @else
                            <p class="">---</p>
                            @endif
                        </td>
                        <td>
                            @if ($value->action ==='import')
                            <p class=""> {{ $value->verification }}</p>
                            @else
                            <p class="">---</p>
                            @endif
                        </td>

                        <td>{{ $value->created_at}}</td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
            <!-- Contact form end -->
        </div>
    </div>
</div>
<!-- Modal -->
@foreach ($data as $key => $value)
<div class="modal fade rounded" id="exampleModalToggle{{ $value->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel"><i class="text-primary fa-solid fa-wallet fa-2xl mx-2"></i>
                    Tin đăng phòng {{ $value->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row my-3">
                        <div class="col-md-4 fw-bold">Tên:</div>
                        <div class="col-md-8">{{ $value->name }}</div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4 fw-bold">Địa chỉ:</div>
                        <div class="col-md-8">{{ $value->address_full }}
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4 fw-bold">Giá tiền:</div>
                        <div class="col-md-8">{{ $value->price }}VND/tháng</div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4 fw-bold">Diện tích:</div>
                        <div class="col-md-8">{{ $value->acreage }}m2</div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4 fw-bold">Mô tả:</div>
                        <div class="col-md-8">{!! $value->description !!}</div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4 fw-bold">Liên hệ:</div>
                        <div class="col-md-8">{{ $value->fullname }}</div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4 fw-bold">Điện thoại:</div>
                        <div class="col-md-8">{{ $value->phone }}</div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4 fw-bold">Zalo:</div>
                        <div class="col-md-8">{{ $value->zalo }}</div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4 fw-bold">Ngày đăng:</div>
                        <div class="col-md-8">{{ $value->created_at->format('d-m-Y') }}</div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-4 fw-bold">Ngày hết hạn:</div>
                        <div class="col-md-8">{{ $value->created_at->format('d-m-Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@push('scripts')
<script>
    new DataTable('#tech-companies-1');
</script>
@endpush
