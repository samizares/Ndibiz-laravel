@extends('master')
<!-- HEAD -->
@section('title', 'User Profile')
@section('stylesheets')
  <link rel="stylesheet" href="{{ asset('../plugins/text-rotator/jquery.wordrotator.css')}}">
   <link href="{{asset('../plugins/Bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="{{asset('../plugins/nanogallery/css/nanogallery.min.css')}}">
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
                  @if (Auth::check())
                    <li class="hidden-lg hidden-md dropdown text-center"> 
                   
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menu1">
                        <i class="fa fa-user"></i> {{Auth::user()->username}} <span class="caret"></span></a>
                      <ul class="dropdown-menu text-center" role="menu" aria-labelledby="menu1">
                          <li class="/user-profile"><a href="#">View Profile</a></li>
                          <li class="divider"></li>
                          <li><a class="btn" href="/auth/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                      </ul>
                    </li>
                  @else
                    <li class="hidden-lg hidden-md"><a class="btn" href="/auth/login" class=""><i class="fa fa-power-off"></i> <span>Login</span></a></li>
                  @endif
                  <!-- HEADER REGISTER -->
                  @if (Auth::guest())
                    <li class="hidden-lg hidden-md"><a class="btn" href="/auth/register" class=""><i class="fa fa-plus-square"></i> <span>Register</span></a></li>
                  @endif
                  <li class="text-center hidden-lg hidden-md"><a href="/biz/create" class=""><i class="fa fa-plus"></i> Add a Business</a></li>

                  <li class="divider"></li>
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
  <div id="page-content" class="company-profile page-content user-profile">
    <div class="container">
      <div class="home-with-slide">
        <div class="row">
          <div class="col-md-9">
            <!-- profile overview -->
            <div class="row p20-bttm p20-top profile-overview">
              <div class="col-md-3 col-sm-3">
                <figure class="center-block">
                    <div class="profile-pic"><a href="">
                      <img class="img-responsive center-block" src="{{asset('img/content/post-img-10.jpg') }}">
                      <p class="pic-edit">
                        <i class="mdi-image-camera-alt"></i> 
                        <span>Update Profile Picture</span>
                      </p></a>
                    </div>
                </figure>
              </div>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="row">
                    <div class="col-md-8 p20-bttm">      
                      <h2 class="text-left">{{Auth::user()->username}}</h2>        
                      <p class="m5-bttm"><i class="fa fa-map-marker"></i> Lagos, Nigeria.</p>   
                      <ul class="list-inline m5-bttm">
                        <li><i class="fa fa-heart"></i> 20 Favourites</li>
                        <li><i class="fa fa-comments"></i> 50 Reviews</li>
                        <li><i class="fa fa-camera"></i> 13 Photos</li>
                      </ul>
                      <div class="checkbox m0">
                        <label>
                          <input type="checkbox" style="width:auto;"> Notify me of updates
                        </label>
                      </div>
                    </div>
                    <div class="col-md-4">
                        <div class="btn-group">
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Edit Profile"><i class="fa fa-cog"></i></button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Add Photo"><i class="fa fa-camera"></i></button>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" title="Add Review"><i class="fa fa-comment"></i></button>
                        <!-- <button type="button" class="btn btn-default" data-toggle="tooltip" title="Share"><i class="fa fa-share-alt"></i></button> -->
                       </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="row businesses">
              <div class="col-md-3 col-sm-3">              
              <div class="page-sidebar company-sidebar">
                <ul class="company-category nav nav-tabs home-tab" role="tablist">
                    <li class="active">
                      <a href="#biz-photos" role="tab" data-toggle="tab"><i class="fa fa-camera"></i> Gallery</a>
                    </li>
                    <li>
                      <a href="#fav" role="tab" data-toggle="tab"><i class="fa fa-heart"></i> Favourites</a>
                    </li>
                    <li>
                      <a href="#company-reviews" role="tab" data-toggle="tab"><i class="fa fa-comments"></i> Reviews</a>
                    </li>
                </ul>
              </div> <!-- end .page-sidebar -->
              </div> <!-- end .main-grid layout -->
              <div class="col-md-9 col-sm-9">
              <div class="tab-content">
                  <div class="tab-pane active" id="biz-photos">
                    <div class="company-product">
                      <h3 class="text-uppercase m10-top">Gallery</h3>
                      <div class="row">
                            <div id="nanoGallery3">
                                <a href="post-img-2.jpg" data-ngthumb="post-img-2.jpg" data-ngdesc="Description1">
                                  <span>Title Image1</span> <span class="text-right"><i class="fa fa-trash"></i></span></a>
                                <a href="post-img-2.jpg" data-ngthumb="post-img-2.jpg" data-ngdesc="Description1">Title Image1</a>
                                <a href="post-img-2.jpg" data-ngthumb="post-img-2.jpg" data-ngdesc="Description1">Title Image1</a>
                                <a href="post-img-2.jpg" data-ngthumb="post-img-2.jpg" data-ngdesc="Description1">Title Image1</a>
                                <a href="post-img-2.jpg" data-ngthumb="post-img-2.jpg" data-ngdesc="Description1">Title Image1</a>
                                <a href="post-img-2.jpg" data-ngthumb="post-img-2.jpg" data-ngdesc="Description1">Title Image1</a>
                                <a href="post-img-2.jpg" data-ngthumb="post-img-2.jpg" data-ngdesc="Description1">Title Image1</a>
                                <a href="post-img-2.jpg" data-ngthumb="post-img-2.jpg" data-ngdesc="Description1">Title Image1</a>
                            </div>
                      </div> <!-- end .row -->
                    </div> <!-- end .company-product -->
                  </div> <!-- end .tab-pane -->

                  <div class="tab-pane" id="fav">
                    <div class="">
                      <div>
                        <div class="favourite-biz">
                          <h3 class="text-uppercase m10-top">Favourite Businesses</h3>
                          <div id="" class="row clearfix">
                            @unless ( $featured->isEmpty() )
                            @foreach ($featured as $feature)
                            <div class="col-md-4">
                              <div class="single-product">
                                <figure><a href="/review/biz/{{$feature->id}}">
                                  <img src="{{asset('img/content/post-img-1.jpg')}}" alt="">
                                  <div class="rating">
                                    <ul class="list-inline">
                                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                      <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    </ul>
                                  </div> <!-- end .rating --></a>
                                </figure>
                                <h5 class="m5-bttm">{{$feature->name}}</h5>
                                <p class="m5-bttm"><span data-toggle="tooltip" title="Remove from favourites"><a href=""><i class="fa fa-trash"></i></a></span></p>
                              </div> <!-- end .single-product -->
                            </div>
                            @endforeach
                            @endunless
                          </div>  <!-- end .row -->
                        </div>  <!-- end .container -->
                      </div>  <!-- end .featured-listing -->  
                    </div>        
                  </div> <!-- end .tab-pane -->

                  <div class="tab-pane" id="company-reviews">
                     <div class="company-ratings">
                      <h3 class="text-uppercase m10-top">Rating <span>(5 Ratings)</span></h3>
                      <div class="rating-with-details">
                        <div class="single-content">
                          <div class="company-rating-box">
                            <ul class="list-inline">
                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                              <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                              <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                            </ul>
                          </div>
                          <div class="rating-details">
                            <div class="meta">
                              <a href="#"><strong>John Snow</strong></a>
                              -12 sep, 2015 - 9:14 Am
                            </div>
                            <div class="content">
                              <p>I loved the services. The staff members where really helpful. Will definitely recommend to others.
                              </p>
                            </div>
                          </div>
                        </div> <!-- end .single-content -->
                        <div class="single-content">
                          <div class="company-rating-box">
                            <ul class="list-inline">
                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                              <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                              <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                            </ul>
                          </div>
                          <div class="rating-details">
                            <div class="meta">
                              <a href="#"><strong>John Snow</strong></a>
                              -12 sep, 2015 - 9:14 Am
                            </div>
                            <div class="content">
                              <p>I loved the services. The staff members where really helpful. Will definitely recommend to others.
                              </p>
                            </div>
                          </div>
                        </div> <!-- end .single-content -->
                        <div class="single-content">
                          <div class="company-rating-box">
                            <ul class="list-inline">
                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                              <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                              <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                            </ul>
                          </div>
                          <div class="rating-details">
                            <div class="meta">
                              <a href="#"><strong>John Snow</strong></a>
                              -12 sep, 2015 - 9:14 Am
                            </div>
                            <div class="content">
                              <p>I loved the services. The staff members where really helpful. Will definitely recommend to others.
                              </p>
                            </div>
                          </div>
                        </div> <!-- end .single-content -->
                      </div> <!-- end .rating-with-details -->
                    </div> <!-- end .company-rating -->
                  </div>
                </div> <!-- end .tab-content -->
              </div> <!-- end .main-grid layout -->            
          </div> <!-- end .row -->
          </div>
          <!-- SIDEBAR RIGHT -->
          <div class="col-md-3">
            <div class="post-sidebar">
                <!-- AD BAR MINI -->
                <div class="recently-added ad-mini">
                    <div class="category-item">
                        <a href=""> <i class="fa fa-newspaper-o"></i> Advert Space (Text) <br><span id="ad1"></span></a>
                    </div>
                </div>
                <!-- FEATURED BUSINESSES -->
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
                <!-- RECENTLY ADDED BUSINESSES -->
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
                <!-- AD BAR MEDIUM -->
                <div class="recently-added">
                  <div class="ad-box"> 
                    <a href="" class=""><span id="ad2"></span></a>   
                  </div>                           
                </div>
                <!-- RECENT REVIEWS -->
                <div class="recently-added">
                    <h2>Recent Reviews</h2>
                    <div class="single-product"></div>
                </div>
            </div>
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
  <script src="{{asset('../plugins/text-rotator/jquery.wordrotator.min.js') }}"></script>
  <script src="{{asset('../plugins/Bootstrap-3.3.5/js/bootstrap.js')}}"></script> 
  <script type="text/javascript" src="{{asset('../plugins/nanogallery/jquery.nanogallery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('https://maps.googleapis.com/maps/api/js')}}"></script>    
  <script type="text/javascript">    

    function initialize() {
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
          center: new google.maps.LatLng(44.5403, -78.5463),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);

    $(document).ready(function() {        
        $('li:first-child').addClass('active');
      //  $('.tab-pane:first-child ').addClass('active');
    });

    $(document).ready(function () {
        $("#nanoGallery3").nanoGallery({
            itemsBaseURL:"{{asset('../img/content/')}}",
            thumbnailHoverEffect:'imageScale150',
            thumbnailHeight:100,
            thumbnailWidth: 200
        });
    });

    //Text rotator
      //-------------------------------------------------

          $(document).ready(function () {
              $("#ad1").wordsrotator({
                words: ['Local Restaurants (Mama Put)','Hotels','Mechanic Workshops'], 
                randomize: true, 
                animationIn: "fadeIn", 
                animationOut: "fadeOut", 
                speed: 5000 
              });
              $("#ad2").wordsrotator({
                words: ['<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=AD1-IMAGE&w=350&h=150">',
                        '<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=AD2-IMAGE&w=350&h=140">',
                        '<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=AD3-IMAGE&w=350&h=130">'],
                randomize: true, 
                animationIn: "fadeIn", 
                animationOut: "fadeOut", 
                speed: 5000 
              });
          });  
      
  </script>
  <script src="{{asset('js/scripts.js')}}"></script>
@endsection
