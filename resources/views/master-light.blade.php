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
  
   <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
  <link rel="stylesheet" href="{{ asset('plugins/animate.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/selectize/selectize.default.css')}}">
  <link href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet">

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
    <div class="header-top-bar hidden-sm hidden-xs p0-top p0-bttm">
      <div class="container">
        <!-- HEADER-LOG0 -->
        
          <h2 class="header-logo m0 m20-right p0-bttm navbar-brand hidden-xs">
            <a class="" href="/">Beazea
              <span>Direct<i class="fa fa-globe"></i>ry</span>
            </a>
          </h2>
          <nav ari-labelledby="navigation" role="navigation" class="pull-left">
            <ul class="nav navbar m0-bttm">
              <li><a href="/businesses" class=""><i class="fa fa-building"></i> Explore</a></li>
              <li><a href="#" class="btn btn-default p5 p10-left p10-right"><i class="fa fa-plus"></i> Confirm Email</a></li>
            </ul>
            
          </nav>
      
        <!-- END HEADER LOGO -->
        
      </div><!-- END .CONTAINER -->
    </div>
    <!-- END .HEADER-TOP-BAR -->
    
    @yield('search') 
    @yield('slider')
    @yield('breadcrumb')
    @yield('header-navbar') 
</header> <!-- end #header -->
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
  <script src="{{asset('plugins/selectize/selectize.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
  <!-- Page Scripts -->
  <script type="text/javascript">

      $(document).ready(function() {
            // Enable location search
            $('#location').selectize({
                valueField: 'name',
                labelField: 'name',
                searchField: ['name'],
                renrender:{
                    option:function(item, escape) {
                      return '<div><i class="fa fa-map-marker"></i>' + ' ' + escape(item.name) +'</div>';
                    }
                  },
                  load:function(query, callback){
                    if(!query.length) return callback();
                    $.ajax({
                      url: '{{URL::to('api/location')}}',
                      type: 'GET',
                      dataType: 'json',
                      data: {
                        l: query
                      },
                      success: function(res) {
                        callback(res.data);
                        } 
                    });
                  }
              });

              // Enable category search
              $('#category, #category2').selectize({
                valueField: 'name',
                labelField: 'name',
                searchField: ['name'],
                render:{
                  option:function(item, escape) {
                    return '<div><i class="fa fa-home"></i>' + ' ' + escape(item.name) +'</div>';
                  }
                },
                load:function(query, callback) {
                  if(!query.length) return callback();
                  $.ajax({
                    url: '{{URL::to('api/category')}}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                      q: query
                    },
                    success: function(res) {
                      callback(res.data);
                      }
                  });
                }
              });

              $('#category3').select2({
                placeholder: 'search category',
                tags: true
              });
          });
       $(document).ready(function() {
              $("body").addClass('animated fadeIn');
              $("h2.page-title").addClass('animated zoomIn');
          });

       $(function () {
            $('[data-toggle="tooltip"]').tooltip()
          });
       $(function() {
          $('.tab-pane:first-child ').addClass('active animated zoomIn');
       });

       
  </script>
  @yield('scripts')
<!-- SCRIPTS ENDS -->
             
</body>
</html>



   



