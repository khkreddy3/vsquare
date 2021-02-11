<!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="{{ url('/') }}" style="color:#fff;">
                    
                    <img src="{{ asset('public/logo/1602317702.jpeg') }}" alt="logo" width="100px"/>
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item  {{ Request::routeIs('admin.dashboard') ? 'active' : '' }} ">
              <a class="nav-link" href="{{route('admin.dashboard')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item {{ Request::routeIs('admin.users.index') ? 'active' : '' }} ">
              <a class="nav-link" href="{{route('admin.users.index')}}">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Users</span>
              </a>
            </li>
            <li class="nav-item {{ Request::routeIs('admin.reference.index') ? 'active' : '' }} ">
              <a class="nav-link" href="{{route('admin.reference.index')}}">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Reference</span>
              </a>
            </li>
            <li class="nav-item {{ Request::routeIs('admin.income.index') ? 'active' : '' }} ">
              <a class="nav-link" href="{{route('admin.income.index')}}">
                <i class="ni ni-money-coins text-pink"></i>
                <span class="nav-link-text">Income</span>
              </a>
            </li>

            <!--<li class="nav-item {{ Request::routeIs('admin.invoice.index') ? 'active' : '' }} ">-->
            <!--  <a class="nav-link" href="{{route('admin.invoice.index')}}">-->
            <!--    <i class="ni ni-money-coins text-blue"></i>-->
            <!--    <span class="nav-link-text">Invoice</span>-->
            <!--  </a>-->
            <!--</li>-->

            <li class="nav-item {{ Request::routeIs('admin.withdraw.index') ? 'active' : '' }} ">
              <a class="nav-link" href="{{route('admin.withdraw.index')}}">
                <i class="ni ni-money-coins text-yellow"></i>
                <span class="nav-link-text">With-Draw</span>
              </a>
            </li>
            <li class="nav-item  {{ Request::routeIs('admin.settings') ? 'active' : '' }} ">
              <a class="nav-link" href="{{route('admin.settings')}}">
                <i class="ni ni-ui-04 text-primary"></i>
                <span class="nav-link-text">Settings</span>
              </a>
            </li>
            
          </ul>
          
          
        </div>
      </div>
    </div>
  </nav>

   
      