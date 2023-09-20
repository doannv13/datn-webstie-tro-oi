<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>Dashboard | Adminto - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('be/assets/images/favicon.ico')}}">

    <!-- App css -->

    <link href="{{asset('be/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
    <script src="{{asset('be/assets/libs/jquery/jquery.min.js')}}"></script>
    {{-- <script src="{{asset('be/assets/libs/jquery/jquery.min.js')}}"></script> --}}
    <script src="{{asset('be/assets/libs/toastr/build/toastr.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('be/assets/css/toastr.css')}}">
    <!-- icons -->
    <link href="{{asset('be/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet" type="text/css" />
    
    {{-- data table --}}
    <link href="{{asset('be/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('be/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('be/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('be/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<!-- body start -->
<body class="loading" data-layout-color="light"  data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>

<!-- Begin page -->
<div id="wrapper">



    <!-- Topbar Start -->
        @include('admin.layouts.partials.topbar')
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layouts.partials.l-sidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
                @yield('content')
            <!-- content -->
        </div>

        <!-- Footer Start -->
            @include('admin.layouts.partials.footer')
        <!-- end Footer -->

    </div>
    <!-- ============================================================== -->
    <!-- End Page content -->


    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
    @include('admin.layouts.partials.r-sidebar')
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

{{-- load ảnh --}}
<script>
    $(function(){
      function readURL(input, selector){
        if(input.files && input.files[0]){
          let reader = new FileReader();

          reader.onload = function(e){
            $(selector).attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
        }
      }
      $("#image").change(function(){
        console.log(123);
        readURL(this, '#image_preview');
      });
    })
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
<script>
    @if (Session::has('message'))
        let type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>
<!-- Vendor -->
<script src="{{asset('be/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('be/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('be/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('be/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('be/assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('be/assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('be/assets/libs/feather-icons/feather.min.js')}}"></script>

<!-- knob plugin -->
<script src="{{asset('be/assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>

<!--Morris Chart-->
<script src="{{asset('be/assets/libs/morris.js06/morris.min.js')}}"></script>
<script src="{{asset('be/assets/libs/raphael/raphael.min.js')}}"></script>

<!-- Dashboar init js-->
<script src="{{asset('be/assets/js/pages/dashboard.init.js')}}"></script>

<!-- App js-->
<script src="{{asset('be/assets/js/app.min.js')}}"></script>
<script src="{{ asset('be/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('be/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
@stack('scripts')
</body>
</html>
