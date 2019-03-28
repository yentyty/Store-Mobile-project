<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />
    <title>Mobile Store</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap -->
    <link
        href="backend/admin-asset/bootstrap/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <!-- Font Awesome -->
    <link
        href="backend/admin-asset/font-awesome/css/font-awesome.min.css"
        rel="stylesheet"
    >
    <!-- NProgress -->
    <link href="backend/admin-asset/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="backend/admin-asset/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link
        href="backend/admin-asset/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
        rel="stylesheet"
    >
    <!-- JQVMap -->
    <link href="backend/admin-asset/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="backend/admin-asset/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="backend/css/custom.min.css" rel="stylesheet">
    <link href="backend/css/style.css" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
    <link rel="stylesheet" href="backend/admin-asset/select2/dist/css/select2.min.css">
  </head>
  <body class="nav-md">
    <div class="container body">
        <div class="main_container">
            @if(session('msg'))
                <div class="alert alert-success alert-dismissible messag ">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{session('msg')}}
                </div>
            @endif
            @include('backend.layouts.header')
            @include('backend.layouts.menu')
            @yield('content')
            @include('backend.layouts.footer')
        </div>
    </div>
    <!-- jQuery -->
    <script src="backend/admin-asset/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="backend/admin-asset/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="backend/admin-asset/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="backend/admin-asset/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="admin-asset/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="backend/admin-asset/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="backend/admin-asset/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="backend/admin-asset/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="backend/admin-asset/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="backend/admin-asset/Flot/jquery.flot.js"></script>
    <script src="backend/admin-asset/Flot/jquery.flot.pie.js"></script>
    <script src="backend/admin-asset/Flot/jquery.flot.time.js"></script>
    <script src="backend/admin-asset/Flot/jquery.flot.stack.js"></script>
    <script src="backend/admin-asset/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="backend/admin-asset/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="backend/admin-asset/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="backend/admin-asset/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="backend/admin-asset/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="backend/admin-asset/jqvmap/dist/jquery.vmap.js"></script>
    <script src="backend/admin-asset/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="backend/admin-asset/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="backend/admin-asset/moment/min/moment.min.js"></script>
    <script src="backend/admin-asset/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="backend/js/custom.min.js"></script>
    <script type="text/javascript" language="javascript" src="backend/admin-asset/select2/dist/js/select2.full.min.js"></script>
    <script>
        $("div.alert-success").delay(4000).slideUp();

        $(document).ready(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#img').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#image").change(function() {
                readURL(this);
            });
        });

        $(document).ready(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#img').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#avatar, #cover_image").change(function() {
                readURL(this);
            });
        });
        $(document).ready(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image_content').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#content_image").change(function() {
                readURL(this);
            });
        });
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2({
                tags: true,
                tokenSeparators: [',', ' ']
            })
        });
    </script>
    @stack('script')
  </body>
</html>
