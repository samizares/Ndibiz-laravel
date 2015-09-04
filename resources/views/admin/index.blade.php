@extends('master')
<!-- HEAD STARTS-->
  @section('title', 'Admin')
  @section('stylesheets')     
     <link href="{{asset('plugins/bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
  @endsection
<!-- HEAD ENDS-->

<!-- HEADER STARTS -->
  <!-- breadcrumbs -->
@section('breadcrumb')
      <div class="breadcrumb">
        <div class="featured-listing" style="margin:0;">
            <h2 class="page-title animated fadeInLeft" style="margin:0;"><i class="fa fa-home"></i> Admin</h2>
        </div>
      </div>
@endsection
<!-- navigation -->
@section('header-navbar')
        <div class="header-nav-bar">
            <div class="container">
              <nav>
                <button><i class="fa fa-bars"></i></button>
                @include('admin.partials.navbar')
              </nav>
            </div> <!-- end .container -->
        </div> <!-- end .header-nav-bar -->   
@endsection
@section('content')
  <div id="page-content" class="home-slider-content">
    <div class="container">
      <div class="home-with-slide">
        <div class="row">
          <div class="col-md-9 col-md-push-3">
            <div class="page-content">

            </div> <!-- end .page-content -->
          </div>
          <div class="col-md-3 col-md-pull-9 category-toggle">
            <button><i class="fa fa-briefcase"></i></button>

            <div class="page-sidebar">
              <div class="post-sidebar">
                      <div class="post-categories">
                          <h2>Admin Panel</h2>
                          <ul>
                            <li><a href="#admin/cat/">Categories <i class="fa fa-arrow-right"></i></a></li>
                            <li><a href="#admin/biz/">Businesses</a></li>
                            <li><a href="#admin/location/">Locations</a></li>
                            <li><a href="#admin/upload/">Uploads</a></li>
                            <li><a href="#">Reviews</a></li>
                          </ul>
                      </div>
              </div>
            </div> <!-- end .page-sidebar -->
          </div> <!-- end grid layout-->
        </div> <!-- end .row -->
      </div> <!-- end .home-with-slide -->
    </div> <!-- end .container -->
  </div>  <!-- end #page-content -->
@endsection

@section('scripts')
  <script>
   
  </script>
@endsection