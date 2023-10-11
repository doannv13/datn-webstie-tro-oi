@extends('client.layouts.partials.l-sidebar')
@section('title', 'Danh sách tin đăng')
@section('main')
    <div class="row sidebar">
        <h4 class="my-3">Danh sách tin đăng</h4>
        <hr class="dashed-line">
        <div class="col-lg-12 col-md-12 col-sm-12 py-4">
            <!-- Contact form start -->
            <div class="table-responsive">
                <table class="table align-middle" id="tech-companies-1">
                    <thead class="table-light">
                        <th style="width:5%">STT</th>
                        <th style="width:10%">Ảnh chính</th>
                        <th style="width:20%">Name</th>
                        {{-- <th style="width:15%">Địa chỉ</th> --}}
                        <th style="width:10%">Trạng thái</th>
                        <th style="width:10%">Ngày bắt đầu</th>
                        <th style="width:10%">Ngày kết thúc</th>
                        <th style="width:5%">Thao tác</th>
                    </thead>
                    <tbody class="align-items-center p-4">
                        @foreach ($data as $key => $value)
                            <tr class="">
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <img src="{{ asset($value->image) }}" style="width: 100px;height: 100px;">
                                </td>
                                <td>
                                    {{ $value->name }}
                                </td>
                                {{-- <td>
                                    {{ substr($value->address_full, 0, 20) }}
                                </td> --}}
                                <td>
                                    @if ($value->status == 'pendding')
                                        {!! '<div class="btn btn-warning">Chờ xử lý</div>' !!}
                                    @elseif($value->status == 'accept')
                                        {!! '<div class="btn btn-success">Kích hoạt</div>' !!}
                                    @else
                                        {!! '<div class="btn btn-danger">Đã huỷ</div>' !!}
                                    @endif
                                </td>
                                <td>{{ $value->created_at->format('d-m-Y') }}</td>
                                <td>{{ $value->created_at->format('d-m-Y') }}</td>
                                <td class="">
                                    <div class="d-flex justify-content-around align-items-center">
                                        <!-- Button trigger modal -->
                                        <button class="btn btn-success  my-1" style="font-size: 13px" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalToggle{{ $value->id }}">
                                            <i class="fas fa-eye fs-5"></i>
                                        </button>

                                        <a href="{{ route('room-posts.edit', $value->id) }}">
                                            <button type="submit" class="btn btn-primary text-center" style="width: 45px;">
                                                <!-- Đặt kích thước cố định là 100px -->
                                                <i class="fa-solid fa-pen-to-square fs-5"></i>
                                            </button>
                                        </a>
                                        <form action="{{ route('room-posts.destroy', $value->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger my-1 " style="width: 45px;"
                                                onclick="return confirm('Bạn có muốn thêm vào thùng rác')">
                                                <!-- Đặt kích thước cố định là 100px -->
                                                <i class="fa-solid fa-trash fs-5"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <a class="btn btn-primary" href="{{ route('services-room.index') }}">Mua
                                        gói dịch vụ</a>
                                </td>
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
        <div class="modal fade rounded" id="exampleModalToggle{{ $value->id }}" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel"><i
                                class="text-primary fa-solid fa-wallet fa-2xl mx-2"></i>
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
