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
              <li><a href="/businesses"><i class="fa fa-building-o"></i> Explore</a></li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-question"></i> Help
                      <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="#" class=""> How to register</a></li>
                      <li><a href="#" class=""> FAQs</a></li>
                      <li><a href="#" class=""> Contact us</a></li>
                  </ul>
              </li>
              <!-- HEADER-LOGIN -->
             @if(Auth::check())
              <li class="dropdown">
                <a class="btn" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <span class="fa fa-user fa-fw"></span> {{Auth::user()->username}}<span class="fa fa-angle-down">
                </span></a>
                <ul class="dropdown-menu">
                    <li><a href="/profile/{{Auth::user()->username}}/{{Auth::user()->id}}"><i class="fa fa-user"></i> View Profile</a></li>
                    @if(Auth::check())
                        @if(Auth::user()->admin)
                            <li><a href="/admin"><i class="fa fa-user"></i> View Admin Dashboard</a></li>
                        @endif
                    @endif
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
     @if ( Auth::check()  &&  ! Auth::user()->confirmed)
      <div class="bs-info" style="text-align:center">
            <div class="alert alert-info fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
               <p> <b>Note!</b> Please confirm your account before you begin/continue to upload files.
                Please click <a href="/confirm"><b>HERE</b></a> on how to</p>
             </div>
      </div>
   @endif

    <!-- END .HEADER-TOP-BAR -->

    @yield('search')
    @yield('slider')
    @yield('breadcrumb')
    @yield('mobile-header')
</header> <!-- end #header -->