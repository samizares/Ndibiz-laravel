@extends('admin.adminlayout')
@section('title', 'Admin Update Location')
@section('page-banner')
    <div class="header-search-bar">
        <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Update Location</h2>
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
                    <div class="col-md-12">
                        <h3><a href="/admin">Admin</a> » <a href="/admin/location">Locations</a> » <small>Update Location</small></h3>
                    </div>
                </div>
                <hr>
                {{--main-content dataTables--}}
                <div class="row m15-left m15-right">
                    @include('admin.partials.errors')
                    @include('admin.partials.success')
                    <form class="form-horizontal" role="form" method="POST" action="/admin/location/{{$state->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{$state->id}}">
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Business state</label>
                            <div class="col-md-8">
                                {!!Form::select('state',$stateList, $state->name, ['class'=>'form-control','id'=>'stateList',
                               ]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image_class" class="col-md-3 control-label">
                                Create Region/area</label>
                            <div class="col-md-8">
                                {!!Form::select('lga[]', $areas, null, ['class'=>'form-control','id'=>'lga','multiple']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" name="save" value="save" class="btn btn-primary btn-md">
                                    <i class="fa fa-save"></i>
                                    Save Changes
                                </button>
                                <button type="button" class="btn btn-danger btn-md"
                                        data-toggle="modal" data-target="#modal-delete">
                                    <i class="fa fa-times-circle"></i>
                                    Delete State and All Regions
                                </button>
                                <button type="submit" class="btn btn-danger btn-md" name="delete" value="delete">
                                    <i class="fa fa-times-circle"></i>
                                    Delete Selected Regions
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end main content -->
            </div><!--/.col-xs-6.col-lg-4-->
        </div><!--/row-->
    </div><!--/.col-xs-12.col-sm-9-->
    <!-- Confirm Delete -->
    <div class="modal fade" id="modal-delete" tabIndex="-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Please Confirm</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        Are you sure you want to delete this State and all its regions?
                    </p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="/admin/location/{{ $state->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i> Yes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-deleteArea" tabIndex="-1" role = "dialog" aria-labelledby = "myDeleteSel" aria-hidden = "true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title" id="myDeleteSel">Please Confirm</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        Are you sure you want to delete the selected LGA from this state?
                    </p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="/admin/location/delete">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i> Yes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#stateList").select2({
                tags: true
            });
        });

        $(document).ready(function() {
            $("#lga").select2({
                tags: true
            });
        });
    </script>
@endsection
