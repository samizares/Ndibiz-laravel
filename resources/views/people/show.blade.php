@extends('master-light')
@section('title')
Detail of Users
@stop

@section('content')
<h1> Detail of Users </h1>
 <h2> {{$id->username}}</h2>
 <h4> {{$id->email}} </h4>
<a href="{{ $id->id}}/edit">Edit</a>
<p>
<a href="/people">HOME</a></p>
@stop

@section('footer')
<p><a href="/people/create">Create New Users</a>
</p>
@stop
