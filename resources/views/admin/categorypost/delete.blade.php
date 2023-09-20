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
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên</th>
                                                <th>Slug</th>
                                                <th>Mô tả</th>
                                                <th>Trạng thái</th>
                                                <th><a class="btn btn-info" href="{{ route('categorypost.index') }}">Danh sách</a>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $value)
                                                <tr>
                                                    <th>{{ $key + 1 }}</th>
                                                    <th>{{ $value->name }}</th>
                                                    <th>{{ $value->slug }}</th>
                                                    <th>{{ $value->description }}</th>
                                                    <th>{{ $value->status }}</th>
                                                    <th class="d-flex"><a href="{{ route('categorypost.restore', $value->id) }}"
                                                            class="btn btn-primary me-2"><i
                                                                class="fa-solid fa-trash-arrow-up"></i></a>
                                                        <form action="{{ route('categorypost.permanently-delete', $value->id) }}"
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
