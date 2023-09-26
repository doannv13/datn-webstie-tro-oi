<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/hotel-alpha-html/HTML/main/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Aug 2023 14:25:51 GMT -->
<head>
    <title>Hotel Alpha - Booking and Reservation Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/animate.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/bootstrap-submenu.css') }}" />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('fe/css/bootstrap-select.min.css') }}"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('fe/fonts/font-awesome/css/font-awesome.min.css') }}"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('fe/fonts/flaticon/font/flaticon.css') }}"
    />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/fonts/linearicons/style.css') }}" />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('fe/css/jquery.mCustomScrollbar.css') }}"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('fe/css/bootstrap-datepicker.min.css') }}"
    />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/dropzone.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('fe/css/leaflet.css') }}" type="text/css" />

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/initial.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/style.css') }}" />
    <!-- dselect -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css"
    />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/skins/default.css') }}"/>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('fe/img/favicon.ico') }}" type="image/x-icon" />

    <!-- Google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet"
    />

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset('fe/css/ie10-viewport-bug-workaround.css') }}"
    />

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9
      ]><script src="{{ asset('fe/js/ie8-responsive-file-warning.js') }}"></script
    ><![endif]-->
    <script src="{{ asset('fe/js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('fe/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('fe/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TFC5925"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_loader"></div>

<!-- Option Panel -->
<div class="option-panel option-panel-collased">
    <h2>Change Color</h2>
    <div class="color-plate sandybrown-plate" data-color="sandybrown"></div>
    <div class="color-plate blue-light-2-plate" data-color="blue-light-2"></div>
    <div class="color-plate yellow-plate" data-color="yellow"></div>
    <div class="color-plate red-plate" data-color="red"></div>
    <div class="color-plate green-light-plate" data-color="green-light"></div>
    <div class="color-plate purple-plate" data-color="purple"></div>
    <div class="color-plate blue-plate" data-color="blue"></div>
    <div class="color-plate peru-plate" data-color="peru"></div>
    <div class="color-plate green-plate" data-color="green"></div>
    <div class="color-plate blue-light-plate" data-color="blue-light"></div>
    <div class="color-plate green-light-2-plate" data-color="green-light-2"></div>
    <div class="color-plate royalblue-plate" data-color="royalblue"></div>
    <div class="setting-button">
        <i class="fa fa-gear"></i>
    </div>
</div>
<!-- /Option Panel -->

<!-- Login section start -->
<div class="login-section">
    <div class="container-fluid">
        <div class="row login-box">
            <div class="col-lg-6 align-self-center pad-0 form-section">
                <div class="form-inner">
                    <a href="index-5.html" class="logo">
                        {{-- <img src="" alt="logo"> --}}
                    </a>
                    <h3>Nhập email của bạn</h3>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="form-group clearfix">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-md btn-theme w-100">Xác nhận</button>
                        </div>
                        <div class="extra-login clearfix">
                            <span>Or Login With</span>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <div class="social-list">
                        <a href="#" class="facebook-bg">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="twitter-bg">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="google-bg">
                            <i class="fa fa-google"></i>
                        </a>
                        <a href="#" class="linkedin-bg">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </div>
                    <p>Already a member? <a href="login.html">Login here</a></p>
                </div>
            </div>
            <div class="col-lg-6 bg-color-15 none-992 bg-img">
                <div class="info clearfix">
                    <h1>Chào mừng bạn đến với <span>Trọ ơi</span></h1>
                    <p>Xứ mệnh của chúng tôi ... </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login section end -->

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
<script src="{{ asset('fe/js/dropzone.js') }}"></script>
<script src="{{ asset('fe/js/jquery.magnific-popup.min.js') }}"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ asset('fe/js/ie10-viewport-bug-workaround.js') }}"></script>
<!-- Custom javascript -->

<script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>
<!-- dselect -->
<script>
    dselect(document.querySelector('#dselect-example'))
</script>
<!-- Custom javascript -->

</body>

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/hotel-alpha-html/HTML/main/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Aug 2023 14:25:51 GMT -->
</html>
