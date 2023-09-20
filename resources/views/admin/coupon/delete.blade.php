@extends('admin.layouts.master')
@section('title')
    Thùng rác
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
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width:5%">STT</th>
                                                <th data-priority="1">Tên</th>
                                                <th data-priority="3">Kiểu</th>
                                                <th data-priority="1">Giá trị</th>
                                                <th data-priority="3">Số lượng</th>
                                                <th data-priority="3">Trạng thái</th>
                                                <th data-priority="6">Bắt đầu</th>
                                                <th data-priority="6">Kết thúc</th>
                                                <th><a class="btn btn-info" href="{{ route('coupon.index') }}">Danh sách</a>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $value)
                                                <tr>
                                                    <th>{{ $key + 1 }}</th>
                                                    <th>{{ $value->name }}</th>
                                                    <th>{{ $value->type }}</th>
                                                    <th>{{ $value->value }}</th>
                                                    <th>{{ $value->quantity }}</th>
                                                    <th>{{ $value->description }}</th>
                                                    <th>{{ $value->start_date }}</th>
                                                    <th>{{ $value->end_date }}</th>
                                                    <th class="d-flex"><a href="{{ route('coupon.restore', $value->id) }}"

                                                            class="btn btn-primary me-2"><i

                                                                class="fa-solid fa-trash-arrow-up"></i></a>
                                                        <form action="{{ route('coupon.permanently-delete', $value->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button onclick="return confirm('Bạn có muốn xoá')"
                                                                class="btn btn-danger">
                                                                <i class="fa-solid fa-delete-left text-light"></i>
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
    <script>
        new DataTable('#tech-companies-1');
    </script>
@endpush
