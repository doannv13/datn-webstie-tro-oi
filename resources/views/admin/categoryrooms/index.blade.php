@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="responsive-table-plugin">
                        <h5 class="mt-0">Danh sách danh mục phòng đăng</h5>
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <div class="mb-2 d-flex gap-1 ">
                                    <a class="btn btn-success" href="{{ route('categoryrooms.create') }}">Thêm mới</a>
                                    <a class="btn btn-danger" href="{{ route('categoryrooms.deleted') }}">Thùng rác</a>
                                </div>
                                <table id="tech-companies-1" class="table table-centered mb-0 text-center">
                                    <thead>
                                    <tr>
                                        <th class="col-1">#</th>
                                        <th class="col-1">Tên danh mục</th>
                                        <th class="col-1">Slug</th>
                                        <th class="col-1">Ngày đăng tải</th>
                                        <th class="col-1">Mô tả</th>
                                        <th class="col-1">Trạng thái</th>
                                        <th class="col-1">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr id="row_@item.ID">
                                            <td class="tabledit-view-mode">{{ $value->id }}</td>
                                            <td class="tabledit-view-mode">{{ $value->name }}</td>
                                            <td class="tabledit-view-mode">{{ $value->slug }}</td>
                                            <td class="tabledit-view-mode">{{ $value->created_at }}</td>
                                            <td class="tabledit-view-mode">{!! substr($value->description, 0, 40) !!}</td>
                                            <td>
                                                <input data-id="{{ $value->id }}" class="toggle-class" type="checkbox"
                                                       data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                       data-onlabel="Bật" data-offlabel="Tắt"
                                                    {{ $value->status == 'active' ? 'checked' : '' }}>
                                            </td>
                                            <td class="">
                                                <a href="{{ route('categoryrooms.edit', $value->id) }}">
                                                    <button type="submit" class="btn btn-primary text-center my-1"
                                                            style="width: 45px;"> <!-- Đặt kích thước cố định là 100px -->
                                                        <i class="fa-solid fa-pen-to-square fs-4"></i>
                                                    </button>
                                                </a>

                                                <form action="{{ route('categoryrooms.destroy', $value->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger my-1" style="width: 45px;"
                                                            onclick="return confirm('Bạn có muốn thêm vào thùng rác')">
                                                        <!-- Đặt kích thước cố định là 100px -->
                                                        <i class="fa-solid fa-trash fs-4"></i>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end .table-responsive -->

                        </div> <!-- end .table-rep-plugin-->
                    </div> <!-- end .responsive-table-plugin-->
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('scripts')
    <script>
        new DataTable('#tech-companies-1');
    </script>
@endpush
