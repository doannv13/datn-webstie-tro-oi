@extends('admin.layouts.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="mt-0">Danh sách tin đăng</h5>
                <div class="table-responsive">
                    <div class="mb-2 d-flex gap-1 ">
                        <a class="btn btn-success" href="{{ route('admin-room-posts.create') }}">Thêm mới</a>
                        <a class="btn btn-danger" href="{{ route('admin-room-posts-deleted') }}">Thùng rác</a>
                    </div>
                    <table class="table table-centered mb-0" id="tech-companies-1">
                        <thead class="table-light">
                            <th style="width:5%">STT</th>
                            <th style="width:10%">Ảnh chính</th>
                            <th style="width:20%">Tiêu đề</th>
                            <th style="width:15%">Địa chỉ</th>
                            <th style="width:15%">Trạng thái</th>
                            <th style="width:10%">Ngày bắt đầu</th>
                            <th style="width:10%">Ngày kết thúc</th>
                            <th style="width:5%">Thao tác</th>
                        </thead>
                        <tbody class="align-items-center p-4">
                            @foreach ($data as $key => $value)
                                <tr class="al">
                                    <td scope="row">{{ $key + 1 }}</td>

                                    <td>
                                        <img src="{{ asset($value->image) }}" style="width: 100px;height: 100px;">
                                    </td>
                                    <td>
                                        <h5>{{ $value->name }}</h5>
                                    </td>
                                    <td>
                                        <h5>{{ $value->address_full }}</h5>
                                    </td>
                                    <td>
                                        <select class="form-select mb-3 toggle-class statusSelect"
                                            data-id="{{ $value->id }}" name="status" id="statusSelect">
                                            <option value="pendding"
                                                {{ $value->status == 'pendding' ? 'selected' : false }}>
                                                Chờ xử lý
                                            </option>
                                            <option value="accept" {{ $value->status == 'accept' ? 'selected' : false }}>Xác
                                                nhận
                                            </option>
                                            <option value="cancel" {{ $value->status == 'cancel' ? 'selected' : false }}>
                                                Huỷ
                                            </option>
                                        </select>
                                    </td>

                                    <td>{{ $value->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $value->created_at->format('d-m-Y') }}</td>
                                    <td class="">
                                        <div class="d-flex">
                                            <!-- Button trigger modal -->
                                            <button class="btn btn-success my-1" style="font-size: 13px"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModalToggle{{ $value->id }}">
                                                <i class="fas fa-eye fs-5"></i>
                                            </button>
                                            @if ($value->status == 'accept')
                                                <form action="{{ route('admin-room-posts.destroy', $value->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button id="deleteButton{{ $value->id }}" type="submit"
                                                        class="btn btn-danger m-1 delete-button" style="width: 45px;"
                                                        disabled onclick="return confirm('Bạn có muốn thêm vào thùng rác')">
                                                        <i class="fa-solid fa-trash fs-5"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin-room-posts.destroy', $value->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button id="deleteButton{{ $value->id }}" type="submit"
                                                        class="btn btn-danger m-1 delete-button" style="width: 45px;"
                                                        onclick="return confirm('Bạn có muốn thêm vào thùng rác')">
                                                        <i class="fa-solid fa-trash fs-5"></i>
                                                    </button>
                                                </form>
                                            @endif


                                            <a href="{{ route('admin-room-posts.edit', $value->id) }}">
                                                <button type="submit" class="btn btn-primary text-center my-1"
                                                    style="width: 45px;"> <!-- Đặt kích thước cố định là 100px -->
                                                    <i class="fa-solid fa-pen-to-square fs-5"></i>
                                                </button>
                                            </a>
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
                                <div class="col-md-7">{{ number_format($value->price) }} VND/tháng</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-5 fw-bold">Diện tích:</div>
                                <div class="col-md-7">{{ $value->acreage }}m2</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-5 fw-bold">Mô tả:</div>
                                <div class="col-md-7">{!! $value->description !!}</div>
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
        localStorage.clear();
        $(document).ready(function() {
            $(".statusSelect").change(function() {
                let status = $(this).val();
                let room_post_id = $(this).data('id');
                let deleteButton = $("#deleteButton" + room_post_id);

                if (status === 'accept') {
                    deleteButton.prop('disabled', true); // Tắt nút xoá khi status là 'accept'
                } else {
                    deleteButton.prop('disabled', false); // Bật nút xoá cho mọi trạng thái khác
                }

                console.log(room_post_id);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('admin-room-posts-status') }}',
                    data: {
                        'status': status,
                        'room_post_id': room_post_id
                    },
                    success: function(data) {
                        // console.log(data);
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                icon: 'success',
                                title: data.success,
                            });
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.error,
                            });
                        }
                    }
                });
            })
        });
    </script>
@endpush
