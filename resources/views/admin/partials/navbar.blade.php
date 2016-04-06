<header id="header">
  <div class="header-top-bar p0-top p0-bttm">
    <div class="container">
      <!-- HEADER-LOG0 -->
      <div class="header-logo navbar-brand">
        <a href="/"><img src="{{ asset ('img/logo.png') }}" alt="Logo"></a>
      </div>
      <!-- END HEADER LOGO -->
      <nav aria-labelledby="user-navigation" class="pull-right hidden-sm hidden-xs" role="navigation">
        <ul class="nav navbar m0-bttm">
          <li><a href="/"><i class="fa fa-arrow-left"></i> go to Site</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Pages
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="/admin"> Overview</a></li>
                <li><a href="/admin/user"> Users</a></li>
                <li><a href="/admin/biz"> Businesses</a></li>
                <li><a href="/admin/cat"> Categories</a></li>
                <li><a href="/admin/location"> Locations</a></li>
                <li><a href="/admin/report"> Reports</a></li>
                <li><a href="/admin/upload"> Uploads</a></li>
                <li><a href="/admin/setting"> Settings</a></li>
            </ul>
          </li>
          <!-- HEADER-LOGIN -->
          @if(Auth::check())
            <li class="dropdown">
              <a class="btn" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span class="fa fa-user fa-fw"></span> {{Auth::user()->username}}<span class="fa fa-angle-down">
                </span></a>
              <ul class="dropdown-menu">
                <li><a href="/profile/{{Auth::user()->id}}"><i class="fa fa-user"></i> View Profile</a></li>
                <li><a href="{{ URL::to('auth/logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
              </ul>
            </li>
          @else
            <li class="hidden-xs">
              <a href="/auth/login"><i class="fa fa-power-off"></i> <span class="hidden-xs">Login</span></a>
            </li>
          @endif
          <li class="m15-left"><a href="/biz/create" class="btn btn-default p5 p10-left p10-right"><i class="fa fa-plus"></i> Add a Business</a></li>
        </ul>
      </nav>
    </div><!-- END .CONTAINER -->
  </div>
  <!-- END .HEADER-TOP-BAR -->

  @yield('page-banner')
  @yield('slider')
  @yield('breadcrumb')
  @yield('mobile-navbar')
</header> <!-- end #header -->