@extends('master')
<!-- HEAD -->
@section('title', 'Subcategory Businesses')
@section('stylesheets')
   <link href="{{asset('../plugins/Bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
@endsection
<!-- HEADER -->
<!-- search -->
@section('search')
  @include('partials.search')
@endsection
<!-- navigation -->
@section('header-navbar')
        <div class="header-nav-bar">
            <div class="container">
              <nav>
                <button><i class="fa fa-bars"></i></button>
                <ul class="primary-nav list-unstyled">
                  <li class=""><a href="/">Home<i class="fa fa-home"></i></a></li>
                  <li><a href="/categories">Categories</a></li>
                  <li class="bg-color active"><a href="/businesses">Businesses</a></li>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Contact Us</a></li>
                   <li><a href="/admin">Admin</a></li>
                </ul>
              </nav>
            </div> <!-- end .container -->
        </div> <!-- end .header-nav-bar -->   
@endsection
<!-- CONTENT -->
@section('content')
  @include('partials.notifications')

  <div id="page-content">
    <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row page-title-row">
          <div class="col-md-8 m5-bttm">
            <h3 class="m0-top"><a href="/"><i class="fa fa-home"></i> </a> » <a href="/categories">Business Categories </a> » <small>{{$sub->name}} Businesses</small></h3>
          </div>
          <div class="col-md-4 text-right">
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-9 col-md-push-3">
            <div class="page-content">
              <div class="product-details-list view-switch">
                <div class="tab-content">
                  <h3>Showing results for "{{$sub->name}} Businesses"</h3>
                  <div class="tab-pane active" id=""> 
                    <div class="change-view">
                        <button class="grid-view"><i class="fa fa-th"></i></button>
                        <button class="list-view active"><i class="fa fa-bars"></i></button>
                    </div> 
                     <div class="row clearfix">                       
                        @unless ( $bizs->isEmpty() )
                       @foreach ($bizs as $biz) 
                          <div class="col-sm-4 col-xs-6">
                            <div class="single-product">
                              <figure>
                                <img src="{{asset('img/content/post-img-10.jpg') }}" alt="">
                                <div class="rating">
                                  
                                </div> <!-- end .rating -->
                                <figcaption>
                                  <div class="bookmark">
                                    <a href="#"><i class="fa fa-bookmark-o"></i> Bookmark</a>
                                  </div>
                                  <div class="read-more">
                                    <a href="#"><i class="fa fa-angle-right"></i> Read More</a>
                                  </div>
                                </figcaption>
                              </figure>
                              <h4><a href="/review/biz/{{$biz->id}}">
                                {{$biz->name}}</a></h4>
                              <ul class="list-inline m5-bttm p10-left">
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li>50 reviews</li>
                                  </ul>
                              <span>@foreach( $biz->subcats as $sub) <span><a href="/biz/subcat/{{$sub->id}}"><i class="fa fa-tags"></i> {{$sub->name}}</a></span> @endforeach</span>
                              <h5 class="p5-top address-preview"><i class="fa fa-map-marker"></i> <span>{{$biz->address->street}}</span>, <span>{{ $biz-> address->state->name}}</span></h5>
                            </div> <!-- end .single-product -->
                          </div> <!-- end .col-sm-4 grid layout -->   
                          @endforeach
                @endunless

          
 
                      </div> <!-- end .row -->                   
                  </div> <!-- end .tabe-pane -->                 
                </div> <!-- end .tabe-content -->
              </div> <!-- end .product-details -->
            </div> <!-- end .page-content -->
          </div>

          <div class="col-md-3 col-md-pull-9 category-toggle">
            <button><i class="fa fa-briefcase"></i></button>
            <div class="post-sidebar">
              <div class="latest-post-content">
                <h2>Filters</h2>                
              </div>

            </div> <!-- end .page-sidebar -->
          </div> <!-- end grid layout-->
        </div> <!-- end .row -->
      </div>
      <!-- SIDEBAR RIGHT -->
      <div class="col-md-3">
        <div class="post-sidebar">
            <div class="latest-post-content">
                <h2>Featured Businesses</h2>
                @if ( ! $featured-> isEmpty() )
                       @foreach ($featured as $feature)
                <div class="latest-post clearfix">

                  <div class="post-image">
                    <img src="{{asset('img/content/latest_post_1.jpg') }}" alt="">
                  </div>

                  <h4><a href="/review/biz/{{$feature->id}}">{{$feature->name}}</a></h4>

                  <p>Check out this great business on Ndibiz.</p>

                  <a class="read-more" href="/review/biz/{{$feature->id}}"><i class="fa fa-angle-right"></i>Read More</a>
                </div> <!-- end .latest-post -->
                @endforeach
                 @endif


            </div>
            <div class="recently-added">
                <h2>Recently Added</h2>
                 @if ( ! $recent-> isEmpty() )
                       @foreach ($recent as $new)
                <div class="latest-post clearfix">

                  <div class="post-image">
                    <img src="{{asset('img/content/latest_post_1.jpg') }}" alt="">

                    <p><span>12</span>Sep</p>
                  </div>

                  <h4><a href="/review/biz/{{$new->id}}">{{$new->name}}</a></h4>

                  <p>Recent Biz added on Ndibiz</p>

                  <a class="read-more" href="/review/biz/{{$new->id}}"><i class="fa fa-angle-right"></i>Read More</a>
                </div> <!-- end .latest-post -->
                @endforeach
                @endif
            </div>
            <div class="recently-added">
                <h2>Advertisement</h2>
                <div class="category-item">
                    <a href=""> <i class="fa fa-newspaper-o"></i> Advert Space</a>
                </div>
            </div>
            <div class="recently-added">
                <h2>Recent Reviews</h2>
                <div class="single-product"></div>
            </div>
        </div>
      </div>
    </div>
    </div> <!-- end .container -->
  </div>  <!-- end #page-content -->
@endsection
<!-- FOOTER STARTS -->
@section('footer')
  @include('includes.footer')
@endsection
<!-- FOOTER ENDS -->
@section('scripts')
  <script src="{{asset('../plugins/Bootstrap-3.3.5/js/bootstrap.js')}}"></script>    
  <script type="text/javascript">
    $(document).ready(function() {        
        $('li:first-child').addClass('active');
        $('.tab-pane:first-child ').addClass('active');
    });

      // style switcr for list-grid view
      //--------------------------------------------------
      $(document).ready(function() {
          $('.change-view button').on('click',function(e) {
            
          if ($(this).hasClass('grid-view')) {
            $(this).addClass('active');
            $('.list-view').removeClass('active');
            $('.page-content .view-switch').removeClass('product-details-list').addClass('product-details');

          } else if($(this).hasClass('list-view')) {
            $(this).addClass('active');
            $('.grid-view').removeClass('active');
            $('.page-content .view-switch').removeClass('product-details').addClass('product-details-list');
            }
        });

      });

      $(function() {
              
      });
      
  </script>
  <script src="{{asset('js/scripts.js')}}"></script>
@endsection
