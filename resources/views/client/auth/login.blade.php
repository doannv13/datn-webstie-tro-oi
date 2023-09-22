@extends('client.layouts.master')
@section('content')
<div
data-bs-backdrop="static"
data-bs-keyboard="false"
tabindex="9"
aria-labelledby="loginLabel"
aria-hidden="true"
>
<div class="modal-dialog">
    <div class="modal-content">
        <!-- Login section start -->
        <div class="login-section">
            <div class="container-fluid">
                <div class="row login-box">
                    <div class="form-section">
                        <div class="form-inner">
                            <h3>Đăng nhập tài khoản</h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group clearfix">
                                    <input
                                        id="email"
                                        class="form-control
                                        @error('email')
                                        is-invalid
                                        @enderror"
                                        value="{{ old('email') }}"
                                        autocomplete="email"
                                        autofocus
                                        name="email"
                                        class="form-control"
                                        placeholder="Địa chỉ Email"
                                        aria-label="Email Address"
                                    />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group clearfix">
                                    <input
                                    id="password"
                                    type="password"
                                    class="form-control
                                    @error('password')
                                    is-invalid
                                    @enderror"
                                    name="password"
                                    min="6"
                                    max="12"
                                    autocomplete="current-password"
                                    placeholder="Mật khẩu"
                                    aria-label="Password"
                                    />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group checkbox clearfix">
                                    <div class="form-check checkbox-theme float-start">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            Ghi nhớ mật khẩu
                                        </label>
                                    </div>
                                    <a href="forgot-password.html" class="forgot-password"
                                    >Quên mật khẩu</a
                                    >
                                </div>
                                <div class="form-group clearfix">
                                    <button type="submit" onclick="validateAndSubmit()" class="btn-md btn-theme w-100">
                                        Đăng nhập
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
                                Bạn chưa có tài khoản?
                                <a href="signup.html" class="thembo"
                                ><span class="text-sub">Đăng ký</span></a
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

@endsection
