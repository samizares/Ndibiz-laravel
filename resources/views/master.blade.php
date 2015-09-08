<!DOCTYPE html>
<html lang="en">

<!-- HEAD STARTS-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title> @yield('title') | NdiBiz Directory</title>

  <!-- Stylesheets -->  
  @yield('stylesheets')
  
  <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
  <link rel="stylesheet" href="{{ asset('plugins/animate.css')}}">
  

  <!-- GOOGLE FONTS -->
  <!-- <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,600,800%7COpen+Sans:400italic,400,600,700' rel='stylesheet' type='text/css'>
 -->
  <!--[if IE 9]>
    <script src="{{asset('js/media.match.min.js')}}"></script>
  <![endif]-->

</head>
<!-- HEAD ENDS-->

<body>
<div id="main-wrapper">

<!-- HEADER STARTS -->
        @include('includes.header')  
<!-- HEADER ENDS -->

<!-- CONTENT STARTS -->
        <div class="content">
            @yield('content')
        </div>
<!-- CONTENT ENDS -->

<!-- FOOTER STARTS -->
        @yield('footer')
<!-- FOOTER ENDS -->

</div> <!-- end #main-wrapper -->

<!-- SCRIPTS STARTS -->
  <!-- Core Scripts -->
  <script src="{{asset('js/jquery-2.1.3.min.js') }}"></script>
  <script src="{{asset('js/jquery-ui.js') }}"></script>
  <script src="{{asset('js/jquery.ba-outside-events.min.js') }}"></script>
  <!-- Page Scripts -->
  <script type="text/javascript">
       $(document).ready(function() {
              $("body").addClass('animated fadeIn');
              $("h2.page-title").addClass('animated zoomIn');
          });

       $(function () {
            $('[data-toggle="tooltip"]').tooltip()
          });
       $(function() {
          $('.tab-pane:first-child ').addClass('active animated zoomIn');
       })
  </script>
  @yield('scripts')
<!-- SCRIPTS ENDS -->
             
</body>
</html>



   



