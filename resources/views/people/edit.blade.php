@extends('master-light')
@section('title')
Editing User
@stop

@section('content')
<h1> Editing Users </h1>


 <div class="form-group">
 {!! Form::model($id, ["route" => ["people.update",$id->id],
 "method" => "PUT"]) !!}
	<div class="form-group">
{!! Form::label('Name') !!} 
{!! Form::text('username')!!}
</div><p></p>

<div class="form-group">
{!! Form::label('Email') !!} 
{!! Form::text('email')!!}
</div>
{!! Form::submit('Update Users') !!}
{!! Form::close() !!}
</div>
@stop

@section('footer')
Editing Users
@stop
