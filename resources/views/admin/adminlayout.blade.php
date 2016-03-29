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
    <link rel="stylesheet" href="{{ asset('plugins/selectize/selectize.bootstrap3.css')}}">
    <link href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/sweetalert.css')}}" rel="stylesheet">
    <link  rel="stylesheet" href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
    <link href="{{asset('plugins/datatable/css/datatables.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/datatable/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-editable/bootstrap-editable.css')}}" rel="stylesheet">

    {{--FONT AWESOME--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700|Open+Sans:400,600|Lato:400,700'
          rel='stylesheet' type='text/css'>

    <link rel="icon" href="{{ asset('img/content/favicon.ico')}}" sizes="16x16 32x32" type="image/ico">
    <!--[if IE 9]>
    <script src="{{asset('js/media.match.min.js')}}"></script>
    <![endif]-->

    <style>
        body,html,.row-offcanvas {
            height:100%;
        }
        #sidebar {
            width: inherit;
            min-width: 220px;
            max-width: 220px;
            background-color:#f5f5f5;
            float: left;
            height:100%;
            position:relative;
            overflow-y:auto;
            overflow-x:hidden;
        }
        #main {
            height:100%;
            overflow:auto;
            min-height: 400px;
        }
        .admin-nav button,
        .admin-drawer-btn {
            width: auto;
        }
        .admin-drawer-btn {
            margin-top: 20px;
        }

        /*
         * off Canvas sidebar
         * --------------------------------------------------
         */
        @media screen and (max-width: 768px) {
            .row-offcanvas {
                position: relative;
                -webkit-transition: all 0.25s ease-out;
                -moz-transition: all 0.25s ease-out;
                transition: all 0.25s ease-out;
                width:calc(100% + 220px);
            }
            .row-offcanvas-left
            {
                left: -220px;
            }
            .row-offcanvas-left.active {
                left: 0;
            }
            .sidebar-offcanvas {
                position: absolute;
                top: 0;
            }
        }
    </style>
</head>
<!-- HEAD ENDS-->
<body>
<div id="main-wrapper">
    <!-- HEADER STARTS -->
        @include('admin.partials.navbar')
    <!-- HEADER ENDS -->

    <!-- CONTENT STARTS -->
    <div class="content">
        @yield('content')
    </div>
    <!-- CONTENT ENDS -->

    <!-- FOOTER STARTS -->
        @include('includes.footer')
    <!-- FOOTER ENDS -->

</div> <!-- end #main-wrapper -->

<!-- SCRIPTS STARTS -->
<!-- Core Scripts -->

<script src="{{asset('js/jquery-2.1.3.min.js') }}"></script>
<script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script>
<script src="{{asset('js/jquery.ba-outside-events.min.js') }}"></script>
<script src="{{asset('plugins/datatable/js/datatables.js')}}"></script>
<script src="{{asset('plugins/bootstrap-editable/bootstrap-editable.min.js')}}"></script>
<script src="{{asset('plugins/selectize/selectize.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>
<script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
<script src="{{asset('js/scripts.js')}}"></script>

<!-- Page Scripts -->
<script type="text/javascript">
    $(function() {
        var pgurl = window.location.href.substr(window.location.href
                        .lastIndexOf("/admin")+1);
        $("ul li").each(function(){
            if($(this).attr("href") == pgurl)
                $(this).addClass("active");
        })
    });
    $(function() {
        $(".user-table").DataTable({
            order: [[0, "desc"]]
        });
    });
    $(document).ready(function(){
        $('ul.nav-pills li a').click(function(){
            $('li a').removeClass("active");
            $(this).addClass("active");
        });
    });
    $(document).ready(function() {
        $('[data-toggle=offcanvas]').click(function() {
            $('.row-offcanvas').toggleClass('active');
        });
    });
    $(document).ready(function () {
        $('.carousel').carousel();
    });
    //Text rotator
    //-------------------------------------------------
    $(document).ready(function() {
//        text rotate
        $('.rotate').rotaterator({fadeSpeed:2000, pauseSpeed:80});
//    subscription
        $('#subscribe').submit(function() {
            if ($('#email').val() == '') {
                swal("Error!", "Please supply an email address!", "warning");
            } else {
                var email= $('#email').val();
                $.ajax({ url: "{{ URL::to('api/subscribe')}}",
                    data: {email: email},
                    dataType: 'json',
                    type: 'post',
                    success: function(output) {
                        $.each(output.data, function(){
                            if(this.id==0){
                                console.log(this.text);
                                swal("Error!", this.text, "warning");
                            }
                            if(this.id==1){
                                console.log(this.text);
                                swal("Success!", this.text, "success");
                            }
                            else{
                                swal("Error!", "Something went wrong", "warning");
                            }

                        });

                    }
                });
            }
            return false;
        }); // end submit()
    });
//    selectize search
    $(document).ready(function() {
        // Enable location search
        $('#location').selectize({
            valueField: 'name',
            labelField: 'name',
            searchField: ['name'],
            renrender:{
                option:function(item, escape) {
                    return '<div>' escape(item.name) +'</div>';
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
                    return '<div>' escape(item.name) +'</div>';
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
//    tootltip
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
@yield('scripts')

</body>
</html>