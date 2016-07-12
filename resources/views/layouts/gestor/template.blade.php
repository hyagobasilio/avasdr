<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AVA SDR</title>

    <!-- Bootstrap -->
    <link href="{{ asset('tema/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('tema/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress {{ asset('tema') }}-->
    <link href="{{ asset('tema/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('tema/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('tema/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('tema/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('tema/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="{{ asset('tema/build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>AVA SDR!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="{{ asset('tema/production/images/img.jpg') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            @include('layouts.gestor.sidemenu')

            
          </div>
        </div>

        @include('layouts.gestor.top-navegation')

        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery  -->
    <script src="{{ asset('tema/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('tema/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('tema/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('tema/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('tema/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('tema/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('tema/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('tema/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('tema') }}/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="{{ asset('tema/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('tema/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('tema/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('tema/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('tema/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('tema/production/js/flot/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('tema/production/js/flot/date.js') }}"></script>
    <script src="{{ asset('tema/production/js/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('tema/production/js/flot/curvedLines.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('tema/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('tema/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('tema/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('tema/production/js/moment/moment.min.js') }}"></script>
    <script src="{{ asset('tema/production/js/datepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('tema/build/js/custom.min.js') }}"></script>

    @yield('scripts')
  </body>
</html>