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

    <link href="{{asset('plugins/Bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/selectize/selectize.default.css')}}">
    <link href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet">

    {{--FONT AWESOME--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700|Open+Sans:400,600|Lato:400,700' rel='stylesheet' type='text/css'>

    <link rel="icon" href="{{ asset('img/content/favicon.ico')}}" sizes="16x16 32x32" type="image/ico">
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
  integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="{{asset('js/jquery.ba-outside-events.min.js') }}"></script>
  <script src="{{asset('plugins/selectize/selectize.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('plugins/select2/select2.min.js')}}"></script>

  <!-- Page Scripts -->
  <script type="text/javascript">
      $(document).ready(function () {
          $('.carousel').carousel();
      });
      //Text rotator
      //-------------------------------------------------
      $(document).ready(function() {
          $('.rotate').rotaterator({fadeSpeed:2000, pauseSpeed:80});
      });
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



   



