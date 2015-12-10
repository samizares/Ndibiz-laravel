@extends('admin.layout')
<!-- HEAD -->
@section('title', 'Login')

<!-- HEADER -->

<!-- CONTENT -->
@section('content')
  @include('partials.notifications')
    <div class="form-content">
      <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                  {!! Form::open(array('url' => '/auth/login', 'class' => 'form')) !!}
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title"><i class="fa fa-power-off"></i> Login</h3>
                    </div>
                    <div class="panel-body">
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
                          <div class="">
                            <div class="checkbox">
                              <label>
                                <input style="width: auto;" id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                              </label>
                            </div>
                          </div>
                          <div class="form-group">
                            {!! Form::submit('Login', array('class'=>'btn btn-default')) !!}
                          </div>
                    </div>
                    <div class="panel-footer">
                      <span class="pwd"><a class="text-left" href="/password/email"><strong>Forgot Your Password?</strong></a></span>
                      <span class="reg">Not registered? <a href="/auth/register"><strong>Create an account.</strong></a></span>
                    </div>
                  </div>
                  {!! Form::close() !!}
                </div>               
            </div>
      </div> <!-- end .container -->
    </div>  <!-- end form-content -->
@endsection
