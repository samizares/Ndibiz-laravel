@extends('master')

 @section('content')
 
<h3>Login into your Account</h3>

@include('partials.notifications')

    <div class="col-sm-offset-4 col-sm-4">
        {!! Form::open(array('url' => '/auth/login', 'class' => 'form')) !!}
         <div class="form-group">
        {!! Form::label('email', 'Your E-mail Address') !!}
        {!! Form::text('email', null,
         array('class'=>'form-control', 'placeholder'=>'E-mail')) !!}
        </div>

         <div class="form-group">
        {!! Form::label('password', 'Your Password') !!}
        {!! Form::password('password',
        array('class'=>'form-control', 'placeholder'=>'Password')) !!}
        </div>

        <div class="form-group">
         {!! Form::label('remember', 'Remember Me') !!}
         {!! Form::checkbox('remember', 'remember', array('class'=>'form-control')) !!} 
        </div>

        <div class="form-group">
        {!! Form::submit('Login', array('class'=>'btn btn-default')) !!}
         </div>
        <div class="form-group">
            <a href="/password/email">Forgot Your Password?</a>

        </div>
    </div>
 
 {!! Form::close() !!}
    @endsection