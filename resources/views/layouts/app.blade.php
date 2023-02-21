
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ url('/assets/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    {{ config('app.name' , 'Hospital Management') }} | {{$siteTitle ?? ''}}
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- CSS Files -->
  <link href="{{ url('/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ url('/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
  <link href="{{ url('/assets/css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
  <link href="{{ url('/assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ url('/assets/demo/demo.css') }}" rel="stylesheet" />
  @yield('header-script')
</head>

<body class="">
  <div class="wrapper">
    @include('section.sidebar')
    <div class="main-panel">
      @auth
      @include('section.navbar')
      @endauth
      <div class="content @guest mt-0 @endguest" style="background: url(@yield('background'));background-repeat: no-repeat;background-size: cover;">
        <div class="container">
          <div class="row">
            @yield('content')
          </div>
        </div>
      </div>



      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                ©<script>
                  document.write(new Date().getFullYear())
                </script> Copyright {{config('app.name', 'HMI')}}
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  @yield('footer-script')
  <!--   Core JS Files   -->
  <script src="{{ url('/assets/js/core/jquery.min.js')}}"></script>
  <script src="{{ url('/assets/js/core/popper.min.js')}}"></script>
  <script src="{{ url('/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{ url('/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <script src="{{ url('/assets/js/plugins/bootstrap-notify.js')}}"></script>
  <script src="{{ url('/assets/js/jquery.dataTables.min.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ url('/assets/js/paper-dashboard.min.js?v=2.0.0')}}" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready( function () {
    $('.table').DataTable();
} );
  </script>
</body>

</html>
