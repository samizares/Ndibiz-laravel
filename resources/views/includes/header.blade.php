
<header id="header">
    <div class="header-top-bar p0-top p0-bttm">
      <div class="container">
          <!-- HEADER-LOG0 -->
          <div class="header-logo navbar-brand">
              <a href="/"><img src="{{ asset ('img/logo.png') }}" alt="Logo"></a>
          </div>
          <!-- END HEADER LOGO -->
          {{--EXPLORE DROPDOWN--}}
          <nav ari-labelledby="navigation" role="navigation" class="pull-left hidden-sm hidden-xs">
            <ul class="nav navbar m0-bttm">
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-building-o"></i> Explore</a>
                  <ul class="dropdown-menu">
                      <li><a href="/businesses" class=""><i class="fa fa-building"></i> Businesses</a></li>
                      <li><a href="/categories" class=""><i class="fa fa-sort"></i> Categories</a></li>
                      <li><a href="/locations" class=""><i class="fa fa-map-marker"></i> Locations</a></li>
                  </ul>
              </li>
              <li><a href="/biz/create" class="btn btn-default p5 p10-left p10-right"><i class="fa fa-plus"></i> Add a Business</a></li>
            </ul>
          </nav>
        <nav aria-labelledby="user-navigation" class="pull-right hidden-sm hidden-xs" role="navigation">
          <ul class="nav navbar m0-bttm">          
              <!-- HEADER-LOGIN -->
              @if (Auth::check())  
              <li class="dropdown">           
                <a class="btn" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <span class="fa fa-user fa-fw"></span> {{Auth::user()->username}}<span class="fa fa-angle-down"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/user-profile"><i class="fa fa-user"></i> View Profile</a></li>
                    <li><a href="{{ URL::to('auth/logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
              </li>       
              @else
              <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-power-off"></i> <span class="hidden-xs">Login</span></a>
                <ul class="dropdown-menu">
                  <li class="">@include('partials.login')</li>
                </ul>
              </li>
              @endif
              <!-- HEADER REGISTER -->
              @if (Auth::guest())
              <li class="dropdown">
                <a href="#" class="dropdown-toggle m10-right" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-plus-square"></i> <span class="hidden-xs">Register</span></a>
                <ul class="dropdown-menu">
                  <li>@include('partials.register')</li>
                </ul>
              </li> 
              <!-- END .HEADER-REGISTER -->
              @endif 
           </ul>       
        </nav>
      </div><!-- END .CONTAINER -->
    </div>
    <!-- END .HEADER-TOP-BAR -->
    
    @yield('search') 
    @yield('slider')
    @yield('breadcrumb')
    @yield('header-navbar') 
</header> <!-- end #header -->