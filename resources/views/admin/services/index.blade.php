@extends('admin.layouts.master')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mt-0">Danh sách Dịch Vụ</h5>
                        <div class="responsive-table-plugin">
                            <div class="table-rep-plugin">
                                <div class="table-responsive" data-pattern="priority-columns">

                                    <div class="mb-2 d-flex gap-1 ">
                                        <a class="btn btn-success" href="{{ route('services.create') }}">Thêm mới</a>
                                        <a class="btn btn-danger" href="{{ route('services-deleted') }}">Thùng rác</a>
                                    </div>
                                    <table id="tech-companies-1" class="table table-centered " style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên Gói</th>
                                                <th>Giá</th>
                                                <th>Số Ngày</th>
                                                <th>Mô Tả</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $key => $value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->price }}</td>
                                                    <td>{{ $value->date_number }}</td>
                                                    <td>{{ $value->description }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('services.edit', $value->id) }}"
                                                            class="btn btn-primary ">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <form action="{{ route('services.destroy', $value->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger mt-2"
                                                                onclick="return confirm('Bạn có muốn thêm vào thùng rác')">
                                                                <i class="fa-solid fa-trash fs-4 text-light"></i>
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

    </div> <!-- container -->
@endsection
@push('scripts')
    <script>
        new DataTable('#tech-companies-1');
    </script>
@endpush
