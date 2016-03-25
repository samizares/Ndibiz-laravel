@extends('admin.adminlayout')
        <!-- HEAD STARTS-->
@section('title', 'Locations')
@section('stylesheets')
    <link href="{{asset('plugins/Bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/datatable/css/datatables.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/datatable/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-editable/bootstrap-editable.css')}}" rel="stylesheet">
    @endsection
            <!-- HEAD ENDS-->
    <!-- HEADER STARTS -->
    <!-- PAGE BANNER -->
@section('page-banner')
    <div class="header-search map">
        <div class="header-search-bar">
            <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Locations</h2>
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
                        <button type="button" class="admin-drawer-btn btn btn-default-inverse btn-xs" data-toggle="offcanvas">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            Click to view Admin Menu</button>
                    </p>
                    <div class="col-md-12">
                        <div class="row page-title-row">
                            <div class="col-md-6">
                                <h3><a href="/admin">Admin</a> <small>» states ({{ $totalState}})</small></h3>
                            </div>
                            <div class="col-md-6 text-right m20-top">
                                <a href="/admin/location/create" class="btn btn-default-inverse btn-md">
                                    <i class="fa fa-plus-circle"></i> New Location
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="row m15-left m15-right">
                            @include('admin.partials.errors')
                            @include('admin.partials.success')
                            {{--DataTables--}}
                            <table id="loc-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>State</th>
                                    <th>Region</th>
                                    <th>Total Area/region In state </th>
                                    <th data-sortable="false">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($states as $state)
                                    <tr>
                                        <td>{{ $state-> name }}</td>

                                        <td>@foreach($state-> lgas as $area)
                                                <span class="btn"><i class="fa fa-map-marker"></i> {{ $area->name }} </span> @endforeach</td>
                                        <td>{{count($state->lgas)}}</td>
                                        <td>
                                            <a href="/admin/location/{{$state->id}}/edit"
                                               class="btn btn-xs btn-default-inverse animated fadeIn"
                                               data-toggle="tooltip" data-placement="top" title="Edit Location Info">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="/admin/location/{{$state->id}}/delete"
                                               class="btn btn-xs btn-default-inverse animated fadeInRight"
                                               data-toggle="tooltip" data-placement="top" title="Delete Location Info">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end main content -->
                    </div>
                </div>
            </div><!--/row-offcanvas -->
        @endsection
        {{--scripts--}}
        @section('scripts')
            <script src="{{asset('js/jquery-2.1.3.min.js') }}"></script>
            <script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script>
            <script src="{{asset('plugins/datatable/js/datatables.js')}}"></script>
            <script src="{{asset('plugins/bootstrap-editable/bootstrap-editable.min.js')}}"></script>
            <!-- Page Scripts -->
            <script>
                $(function() {
                    $("#loc-table").DataTable({
                        order: [[0, "desc"]]
                    });
                });

                $(document).ready(function () {
                    $('.bizpop').popover({
                        content: function () {
                            // Get the content from the hidden sibling.
                            return $(this).siblings('.viewbiz').html();
                        },
                        trigger: 'click',
                        placement: 'left'
                    });
                });

                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });
            </script>
@endsection