@extends('master-light')
@section('title')
create New User
@stop

@section('content')
<h1> Create New Users </h1>
@foreach($errors->all() as $error)
 <li> {{$error}} </li>
 @endforeach
 <p></p><p></p>

 <div class="form-group">
 {!! Form::open(["url" => "people"]) !!}
	<div class="form-group">
{!! Form::label('Name') !!} 
{!! Form::text('name')!!}
</div>

<div class="form-group">
{!! Form::label('Email') !!} 
{!! Form::text('email')!!}
</div>
{!! Form::submit('Create New Users') !!}
{!! Form::close() !!}
</div>
@stop

@section('footer')
Create New Users
@stop
