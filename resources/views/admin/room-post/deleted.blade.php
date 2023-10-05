@extends('admin.layouts.master')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="mt-0">Thùng rác</h5>
                <!-- Contact form start -->
                <div class="table-responsive">
                    <div class="mb-2 d-flex gap-1 ">
                        <a class="btn btn-success" href="{{ route('admin-room-posts.index') }}">Danh sách</a>
                    </div>
                    <table class="table table-centered mb-0" id="tech-companies-1">
                        <thead class="table-light">
                            <th style="width:5%">STT</th>
                            <th style="width:15%">Liên hệ</th>
                            <th style="width:10%">Ảnh chính</th>
                            <th style="width:20%">Name</th>
                            <th style="width:20%">Địa chỉ</th>
                            <th style="width:10%">Ngày bắt đầu</th>
                            <th style="width:10%">Ngày kết thúc</th>
                            <th style="width:10%">Action</th>
                        </thead>
                        <tbody class="align-items-center p-4">
                            @foreach ($data as $key => $value)
                                <tr class="">
                                    <td scope="row">{{ $key + 1 }}</td>
                                    <td class="">
                                        <p>{{ $value->fullname }}</p>
                                    </td>
                                    <td>
                                        <img src="{{ asset($value->image) }}" style="width: 100px;height: 100px;">
                                    </td>
                                    <td>
                                        <p>{{ $value->name }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $value->address_full }}</p>
                                    </td>
                                    <td>{{ $value->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $value->created_at->format('d-m-Y') }}</td>

                                    <td>
                                        <div class="d-flex m-2">
                                            <button class="btn btn-success my-1" style="font-size: 13px"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModalToggle{{ $value->id }}">
                                                <i class="fas fa-eye fs-4"></i>
                                            </button>
                                            <a href="{{ route('admin-room-posts-restore', $value->id) }}"
                                                class="btn btn-primary text-center my-1 m-2"><i
                                                    class="fa-solid fa-trash-arrow-up fs-4"></i></a>
                                            <form action="{{ route('admin-room-posts-permanently-delete', $value->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Bạn có muốn xoá')"
                                                    class="btn btn-danger my-1">
                                                    <i class="fa-solid fa-delete-left text-light fs-4"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <!-- Contact form end -->
                </div>
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
                                <div class="col-md-5 fw-bold">Tên:</div>
                                <div class="col-md-7">{{ $value->name }}</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-5 fw-bold">Địa chỉ:</div>
                                <div class="col-md-7">{{ $value->address_full }}
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-5 fw-bold">Giá tiền:</div>
                                <div class="col-md-7">{{ $value->price }}VND/tháng</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-5 fw-bold">Diện tích:</div>
                                <div class="col-md-7">{{ $value->acreage }}m2</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-5 fw-bold">Mô tả:</div>
                                <div class="col-md-7">{{ $value->description }}</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-5 fw-bold">Liên hệ:</div>
                                <div class="col-md-7">{{ $value->fullname }}</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-5 fw-bold">Điện thoại:</div>
                                <div class="col-md-7">{{ $value->phone }}</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-5 fw-bold">Zalo:</div>
                                <div class="col-md-7">{{ $value->zalo }}</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-5 fw-bold">Ngày đăng:</div>
                                <div class="col-md-7">{{ $value->created_at->format('d-m-Y') }}</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-5 fw-bold">Ngày hết hạn:</div>
                                <div class="col-md-7">{{ $value->created_at->format('d-m-Y') }}</div>
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
