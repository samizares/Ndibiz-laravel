@extends('admin.layout')
<!-- HEAD -->
@section('title', 'Login')

<!-- HEADER -->

<!-- CONTENT -->
@section('content')
  @include('partials.notifications')
    <div id="page-content" class="home-slider-content">
      <div class="container">
        <div id="auth-page">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title"><i class="fa fa-power-off"></i> Login</h3>
                    </div>
                    <div class="panel-body">
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

                          <div class="rem-check">
                             {!! Form::checkbox('remember', 'remember', array('class'=>'form-control')) !!} 
                             {!! Form::label('remember', 'Remember Me') !!}
                          </div>

                          <div class="form-group">
                            {!! Form::submit('Login', array('class'=>'btn btn-default')) !!}
                          </div>
                          <div class="row">
                            <div class="col-md-5">
                              <a class="text-left" href="/password/email">Forgot Your Password?</a>
                            </div>
                            <div class="col-md-7">
                              <p>Not registered? <a class="text-right" href="/auth/register"><strong>Create an account.</strong></a></p>
                            </div>
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
