<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/hotel-alpha-html/HTML/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Aug 2023 14:24:47 GMT -->

<head>
    <title>Hotel Alpha - Booking and Reservation Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8"/>

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/animate.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/bootstrap-submenu.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/bootstrap-select.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/fonts/font-awesome/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/fonts/flaticon/font/flaticon.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/fonts/linearicons/style.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/jquery.mCustomScrollbar.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/bootstrap-datepicker.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/slick.css') }}"/>
    <link rel="stylesheet" href="{{ asset('fe/css/leaflet.css') }}" type="text/css"/>
    {{--    css cua dropzone --}}
    <link href="{{asset('be/assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('be/assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/initial.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/style.css') }}"/>
    <!-- dselect -->
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/skins/default.css') }}"/>
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('fe/img/favicon.ico') }}" type="image/x-icon"/>

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@300;400;500;600;700&amp;display=swap"
          rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&amp;display=swap"
          rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&amp;display=swap"
          rel="stylesheet"/>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/ie10-viewport-bug-workaround.css') }}"/>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9
      ]><script src="{{ asset('fe/js/ie8-responsive-file-warning.js') }}"></script><![endif]-->
    <script src="{{ asset('fe/js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('fe/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('fe/js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TFC5925" height="0" width="0"
            style="display: none; visibility: hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_loader"></div>

{{-- Star Header --}}
@include('client.layouts.partials.header')
{{-- End Header --}}

<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        @yield('content')
        <!-- content -->
    </div>


    <!-- Footer start #0b4c9f -->
    @include('client.layouts.partials.footer')
    <!-- Footer end -->
    <!-- Modal signup -->
    <div class="modal fade" id="signup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="9"
         aria-labelledby="signupLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Login section start -->
                <div class="login-section">
                    <div class="container-fluid">
                        <div class="modal-header">
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="row login-box">
                            <div class="form-section">
                                <div class="form-inner">
                                    <a href="index.html">
                                        <img src="{{ asset('fe/img/logos/logo.png') }}" alt="" width="80px"/>
                                    </a>
                                    <h3>Tạo mới tài khoản</h3>
                                    <form method="POST" name="register" action="{{ route('register') }}"
                                          enctype="multipart/form-data"
                                    ">
                                    @csrf
                                    <div class="form-group clearfix">
                                        <input
                                            id="name" placeholder="Họ tên" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus
                                        />
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group clearfix">
                                        <input
                                            name="phone"
                                            type="text"
                                            class="form-control"
                                            placeholder="Phone"
                                            aria-label="Phone"
                                            required
                                        />
                                    </div>
                                    <div class="form-group clearfix">
                                        <input
                                            id="email" type="email" placeholder="Địa chỉ email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                        />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group clearfix">
                                        <input id="password" type="password" placeholder="Mật khẩu"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group clearfix">
                                        <input id="password-confirm" type="password" placeholder="Xác nhận mật khẩu"
                                               class="form-control" name="password_confirmation" required
                                               autocomplete="new-password">
                                    </div>
                                    <div class="file form-group clearfix d-flex align-items-center gap-5">
                                        <div class="d-flex h-25">
                                            <label for="file">Chọn ảnh đại diện
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                     viewBox="0 0 512 512">
                                                    <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path
                                                        d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/>
                                                </svg>
                                            </label>
                                            <input type="file" name="avatar" accept="image/*" id="file" required>
                                        </div>
                                        <div class="mb-3 mt-3" style="text-align:center;">
                                            <img src=""
                                                 style="width: 70px;min-height:70px;border-radius:100% ;     object-fit: cover;"
                                                 id="show-image" alt="">
                                        </div>
                                        <style>
                                            input[type=file] {
                                                display: none;
                                            }

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

                                            &
                                            :hover,

                                            &
                                            :focus,

                                            &
                                            :active {
                                                background: #F4A460;
                                                color: black;
                                            }

                                            }
                                        </style>
                                    </div>
                                    <script>
                                        function validateForm() {
                                            let x = document.forms["myForm"]["fname"].value;
                                            if (x == "") {
                                                alert("Name must be filled out");
                                                return false;
                                            }
                                        }
                                    </script>
                                    <script src="https://code.jquery.com/jquery-3.6.0.js"
                                            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                                            crossorigin="anonymous"></script>
                                    <script>
                                        $(() => {
                                            function readURL(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        $('#show-image').attr('src', e.target.result);
                                                    };
                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }

                                            $("#file").change(function () {
                                                readURL(this);
                                            });
                                        });
                                    </script>
                                    <script>
                                        dselect(document.querySelector('#dselect-example'))
                                    </script>
                                    <div class="form-group clearfix">
                                        <button type="submit" class="btn-md btn-theme w-100">
                                            Đăng ký
                                        </button>
                                    </div>
                                    <div class="extra-login clearfix">
                                        <span>Đăng nhập với</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Login section end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal login Thảo lê -->
<div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="9"
     aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Login section start -->
            <div class="login-section">
                <div class="container-fluid">
                    <div class="modal-header">
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="row login-box">
                        <div class="form-section">
                            <div class="form-inner">
                                <a href="index.html">
                                    <img src="{{ asset('fe/img/logos/logo.png') }}" alt="" width="80px"/>
                                </a>

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
                                            type="email"
                                            class="form-control"
                                            placeholder="Địa chỉ Email"
                                            aria-label="Email Address"
                                        />
                                        {{-- @error('email')
                                        <span id="errorEmail" class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror --}}
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
                                        {{-- @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
                                    <div class="form-group checkbox clearfix">
                                        <div class="form-check checkbox-theme float-start">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                Ghi nhớ mật khẩu
                                            </label>
                                        </div>
                                        <p>
                                            Bạn chưa có tài khoản?
                                            <a href="signup.html" class="thembo"><span class="text-sub">Đăng
                                                    ký</span></a>
                                        </p>
                                    </div>

                                    <div class="form-group clearfix">
                                        <button type="submit" onclick="validateAndSubmit()"
                                                class="btn-md btn-theme w-100">
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
                            </div>
                        </div>
                    </div>
                    <!-- Login section end -->
                </div>
            </div>
        </div>

        <script src="{{ asset('fe/js/jquery.min.js') }}"></script>
        <script src="{{ asset('fe/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('fe/js/bootstrap-submenu.js') }}"></script>
        <script src="{{ asset('fe/js/jquery.mb.YTPlayer.js') }}"></script>
        <script src="{{ asset('fe/js/wow.min.js') }}"></script>
        <script src="{{ asset('fe/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('fe/js/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('fe/js/jquery.scrollUp.js') }}"></script>
        <script src="{{ asset('fe/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('fe/js/jquery.filterizr.js') }}"></script>
        <script src="{{ asset('fe/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('fe/js/slick.min.js') }}"></script>
        <script src="{{ asset('fe/js/sidebar.js') }}"></script>
        <script src="{{ asset('fe/js/app.js') }}"></script>
        <script src="{{ asset('fe/js/jquery.magnific-popup.min.js') }}"></script>

        <script src="{{asset('be/assets/libs/dropzone/min/dropzone.min.js')}}"></script>
        <script src="{{asset('be/assets/libs/dropify/js/dropify.min.js')}}"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="{{ asset('fe/js/ie10-viewport-bug-workaround.js') }}"></script>
        <!-- Custom javascript -->

        <script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>
        <!-- dselect -->
        <script>
            dselect(document.querySelector('#dselect-example'))
        </script>

@stack('scripts')
</body>
<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/hotel-alpha-html/HTML/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Aug 2023 14:25:23 GMT -->

</html>

