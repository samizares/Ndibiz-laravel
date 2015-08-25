<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Ndibiz Admin</title>

  <link href="{{asset('css/bootstrap3-3-4.min.css')}}"
        rel="stylesheet">
  <link href="{{asset('css/datatable.min.css')}}" 
        rel="stylesheet">
  <link href="{{asset('css/font-awesome.min.css')}}"
        rel="stylesheet">
  <link href="{{asset('css/select2.min.css')}}"
       rel="stylesheet">
  @yield('styles')

  <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>

{{-- Navigation Bar --}}
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed"
        data-toggle="collapse" data-target="#navbar-menu">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button><a class="navbar-brand" href="#">Ndibiz Admin</a>
      </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
        @include('admin.partials.navbar')
        </div>
   </div>
</nav>

@yield('content')

<script src="{{asset('js/jquery-2.1.3.min.js') }}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/datatable.js')}}"></script>
<script src="{{asset('js/select22.min.js')}}"></script>

@yield('scripts')

</body>
</html>