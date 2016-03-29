@extends('master')
<!-- HEAD -->
@section('title', 'Categories')
@section('stylesheets')
    <!-- <link href="{{asset('plugins/datatable/css/datatables.css')}}" rel="stylesheet"> -->
    <!-- <link href="{{asset('plugins/datatable/css/dataTables.bootstrap.css')}}" rel="stylesheet"> -->
    <!-- <link href="{{asset('plugins/bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet"> -->
@endsection
<!-- HEADER -->
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
                  <li class="bg-color active"><a href="/categories">Categories</a></li>
                  <li class=""><a href="/businesses">Businesses</a></li>
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

  <div id="page-content" class="home-slider-content">
    <div class="container">
      <div class="home-with-slide category-listing">
      <div class="row">
      <div class="col-md-9">

        <div class="row">
          <div class="col-md-9 col-md-push-3 category-toggle">
            <div class="page-content">
              <div class="product-details">
                <div class="tab-content">
                @unless ( $cats->isEmpty() )
                  @foreach ($cats as $cat)

                  <div class="tab-pane" id="<?php echo str_replace(' ', '', $cat->name); ?>">
                      <div class="row clearfix">
                      @foreach($cat->subcats as $sub)
                          <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="category-item">
                             <a href="/biz/subcat/{{$sub->slug}}"><i class="fa fa-{{$sub->image_class}}"></i>{{ $sub->name}} </a>
                            </div>
                          </div>
                          @endforeach
                          <div class="view-more">
                            <a class="btn btn-default text-center" href="#"><i class="fa fa-plus-square-o"></i>View More</a>
                          </div>
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
                    <li class="">
                      <a class="" href="#<?php echo str_replace(' ', '', $cat->name); ?>"  role="tab" data-toggle="tab"><i class="fa fa-{{$cat->image_class}}"></i>
                      {{ $cat->name }}</a>
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
        @include('includes.sidebar')
      </div>
      </div> <!-- end .home-with-slide -->
    </div> <!-- end .container -->
  </div>  <!-- end #page-content -->

@endsection

<!-- FOOTER STARTS -->
  @section('footer')
    @include('includes.footer')
  @endsection
<!-- FOOTER ENDS -->

@section('scripts')
  <script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script>
    <script src="{{asset('plugins/datatable/js/datatables.js')}}"></script>
  <script type="text/javascript">
       $(document).ready(function() {
        $('li:first-child').addClass('active');
        $('.tab-pane:first-child ').addClass('active');


      //  $('.tab-pane a[href="#fashion"]').tab('show');
      //  $('#fashion').tab('show');

       // $('li:first-child').addClass('active');

    });

    {{--SET ACTIVE TAB ON RELOAD--}}
        $(document).ready(function() {
            // show active tab on reload
            if (location.hash !== '') $('a[href="' + location.hash + '"]').tab('show');
            // remember the hash in the URL without jumping
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
               if(history.pushState) {
                    history.pushState(null, null, '#'+$(e.target).attr('href').substr(1));
               } else {
                    location.hash = '#'+$(e.target).attr('href').substr(1);
               }
            });
        });

  </script>
  <script src="{{asset('js/scripts.js')}}"></script>
@endsection

