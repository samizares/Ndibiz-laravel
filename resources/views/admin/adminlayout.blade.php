<!DOCTYPE html>
<html lang="en">
<!-- HEAD STARTS-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title') | NdiBiz Directory</title>
    <meta name="description" content="@yield('description')" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('plugins/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/selectize/selectize.bootstrap3.css')}}">
    <link href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/sweetalert.css')}}" rel="stylesheet">
    <link  rel="stylesheet" href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.css')}}">
    <link href="{{asset('plugins/datatable/css/datatables.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/datatable/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-editable/bootstrap-editable.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
    @yield('stylesheets')
    {{--FONT AWESOME--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700|Open+Sans:400,600|Lato:400,700'
          rel='stylesheet' type='text/css'>
    <link rel="icon" href="{{ asset('img/content/favicon.ico')}}" sizes="16x16 32x32" type="image/ico">
    <!--[if IE 9]>
    <script src="{{asset('js/media.match.min.js')}}"></script>
    <![endif]-->
</head>
<!-- HEAD ENDS-->
<body>
<div id="main-wrapper">
    <!-- HEADER STARTS -->
    @include('admin.partials.header')
    <!-- HEADER ENDS -->
    <!-- CONTENT STARTS -->
    <div class="content">
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right m20-top">
                @include('admin.partials.sidebar-nav')
                @yield('main-content')
            </div><!--/row-->
        </div><!--/.container-->
    </div>
    <!-- CONTENT ENDS -->
    <!-- FOOTER STARTS -->
    @include('includes.footer')
    <!-- FOOTER ENDS -->
</div> <!-- end #main-wrapper -->
<!-- SCRIPTS STARTS -->
<!-- Core Scripts -->
<script src="{{asset('js/jquery-2.1.3.min.js') }}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('js/jquery.ba-outside-events.min.js') }}"></script>
<script src="{{asset('plugins/datatable/js/datatables.js')}}"></script>
<script src="{{asset('plugins/bootstrap-editable/bootstrap-editable.min.js')}}"></script>
<script src="{{asset('plugins/selectize/selectize.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>
<script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
<script>
    $(document).ready(function() {
        $("a[href='" + location.pathname + "']").addClass('active');
    });
    $(document).ready(function () {
//        $('[data-toggle="offcanvas"]').click(function () {
//            $('.row-offcanvas').toggleClass('active')
//        });
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@yield('scripts')
<script src="{{asset('js/scripts.js')}}"></script>
</body>
</html>