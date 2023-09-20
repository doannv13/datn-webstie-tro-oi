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
                            @if ($errors->any())
                            <p class=" alert alert-danger">
                                Dữ liệu không hợp lệ vui lòng kiểm tra lại
                            </p>
                            @endif
                            <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Họ tên</label>
                                        <input type="text" id="simpleinput" class="form-control" name="name" placeholder="Name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-email" class="form-label">Email</label>
                                        <input type="email" id="example-email" name="email" class="form-control" placeholder="Email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mật khẩu</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password">

                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>

                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>

                            </div> <!-- end col -->

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Quyền</label>
                                    <select class="form-select" id="example-select" name="role">
                                        <option value="admin">Admin</option>
                                        <option value="vendor">Vendor</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">SĐT</label>
                                    <input type="text" id="simpleinput" class="form-control" name="phone" placeholder="phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">

                                    <div class="d-flex gap-2">
                                        <div>
                                            <label for="example-fileinput" class="form-label">Ảnh đại diện</label>
                                            <input type="file" style="" class="form-control" name="avatar" accept="image/*" id="image-input">
                                        </div>
                                        <div class="mb-3 mt-3" style="text-align:center;">
                                            <img src="" style="width: 70px;min-height:70px;border-radius:100% ;     object-fit: cover;"
                                                id="show-image" alt="">
                                        </div>
                                    </div>
                                    @error('avatar')
                                            <span class="text-danger">{{ $message }}</span>
                                    @enderror

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
@push('scripts')
    <!-- Page level plugins -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $(() => {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show-image').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#image-input").change(function() {
                readURL(this);
            });



        });
    </script>
@endpush
