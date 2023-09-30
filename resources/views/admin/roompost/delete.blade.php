@extends('admin.layouts.master')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="mt-0">Danh sách phòng trong thùng rác</h5>
                <div class="table-responsive">
                    <table class="table table-centered mb-0" id="tech-companies-1">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th data-priority="1">Ảnh đại diện</th>
                                <th data-priority="1">Tên phòng</th>
                                <th data-priority="3">Giá</th>
                                <th data-priority="3">Diện tích</th>
                                <th data-priority="1">Địa chỉ</th>
                                <th data-priority="1">Trạng thái</th>
                                <th data-priority="1">Kiểm duyệt</th>
                                <th data-priority="3">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr id="row_@item.ID">
                                    <td class="tabledit-view-mode">{{ $value->id }}</td>
                                    <td class="tabledit-view-mode">
                                        <img src="{{ asset($value->image) }}" style="width: 40px; height: 40px" />
                                    </td>
                                    <td class="tabledit-view-mode">{{ $value->name }}</td>
                                    <td class="tabledit-view-mode">{{ $value->price }}</td>
                                    <td class="tabledit-view-mode">{{ $value->acreage }}</td>
                                    <td class="tabledit-view-mode">{{ $value->address_full }}</td>
                                    <td class="tabledit-view-mode">{{ $value->status == 'active' ? "Hoạt động" : "Không hoạt động" }}</td>
                                    <td class="tabledit-view-mode">
                                        <div class="dropdown">
                                            <select id="{{ $value->id }}" class="btn btn-success">
                                                <option value="action">Chờ xác nhận</option>
                                                <option value="another-action">Đã xác nhận</option>
                                                <option value="something-else">Huỷ</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td style="white-space: nowrap; width: 1%;">
                                        <a href="{{ route('admin-roompost-restore', $value->id) }}">
                                            <button type="submit" onclick="return confirm('Bạn có muốn thêm lại?')"
                                                class="btn btn-primary my-1" style="width: 45px;">
                                                <!-- Đặt kích thước cố định là 100px -->
                                                <i class="fe-refresh-ccw fs-4"></i>
                                            </button>
                                        </a>

                                        <form action="{{ route('admin-roompost-permanently-delete', $value->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Bạn có muốn xoá vĩnh viễn?')"
                                                class="btn btn-danger my-1" style="width: 45px;">
                                                <!-- Đặt kích thước cố định là 100px -->
                                                <i class="fa-solid fa-trash fs-4"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end .table-responsive-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div>
@endsection
@push('scripts')
    <script>
        new DataTable('#tech-companies-1');
    </script>
@endpush
