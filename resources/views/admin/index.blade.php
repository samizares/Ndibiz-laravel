@extends('admin.adminlayout')
@section('title', 'Admin')
@section('page-banner')
    <div class="header-search-bar">
        <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Admin Overview</h2>
    </div> <!-- END .header-search-bar -->
@endsection
@section('main-content')
    <div class="col-xs-12 col-sm-9">
        <p class="visible-xs">
            <button type="button" class="btn btn-default-inverse btn-xs" data-toggle="offcanvas">
                Click to view Admin Menu <i class="glyphicon glyphicon-chevron-right"></i></button>
        </p>
        <div class="row">
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
            </div><!--/.col-xs-6.col-lg-4-->
        </div><!--/row-->
    </div><!--/.col-xs-12.col-sm-9-->
@endsection
@section('scripts')

@endsection
