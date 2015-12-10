@extends('master')
<!-- HEAD -->
@section('title', 'Home')
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('../plugins/text-rotator/jquery.wordrotator.css')}}">
    <link href="{{asset('../plugins/Bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
@endsection
<!-- HEADER -->
<!-- search -->
{{--@section('search')--}}
  {{--@include('partials.search')--}}
{{--@endsection--}}
<!-- slider -->
@section('slider')
        <div id="homepage" class="slider-content">
          <div id="home-slider" class="">
            <div class="item">
              <img src="{{asset('img/content/lagosnight.jpg')}}" alt="">
              <div class="slide-content">
                <div class="lp-content">
                  <h1 class="text-center page-title hidden-xs m5-bttm"> Discover
                    <span class="rotate">
                        <span>Businesses in Your City</span>
                        <span>Restaurants in Lagos</span>
                        <span>Hotels in Abuja</span>
                        <span>Clubs in Victoria Island</span>
                        <span>Banks in Ikeja</span>
                    </span>
                  </h1>
                    <h1 class="page-title hidden-lg hidden-md hidden-sm m5-bttm">Discover your city</h1>
                  <h3 class="page-subtitle m5-top">Find great places to stay, eat, shop, or visit from local experts.</h3>
                  <h1><a class="btn btn-default btn-lg" href="/businesses"><i class="fa fa-plus-square"></i> Explore Businesses</a></h1>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- END .slider-content -->    
@endsection
<!-- navigation -->
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
                  <li class="text-center"><a href="/businesses" class=""><i class="fa fa-building"></i> Explore</a></li>
                  <li class="text-center"><a href="/biz/create" class=""><i class="fa fa-plus"></i> Add a Business</a></li>

                  <li class="divider"></li>
                </ul>
              </nav>
            </div> <!-- end .container -->
        </div> <!-- end .header-nav-bar -->   
