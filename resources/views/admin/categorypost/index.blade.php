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
                                                <th>Tên</th>
                                                <th>Slug</th>
                                                <th>Mô tả</th>
                                                <th>Trạng thái</th>
                                                <th>
                                                    <a class="btn btn-info"
                                                        href="{{ route('categorypost.create') }}">Thêm</a>
                                                    <a href="{{ route('categorypost.deleted') }}">Danh sách</a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->slug }}</td>
                                                    <td>{{ $value->description }}</td>
                                                    <td>{{ $value->status }}</td>
                                                    <td class="flex  text-center">
                                                        <a href="{{ route('categorypost.edit', $value->id) }}" class="btn btn-primary">
                                                            <i class="fa-solid fa-pen-to-square"></i></a>
                                                        <form action="{{ route('categorypost.destroy', $value->id) }}"
                                                              method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger" onclick="return confirm('Bạn có muốn thêm vào thùng rác')">
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
