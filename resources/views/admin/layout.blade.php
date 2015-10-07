<!DOCTYPE html>
<html lang="en">

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
  <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,600,800%7COpen+Sans:400italic,400,600,700' rel='stylesheet' type='text/css'>

  <!--[if IE 9]>
    <script src="{{asset('js/media.match.min.js')}}"></script>
  <![endif]-->

</head>
<!-- HEAD ENDS-->

<body>
<div id="main-wrapper">

<!-- HEADER STARTS -->
  <header id="header">
    <div class="header-auth" style="min-height:60px;">
      <div class="container">
        <!-- HEADER-LOG0 -->        
          <h2 class="header-logo navbar-brand">
            <a class="" href="/">Beazea
              <span>Direct<i class="fa fa-globe"></i>ry</span>
            </a>
          </h2>
      </div><!-- END .CONTAINER -->
    </div>
    <!-- END .HEADER-TOP-BAR -->
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
        <p class="pull-left">Copyright &copy; 
                        <script type="text/javascript">
                            var currentYr = new Date();
                            var insertYr = currentYr.getFullYear();
                            document.write(insertYr);
                        </script>
                            NdiBiz Directory - All Rights Reserved. 
                            </p>
        <p class="pull-right">Powered by  <a href="#">CuriouzMind Tech</a></p>

      </div> <!-- END .container -->
    </div> <!-- end .copyright-->
</footer>
<!-- FOOTER ENDS -->

</div> <!-- end #main-wrapper -->

<!-- SCRIPTS STARTS -->
  <!-- Core Scripts -->
  <script src="{{asset('../js/jquery-2.1.3.min.js') }}"></script>
  <script src="{{asset('../plugins/Bootstrap-3.3.5/js/bootstrap.js')}}"></script>
  <!-- Page Scripts -->
  <script type="text/javascript">
       
  </script>
  <script src="{{asset('js/scripts.js')}}"></script>
  @yield('scripts')
<!-- SCRIPTS ENDS -->
             
</body>
</html>



   



