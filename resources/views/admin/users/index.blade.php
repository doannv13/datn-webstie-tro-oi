@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="responsive-table-plugin">
                                <div class="table-rep-plugin">
                                   <div class="mb-2 d-flex gap-1 ">
                                    <a class="btn btn-success" class="" href="{{ route('users.create') }}">Thêm mới</a>
                                    <a class="btn btn-primary" class="" href="{{ route('user_deleted') }}">Thùng rác</a>
                                   </div>
                                    <div class="table-responsive" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%">STT</th>
                                                    <th style="width:15%">Tên</th>
                                                    <th style="width:20%">Email</th>
                                                    <th style="width:15%">SĐT</th>
                                                    <th style="width:10%">Ảnh</th>
                                                    <th style="width:15%">Vai trò</th>
                                                    <th style="width:5%">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $value)
                                                    <tr class="">
                                                        <td><b>{{ $key + 1 }}</b></td>
                                                        <td> <span class="co-name">{{ $value->name }}</span></td>
                                                        <td>{{ $value->email }}</td>
                                                        <td>{{ $value->phone }}</td>
                                                        <td><img class=" rounded-circle" style="width:56px;height:56px"
                                                                src="{{ $value->avatar ? asset($value->avatar) : 'https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg' }}" />
                                                        </td>
                                                        <td>{{ $value->role }}</td>
                                                        <td class="d-flex gap-2 pb-4">
                                                            <a class="btn btn-primary"
                                                                href="{{ route('users.edit', $value->id) }}">
                                                                <i class="fa-solid fa-pen-to-square fs-4"></i>
                                                            </a>
                                                            <form action="{{ route('users.destroy', $value->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    onclick="return confirm('chắc chắn xóa?')"
                                                                    class="btn btn-danger"> <i
                                                                        class="fa-solid fa-trash fs-4 text-white"></i></button>
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

    </div> <!-- content -->
@endsection
@push('scripts')
    <script>
        new DataTable('#tech-companies-1');
    </script>
@endpush
