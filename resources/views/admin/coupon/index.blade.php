@extends('admin.layouts.master')
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
                                    <table id="tech-companies-1" class="table table-striped" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th data-priority="1">Name</th>
                                                <th data-priority="3">Type</th>
                                                <th data-priority="1">Value</th>
                                                <th data-priority="3">Quantity</th>
                                                <th data-priority="3">Description</th>
                                                <th data-priority="6">Start Date</th>
                                                <th data-priority="6">End Date</th>
                                                <th data-priority="6"> <a class="btn btn-info"
                                                        href="{{ route('coupon.create') }}">Thêm</a>
                                                    <a href="{{ route('deleted') }}">Danh sách</a>
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
                                                    <th class="d-flex"><a href="{{ route('coupon.edit', $value->id) }}"
                                                            class="btn btn-primary"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <form action="{{ route('coupon.destroy', $value->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger" onclick="return confirm('Bạn có muốn thêm vào thùng rác')">
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
        @if (Session::has('message'))
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
        @endif
    </script>
@endpush
