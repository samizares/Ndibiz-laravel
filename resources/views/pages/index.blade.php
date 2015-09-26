@extends('master')
<!-- HEAD -->
@section('title', 'Home')
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('plugins/text-rotator/jquery.wordrotator.css')}}">
    <link href="{{asset('plugins/bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
@endsection
<!-- HEADER -->
<!-- search -->
@section('search')
  @include('partials.search')
@endsection
<!-- slider -->
@section('slider')
        <div class="slider-content">
          <div id="home-slider" class="">
            <div class="item">
              <img src="{{asset('img/content/home-slide-img.jpg')}}" alt="">
              <div class="slide-content">             
                <h1><small><i class="fa fa-search"></i> Search for <br><span id="demo"></span> <br>in <br><span id="demo2"></span></small></h1>
                <h1><small>Connect</small> <span>Businesses</span> <small>To</small> <span>Customers</span></h1>
                <h1 class="hidden-xs"><a class="btn btn-default btn-lg" href=""><i class="fa fa-plus-square"></i> Add a Business</a> <small>OR</small> 
                <a class="btn btn-default  btn-lg" href=""><i class="fa fa-plus-square"></i> Claim Your Business</a></h1>
              </div>
            </div>
          </div>

          <div class="customNavigation hidden">
            <a class="btn prev"><i class="fa fa-angle-left"></i></a>
            <a class="btn next"><i class="fa fa-angle-right"></i></a>
          </div>
        </div> <!-- END .slider-content -->    
@endsection
<!-- navigation -->

<!-- CONTENT -->
@section('content')
  @include('partials.notifications')
  
  <div id="page-content" class="home-slider-content">
    <div class="container">
      <div class="home-with-slide category-listing">
        <div class="row">
          <h2><strong>Featured</strong> Directory Categories</h2>
           <div class="col-md-9 col-md-push-3">
            <div class="page-content">
              <div class="product-details">
              
                <div class="tab-content">    
                @unless ( $cats->isEmpty() )
              @foreach ($cats as $cat)
                  <div class="tab-pane" id="<?php echo str_replace(' ', '', $cat->name); ?>">                      
                      <div class="row clearfix">    
                      @foreach ($cat->biz as $biz)
                        @foreach($biz->subcats as $sub)
                          <div class="col-md-3 col-sm-4 col-xs-6">
                            <div class="category-item">
                             <a class="btn" href="/biz/subcat/{{$sub->id}}"><span></span>{{$sub->name}}</a>
                            </div>
                          </div> 
                        @endforeach
                       @endforeach                
                      </div> <!-- end .row -->                   
                  </div> <!-- end .tabe-pane -->
               @endforeach
              @endunless
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
                        <a class="" href="#<?php echo str_replace(' ', '', $cat->name); ?>" 
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
      <h2><strong>Featured</strong> Businesses</h2>
      <div id="businesses-slider" class="owl-carousel owl-theme clearfix">
        @unless ( $featured->isEmpty() )
                  @foreach ($featured as $feature)
        <div class="item">
          <div class="single-product">
            <figure>
              <img src="{{asset('img/content/post-img-1.jpg')}}" alt="">
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
                  <a href="#"><i class="fa fa-heart-o fa-fw"></i> Bookmark</a>
                </div>
                <div class="read-more">
                  <a href="/review/biz/{{$feature->id}}"><i class="fa fa-angle-right"></i> Read More</a>
                </div>

              </figcaption>
            </figure>
            <h4><a href="/review/biz/{{$feature->id}}">{{$feature->name}}</a></h4>
            <h5 class="fa fa-tags"> @foreach($feature->subcats as $sub)
                  <a href="/biz/subcat/{{$sub->id}}">{{ $sub->name }}</a>,@endforeach</h5> <br>
          </div> <!-- end .single-product -->
        </div>
        @endforeach
        @endunless
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


<!-- FOOTER STARTS -->

<!-- FOOTER ENDS -->

<!-- SCRIPTS STARTS -->
  @section('scripts')
    <script src="{{asset('plugins/text-rotator/jquery.wordrotator.min.js') }}"></script>
    <script src="{{asset('plugins/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script>
    

    <script>
      //Text rotator
      //-------------------------------------------------

          $(document).ready(function () {
              $("#demo").wordsrotator({
              words: ['Local Restaurants (Mama Put)','Hotels','Mechanic Workshops'], // Array of words, it may contain HTML values
              randomize: true, //show random entries from the words array
              animationIn: "flipInY", //css class for entrace animation
              animationOut: "flipOutY", //css class for exit animation
              speed: 3000 // delay in milliseconds between two words
              });

               $("#demo2").wordsrotator({
              words: ['Lagos','Abuja','PortHarcourt'], // Array of words, it may contain HTML values
              randomize: true, //show random entries from the words array
              animationIn: "rotateInUpLeft", //css class for entrace animation
              animationOut: "flipOutY", //css class for exit animation
              speed: 3000 // delay in milliseconds between two words
              });
          });  

          $(document).ready(function() {        
              $('li:first-child').addClass('active');
            //  $('.tab-pane:first-child ').addClass('active');
          });       
    </script>
    <script src="{{asset('js/scripts.js') }}"></script>
  @stop
<!-- SCRIPTS ENDS -->