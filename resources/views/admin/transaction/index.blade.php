@extends('admin.layouts.master')
@section('title', 'Danh sách đơn hàng cần duyệt')
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="mt-0">Xác nhận nạp ví</h5>
                <div class="table-responsive">
                    <div class="mb-2 d-flex gap-1 ">
                    </div>
                    <table id="tech-companies-1" class="table table-centered mb-0 text-center">
                        <thead>
                        <tr>
                            <th class="col-0.5">#</th>
                            <th class="col-1.5">Người nạp</th>
                            <th class="col-1.5">Số tiền</th>
                            <th class="col-1.5">Phương thức</th>
                            <th class="col-1.5">Mã xác thực</th>
                            <th class="col-1.5">Ngày mua</th>
                            <th class="col-1.5">Trạng thái</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                            <tr id="row_{{ $value->ID }}">
                                <td class="tabledit-view-mode">{{ $key +1 }}</td>
                                <td class="tabledit-view-mode">{!! substr($value->user->name, 0, 20) !!}</td>
                                <td class="tabledit-view-mode">{{ number_format((float) $value->point, 0, '.', ',') }}</td>
                                <td class="tabledit-view-mode">{!! substr($value->payment_method, 0, 20) !!}</td>
                                <td class="tabledit-view-mode">{!! substr($value->verification, 0, 20) !!}</td>
                                <td class="tabledit-view-mode">{{ $value->created_at }}</td>
                                <td class="tabledit-view-mode">
                                    @if ($value->status === 'accept')
                                        Thành công
                                    @else
                                        <form action="{{ route('updatePoint.status', $value->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status">
                                                <option value="pending" @if ($value->status === 'pending') selected @endif>Đang xử lí</option>
                                                <option value="accept" @if ($value->status === 'accept') selected @endif>Đồng ý</option>
                                                <option value="cancel" @if ($value->status === 'cancel') selected @endif>Không đồng ý</option>
                                            </select>
                                            <button type="submit">Cập nhật</button>
                                        </form>
                                    @endif
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
                let post_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('posts-status-change') }}',
                    data: {
                        'status': status,
                        'post_id': post_id
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
