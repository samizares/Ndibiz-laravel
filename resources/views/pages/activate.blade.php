@extends('master')
<!-- HEAD -->
@section('title', 'Admin')
<!-- HEADER -->
<!-- breadcrumbs -->
@section('breadcrumb')
      <div class="breadcrumb">
        <div class="featured-listing" style="margin:0;">
            <h2 class="page-title" style="margin:0;">Email Activation</h2>
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
<!-- CONTENT -->
@section('content')
<div id="page-content" class="home-slider-content">
  <div class="container">
   <div class="home-with-slide">
    <div class="row page-title-row">
      <div class="col-md-6 col-md-offset-3">
			<h2>Thanks for signing up</h2>
			<p> Please check your email to activate your account!!!
	  </div>
	</div>
 </div> <!-- end .home-with-slide -->
  </div> <!-- end .container -->
</div>  <!-- end #page-content -->
@endsection