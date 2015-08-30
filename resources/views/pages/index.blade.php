@extends('master')

@section('search')
@include('partials.search')

@endsection

@include('partials.notifications')

@section('map')
 <div class="map-section">

       <!-- <div id="map_canvas"></div>  -->

      </div> 
@endsection
@section('content')
	 <div class="header-nav-bar">
      <div class="container">
        <nav>

          <button><i class="fa fa-bars"></i></button>

          <ul class="primary-nav list-unstyled">
            <li class="bg-color"><a href="#">Home<i class="fa fa-home"></i></a></li>
            <li class=""><a href="#">Categories<i class="fa fa-angle-down"></i></a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </nav>
      </div> <!-- end .container -->
    </div> <!-- end .header-nav-bar -->
  </header> <!-- end #header -->


  
  <div id="page-content" class="home-slider-content">
    <div class="container">
      <div class="home-with-slide">
        <div class="row">

          <div class="col-md-9 col-md-push-3">
            <div class="page-content">


              <div class="product-details">
                <div class="tab-content">

                  <div class="tab-pane active" id="all-categories">
                    <h3>Directory <span>Categories</span></h3>

                    <div class="row clearfix">
                        @unless ( $cats->isEmpty() )
                        @foreach ($cats as $cat)
                          <div class="col-md-3 col-sm-4 col-xs-6">
                            <div class="category-item">
                             <a href="#"><i class="fa fa-{{$cat->image_class}}"></i>{{ $cat->name}} </a>
                            </div>
                         </div>
                         @endforeach
                          @endunless

                     

                      <div class="view-more">
                        <a class="btn btn-default text-center" href="#"><i class="fa fa-plus-square-o"></i>View More</a>
                      </div>

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
                    <li class="active">
                      <a href="#all-categories"  role="tab" data-toggle="tab">All Categories
                        <span>Display all categories</span>
                      </a>
                    </li>
                 
                   
                    <li>
                      <a href="#resturants" role="tab" data-toggle="tab">Restaurants &amp; Fastfoods
                        <span>5-star Restaurants, Mamaput (Local Canteens), Fastfoods</span>
                      </a>
                    </li>

                    <li>
                      <a href="#real-estate" role="tab" data-toggle="tab">Real Estate
                        <span>Demo 1, Demo 1, Demo 1</span>
                      </a>
                    </li>
                
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
      <div class="row clearfix">
        <h2><strong>Featured</strong> Businesses</h2>

        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="single-product">
            <figure>
              <img src="img/content/post-img-1.jpg" alt="">
              <div class="rating">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>

                <p>Featured</p>

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
            <h4><a href="#">Patt's Bar</a></h4>

            <h5 class="fa fa-tags"> <a href="#">Nightlife</a>, <a href="#">Clubs</a></h5> <br>

          </div> <!-- end .single-product -->

        </div>

        <div class="col-md-3 col-sm-4 col-xs-6">

          <div class="single-product">
            <figure>
              <img src="img/content/post-img-2.jpg" alt="">

              <div class="rating">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>

                <p>Featured</p>

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
            <h4><a href="#">Waheed The Vulcanizer</a></h4>

            <h5 class="fa fa-tags"> <a href="#">car repair</a>, <a href="#">road-side business</a></h5>

          </div> <!-- end .single-product -->

        </div>

        <div class="col-md-3 col-sm-4 col-xs-6">

          <div class="single-product">
            <figure>
              <img src="img/content/post-img-2.jpg" alt="">

              <div class="rating">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>

                <p>Featured</p>

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
            <h4><a href="#">Waheed The Vulcanizer</a></h4>

            <h5 class="fa fa-tags"> <a href="#">car repair</a>, <a href="#">road-side business</a></h5>

          </div> <!-- end .single-product -->

        </div>

        <div class="col-md-3 col-sm-4 col-xs-6">

          <div class="single-product">
            <figure>
              <img src="img/content/post-img-2.jpg" alt="">

              <div class="rating">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>

                <p>Featured</p>

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
            <h4><a href="#">Waheed The Vulcanizer</a></h4>

            <h5 class="fa fa-tags"> <a href="#">car repair</a>, <a href="#">road-side business</a></h5>

          </div> <!-- end .single-product -->

        </div>

        <div class="col-md-3 col-sm-4 col-xs-6">

          <div class="single-product">
            <figure>
              <img src="img/content/post-img-2.jpg" alt="">

              <div class="rating">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>

                <p>Featured</p>

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
            <h4><a href="#">Waheed The Vulcanizer</a></h4>

            <h5 class="fa fa-tags"> <a href="#">car repair</a>, <a href="#">road-side business</a></h5>

          </div> <!-- end .single-product -->

        </div>

        <div class="col-md-3 col-sm-4 col-xs-6">

          <div class="single-product">
            <figure>
              <img src="img/content/post-img-2.jpg" alt="">

              <div class="rating">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>

                <p>Featured</p>

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
            <h4><a href="#">Waheed The Vulcanizer</a></h4>

            <h5 class="fa fa-tags"> <a href="#">car repair</a>, <a href="#">road-side business</a></h5>

          </div> <!-- end .single-product -->

        </div>

        <div class="col-md-3 col-sm-4 col-xs-6">

          <div class="single-product">
            <figure>
              <img src="img/content/post-img-2.jpg" alt="">

              <div class="rating">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>

                <p>Featured</p>

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
            <h4><a href="#">Waheed The Vulcanizer</a></h4>

            <h5 class="fa fa-tags"> <a href="#">car repair</a>, <a href="#">road-side business</a></h5>

          </div> <!-- end .single-product -->

        </div>

        <div class="col-md-3 col-sm-4 col-xs-6">

          <div class="single-product">
            <figure>
              <img src="img/content/post-img-2.jpg" alt="">

              <div class="rating">
                <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>

                <p>Featured</p>

              </div> <!-- end .rating -->

              <figcaption>
                <div class="bookmark">
                  <a href="#"><i class="fa fa-heart"></i> Favourite</a>
                </div>
                <div class="read-more">
                  <a href="#"><i class="fa fa-angle-right"></i> Read More</a>
                </div>

              </figcaption>
            </figure>
            <h4><a href="#">Waheed The Vulcanizer</a></h4>

            <h5 class="fa fa-tags"> <a href="#">car repair</a>, <a href="#">road-side business</a></h5>

          </div> <!-- end .single-product -->

        </div>

      </div>  <!-- end .row -->

      <div class="discover-more">

        <a class="btn btn-default text-center" href="#"><i class="fa fa-plus-square-o"></i>Discover More</a>
      </div>
    </div>  <!-- end .container -->
  </div>  <!-- end .featured-listing -->
  
  <div class="register-content">
    <div class="reg-heading">
      <h1><strong>Register</strong> now</h1>
    </div>

    <div class="registration-details">
      <div class="container">
        <div class="box regular-member">
          <h2><strong>Registered</strong> Users</h2>

          <p><i class="fa fa-check-circle-o"></i> Search for local business</p>
          <p><i class="fa fa-check-circle-o"></i> Review service quality of patronised businesses</p>
          <p><i class="fa fa-check-circle-o"></i> Upload pictures showing your service experience with the business</p>

          <a href="#" class="btn btn-default-inverse"><i class="fa fa-plus"></i> Register Now</a>
        </div>

        <div class="alternate">
          <h2>OR</h2>
        </div>

        <div class="box business-member">
          <h2><strong>Business</strong> Owners</h2>

          <p><i class="fa fa-check-circle-o"></i> Claim your business page</p>
          <p><i class="fa fa-check-circle-o"></i> Upload pictures of your products and/or services</p>
          <p><i class="fa fa-check-circle-o"></i> Advertise your business to potential and existing customers</p>

          <a href="#" class="btn btn-default-inverse"><i class="fa fa-plus"></i> Register Now</a>
        </div>

      </div>
      <!-- END .CONTAINER -->
    </div>
    <!-- END .REGISTRATION-DETAILS -->
  </div>
  <!-- END REGISTER-CONTENT -->

