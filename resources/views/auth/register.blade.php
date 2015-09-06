@extends('master')
<!-- HEAD -->
@section('title', 'Register')
<!-- HEADER -->
<!-- breadcrumbs -->
@section('breadcrumb')
      <div class="breadcrumb">
        <div class="featured-listing" style="margin:0;">
            <h2 class="page-title" style="margin:0;"><span>Create a New Account</span></h2>
        </div>
      </div>
@endsection
<!-- navigation -->
@section('header-navbar')
  <div class="header-nav-bar">
      <div class="container">
        <nav>
          <button><i class="fa fa-bars"></i></button>
          <ul class="nav navbar-nav primary-nav list-unstyled">
            <li><a href="/auth/login">Login<i class="fa fa-power-off"></i></a></li>
            <li class="bg-color active"><a href="/auth/register">Register<i class="fa fa-plus-square"></i></a></li>
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
   <div id="auth-page" class="home-with-slide">
      <div class="row login">
            <div class="col-md-6 col-md-offset-3">
				{!! Form::open(array('url' => '/auth/register', 'class' => 'form')) !!}
		 		<div class="form-group">
		 			{!! Form::label('name', 'Your User Name') !!}
		 			{!! Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'User Name', 'required')) !!}
		 		</div>
		 		<div class="form-group">
		 			{!! Form::label('Your E-mail Address') !!}
		 			{!! Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address', 'required')) !!}
		 		</div>
		 		<div class="form-group">
		 			{!! Form::label('Your Password') !!}
		 			{!! Form::password('password',
		 			array('class'=>'form-control', 'placeholder'=>'Password', 'required')) !!}
		 		</div>
		 		<div class="form-group">
		 			{!! Form::label('Confirm Password') !!}
		 			{!! Form::password('password_confirmation',
		 			array('class'=>'form-control', 'placeholder'=>'Confirm Password', 'required')) !!}
		 		</div>

		 		<div class="form-group">
		 			{!! Form::submit('Create My Account!',
		 			array('class'=>'btn btn-default')) !!}
		 		</div>
		 		{!! Form::close() !!}
            </div>               
        </div>   
    </div> <!-- end .home-with-slide -->
  </div> <!-- end .container -->
</div>  <!-- end #page-content -->   
@endsection