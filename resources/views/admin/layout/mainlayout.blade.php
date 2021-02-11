<!--
=========================================================
* KHKRIT Dashboard 
==========================
* Product Page: https://www.khkrinnovators.com/
* Copyright  KHKRIT  (https://www.khkrinnovators.com)
* Coded by www.khkrinnovators.com


this admin app
=========================================================
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Hari Krishna">
  <title>VSQUARE</title>
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('public/assets/img/brand/favicon.png') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('public/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('public/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Page plugins -->
  <!-- khkrit CSS -->
  <link rel="stylesheet" href="{{ asset('public/assets/css/khkrit.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('public/assets/css/khktit.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('public/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/vendor/fullcalendar/dist/fullcalendar.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
  <script src="{{ asset('public/assets/vendor/jquery/dist/jquery.min.js') }}"></script>

</head>

<body>
@include('admin.layout.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
<!-- Navbar -->
@include('admin.layout.nav')


@yield('content')



 <!-- Footer-->
 @include('admin.layout.footer')
      </div>
  </div>
<!-- khkrit Scripts -->
  <!-- Core -->
   <!--<script src="{{ asset('public/assets/vendor/jquery/dist/jquery.min.js') }}"></script> -->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
 
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" ></script>-->
    <script src="{{ asset('public/assets\vendor\bootstrap-datepicker\dist\js\bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="{{ asset('public/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <!-- khkrit JS -->
  <script src="{{ asset('public/assets/js/khkrit.js') }}"></script>
  <script src="{{ asset('public/assets/js/khkrit.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/list.js/dist/list.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
   <script src="{{ asset('public/assets/js/argon.min5438.js') }}"></script> 
  <script src="{{ asset('public/assets/vendor/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/fullcalendar/dist/fullcalendar.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
  
  @yield('extrascript')
</body>

</html>