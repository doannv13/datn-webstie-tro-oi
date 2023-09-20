@extends('admin.layouts.master')
@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Cập nhật thông tin người dùng</h4>
                        <form action="{{ route('users.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input type='hidden'  value="{{ $data->id }}" name="id">
                            <input type='hidden'  value="{{ $data->password }}" name="password">
                        <div class="row">
                            @if ($errors->any())
                            <p class=" alert alert-danger">
                                Dữ liệu không hợp lệ vui lòng kiểm tra lại
                            </p>
                            @endif
                            <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Họ tên</label>
                                        <input type="text" id="simpleinput" class="form-control" name="name" value="{{ $data->name }}" placeholder="Name">
                                    </div>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                    <div class="mb-3">
                                        <label for="example-email" class="form-label">Email</label>
                                        <input type="email" id="example-email" name="email" class="form-control" placeholder="Email" value="{{ $data->email }}" >
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-fileinput" class="form-label">Cập nhật đại diện mới</label>
                                        <input type="file" id="example-fileinput" class="form-control" name="new_avatar">
                                    </div>
                                @if ($data->avatar)
                                <input type="text" value="{{ $data->avatar }}" name="old_avatar" hidden>
                                <div class="mb-3">
                                    <img src="{{ $data->avatar }}" alt="">
                                    @error('avatar')
                                    <span class="text-danger">{{ $message }}</span>
                            @enderror
                                </div>
                                @endif

                            </div> <!-- end col -->

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Quyền</label>
                                    <select class="form-select" id="example-select" name="role" value="{{ $data->role }}" >
                                        <option value="admin">Admin</option>
                                        <option value="vendor">Vendor</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">SĐT</label>
                                    <input type="text" id="simpleinput" class="form-control" name="phone" value="{{ $data->phone }}" placeholder="phone">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>



                            </div> <!-- end col -->


                        </div>
                        <button class="btn btn-primary">Sửa</button>
                    </form>
                        <!-- end row-->

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>

    </div> <!-- container -->

</div>
@endsection
