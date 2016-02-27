@extends('master')
<!-- HEAD -->
@section('title', 'Business Listings')
@section('stylesheets')
@endsection
<!-- HEADER -->
<!-- search -->
@section('search')
    <div class="header-search map">
        <div class="header-search-bar">
            <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Business Listings</h2>
        </div> <!-- END .header-search-bar -->
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
                        <li class="text-center"><a href="/businesses"><i class="fa fa-building-o"></i> Explore</a></li>
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
              {{--filters--}}
              <hr class="m5">
              <h4>Filters</h4>
            <div class="row m15-top m5-left m5-right">
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control" id="sel1">
                            <option>All Locations</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control" id="sel1">
                            <option>All Categories</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control" id="sel1">
                            <option>All Tags</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                </div>
            </div>
              <hr class="m5">
              {{--business listings--}}
            <div class="row businesses">
              <div class="col-md-12">
                <div class="page-content">
                  <div class="product-details view-switch">
                    <div class="tab-content">

                      <div class="tab-pane" id="">
                        <div class="row p0-top">
                          <div class="col-md-4">
                            {{--<h3 class="m0-top">{{$bizs->name}}</h3>--}}
                          </div>
                          <div class="col-md-8">
                            <div class="change-view pull-right hidden">
                                <button class="grid-view active"><i class="fa fa-th"></i></button>
                                <button class="list-view"><i class="fa fa-bars"></i></button>
                            </div>
                          </div>
                        </div>
                        <div class="row clearfix p5-top">
                              @foreach ($bizs as $biz)
                              <div class="col-md-4 col-sm-3">
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
                                    <p class="m5-bttm"><span class="p0-bttm">@foreach( $biz->subcats as $sub) <span><a class="btn btn-border btn-xs" href="/biz/subcat/{{$sub->slug}}">
                                        <i class="fa fa-tags"></i> {{$sub->name}}</a></span> @endforeach</span>
                                    </p>
                                </div> <!-- end .single-product -->
                              </div> <!-- end .col-sm-4 grid layout -->
                              @endforeach
                              <div class="clearfix container">
                                  <?php echo $bizs->render(); ?>
                              </div>
                          </div> <!-- end .row -->
                      </div> <!-- end .tabe-pane -->

                    </div> <!-- end .tabe-content -->
                  </div> <!-- end .product-details -->
                </div> <!-- end .page-content -->
              </div>
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
      // style switcher for list-grid view
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
