@extends('admin.adminlayout')
@section('title', 'Admin Create New Location')
@section('page-banner')
    <div class="header-search-bar">
        <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Create New Location</h2>
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
                        <h3><a href="/admin">Admin</a> » <a href="/admin/location">Locations</a> » <small>Create New Location</small></h3>
                    </div>
                </div>
                <hr>
                {{--main-content dataTables--}}
                <div class="row m15-left m15-right">
                    @include('admin.partials.errors')
                    @include('admin.partials.success')
                    <form class="form-horizontal" role="form" method="POST"  action="/admin/location">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Business state</label>
                            <div class="col-md-8">
                                {!!Form::select('state', $stateList, null, ['class'=>'form-control','id'=>'stateList',
                               'placeholder'=>'select state']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image_class" class="col-md-3 control-label">
                                Create Region/area</label>
                            <div class="col-md-8">
                                <select id="lga" name="lga[]" class="form-control" multiple="multiple"> </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-md">
                                    <i class="fa fa-plus-circle"></i>
                                    Add New region
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end main content -->
            </div><!--/.col-xs-6.col-lg-4-->
        </div><!--/row-->
    </div><!--/.col-xs-12.col-sm-9-->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#stateList").select2({
                placeholder: 'select state',
                tags:true,
            });
        });
        $(document).ready(function() {
            $('#stateList').change(function(){
                if($(this).val() !== "select state") {
                    var model=$('#lga');
                    model.empty();
                    $.get('{{ URL::to('api/lga')}}', {z: $(this).val()}, function(result){
                        $.each(result.data,function(){
                            $('#lga').append('<option value="'+this.id+'">'+this.text+'</option>');
                        });
                    });
                }
            });
        });
        $(document).ready(function() {
            $("#lga").select2({
                placeholder: 'create areas',
                tags: true,
            });
        });
    </script>
@endsection
