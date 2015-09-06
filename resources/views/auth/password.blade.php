@extends('master')
<!-- HEAD -->
@section('title', 'Password Reset')
<!-- HEADER -->
<!-- breadcrumbs -->
@section('breadcrumb')
      <div class="breadcrumb">
        <div class="featured-listing" style="margin:0;">
            <h2 class="page-title" style="margin:0;">Password Reset</h2>
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
            <li class="bg-color active"><a href="/auth/login">Login<i class="fa fa-power-off"></i></a></li>
            <li><a href="/auth/register">Register<i class="fa fa-plus-square"></i></a></li>
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
                {!! Form::open(array('url' => '/password/email', 'class' => 'form')) !!}

				 <h1>Recover Your Password</h1>

				 @include('partials.notifications')

				 <div class="form-group">
				 {!! Form::label('email', 'Your E-mail Address') !!}
				 {!! Form::text('email', null,
				 array('class'=>'form-control', 'placeholder'=>'E-mail')) !!}
				 </div>

				 <div class="form-group">
				 {!! Form::submit('E-mail Password Reset Link',
				 array('class'=>'btn btn-default')) !!}
				 </div>
				 {!! Form::close() !!}
            </div>               
        </div>   
    </div> <!-- end .home-with-slide -->
  </div> <!-- end .container -->
</div>  <!-- end #page-content -->   
@endsection