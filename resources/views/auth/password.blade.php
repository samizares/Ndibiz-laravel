@extends('master')
<!-- HEAD -->
@section('title', 'Password Reset')
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
                    {!! Form::open(array('url' => '/password/email', 'class' => 'form')) !!}
                         <h2 class="m20-bttm">Recover Your Password</h2>
                         <div class="form-group">
                         {!! Form::label('email', 'Your E-mail Address') !!}
                         {!! Form::text('email', null,array('class'=>'form-control', 'placeholder'=>'E-mail', 'required'=>'required')) !!}
                         </div>
                         <div class="form-group">
                         {!! Form::submit('E-mail Password Reset Link',
                         array('class'=>'btn btn-default')) !!}
                         </div>
                        <div class="form-group">
                            <p class="form-links"><a href="/auth/login"><strong>Login.</strong></a></p>
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