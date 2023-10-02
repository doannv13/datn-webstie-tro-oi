<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/hotel-alpha-html/HTML/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Aug 2023 14:24:47 GMT -->

<head>
    <title>Hotel Alpha - Booking and Reservation Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/animate.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/bootstrap-submenu.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/fonts/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/fonts/flaticon/font/flaticon.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/fonts/linearicons/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/jquery.mCustomScrollbar.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/bootstrap-datepicker.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('fe/css/dropzone.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('fe/css/leaflet.css') }}" type="text/css" />
    {{--    css cua dropzone --}}
    <link href="{{ asset('be/assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('be/assets/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('fe/css/skins/default.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/initial.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/style.css') }}" />
    <!-- dselect -->
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/skins/default.css') }}" />
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('fe/img/favicon.ico') }}" type="image/x-icon" />

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/css/ie10-viewport-bug-workaround.css') }}" />
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    {{-- <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TFC5925" height="0" width="0"
            style="display: none; visibility: hidden"></iframe>
    </noscript>
    <div class="page_loader"></div> --}}

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

    <script src="{{ asset('be/assets/libs/dropzone/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/dropify/js/dropify.min.js') }}"></script>

    <script src="{{ asset('be/assets/js/pages/form-fileuploads.init.js') }}"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('fe/js/ie10-viewport-bug-workaround.js') }}"></script>
    <!-- Custom javascript -->


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <script src="{{ asset('fe/js/ie8-responsive-file-warning.js') }}"></script>
    <script src="{{ asset('fe/js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <script src="{{ asset('fe/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('fe/js/respond.min.js') }}"></script>


    <script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>
    <!-- dselect -->
    <script>
        dselect(document.querySelector('#dselect-example'))
    </script>

    @stack('scripts')
</body>
<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/hotel-alpha-html/HTML/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Aug 2023 14:25:23 GMT -->

</html>
