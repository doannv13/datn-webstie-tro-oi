@extends('client.layouts.master')
@section('content')
<div
>
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Login section start -->
            <div class="login-section">
                <div class="container-fluid">
                    <div class="modal-header">
                    </div>
                    <div class="row login-box">
                        <div class="form-section">
                            <div class="form-inner">
                                <h3>Tạo mới tài khoản</h3>
                                <form method="POST" name="register" action="{{ route('register') }}" onsubmit="return ValidateRegister()" enctype="multipart/form-data" ">
                                    @csrf
                                    <div class="form-group clearfix">
                                        <input
                                        id="name" placeholder="Họ tên" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus
                                        />
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group clearfix">
                                        <input
                                        id="name" placeholder="Số điện thoại" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="name" autofocus
                                        />
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group clearfix">
                                        <input
                                        id="email" type="email" placeholder="Địa chỉ email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email"
                                        />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group clearfix">
                                        <input id="password" type="password" placeholder="Mật khẩu" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group clearfix">
                                        <input id="password-confirm" type="password" placeholder="Xác nhận mật khẩu" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                    </div>
                                    <div class="file form-group clearfix d-flex align-items-center gap-5">
                                        <div class="d-flex h-25">

                                            <label for="file">Chọn ảnh đại diện
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/></svg>
                                            </label>
                                            <div class="d-flex align-items-center gap-5">
                                                <input id="file" type="file" class="form-control mr-2 @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}"  autocomplete="email"/>
                                                @error('avatar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3 mt-3" style="text-align:center;">
                                            <img src="" style="width: 70px;min-height:70px;border-radius:100% ;     object-fit: cover;"
                                                id="show-image" alt="">
                                        </div>
                                        <style>
                                            input[type=file] { display: none; }
                                            label[for=file] {
                                                display: grid;
                                                grid-auto-flow: column;
                                                grid-gap: .5em;
                                                justify-items: center;
                                                align-content: center;
                                                padding: .85em 1.5em;
                                                border-radius: 2em;
                                                border: .2px solid gainsboro;
                                                transition: 1s;
                                                &:hover, &:focus, &:active {
                                                    background: #F4A460;
                                                    color:black;
                                                }
                                            }
                                        </style>
                                    </div>
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

                                        $("#file").change(function() {
                                            readURL(this);
                                        });
                                    });
                                    </script>
                                    <script>
                                        dselect(document.querySelector('#dselect-example'))
                                    </script>
                                    <div class="form-group clearfix">
                                        <button type="submit" onclick="ValidateRegister()" class="btn-md btn-theme w-100">
                                            Đăng ký
                                        </button>
                                    </div>
                                    <div class="extra-login clearfix">
                                        <span>Đăng nhập với</span>
                                    </div>
                                </form>
                                <div class="clearfix"></div>
                                <div class="social-list">
                                    <a href="#" class="facebook-bg">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#" class="google-bg">
                                        <i class="fa fa-google"></i>
                                    </a>
                                </div>
                                <p>
                                    Bạn đã có tài khoản ?
                                    <a href="login.html"
                                    ><span class="text-sub">Đăng nhập</span></a
                                    >
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login section end -->
        </div>
    </div>
</div>
<script>
    function ValidateRegister(){
        let flag= true;
        let dataPhone =document.querySelector('#phone).value
        if(dataPhone.trim()===''){
            flag=false;
            document.querySelector('#error_phone').innerHTML='KH BỎ TRỐNG'
        }
        return flag;
    }
</script>
@endsection