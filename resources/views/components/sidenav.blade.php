<div class="app-menu navbar-menu">
      <!-- LOGO -->
      <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
          <span class="logo-sm">
            <img src="assets/{{ asset('assets/images')}}/logo-sm.png" alt="" height="22" />
          </span>
          <span class="logo-lg">
            <img src="assets/{{ asset('assets/images')}}/logo-dark.png" alt="" height="17" />
          </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
          <span class="logo-sm">
            <img src="assets/{{ asset('assets/images')}}/logo-sm.png" alt="" height="22" />
          </span>
          <span class="logo-lg">
            <img src="assets/{{ asset('assets/images')}}/logo-light.png" alt="" height="17" />
          </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
          <i class="ri-record-circle-line"></i>
        </button>
      </div>

      <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item {{ Request::is('dashboard*') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('home') }}">
                        <i data-feather="home" class="icn-dual"></i>
                        <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('buses*') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('buses.index') }}">
                      <i class="bx bx-bus "></i>
                        <span data-key="t-buses">Buses</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('routes*') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('routes.index') }}">
                      <i class="bx bx-map "></i>
                        <span data-key="t-routes">Routes</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('customers*') ? 'active' : '' }}">
                  <a class="nav-link menu-link" href="{{ route('customers.index') }}">
                    <i class="bx bx-user "></i>
                      <span data-key="t-routes">Customers</span>
                  </a>
              </li>
              <li class="nav-item {{ Request::is('seats*') ? 'active' : '' }}">
                <a class="nav-link menu-link" href="{{ route('seats.index') }}">
                  <i class="bx bx-chair "></i>
                    <span data-key="t-bookings">Seats</span>
                </a>
            </li>
            
                <li class="nav-item {{ Request::is('bookings*') ? 'active' : '' }}">
                    <a class="nav-link menu-link" href="{{ route('bookings.index') }}">
                      <i class="bx bx-check-circle "></i>
                        <span data-key="t-bookings">Bookings</span>
                    </a>
                </li>
                <!-- Add more menu items as needed -->

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

      <div class="sidebar-background"></div>
    </div>