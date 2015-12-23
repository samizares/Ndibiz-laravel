@extends('master')
<!-- HEAD -->
@section('title', 'Locations')
@section('stylesheets')
@endsection
<!-- HEADER -->
<!-- search -->
@section('search')
  @include('partials.search')
@endsection
@section('header-navbar')
    <div class="header-nav-bar">
        <div class="container">
            <nav class="hidden-lg hidden-md">
                <button><i class="fa fa-bars"></i></button>
                <ul class="primary-nav list-unstyled">
                    @if (Auth::check())
                        <li class="hidden-lg hidden-md dropdown text-center">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menu1">
                                <i class="fa fa-user"></i> {{Auth::user()->username}} <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu" aria-labelledby="menu1">
                                <li class=""><a href="#">View Profile</a></li>
                                <li class="divider"></li>
                                <li><a class="btn" href="/auth/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a class="btn" href="/auth/login" class=""><i class="fa fa-power-off"></i> <span>Login</span></a></li>
                        @endif
                                <!-- HEADER REGISTER -->
                        @if (Auth::guest())
                            <li><a class="btn" href="/auth/register" class=""><i class="fa fa-plus-square"></i> <span>Register</span></a></li>
                        @endif
                        {{--<li class="text-center"><a href="/businesses" class=""><i class="fa fa-building"></i> Explore</a></li>--}}
                        <li class="dropdown text-center">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-building-o"></i> Explore</a>
                            <ul class="dropdown-menu">
                                <li><a href="/businesses" class=""><i class="fa fa-building"></i> Businesses</a></li>
                                <li><a href="/categories" class=""><i class="fa fa-sort"></i> Categories</a></li>
                                <li><a href="/locations" class=""><i class="fa fa-map-marker"></i> Locations</a></li>
                            </ul>
                        </li>
                        <li class="text-center"><a href="/biz/create" class=""><i class="fa fa-plus"></i> Add a Business</a></li>
                </ul>
            </nav>
        </div> <!-- end .container -->
    </div> <!-- end .header-nav-bar -->
@endsection
<!-- CONTENT -->
@section('content')
  <div id="page-content">
    <div class="container">
        @include('partials.notifications')
      <div class="home-with-slide category-listing">
        <div class="row">
          <div class="col-md-12">
            <!-- inner breadcrumb -->
            <div class="row p10-bttm page-title-row">
              <div class="col-md-12">
                <h3 class="m0-top"><a href="/"><i class="fa fa-home"></i> </a> » <small>Locations</small></h3>
              </div>
            </div>
              <hr class="m0 p0">
            <div class="row categories">
              <div class="col-md-12">
                  <div class="row">
                      @foreach($states as $state)
                          <div class="col-md-4">
                              <ul class="list-unstyled">
                              <li>
                                  <h3 class="text-uppercase">{{$state->name}}</h3>
                                  @foreach($state->lgas as $area)
                                  <p><a class="text-capitalize" href="">{{$area->name}} <strong>({{$area->count()}})</strong></a></p>
                                  @endforeach
                              </li>
                              </ul>
                          </div>
                      @endforeach
                  </div>
              </div>
            </div> <!-- end .row -->
          </div>
        </div>
      </div> <!-- end .home-with-slide -->
    </div> <!-- end .container -->
  </div>  <!-- end #page-content -->
@endsection
<!-- CONTENT ENDS-->
<!-- FOOTER STARTS -->
@section('footer')
  @include('includes.footer')
@endsection
<!-- FOOTER ENDS -->

@section('scripts')

    <script type="text/javascript">

    </script>
    <script src="{{asset('js/scripts.js')}}"></script>
@endsection
