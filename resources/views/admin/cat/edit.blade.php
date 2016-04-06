@extends('admin.adminlayout')
@section('title', 'Admin Edit Category')
@section('page-banner')
    <div class="header-search-bar">
        <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Edit Category</h2>
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
                        <h3><a href="/admin">Admin</a> » <a href="/admin/cat">Business Categories</a> » <small>Edit Category</small></h3>
                    </div>
                </div>
                <hr>
                {{--main-content dataTables--}}
                <div class="row m15-left m15-right">
                    @include('admin.partials.errors')
                    @include('admin.partials.success')

                    <form class="form-horizontal" role="form" method="POST" action="/admin/cat/{{$cat->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{$cat->id}}">

                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Category</label>
                            <div class="col-md-8">
                                {!!Form::select('name', $cats,$cat->name,['class'=>'form-control', 'id'=>'cat_name']) !!}
                            </div>
                        </div>

                        @include('admin.cat._form')

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-md">
                                    <i class="fa fa-save"></i>
                                    Save Changes
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- end main content -->
            </div><!--/.col-xs-6.col-lg-4-->
        </div><!--/row-->
    </div><!--/.col-xs-12.col-sm-9-->
    {{-- Confirm Delete --}}
    <div class="modal fade" id="modal-delete" tabIndex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">Please Confirm</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        Are you sure you want to delete this Category?
                    </p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="/admin/cat/{{ $cat->id }}">
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
            $("button.btn-hover").hover(function(){
                $(this).addClass('animated pulse');
            })
        });

        $(document).ready(function() {
            $("#cat_name").select2({
                tags: true
            });
        });
        $(document).ready(function() {
            $("#image_class").select2({
                tags: true
            });
        });
        $(document).ready(function() {
            $("#sub_cat").select2({
                tags: true
            });
        });
    </script>
@endsection
