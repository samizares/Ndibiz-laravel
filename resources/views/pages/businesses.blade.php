@extends('master')
<!-- HEAD -->
@section('title', 'Business Listings')
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
          <div class="col-md-8">
            <!-- inner breadcrumb -->
            <div class="row p10-bttm page-title-row">
              <div class="col-md-8">
                <h3 class="m0-top"><a href="/"><i class="fa fa-home"></i> </a> » <small>Business Listings</small></h3>
              </div>
              <div class="col-md-4 text-right"></div>
            </div>
            <div class="row businesses">
              <div class="col-md-8 col-md-push-4">
                <div class="page-content">
                  <div class="product-details-list view-switch">
                    <div class="tab-content">
                      @unless ( $cats->isEmpty() )
                      @foreach ($cats as $cat)
                      <div class="tab-pane" id="<?php $find = array(' & ',' And ',' and ',' ');$replace = array('');
                   echo str_replace($find, $replace, $cat->name); ?>">
                        <div class="row p0-top">
                          <div class="col-md-8">
                            <h3 class="m0-top">{{$cat->name}}</h3>
                          </div>
                          <div class="col-md-4">
                              {{--<div class="">--}}
                                  {{--<select class="instafilta-trigger">--}}
                                      {{--<option value="">Show all</option>--}}
                                      {{--<option value="machine" selected="selected">Machines</option>--}}
                                      {{--<option value="human">Humans</option>--}}
                                      {{--<option value="non-fictional">Non-fictional</option>--}}
                                  {{--</select>--}}
                              {{--</div>--}}
                            <div class="change-view pull-right">
                                <button class="grid-view"><i class="fa fa-th"></i></button>
                                <button class="list-view active"><i class="fa fa-bars"></i></button>
                            </div> 
                          </div>
                        </div>                                         
                        <div class="row clearfix p5-top">
                              @foreach ($cat->biz as $biz) 
                              <div class="col-md-6 col-sm-4">
                                <div class="single-product">
                                  <figure>
                                    <img src="{{isset($biz->profilePhoto->image) ? asset($biz->profilePhoto->image) : 
                                               asset('img/content/post-img-10.jpg') }}" alt="">
                                      <div class="rating">
                                          <ul class="list-inline">
                                              <li>
                                                  @for ($i=1; $i <= 5 ; $i++)
                                                      <span class="glyphicon glyphicon-star{{ ($i <= $biz->rating_cache) ? '' : '-empty'}}"></span>
                                                  @endfor
                                              </li>
                                          </ul>
                                          <p class="">{{$biz->rating_count}} {{ Str::plural('review', $biz->rating_count)}}</p>
                                      </div>
                                  </figure>
                                  <h4><a href="/review/biz/{{$biz->slug}}">{{$biz->name}}</a></h4>
                                    <p class="biz-tagline m20-bttm text-left">{{$biz->description}}</p>
                                    <p><span class="p0-bttm">@foreach( $biz->subcats as $sub) <span><a class="btn btn-border btn-xs" href="/biz/subcat/{{$sub->slug}}">
                                        <i class="fa fa-tags"></i> {{$sub->name}}</a></span> @endforeach</span></p>
                                  <p class="address-preview"><i class="fa fa-map-marker"></i> {{$biz->address->street}}, {{ $biz-> address->state->name}}</p>
                                </div> <!-- end .single-product -->
                              </div> <!-- end .col-sm-4 grid layout -->
                              {!! $cat->biz()->paginate(6)->render() !!} 
                              @endforeach 
                          </div> <!-- end .row -->
                      </div> <!-- end .tabe-pane -->  
                      @endforeach
                      @endunless               
                    </div> <!-- end .tabe-content -->
                  </div> <!-- end .product-details -->
                </div> <!-- end .page-content -->
              </div>

              <affix offset="20" class="col-md-4 col-md-pull-8 category-toggle">
                <button v-on="click:showLeft = true"><i class="fa fa-filter"></i> Filter </button>
                <sidebar show="{{@showLeft}}" placement="left" header="Title" width="350">
                    <div class="page-sidebar sidebar">
                      <!-- Category accordion -->
                      <div id="categories">
                        <div class="accordion">
                          <ul class="nav nav-tabs home-tab" role="tablist">
                             @foreach ($cats as $cat)
                              <li>
                                <a class="" href="#<?php $find = array(' & ',' And ',' and ',' ');$replace = array('');
                                  echo str_replace($find, $replace, $cat->name); ?>"
                                 role="tab" data-toggle="tab"><i class="fa fa-{{$cat->image_class}}"></i>
                                {{ $cat->name }}</a>
                              </li>
                              @endforeach

                          </ul>
                        </div> <!-- end .accordion -->
                      </div> <!-- end #categories -->
                    </div> <!-- end .page-sidebar -->
                </sidebar>
              </affix> <!-- end grid layout-->
            </div> <!-- end .row -->
          </div>
          <!-- SIDEBAR RIGHT -->
          <div class="col-md-4">
            @include('includes.sidebar')
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
    {{--<script src="{{asset('../node_modules/vue/dist/vue.js')}}"></script>--}}
    {{--<script src="{{asset('../node_modules/vu-strap/dist/vue-strap.js')}}"></script>--}}
    {{--VUE JS COMPONENTS--}}
    {{--<script>--}}
{{--//        var affix = require('vue-strap').affix;--}}
        {{--var aside = require('vue-strap').alert;--}}

        {{--new Vue({--}}
            {{--components: {--}}
{{--//                'affix': affix,--}}
{{--//                'aside': aside,--}}
                {{--'alert': alert--}}
            {{--}--}}
        {{--})--}}
    {{--</script>--}}
    {{--JQUERY PLUGINS--}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('li:first-child').addClass('active');
            $('.tab-pane:first-child').addClass('active');
        });
      // style switcr for list-grid view
      //--------------------------------------------------
      $(document).ready(function() {
          $('.change-view button').on('click',function(e) {

          if ($(this).hasClass('list-view')) {
            $(this).addClass('active');
            $('.grid-view').removeClass('active');
            $('.page-content .view-switch').removeClass('product-details').addClass('product-details-list');

          } else if($(this).hasClass('grid-view')) {
            $(this).addClass('active');
            $('.list-view').removeClass('active');
            $('.page-content .view-switch').removeClass('product-details-list').addClass('product-details');
            }
        });
      });
    </script>
    <script src="{{asset('js/scripts.js')}}"></script>
@endsection
