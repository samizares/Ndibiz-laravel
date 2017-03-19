@extends('admin.adminlayout')
@section('title', 'Admin Locations')
@section('page-banner')
    <div class="header-search-bar">
        <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Admin Locations</h2>
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
                <div class="row page-title-row">
                    <div class="col-md-6">
                        <h3><a href="/admin">Admin</a> <small>» states ({{ $totalState}}) » Lgas({{$totalLga}})
                            </small> </h3>
                    </div>
                    <div class="col-md-6 text-right m20-top">
                        <a href="/admin/location/create" class="btn btn-default-inverse btn-md">
                            <i class="fa fa-plus-circle"></i> New Location
                        </a>
                    </div>
                </div>
                <hr>
                {{--main-content dataTables--}}
                <div class="row m15-left m15-right">
                    <div class="col-md-12">
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
                    </div>
                </div>
                <!-- end main content -->
            </div><!--/.col-xs-6.col-lg-4-->
        </div><!--/row-->
    </div><!--/.col-xs-12.col-sm-9-->
@endsection
@section('scripts')
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
    </script>
@endsection
