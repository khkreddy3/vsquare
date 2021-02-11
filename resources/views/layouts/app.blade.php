<!--
=========================================================
* KHKRIT Dashboard 
==========================
* Product Page: https://www.khkrinnovators.com/
* Copyright  KHKRIT  (https://www.khkrinnovators.com)
* Coded by www.khkrinnovators.com
=========================================================
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Hari Krishna">
  <title>KHKRIT</title>
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
<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
                   <img src="{{ asset('public/logo/1602317702.jpeg') }}" alt="logo" width="100px"/>
                </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
            <a class="navbar-brand" href="{{ url('/') }}">
                   <img src="{{ asset('public/assets/front/images/logo.png') }}" alt="logo" />
                </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
     
        <hr class="d-lg-none" />
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
        @guest
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="{{ route('login') }}">
              <i class="fa fa-sign-in"></i>
              <span>{{ __('Login') }}</span>
            </a>
          </li>
          @else

          <li class="nav-item">
            <a class="nav-link nav-link-icon {{  Request::segment(1) === 'home' ? 'active' : null }}" href="{{ url('/home') }}">
              <i class="fa fa-home"></i>
              <span>{{ __('Dashboard') }}</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link nav-link-icon {{ Request::segment(1) === 'reference' ? 'active' : null }}" href="{{ url('/reference') }}">
              <i class="fa fa-users"></i>
              <span>{{ __('Reference') }}</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link nav-link-icon {{ Request::segment(1) === 'income' ? 'active' : null }}" href="{{ url('/income') }}">
              <i class="fa fa-inr"></i>
              <span>{{ __('Income') }}</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link nav-link-icon {{ Request::segment(1) === 'invoice' ? 'active' : null }}" href="{{ url('/invoice') }}">
              <i class="fa fa-inr"></i>
              <span>{{ __('Invoice') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon {{ Request::segment(1) === 'myprofile' ? 'active' : null }}" href="{{ route('admin.myprofile') }}">
              <i class="ni ni-single-02"></i>
              <span>{{ __('view Profile') }}</span>
            </a>
          </li>
          
         

          <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">1</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="{{ Auth::user()->profile }}" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  
                </div>
                <!-- View all -->
                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>

          <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Profile" src="{{ Auth::user()->profile }}">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span> 
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                 
                @can('manage-users')
                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                <i class="ni ni-single-02"></i>
                <span>Admin Management</span>
                </a>
                                @endcan                             
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  <i class="ni ni-user-run"></i>
                  <span>{{ __('Logout') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                 </form>
              </div>
            </li>
            @endguest
        </ul>
      </div>
    </div>
</nav>
  <main class="py-4">
            @yield('content')
    </main>
  <script src="{{ asset('public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="{{ asset('public/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <!-- khkrit JS -->
  <script src="{{ asset('public/assets/js/khkrit.js') }}"></script>
  <script src="{{ asset('public/assets/js/khkrit.min.js') }}"></script>
  @yield('extrascript')
</body>

</html>