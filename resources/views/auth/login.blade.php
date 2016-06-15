@extends('master')
<!-- HEAD -->
@section('title', 'Login')
@section('mobile-header')
    @include('includes.mobile-header')
@endsection
<!-- CONTENT -->
@section('content')
    <div class="form-content">
      <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    @include('partials.notifications')
                    @if (Session::has('flash_reg'))
                            <div class="alert alert-error alert-dismissable alert-danger m0" role="alert">
                               {!! Session('flash_reg') !!}
                           </div>
                    @endif
                  {!! Form::open(array('url' => '/auth/login', 'class' => 'form')) !!}
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title"><i class="fa fa-power-off"></i> Login below or Connect with <a class="btn btn-primary" href="/login/facebook">Facebook</a> </h3>
                    </div>
                    <div class="panel-body">
                          <div class="form-group">
                            {!! Form::label('email', 'Your E-mail Address') !!}
                            {!! Form::text('email', null,array('class'=>'form-control', 'placeholder'=>'E-mail', 'required'=>'required')) !!}
                          </div>
                          <div class="form-group">
                            {!! Form::label('password', 'Your Password') !!}
                            {!! Form::password('password',array('class'=>'form-control', 'placeholder'=>'Password', 'required'=>'required')) !!}
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
                      <span class="pwd"><a class="text-left form-links" href="/password/email"><strong>Forgot Your Password?</strong></a></span>
                      <span class="reg">Not registered? <a class="form-links" href="/auth/register"><strong>Create an account.</strong></a></span>
                    </div>
                  </div>
                  {!! Form::close() !!}
                </div>
            </div>
      </div> <!-- end .container -->
    </div>  <!-- end form-content -->
@endsection
@section('footer')
    @include('includes.footer')
@endsection
@section('scripts')
    <script src="{{asset('js/scripts.js')}}"></script>
@endsection

