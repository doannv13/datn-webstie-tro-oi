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
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên</th>
                                            <th>Địa chỉ email</th>
                                            <th>Số điện thoại</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Chức Năng</th>
                                            <th>Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    @if(count($data)>0)
                                        @foreach ($data as $key => $value )
                                            <tr class="">
                                                <td><b>{{$key+1}}</b></td>
                                                <td> <span class="co-name">{{$value->name}}</span></td>
                                                <td>{{$value->email}}</td>
                                                <td>{{$value->phone}}</td>
                                                <td><img class="rounded-circle" style="width:56px;height:56px" src="{{asset($value->avatar)}}"/></td>
                                                <td>{{$value->role}}</td>
                                                <td class="d-flex gap-2 pb-4">
                                                    <a href="{{ route('user_restore', $value->id) }}" class="btn btn-primary">
                                                        <i class="fa-solid fa-repeat"></i>
                                                    </a>
                                                    <form action="{{ route('user_permanently_delete', $value->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" onclick="return confirm('chắc chắn xóa?')"
                                                            class="btn btn-danger">
                                                            <i class="fa-solid fa-trash-arrow-up fs-4"></i></i></button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7"><b>Chưa có bản ghi</b></td>
                                        </tr>
                                    @endif
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
