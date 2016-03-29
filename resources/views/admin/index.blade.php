@extends('admin.adminlayout')
        <!-- HEAD STARTS-->
@section('title', 'Admin')
@section('stylesheets')

@endsection
        <!-- HEAD ENDS-->
<!-- HEADER STARTS -->
<!-- PAGE BANNER -->
@section('page-banner')
    <div class="header-search map">
        <div class="header-search-bar">
            <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Admin Overview</h2>
        </div> <!-- END .header-search-bar -->
        @endsection
                <!-- navigation -->
        @section('mobile-navbar')
            @include('admin.partials.mobile-navbar')
        @endsection
        @section('content')
            <div class="row-offcanvas row-offcanvas-left admin-content">
                {{--SIDEBAR MENU--}}
                @include('admin.partials.sidebar-nav')
                {{--CONTENT--}}
                <div id="main" class="row">
                    <p class="visible-xs visible-sm">
                        <button type="button" class="admin-drawer-btn btn btn-default-inverse btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i>
                            Click to view Admin Menu</button>
                    </p>
                    <div class="col-md-12">
                        <h3 class="text-uppercase m20-top">Admin Dashboard</h3>
                        <hr>
                        <div class="row m15-left m15-right">
                            @include('admin.partials.errors')
                            @include('admin.partials.success')
                            <div class="col-md-3 col-sm-6">
                                <div class="card card-inverse card-success">
                                    <div class="card-block bg-success">
                                        <div class="rotate">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <h6 class="text-uppercase">Users</h6>
                                        <h1 class="display-1">{{$totalUser}}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card card-inverse card-danger">
                                    <div class="card-block bg-danger">
                                        <div class="rotate">
                                            <i class="fa fa-building fa-5x"></i>
                                        </div>
                                        <h6 class="text-uppercase">Businesses</h6>
                                        <h1 class="display-1">{{$totalBizs}}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card card-inverse card-info">
                                    <div class="card-block bg-info">
                                        <div class="rotate">
                                            <i class="fa fa-comment-o fa-5x"></i>
                                        </div>
                                        <h6 class="text-uppercase">Reviews</h6>
                                        <h1 class="display-1">50</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card card-inverse card-warning">
                                    <div class="card-block bg-warning">
                                        <div class="rotate">
                                            <i class="fa fa-sort fa-5x"></i>
                                        </div>
                                        <h6 class="text-uppercase">Categories</h6>
                                        <h1 class="display-1">{{$totalCats}}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card card-inverse card-primary">
                                    <div class="card-block bg-primary">
                                        <div class="rotate">
                                            <i class="fa fa-map-marker fa-5x"></i>
                                        </div>
                                        <h6 class="text-uppercase">Locations</h6>
                                        <h1 class="display-1">{{$totalStates}}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card card-inverse card-default">
                                    <div class="card-block bg-default">
                                        <div class="rotate">
                                            <i class="fa fa-image fa-5x"></i>
                                        </div>
                                        <h6 class="text-uppercase">Uploads</h6>
                                        <h1 class="display-1">86</h1>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end main content -->
                    </div>
                </div>
            </div><!--/row-offcanvas -->
        @endsection
        {{--scripts--}}
        @section('scripts')
            <script src="{{asset('js/jquery-2.1.3.min.js') }}"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
                    integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
            <script src="{{asset('js/scripts.js')}}"></script>
            <script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
            <!-- Page Scripts -->
            <script>
                $(document).ready(function() {
                    $('[data-toggle=offcanvas]').click(function() {
                        $('.row-offcanvas').toggleClass('active');
                    });
                });
            </script>
@endsection