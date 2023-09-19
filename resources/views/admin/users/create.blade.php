@extends('admin.layouts.master')
@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Thêm mới người dùng</h4>
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                        <div class="row">

                            <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Họ tên</label>
                                        <input type="text" id="simpleinput" class="form-control" name="name" placeholder="Name">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-email" class="form-label">Email</label>
                                        <input type="email" id="example-email" name="email" class="form-control" placeholder="Email">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Show/Hide Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                            </div> <!-- end col -->

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Quyền</label>
                                    <select class="form-select" id="example-select" name="role">
                                        <option value="admin">Admin</option>
                                        <option value="admin">Vendor</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">SĐT</label>
                                    <input type="text" id="simpleinput" class="form-control" name="phone" placeholder="phone">
                                </div>

                                <div class="mb-3">
                                    <label for="example-fileinput" class="form-label">Ảnh đại diện</label>
                                    <input type="file" id="example-fileinput" class="form-control" name="avatar">
                                </div>

                            </div> <!-- end col -->


                        </div>
                        <button class="btn btn-primary">Thêm</button>
                    </form>
                        <!-- end row-->

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>

    </div> <!-- container -->

</div>
@endsection