@endsection
<!-- CONTENT -->
@section('content')
  @include('partials.notifications')
  
  <div id="page-content" class="home-slider-content">
    <div class="container">
      <div class="home-with-slide category-listing">
          <h3 class="section-title"><strong>Featured</strong> Categories</h3>
          <span class="section-subtitle text-color-grey444">Explore our most popular business categories.</span>
        <div class="row homepage">
          <div class="col-md-9 col-md-push-3">
            <div class="page-content">
              <div class="product-details">              
                <div class="tab-content">    
                @unless ( $cats->isEmpty() )
                @foreach ($cats as $cat)
                    <div class="tab-pane" id="<?php $find = array('&','And','and',' ');$replace = array('');
                     echo str_replace($find, $replace, $cat->name); ?>">                      
                        <div class="row clearfix">    
                        @foreach ($cat->subcats as $sub)
                            <div class="col-md-3 col-sm-4 col-xs-6">
                              <div class="category-item">
                               <a class="btn" href="/biz/subcat/{{$sub->id}}"><span class="">{{$sub->name}}</span>
                               <p class="sub-counter animated slideIn">
                                  <span>{{$sub->name}}</span>
                                  <span class="biz-counter">{{$sub->biz->count()}} businesses <i class="fa fa-building"></i></span>
                               </p>
                               </a>
                              </div>
                            </div> 
                          @endforeach
                        </div> <!-- end .row -->                   
                    </div> <!-- end .tabe-pane -->
                 @endforeach
                 @endunless
                    <div class="discover-more">
                        <a class="btn btn-default text-center" href="/categories">Discover More Categories</a>
                    </div>
                </div> <!-- end .tabe-content -->
             
              </div> <!-- end .product-details -->
            </div> <!-- end .page-content -->
          </div>

          <div class="col-md-3 col-md-pull-9 category-toggle">
            <button><i class="fa fa-bars"></i></button>
            <div class="page-sidebar">
              <!-- Category accordion -->
              <div id="categories">
                <div class="accordion">
                  <ul class="nav nav-tabs home-tab" role="tablist">
                     @foreach ($cats as $cat)
                      <li>
                        <a class="" href="#<?php $find = array('&','And','and',' ');$replace = array('');
                          echo str_replace($find, $replace, $cat->name); ?>" 
                         role="tab" data-toggle="tab"><i class="fa fa-{{$cat->image_class}}"></i>
                        {{ $cat->name }}</a>
                      </li>
                      @endforeach                    
                  </ul>
                </div> <!-- end .accordion -->
              </div> <!-- end #categories -->

            </div> <!-- end .page-sidebar -->
          </div> <!-- end grid layout-->
        </div> <!-- end .row -->
      </div> <!-- end .home-with-slide -->
    </div> <!-- end .container -->
  </div>  <!-- end #page-content -->
  
  <div class="featured-listing" id= "featured-list">
    <div class="container">
        <h3 class="section-title"><strong>Featured</strong> Businesses</h3>
        <span class="section-subtitle text-color-greyddd">Explore top rated businesses based on customers' ratings.</span>
      <div id="businesses-slider" class="owl-carousel owl-theme clearfix p20-top">
        @unless ( $featured->isEmpty() )
                  @foreach ($featured as $feature)
        <div class="item">
          <div class="single-product">
              <a href="/review/biz/{{$feature->id}}">
            <figure>
              <img src="{{asset('img/content/post-img-1.jpg')}}" alt="">
              <div class="rating">
                <ul class="list-inline">
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star-half-o"></i></li>
                  <li><i class="fa fa-star-o"></i></li>
                </ul>
                <p>
                    @foreach($feature->cats as $cat)
                        {{ $cat->name }}
                    @endforeach
                </p>
              </div>
            </figure>
            <h4 class="text-left">{{$feature->name}}</h4>
              <p class="biz-tagline m20-bttm text-left">Business tagline goes here...</p>
              <p class="text-left m0-bttm">
                  @foreach($feature->subcats as $sub)
                  <span class="btn btn-border btn-xs btn-tags" role="button"><i class="fa fa-tags"></i> {{$sub->name}}</span>
                  @endforeach
              </p>
              </a>
          </div> <!-- end .single-product -->
        </div>
        @endforeach
        @endunless
      </div>  <!-- end .row -->
      <div class="discover-more m20-bttm">
        <a class="btn btn-default text-center" href="/businesses">Discover More Businesses</a>
      </div>
    </div>  <!-- end .container -->
  </div>  <!-- end .featured-listing -->
  
  <div class="register-content">
    <div class="reg-heading">
      <h3>List a business for <strong class="text-color-yellowFFD231">Free</strong> now <br> <span class="btn btn-default"><a href="/biz/create"><i class="fa fa-plus"></i> Add a Business</a></span></h3>
    </div>

    <div class="registration-details">
      <div class="container">
          <h3 class="section-title"><strong>See How It Works</strong></h3>
          <span class="section-subtitle text-color-grey222 text-center">Discover how easy our directory can help you connect with businesses around you.</span>
          <div class="row m20-top m20-bttm">
              <div class="col-md-4 m20-bttm">
                  <div class="box regular-member">
                      <i class="fa fa-user m10-bttm"></i>
                      <h4 class="p5-bttm">Choose What To Do</h4>
                      <p>Lorem ipsum dolor sit amet, wisi constituto vim in. An eum audire verterem, an rebum adipiscing has. </p>
                  </div>
              </div>
              <div class="col-md-4 m20-bttm">
                  <div class="box business-member">
                      <i class="fa fa-search m10-bttm"></i>
                      <h4 class="p5-bttm">Find What You Want</h4>
                      <p>Lorem ipsum dolor sit amet, wisi constituto vim in. An eum audire verterem, an rebum adipiscing has. </p>
                  </div>
              </div>
              <div class="col-md-4 m20-bttm">
                  <div class="box business-member">
                      <i class="fa fa-building m10-bttm"></i>
                      <h4 class="p5-bttm">Explore local businesses</h4>
                      <p>Lorem ipsum dolor sit amet, wisi constituto vim in. An eum audire verterem, an rebum adipiscing has. </p>
                  </div>
              </div>
          </div>
      </div>
      <!-- END .CONTAINER -->
    </div>
    <!-- END .REGISTRATION-DETAILS -->
  </div>
  <!-- END REGISTER-CONTENT -->
@endsection


<!-- FOOTER STARTS -->
  @section('footer')
    @include('includes.footer')
  @endsection
<!-- FOOTER ENDS -->

<!-- SCRIPTS STARTS -->
  @section('scripts')

    <script src="{{asset('../plugins/text-rotator/jquery.wordrotator.min.js') }}"></script>
    <script src="{{asset('../plugins/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{asset('../plugins/Bootstrap-3.3.5/js/bootstrap.js')}}"></script>

    <script>
      //Text rotator
      //-------------------------------------------------
      $(document).ready(function() {
          $('.rotate').rotaterator({fadeSpeed:2000, pauseSpeed:80});
      });

          $(document).ready(function() {        
              $('li:first-child').addClass('active');
              $('.tab-pane:first-child ').addClass('active');
          });       
    </script>
    <script src="{{asset('js/scripts.js') }}"></script>
  @stop
<!-- SCRIPTS ENDS -->