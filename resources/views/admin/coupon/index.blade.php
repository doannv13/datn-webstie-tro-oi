@extends('admin.layouts.master')
@section('title')
    Mã giảm giá
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="responsive-table-plugin">
                            <div class="table-rep-plugin">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    @if (session('msg'))
                                        @if (session('msg')['success'])
                                            <div class="alert alert-success">{{ session('msg')['message'] }}</div>
                                        @else
                                            <div class="alert alert-danger">{{ session('msg')['message'] }}</div>
                                        @endif
                                    @endif
                                    <table id="tech-companies-1" class="table table-striped" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th style="width:5%">STT</th>
                                                <th data-priority="1">Tên</th>
                                                <th data-priority="3">Kiểu</th>
                                                <th data-priority="1">Giá trị</th>
                                                <th data-priority="3">Số lượng</th>
                                                <th data-priority="3">Mô tả</th>
                                                <th data-priority="3">Trạng thái</th>
                                                <th data-priority="6">Bắt đầu</th>
                                                <th data-priority="6">Kết thúc</th>
                                                <th data-priority="6">Action</th>
                                            </tr>
                                        </thead>

                                        @foreach ($data as $key => $value)
                                            <tr>
                                                <th>{{ $key + 1 }}</th>
                                                <th>{{ $value->name }}</th>
                                                <th>{{ $value->type }}</th>
                                                <th>{{ $value->value }}</th>
                                                <th>{{ $value->quantity }}</th>
                                                <th>{{ substr($value->description, 0, 20) }}</th>
                                                <th>{!! $value->status == 'inactive'
                                                    ? '<button class="btn btn-danger">Chưa kích hoạt</button>'
                                                    : '<button class="btn btn-primary">Kích hoạt</button>' !!}
                                                </th>
                                                <th>{{ $value->start_date }}</th>
                                                <th>{{ $value->end_date }}</th>
                                                <th class="d-flex"><a href="{{ route('coupon.edit', $value->id) }}"
                                                        class="btn btn-primary me-1"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <form action="{{ route('coupon.destroy', $value->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger"
                                                            onclick="return confirm('Bạn có muốn thêm vào thùng rác')">
                                                            <i class="fa-solid fa-trash fs-4 text-light"></i>
                                                        </button>
                                                    </form>
                                                </th>
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

    </div> <!-- container -->
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        new DataTable('#tech-companies-1');
    </script>
    <script>
        if (Session::has('message')) {
            let type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        }
    </script>
@endpush
