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
                            <th class="col-1.5">Số tiền gốc</th>
                            <th class="col-1.5">Số tiền thanh toán</th>
                            <th class="col-1.5">Mã giảm giá</th>
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
                                <td class="tabledit-view-mode">{{ number_format((float) $value->price_promotion, 0, '.', ',') }}</td>
                                <td class="tabledit-view-mode">{{ optional($value->coupon)->name ?? 'N/A' }}</td>
                                <td class="tabledit-view-mode">{!! substr($value->payment_method, 0, 20) !!}</td>
                                <td class="tabledit-view-mode">{!! substr($value->verification, 0, 20) !!}</td>
                                <td class="tabledit-view-mode">{{ $value->created_at }}</td>
                                <td class="tabledit-view-mode">
                                    @if ($value->status === 'accept')
                                           <label for="" class="btn btn-success">Thành công</label>
                                    @elseif ($value->status === 'cancel')
                                        <label for="" class="btn btn-danger">Thất bại</label>
                                    @else
                                    <form action="{{ route('updatePoint.status', $value->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" onclick="return confirm('Chắc chắn chấp nhận?')" class="btn btn btn-success" name="status" value="accept">Chấp nhận</button>
                                        <button type="submit" onclick="return confirm('Chắc chắn không đồng ý?')"  class="btn btn-danger" name="status" value="cancel">Không đồng ý</button>
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
