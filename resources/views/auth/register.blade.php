@extends('master')

 @section('content')
 
<h3>Create a New Account</h3>

 @include('partials.notifications')
 
	<div class="col-sm-offset-4 col-sm-4">
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
 
 		@endsection