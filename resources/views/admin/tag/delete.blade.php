@extends('admin.layouts.master')
@section('title', 'Danh sách thẻ đã xóa')
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="mt-0">Danh sách thẻ</h5>
                <div class="table-responsive">
                    <a class="btn btn-success mb-2" href="{{ route('tags.create') }}">Thêm mới</a>
                    <table id="tech-companies-1" class="table table-centered mb-0">
                        <thead>
                            <tr>
                                <th class="col-2">#</th>
                                <th class="col-2">Tên</th>
                                <th class="col-2">Đường dẫn</th>
                                <th class="col-2">Trạng thái</th>
                                <th class="col-2">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr id="row_@item.ID">
                                    <td class="tabledit-view-mode">{{ $value->id }}</td>
                                    <td class="tabledit-view-mode">{{ $value->name }}</td>
                                    <td class="tabledit-view-mode">{{ $value->slug }}</td>
                                    <td>{{ $value->status == 'inactive' ? 'Tắt' : 'Bật' }}</td>
                                    <td><a href="{{ route('tags.restore', $value->id) }}"
                                            class="btn btn-primary me-2 mb-2"><i class="fa-solid fa-trash-arrow-up"></i></a>
                                        <form action="{{ route('tags.permanently.delete', $value->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Bạn có muốn xoá')" class="btn btn-danger">
                                                <i class="fa-solid fa-delete-left text-light"></i>
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
                let tag_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('tags.status_change') }}',
                    data: {
                        'status': status,
                        'tag_id': tag_id
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
