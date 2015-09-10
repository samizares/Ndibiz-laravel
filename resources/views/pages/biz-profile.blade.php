@extends('master')

@section('search')
@include('partials.search')

@endsection

@section('content')

	<div class="breadcrumb">

        <div class="featured-listing">
            <h2 class="page-title">{{$biz->name}} Profile</h2>
        </div>

  </div>
 </header> <!-- end #header -->
 <div id="page-content">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-md-push-3">
          <div class="page-content company-profile">

            <div class="tab-content">
              <div class="tab-pane active" id="company-profile">
                <h2>{{$biz->name}}</h2>
                      @foreach( $biz->cats as $cat)
                      <h5><a href="#">{{$cat->name}} </a> >>
                  </h5> @endforeach

                <div class="social-link text-right">
                  <div class="btn-group">
                    <button type="button" class="btn btn-default"><i class="fa fa-share-alt"></i> Share</button>
                   </div>
                </div>

                
                <div class="company-service">
                  <h4>Products / Service</h4>

                  
                 <ul class="list-inline">
                  @foreach( $biz->subcats as $sub)
                    <li><a href="#">{{$sub->name}}</a></li>
                  @endforeach</ul> 
                </div> <!-- end company-service -->

                @include('partials.notifications')

                <div class="opening-hours">
                  <h2>Opening Hours</h2>

                  <ul class="list-unstyled">
                    <li>
                      <strong>Mon-Fri:</strong>
                      <span>9AM-5PM</span>
                    </li>

                    <li>
                      <strong>Sat:</strong>
                      <span>10AM-3PM</span>
                    </li>

                    <li>
                      <strong>Sun:</strong>
                      <span>Closed</span>
                    </li>
                  </ul>
                </div>
              </div> <!-- end .tab-pane -->

              <div class="tab-pane" id="company-product">
                <div class="company-product">

                  <h2 class="text-uppercase mb30">Gallery</h2>

                  <div class="row">
                        <div id="nanoGallery">
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

                  <h2>Contact Us</h2>

                  <div class="social-link text-right">
                    <ul class="list-inline">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                  </div>

                  <div class="row">
                    <div class="col-md-12">

                      <div class="contact-map-company">
                        <div id="contact_map_canvas_one">

                        </div>
                      </div> <!-- end .map-section -->
                      <div class="row">
                        
                        <div class="col-md-6">
                      <h3>Business Address</h3>

                      <div class="address-details clearfix">
                        <i class="fa fa-map-marker"></i>

                        <p>
                          <span>{{$biz->address->street}}</span>
                          <span>{{$biz->address->lga->name}}</span>
                          <span>{{$biz->address->state->name}} Nigeria</span>
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
                          <span><span><strong>Website:</strong> {{$biz->website}}</span></span>
                        </p>
                      </div>
                        </div>
                        <div class="col-md-6">
                      <h3>Opening Hours</h3>

                      <div class="address-details clearfix">
                        <i class="fa fa-clock-o"></i>

                        <p>
                          <span><strong>Mo-Fri:</strong> 9AM - 5PM</span>
                          <span><span><strong>Saturday:</strong> 10AM - 2PM</span></span>
                          <span><strong>Sunday:</strong> Closed</span>
                        </p>
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

                  <div class="all-rating clearfix">
                    <div class="company-rating-box">
                      <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                      </ul>

                      <h6>Overall</h6>
                    </div>

                    <div class="company-rating-box">
                      <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                      </ul>

                      <h6>Quality</h6>
                    </div>

                    <div class="company-rating-box">
                      <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                      </ul>

                      <h6>Support</h6>
                    </div>

                    <div class="company-rating-box">
                      <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                      </ul>

                      <h6>Price</h6>
                    </div>

                    <div class="company-rating-box">
                      <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                      </ul>

                      <h6>Products</h6>
                    </div>
                  </div> <!-- end .all-rating -->


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

                        <h6>Overall</h6>
                      </div>

                      <div class="rating-details">
                        <div class="meta">
                          <a href="#"><strong>John Doe</strong></a>
                          -12 sep, 2014 - 9:14 Am
                        </div>

                        <div class="content">
                          <p>Phasellus congue lacus eget neque. Phasellus ornare,
                            ante vitae consectetuer consequat, purus sapien ultricies dolor.
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

                        <h6>Overall</h6>
                      </div>

                      <div class="rating-details">
                        <div class="meta">
                          <a href="#"><strong>John Doe</strong></a>
                          -12 sep, 2014 - 9:14 Am
                        </div>

                        <div class="content">
                          <p>Phasellus congue lacus eget neque. Phasellus ornare,
                            ante vitae consectetuer consequat, purus sapien ultricies dolor.
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

                        <h6>Overall</h6>
                      </div>

                      <div class="rating-details">
                        <div class="meta">
                          <a href="#"><strong>John Doe</strong></a>
                          -12 sep, 2014 - 9:14 Am
                        </div>

                        <div class="content">
                          <p>Phasellus congue lacus eget neque. Phasellus ornare,
                            ante vitae consectetuer consequat, purus sapien ultricies dolor.
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

                        <h6>Overall</h6>
                      </div>

                      <div class="rating-details">
                        <div class="meta">
                          <a href="#"><strong>John Doe</strong></a>
                          -12 sep, 2014 - 9:14 Am
                        </div>

                        <div class="content">
                          <p>Phasellus congue lacus eget neque. Phasellus ornare,
                            ante vitae consectetuer consequat, purus sapien ultricies dolor.
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

                        <h6>Overall</h6>
                      </div>

                      <div class="rating-details">
                        <div class="meta">
                          <a href="#"><strong>John Doe</strong></a>
                          -12 sep, 2014 - 9:14 Am
                        </div>

                        <div class="content">
                          <p>Phasellus congue lacus eget neque. Phasellus ornare,
                            ante vitae consectetuer consequat, purus sapien ultricies dolor.
                          </p>
                        </div>
                      </div>
                    </div> <!-- end .single-content -->

                  </div> <!-- end .rating-with-details -->
                </div> <!-- end .company-rating -->

                <div class="comments-section">
                  <div class="comment-title">
                    <h4>2 Comments</h4>
                  </div>

                  <ul class="comments">
                    <li>

                      <div class="comment">
                        <img src="img/content/comment-image-1.jpg" alt="" class="avatar">

                        <div class="meta">
                          <a href="#"><strong>John Doe</strong></a>
                          -12 sep, 2014 - 9:14 Am -
                          <a href="#" class="reply">Reply</a>
                        </div>

                        <div class="content">
                          <p>Phasellus congue lacus eget neque. Phasellus ornare,
                            ante vitae consectetuer consequat, purus sapien ultricies dolor.</p>
                        </div>

                      </div> <!-- end .comment -->

                      <ul>
                        <li>
                          <div class="comment">
                            <img src="img/content/comment-image-2.jpg" alt="" class="avatar">

                            <div class="meta">
                              <a href="#"><strong>John Doe</strong></a>
                              -12 sep, 2014 - 9:14 Am -
                              <a href="#" class="reply">Reply</a>
                            </div>

                            <div class="content">
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Facilis qui aspernatur ad eaque reiciendis ipsum.</p>
                            </div>
                          </div>

                        </li> <!-- end nasted li -->
                      </ul> <!-- end .nasted ul-->
                    </li> <!-- end .main list -->
                  </ul> <!-- end .comments -->

                  <h4>Join Conversation</h4>

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

                </div> <!-- end .comment-section -->
              </div>
            </div> <!-- end .tab-content -->

          </div> <!-- end .page-content -->

        </div> <!-- end .main-grid layout -->

        <div class="col-md-3 col-md-pull-9 category-toggle">
          <button><i class="fa fa-bars"></i></button>
          <div class="page-sidebar company-sidebar">

            <ul class="company-category nav nav-tabs home-tab" role="tablist">
              <li class="active">
                <a href="#company-profile" role="tab" data-toggle="tab"><i class="fa fa-newspaper-o"></i> Profile</a>
              </li>

              <li>
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
              <a href="#">Own This Company<i class="fa fa-question-circle"></i>, Claim it.</a>
            </div>

            <div class="contact-details">
              <h2>Contact Details</h2>

              <ul class="list-unstyled">
                <li>
                  <strong>Name</strong>
                  <span>{{$biz->contactname}}</span>
                </li>
               
                <li>
                  <strong>Address</strong>
                  <span>Ajose Adeogun str, V/I</span>
                </li>

                <li>
                  <strong>Phone</strong>
                  <span>*********<i class="fa fa-question-circle"></i></span>
                </li>

                <li>
                  <strong>Website</strong>
                  <span>www.pattsbar.com</span>
                </li>

                <li>
                  <strong>E-mail</strong>
                  <span>info@pattsbar.com</span>
                </li>
              </ul>
            </div>

          </div> <!-- end .page-sidebar -->
        </div> <!-- end .main-grid layout -->
      </div> <!-- end .row -->

    </div> <!-- end .container -->

  </div> <!-- end #page-content -->
@endsection