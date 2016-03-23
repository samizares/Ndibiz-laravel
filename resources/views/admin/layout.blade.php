<!-- HEAD STARTS-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--  <meta name="_token" content="{!! csrf_token() !!}"/> -->

    <title> @yield('title') | NdiBiz Directory</title>
    <meta name="description" content="@yield('description')" />

    <!-- Stylesheets -->
    @yield('stylesheets')
    <link href="{{asset('../plugins/Bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700|Open+Sans:400,600|Lato:400,700' rel='stylesheet' type='text/css'>

    <link rel="icon" href="{{ asset('img/content/favicon.ico')}}" sizes="16x16 32x32" type="image/ico">
    <!--[if IE 9]>
    <script src="{{asset('js/media.match.min.js')}}"></script>
    <![endif]-->
</head>
<!-- HEAD ENDS-->

<body>
<div id="main-wrapper" class="forms">

<!-- HEADER STARTS -->
  <header class="header">
      <div class="container">
          <!-- HEADER-LOG0 -->
          <div class="header-logo navbar-brand">
              <a href="/"><img class="center-block" src="{{ asset ('img/logo.png') }}" alt="Logo"></a>
          </div>
          <!-- END HEADER LOGO -->
      </div><!-- END .CONTAINER -->
  </header> <!-- end #header -->
<!-- HEADER ENDS -->

<!-- CONTENT STARTS -->
        <div class="content">
            @yield('content')
        </div>
<!-- CONTENT ENDS -->

<!-- FOOTER STARTS -->
<footer id="footer">
    <div class="copyright">
        <div class="container">
            <p class="pull-left text-capitalize">Copyright &copy;
                <script type="text/javascript">
                    var currentYr = new Date();
                    var insertYr = currentYr.getFullYear();
                    document.write(insertYr);
                </script>
                NdiBiz Directory - All Rights Reserved.
            </p>
            <ul class="list-inline pull-right p0">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div> <!-- END .container -->
    </div> <!-- end .copyright-->
</footer>
<!-- FOOTER ENDS -->
</div> <!-- end #main-wrapper -->

<!-- SCRIPTS STARTS -->
  <!-- Core Scripts -->
  <script src="{{asset('../js/jquery-2.1.3.min.js') }}"></script>
  <script src="{{asset('../plugins/Bootstrap-3.3.5/js/bootstrap.js')}}"></script>
  @yield('scripts')
<!-- SCRIPTS ENDS -->

</body>
</html>







