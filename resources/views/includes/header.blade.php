
<header id="header">
    <div class="header-top-bar">
      <div class="container">
        <!-- HEADER-LOG0 -->
        <div class="header-logo text-center">
          <h2><a href="/">NdiBiz Direct<i class="fa fa-globe"></i>ry</a></h2>
        </div>
        <!-- END HEADER LOGO -->

        <!-- CALL TO ACTION -->
        <div class="header-biz">
          <a href="/biz/create" class="btn btn-default"><i class="fa fa-plus"></i> Add a Business</a>           
        </div><!-- END .HEADER-CALL-TO-ACTION -->

        <!-- HEADER-SOCIAL -->
        <div class="header-social">
          <a class="btn" href="#"><span>Get Social</span>
            <span><i class="fa fa-share-alt"></i></span>
            <i class="social-arrow"></i>
          </a>

          <ul class="list-inline">
            <li class="active"><a href="#"><i class="fa fa-facebook-square"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
          </ul>
        </div>
        <!-- END HEADER-SOCIAL -->

        <!-- HEADER-LOGIN -->
        
          @if (Auth::check())
          <div class="header-login" style="margin-right:5px;">
            <a class="btn" href="#" class=""><strong><span class="fa fa-user fa-fw"></span> {{Auth::user()->username}}</strong> <span class="fa fa-angle-down"></span></a>
              <div class="btn" style="padding:0;"><a class="btn" href="/auth/logout"><i class="fa fa-power-off"></i> Logout</a></div>
          </div>       
          @else
          <div class="header-login">
          <a class="btn" href="#" class=""><i class="fa fa-power-off"></i> <span class="hidden-xs">Login</span></a>
          <div>@include('partials.login')</div>
        </div>
        @endif

        <!-- HEADER REGISTER -->
        @if (Auth::guest())
        <div class="header-register" style="margin-right:5px;">          
          <a href="#" class="btn"><i class="fa fa-plus-square"></i> <span class="hidden-xs">Register</span></a>
          <div>
            @include('partials.register')
          </div>
        </div> <!-- END .HEADER-REGISTER -->
        @else
        <a class="hidden" href="{{ URL::to('auth/logout') }}"><i class="fa fa-power-off"></i>Logout</a>
        @endif        

      </div><!-- END .CONTAINER -->
    </div>
    <!-- END .HEADER-TOP-BAR -->
    
    @yield('search') 
    @yield('slider')
    @yield('breadcrumb')
    @yield('header-navbar')   
  </div><!-- END .SEARCH-MAP -->
</header> <!-- end #header -->