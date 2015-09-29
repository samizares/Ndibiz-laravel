@extends('admin.layout')
<!-- HEAD -->
@section('title', 'Register')

<!-- HEADER -->

<!-- CONTENT -->
@section('content')

    @include('partials.notifications')
      <div id="page-content" class="home-slider-content">
        <div class="container">
         <div id="auth-page" class="home-with-slide">
            <div class="row login">
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
              		 		{!! Form::close() !!}
                     </div>
                  </div>
                  </div>               
              </div>   
          </div> <!-- end .home-with-slide -->
        </div> <!-- end .container -->
      </div>  <!-- end #page-content -->   
    @endsection