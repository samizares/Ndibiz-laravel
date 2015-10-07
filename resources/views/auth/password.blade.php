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