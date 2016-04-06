@extends('master')
<!-- HEAD -->
@section('title', 'Register')
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
                      {!! Form::open(array('url' => '/auth/register', 'class' => 'form')) !!}
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title"><i class="fa fa-plus-square"></i> Register</h3>
                        </div>
                        <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('name', 'Your User Name') !!}
                                    {!! Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'User Name', 'required'=>'required')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('Your E-mail Address') !!}
                                    {!! Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address', 'required'=>'required')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('Your Password') !!}
                                    {!! Form::password('password',
                                    array('class'=>'form-control', 'placeholder'=>'Password', 'required'=>'required')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('Confirm Password') !!}
                                    {!! Form::password('password_confirmation',
                                    array('class'=>'form-control', 'placeholder'=>'Confirm Password', 'required'=>'required')) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Create My Account!', array('class'=>'btn btn-default')) !!}
                                </div>
                         </div>
                          <div class="panel-footer">
                              <p>Already registered? <a class="text-right form-links" href="/auth/login"><strong>Login.</strong></a></p>
                          </div>
                      </div>
                      {!! Form::close() !!}
                  </div>
            </div>
          </div> <!-- end .container -->
    </div>
@endsection
@section('footer')
    @include('includes.footer')
@endsection
@section('scripts')
    <script src="{{asset('js/scripts.js')}}"></script>
@endsection