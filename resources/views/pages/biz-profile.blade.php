@extends('master')
<!-- HEAD -->
@section('title', 'Business Profile')
@section('stylesheets')
   <link href="{{asset('../plugins/Bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="{{asset('../plugins/nanogallery/css/nanogallery.min.css')}}">
   <link href="{{asset('../plugins/bootstrap-editable/bootstrap-editable.css')}}" rel="stylesheet">
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
 <div id="page-content" class="company-profile page-content">
    <div class="container">
      @include('partials.notifications')
       <div class="row">
        <div class="col-md-9">
          <!-- inner breadcrumb -->
          <div class="row page-title-row">
            <div class="col-md-8">
              <h3 class="m0-top"><a href="/"><i class="fa fa-home"></i> </a> » <a href="/businesses">Business Listings </a> » <small>{{$biz->name}} Profile</small></h3>
            </div>
            <div class="col-md-4 text-right social-link">
                      <div class="btn-group">
                        <button type="button" class="btn btn-default"><i class="fa fa-heart"></i> Like</button>
                        <button type="button" class="btn btn-default"><i class="fa fa-share-alt"></i> Share</button>
                       </div>
            </div>
          </div>
          <!-- profile overview -->
          <div class="row p20-bttm p20-top profile-overview">
            <div class="col-md-3 col-sm-3">
              <figure class="center-block">
                  <img class="center-block" src="{{asset('img/content/post-img-10.jpg') }}" alt="">
              </figure>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <h2>{{$biz->name}}</h2>
                <div class="row">
                    <div class="col-md-8 p20-bttm">              
                        <p class="m5-bttm"><i class="fa fa-tags" style="margin-top:2px;"></i> @foreach($biz->cats as $cat)<span><a class="btn btn-border" href="#">{{$cat->name}}</a></span> @endforeach                      
                        @foreach($biz->subcats as $sub)<span><a class="btn btn-border" href="#">{{$sub->name}}</a></span>@endforeach</p>
                        <p class="m5-bttm address-preview"><i class="fa fa-map-marker"></i> <span>{{$biz->address->street}}</span>, <span>{{$biz->address->lga->name}}</span>, <span>{{ $biz-> address->state->name}}</span>, Nigeria.</p>
                        <p class="m5-bttm"><i class="fa fa-phone"></i> (+234)-{{$biz->phone1}}</p>
                        <p class="m5-bttm"> <i class="fa fa-phone"></i> (+234)-{{$biz->phone2}}</p>
                        <p><span><i class="fa fa-external-link"></i>  {{$biz->website}}</span></p>
                    </div>
                    <div class="col-md-4">
                            <div class="opening-hours table-responsive">
                              <h5 class="m0 p0"><i class="fa fa-clock-o"></i> Opening Hours</h5>                              
                              <table class="table">
                                <tbody>
                                  <tr><th>Mon:</th>  <td>9AM-5PM</td></tr>
                                  <tr><th>Tues:</th> <td>9AM-5PM</td></tr>
                                  <tr><th>Wed:</th> <td>9AM-5PM</td></tr>
                                  <tr><th>Thurs:</th>  <td>9AM-5PM</td></tr>
                                  <tr><th>Fri:</th> <td>9AM-5PM</td></tr>
                                  <tr><th>Sat:</th> <td>9AM-5PM</td></tr>
                                  <tr><th>Sun:</th> <td>9AM-5PM</td></tr>
                                </tbody>
                              </table>
                            </div>
                    </div>
                </div>
            </div>
          </div>
          <!-- profile tabs -->
          <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="tab-content">
                  <div class="tab-pane active" id="company-product">
                    <div class="company-product">

                      <h3 class="text-uppercase m10-top">Gallery</h3>

                      <div class="row">
                            <div id="nanoGallery3">
                                <a href="post-img-2.jpg" data-ngthumb="post-img-2.jpg" data-ngdesc="Description1">Title Image1</a>
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

                  <div class="tab-pane" id="company-contact">
                    <div class="company-profile company-contact">

                      <h3 class="text-uppercase m10-top">Contact Us
                        <span class="social-link text-right">
                          <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                          </ul>
                        </span>
                      </h3>

                      <div class="row">
                        <div class="col-md-12">

                          <div class="contact-map-company">
                            <div id="map">

                            </div>
                          </div> <!-- end .map-section -->
                          <div class="row">
                            <h3 class="p10-left">Business Info</h3>
                            <div class="col-md-8">
                              <div class="address-details clearfix">
                                <i class="fa fa-map-marker"></i>
                                <p>
                                  <span>{{$biz->address->street}}</span>
                                  <span>{{$biz->address->lga->name}}</span>
                                  <span>{{$biz->address->state->name}}, Nigeria.</span>
                                </p>
                              </div>

                              <div class="address-details clearfix">
                                <i class="fa fa-phone"></i>
                                <p>
                                  <span><strong>Phone 1:</strong> {{$biz->phone1}}</span>
                                  <span><strong>Phone 2:</strong> {{$biz->phone2}}</span>
                                </p>
                              </div>

                              <div class="address-details clearfix">
                                <i class="fa fa-envelope-o"></i>
                                <p>
                                  <span><strong>E-mail:</strong> {{$biz->email}}</span>
                                  <span><strong>Website:</strong> {{$biz->website}}</span>
                                </p>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="opening-hours">
                                <h4><i class="fa fa-clock-o"></i> Opening Hours</h4>
                                <table>
                                  <tbody>
                                    <tr><th>Mon:</th>  <td>9AM-5PM</td></tr>
                                    <tr><th>Tues:</th> <td>9AM-5PM</td></tr>
                                    <tr><th>Wed:</th> <td>9AM-5PM</td></tr>
                                    <tr><th>Thurs:</th>  <td>9AM-5PM</td></tr>
                                    <tr><th>Fri:</th> <td>9AM-5PM</td></tr>
                                    <tr><th>Sat:</th> <td>9AM-5PM</td></tr>
                                    <tr><th>Sun:</th> <td>9AM-5PM</td></tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div> <!-- end main grid layout -->
                      </div> <!-- end .row -->

                      <h3>Send Us A Message</h3>
                      <form class="comment-form">
                        <div class="row">
                          <div class="col-md-4">
                            <input type="text" placeholder="Name *" required>
                          </div>

                          <div class="col-md-4">
                            <input type="email" placeholder="Email *" required>
                          </div>

                          <div class="col-md-4">
                            <input type="url" placeholder="Website">
                          </div>
                        </div>

                        <textarea placeholder="Your Comment ..." required></textarea>

                        <button type="submit" class="btn btn-default"><i class="fa fa-envelope-o"></i> Send Message</button>
                      </form>

                    </div> <!-- end .company-contact -->
                  </div> <!-- end .tab-pane -->

                  <div class="tab-pane" id="company-reviews">
                     <div class="company-ratings">
                      <h4>Rating <span>(5 Ratings)</span></h4>

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

            <div class="col-md-3 col-md-pull-9 category-toggle">
              <button><i class="fa fa-bars"></i></button>
              <div class="page-sidebar company-sidebar">

                <ul class="company-category nav nav-tabs home-tab" role="tablist">
                  <li class="active">
                    <a href="#company-product" role="tab" data-toggle="tab"><i class="fa fa-camera"></i>Gallery</a>
                  </li>

                  <li>
                    <a href="#company-contact" role="tab" data-toggle="tab"><i class="fa fa-envelope-o"></i>Contact</a>
                  </li>

                  <li>
                    <a href="#company-reviews" role="tab" data-toggle="tab"><i class="fa fa-comments"></i>Reviews</a>
                  </li>
                </ul>

                <div class="own-company">
                  <a href="#">Claim This Company</a>
                </div>
              </div> <!-- end .page-sidebar -->
            </div> <!-- end .main-grid layout -->
          </div> <!-- end .row -->
        </div>
        <!-- SIDEBAR RIGHT -->
        <div class="col-md-3">
          <div class="post-sidebar">
              <div class="recently-added">
                  <h2>Recent Reviews</h2>
                  <div class="single-product"></div>
                  
              </div>
             
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
              
          </div>
        </div>
       </div>
    </div> <!-- end .container -->
  </div> <!-- end #page-content -->
@endsection

@section('scripts')
  <script src="{{asset('../plugins/Bootstrap-3.3.5/js/bootstrap.js')}}"></script> 
  <script type="text/javascript" src="{{asset('../plugins/nanogallery/jquery.nanogallery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('https://maps.googleapis.com/maps/api/js')}}"></script>
  <script src="{{asset('../plugins/bootstrap-editable/bootstrap-editable.min.js')}}"></script>
    
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
            thumbnailWidth: 150
        });
    });
      
  </script>
  <script src="{{asset('js/scripts.js')}}"></script>
@endsection