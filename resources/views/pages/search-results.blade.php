@extends('master')
<!-- HEAD -->
@section('title', 'Businesses')
@section('stylesheets')
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
@endsection
<!-- HEADER -->
<!-- breadcrumbs -->
@section('breadcrumb')
      <div class="breadcrumb">
        <div class="featured-listing" style="margin:0;">
            <h2 class="page-title" style="margin:0;">Business Listings</h2>
        </div>
      </div>
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
                  <li><a href="/businesses">Businesses</a></li>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Contact Us</a></li>
                   <li><a href="/admin">Admin</a></li>
                   <li class="bg-color active"><a href="/search-results">Search results</a></li>
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

        <div class="row">
          <div class="col-md-9 col-md-push-3">
            <div class="page-content">
              <div class="product-details-list view-switch">
                <div class="tab-content">                               
                  <div class="tab-pane active" id=""> 
                    <div class="change-view">
                        <button class="grid-view"><i class="fa fa-th"></i></button>
                        <button class="list-view active"><i class="fa fa-bars"></i></button>
                    </div>                     
                      <div class="row clearfix">
                          <div class="col-sm-4 col-xs-6">
                            <div class="single-product">
                              <figure>
                                <img src="img/content/post-img-10.jpg" alt="">
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
                              <h4><a href="#">Old Bookman's</a></h4>
                              <ul class="list-inline m5-bttm p10-left">
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li>50 reviews</li>
                                  </ul>
                              <h5><i class="fa fa-tags"></i> <a href="#">Category</a>, <a href="#">Another Category</a></h5>
                              <div class="row p5-top address-preview">
                                <input type="button" class="col-md-5" data-toggle="collapse" data-target="#toggleAddress" value="Address">
                                <div id="toggleAddress" class="collapse col-md-9 col-md-push-3 animated slideDown"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a,
                                scelerisque sed, lacinia in, mi. Cras vel lorem.</p></div>
                              </div>
                              <a class="read-more" href="#"><i class="fa fa-angle-right"></i>Read More</a>
                            </div> <!-- end .single-product -->
                          </div> <!-- end .col-sm-4 grid layout -->   

                          <div class="col-sm-4 col-xs-6">
                            <div class="single-product">
                              <figure>
                                <img src="img/content/post-img-10.jpg" alt="">
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
                              <h4><a href="#">Old Bookman's</a></h4>
                              <ul class="list-inline m5-bttm p10-left">
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    <li>50 reviews</li>
                                  </ul>
                              <h5><i class="fa fa-tags"></i> <a href="#">Category</a>, <a href="#">Another Category</a></h5>
                              <div class="row p5-top address-preview">
                                <input type="button" class="col-md-5" data-toggle="collapse" data-target="" value="Address">
                                <div id="" class="collapse col-md-9 col-md-push-3 animated slideDown"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a,
                                scelerisque sed, lacinia in, mi. Cras vel lorem.</p></div>
                              </div>
                              <a class="read-more" href="#"><i class="fa fa-angle-right"></i>Read More</a>
                            </div> <!-- end .single-product -->
                          </div> <!-- end .col-sm-4 grid layout -->   
                 
                      </div> <!-- end .row -->                   
                  </div> <!-- end .tabe-pane -->                 
                </div> <!-- end .tabe-content -->
              </div> <!-- end .product-details -->
            </div> <!-- end .page-content -->
          </div>

          <div class="col-md-3 col-md-pull-9 category-toggle">
            <button><i class="fa fa-briefcase"></i></button>

            <div class="page-sidebar">
              <!-- Category accordion -->
              <div id="categories">
                <div class="accordion">
                  <ul class="nav nav-tabs home-tab" role="tablist">
                    @foreach ($cats as $cat)
                    <li>
                      <a href="#"  role="tab" data-toggle="tab"><i class="fa fa-{{$cat->image_class}}"></i>
                        {{ $cat->name }}
                      <div>
                        @foreach($cat->subcats as $cat)
                          <a href="#{{ $cat->name}}" role="tab" data-toggle="tab">{{ $cat->name}}</a>
                        @endforeach
                      </div>
                      </a>
                    </li>
                    @endforeach
                  </ul>
                </div> <!-- end .accordion -->
              </div> <!-- end #categories -->

            </div> <!-- end .page-sidebar -->
          </div> <!-- end grid layout-->
        </div> <!-- end .row -->
      </div>
      <!-- SIDEBAR RIGHT -->
      <div class="col-md-3">
        <div class="post-sidebar">
            <div class="latest-post-content">
                <h2>Featured Businesses</h2>
                <div class="latest-post clearfix">

                  <div class="post-image">
                    <img src="img/content/latest_post_1.jpg" alt="">
                  </div>

                  <h4><a href="#">Post Title Goes Here</a></h4>

                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                  <a class="read-more" href="#"><i class="fa fa-angle-right"></i>Read More</a>
                </div> <!-- end .latest-post -->

                <div class="latest-post clearfix">

                  <div class="post-image">
                    <img src="img/content/latest_post_1.jpg" alt="">
                  </div>

                  <h4><a href="#">Post Title Goes Here</a></h4>

                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                  <a class="read-more" href="#"><i class="fa fa-angle-right"></i>Read More</a>
                </div> <!-- end .latest-post -->
            </div>
            <div class="recently-added">
                <h2>Recently Added</h2>
                <div class="latest-post clearfix">

                  <div class="post-image">
                    <img src="img/content/latest_post_1.jpg" alt="">

                    <p><span>12</span>Sep</p>
                  </div>

                  <h4><a href="#">Post Title Goes Here</a></h4>

                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                  <a class="read-more" href="#"><i class="fa fa-angle-right"></i>Read More</a>
                </div> <!-- end .latest-post -->
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
  <script type="text/javascript">
    $(document).ready(function() {
       
       // $('.tab-pane a[href="#fashion"]').tab('show');
       // $('#fashion').tab('show');
        
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
