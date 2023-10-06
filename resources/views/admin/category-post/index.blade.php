@extends('admin.layouts.master')
@section('title', 'Danh sách bài viết')
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="mt-0">Danh sách bài viết</h5>
                <div class="table-responsive">
                    <div class="mb-2 d-flex gap-1 ">
                        <a class="btn btn-success" href="{{ route('category-posts.create') }}">Thêm mới</a>
                        <a class="btn btn-danger" href="{{ route('category-posts-deleted') }}">Thùng rác</a>
                    </div>
                    <table id="tech-companies-1" class="table table-centered mb-0">
                        <thead>
                            <tr>
                                <th class="col-2">STT</th>
                                <th class="col-2">Name</th>
                                <th class="col-2">Slug</th>
                                <th class="col-2">Mô tả</th>
                                <th class="col-2">Ngày</th>
                                <th class="col-2">Trạng thái</th>
                                <th class="col-2">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $key => $value)
                                <tr id="row_@item.ID">
                                    <td class="tabledit-view-mode">{{ $key + 1 }}</td>
                                    <td class="tabledit-view-mode">{{ $value->name }}</td>
                                    <td class="tabledit-view-mode">{{ $value->slug }}</td>
                                    <td class="tabledit-view-mode">{!! substr($value->description, 0, 20) !!}</td>
                                    <td class="tabledit-view-mode">{{ $value->updated_at }}</td>
                                    <td>
                                        <input data-id="{{ $value->id }}" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                            data-onlabel="Bật" data-offlabel="Tắt"
                                            {{ $value->status == 'active' ? 'checked' : '' }}>
                                    </td>


                                    <td class="">
                                        <a href="{{ route('category-posts.edit', $value->id) }}">
                                            <button type="submit" class="btn btn-primary text-center my-1"
                                                style="width: 45px;"> <!-- Đặt kích thước cố định là 100px -->
                                                <i class="fa-solid fa-pen-to-square fs-4"></i>
                                            </button>
                                        </a>

                                        <form action="{{ route('category-posts.destroy', $value->id) }}" method="POST">
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
                </div> <!-- end .table-responsive-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div>
@endsection


@push('scripts')
    <script>
        new DataTable('#tech-companies-1');
        $(function() {
            $('.toggle-class').change(function() {
                let status = $(this).prop('checked') == true ? 'active' : 'inactive';
                let categorypost_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('category-posts-status-change') }}',
                    data: {
                        'status': status,
                        'categorypost_id': categorypost_id,
                    },
                    success: function(data) {
                        console.log(data);
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                icon: 'error',
                                title: data.error,
                            })
                        }
                    }
                });
            })
        })
    </script>
@endpush
