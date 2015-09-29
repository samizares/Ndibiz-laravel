@extends('admin.layout')
<!-- HEAD -->
@section('title', 'Register')

<!-- HEADER -->
<!-- navigation -->
@section('header-navbar')
        <div class="header-nav-bar">
            <div class="container">
              <nav>
                <button><i class="fa fa-bars"></i></button>
                <ul class="primary-nav list-unstyled">
                  @if (Auth::check())
                    <li class="hidden-lg hidden-md dropdown text-center"> 
                   
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menu1">
                        <i class="fa fa-user"></i> {{Auth::user()->username}} <span class="caret"></span></a>
                      <ul class="dropdown-menu text-center" role="menu" aria-labelledby="menu1">
                          <li class=""><a href="#">View Profile</a></li>
                          <li class="divider"></li>
                          <li><a class="btn" href="/auth/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                      </ul>
                    </li>
                  @else
                    <li class="hidden-lg hidden-md"><a class="btn" href="/auth/login" class=""><i class="fa fa-power-off"></i> <span>Login</span></a></li>
                  @endif
                  <!-- HEADER REGISTER -->
                  @if (Auth::guest())
                    <li class="hidden-lg hidden-md"><a class="btn" href="/auth/register" class=""><i class="fa fa-plus-square"></i> <span>Register</span></a></li>
                  @endif
                  <li class="text-center hidden-lg hidden-md"><a href="/biz/create" class=""><i class="fa fa-plus"></i> Add a Business</a></li>

                  <li class="divider"></li>
                  <li class=""><a href="/">Home<i class="fa fa-home"></i></a></li>
                  <li><a href="/categories">Categories</a></li>
                  <li><a href="/businesses">Businesses</a></li>
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
        <div id="auth-page">
          <div class="container">         
            <div class="row">
                  <div class="col-md-6 col-md-offset-3">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title"><i class="fa fa-plus-square"></i> Register</h3>
                    </div>
                    <div class="panel-body">
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
                      <div class="row">
                            <div class="col-md-12">
                              <p>Already registered? <a class="text-right" href="/auth/login"><strong>Login.</strong></a></p>
                            </div>
                          </div> 
              		 		{!! Form::close() !!}
                     </div>
                  </div>
                  </div>               
            </div>   
          </div> <!-- end .container -->
        </div> <!-- end .home-with-slide -->
      </div>  <!-- end #page-content -->   
    @endsection