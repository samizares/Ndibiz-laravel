@extends('master-light')
@section('title')
Users Table
@stop

@section('content')
<h1> List of Users </h1>
@foreach($users as $user)
 <h3><a href="/people/{{$user->id}}">{{$user->username}}
 </a>
</h3>
@endforeach
@stop


@section('footer')
<p><a href="/people/create">Create New Users</a>
@stop
