<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Fahmi Impreium </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('vendor/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/owl-carousel/css/owl.theme.default.min.css')}}">
    
    <link href="{{asset('vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">



</head>

<body>
      <div id="preloader">
            <div class="sk-three-bounce">
                  <div class="sk-child sk-bounce1"></div>
                  <div class="sk-child sk-bounce2"></div>
                  <div class="sk-child sk-bounce3"></div>
            </div>
      </div>

      <div id="main-wrapper">
            @include('layouts.inc.adminnav')
            @include('layouts.inc.header')
            @include('layouts.inc.sidebar')
            <div class="content-body">
                  @yield('content-body')
            </div>
            @include('layouts.inc.adminfooter')



      </div>



       <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->

    <script src="{{asset('vendor/global/global.min.js')}}"></script>
    <script src="{{asset('js/quixnav-init.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>

    <!-- Vectormap -->
    <script src="{{asset('vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('vendor/morris/morris.min.js')}}"></script>

    <script src="{{asset('vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>
    
    <script src="{{asset('vendor/gaugeJS/dist/gauge.min.js')}}"></script>


    <!--  flot-chart js -->
    <script src="{{asset('vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('vendor/flot/jquery.flot.resize.js')}}"></script>


    <!-- Owl Carousel -->
    <script src="{{asset('vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>


    <!-- Counter Up -->
    <script src="{{asset('vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
    <script src="{{asset('vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>


    <script src="{{asset('js/dashboard/dashboard-1.js')}}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
          <script>
                swal("{{session('status')}}");
          </script>  
          

    @endif



      

      @yield('scripts')
</body>

</html>