@endsection

@section('scripts')
 <script>
 $(function() {
      // Enable Selectize
    $('#location').selectize({
    valueField: 'id',
    labelField: 'name',
    searchField: ['name'],
    renrender:{
        option:function(item, escape) {
          return '<div>' + escape(item.name) +'</div>';
        }
      },
      load:function(query, callback){
        if(!query.length) return callback();
        $.ajax({
          url: './api/location',
          type: 'GET',
          dataType: 'json',
          data: {
            l: query
          },
          success: function(res) {
            callback(res.data);
            } 
        });
      }
  });
})

    $(function() {
      // Enable Selectize
    $('#category').selectize({
      valueField: 'id',
      labelField: 'name',
      searchField: ['name'],
      render:{
        option:function(item, escape) {
          return '<div><i class="fa fa-home"></i>' + escape(item.name) +'</div>';
        }
      },
      load:function(query, callback) {
        if(!query.length) return callback();
        $.ajax({
          url: './api/category',
          type: 'GET',
          dataType: 'json',
          data: {
            q: query
          },
          success: function(res) {
            callback(res.data);
            }
        });
      }
      });

    });

     $(function() {
      // Enable Selectize

    $('#company').selectize({
      valueField: 'id',
      searchField: ['name'],
      labelField: 'name',
      render:{
        option:function(item, escape) {
          return '<div><i class="fa fa-female"></i>' + escape(item.name) +'</div>';
         }
        },
      load:function(query, callback) {
        if(!query.length) return callback();
        $.ajax({
          url: './api/company',
          type: 'GET',
          dataType: 'json',
          data: {
            m: query
          },
          success: function(res) {
            callback(res.data);
            }
        });
      }
    });
});

      $(function() {
      // Enable Selectize

    $('#category3').select2({
      placeholder: 'search category',
      tags: true,

      });
});
</script>
@endsection