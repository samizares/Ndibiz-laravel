
<header id="header">
    <div class="header-top-bar hidden-sm hidden-xs p0-top p0-bttm">
      <div class="container">
        <!-- HEADER-LOG0 -->
        
          <h2 class="header-logo m0 m20-right p0-bttm navbar-brand hidden-xs">
            <a class="" href="/">Beazea
              <span>Direct<i class="fa fa-globe"></i>ry</span>
            </a>
          </h2>
          <nav ari-labelledby="navigation" role="navigation" class="pull-left">
            <ul class="nav navbar m0-bttm">
              <li><a href="/businesses" class=""><i class="fa fa-building"></i> Explore</a></li>
              <li><a href="/biz/create" class="btn btn-default p5 p10-left p10-right"><i class="fa fa-plus"></i> Add a Business</a></li>
            </ul>
            <div class="header-search-bar hidden">
              {!!Form::open(['method'=> 'POST', 'url'=>'/search/business']) !!}
              <div class="category-search">
                <select id="category2" name="category" placeholder="Search keywords e.g. pizza, bars, restaurants..."></select> 
              </div>
              <button class="search-btn" type="submit"><i class="fa fa-search"></i> <span class="hidden-lg hidden-md hidden-sm">Search</span></button>
              {!!Form::close() !!}
            </div> <!-- END .header-search-bar -->
          </nav>
      
        <!-- END HEADER LOGO -->
        <nav aria-labelledby="user-navigation" class="pull-right" role="navigation">
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
                <a href="#" class="dropdown-toggle m10-right" data-toggle="dropdown" arai-expanded="false"><i class="fa fa-plus-square"></i> <span class="hidden-xs">Register</span></a>
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