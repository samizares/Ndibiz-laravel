<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Home | NdiBiz Directory</title>

  <!-- Stylesheets -->
  
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/selectize.css')}}">
  <link rel="stylesheet" href="{{ asset('css/selectize.default.css')}}">
  <link rel="stylesheet" href="{{ asset('css/select2.min.css')}}">

  <!-- GOOGLE FONTS -->
  <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,600,800%7COpen+Sans:400italic,400,600,700' rel='stylesheet' type='text/css'>

  <!--[if IE 9]>
    <script src="{{asset('js/media.match.min.js')}}"></script>
  <![endif]-->

</head>

<body>

<div id="main-wrapper">
<header id="header">
    <div class="header-top-bar">
      <div class="container">
        <!-- HEADER-LOGIN -->
        <div class="header-login">

          @if (Auth::check())
             Welcome, {{Auth::user()->username}}

          @else

          <a href="#" class=""><i class="fa fa-power-off"></i> Login</a>
          @endif

          <div>
		  @include('partials.login')
            
          </div>

        </div> <!-- END .HEADER-LOGIN -->

        <!-- HEADER REGISTER -->
        @if (Auth::guest())
        <div class="header-register">
          
          <a href="#" class=""><i class="fa fa-plus-square"></i> Register</a>

          <div>
            @include('partials.register')
          </div>
          

        </div> <!-- END .HEADER-REGISTER -->
        @else

          <a href="{{ URL::to('auth/logout') }}"><i class="fa fa-power-off"></i>Logout</a>
          @endif
        

        <!-- HEADER-LOG0 -->
        <div class="header-logo text-center">
          <h2><a href="/">NdiBiz Direct<i class="fa fa-globe"></i>ry</a></h2>
        </div>
        <!-- END HEADER LOGO -->

        

        <!-- HEADER-SOCIAL -->
        <div class="header-social">
          <span>Get Social</span>
          <a href="#">
            <span><i class="fa fa-share-alt"></i></span>
            <i class="fa fa-chevron-down social-arrow"></i>
          </a>

          <ul class="list-inline">
            <li class="active"><a href="#"><i class="fa fa-facebook-square"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
          </ul>
        </div>
        <!-- END HEADER-SOCIAL -->

        <!-- CALL TO ACTION -->
        <div class="">
          <a href="/biz/create" class="btn btn-default"><i class="fa fa-plus"></i> Add a Business</a>         
          
        </div><!-- END .HEADER-CALL-TO-ACTION -->

      </div><!-- END .CONTAINER -->
    </div>
    <!-- END .HEADER-TOP-BAR -->