@extends('admin.adminlayout')
        <!-- HEAD STARTS-->
@section('title', 'Settings')
@section('stylesheets')
    <link href="{{asset('plugins/Bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
    <link  rel="stylesheet" href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
    @endsection
            <!-- HEAD ENDS-->
    <!-- HEADER STARTS -->
    <!-- PAGE BANNER -->
@section('page-banner')
    <div class="header-search map">
        <div class="header-search-bar">
            <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Settings</h2>
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
                        <h3 class="text-uppercase m10-top">Edit Home Page Settings</h3>
                        <hr>
                        <div class="row m15-left m15-right">
                            @include('admin.partials.errors')
                            @include('admin.partials.success')
                            {{--DataTables--}}
                            <form class="form-horizontal" role="form" method="POST"
                                  action="/admin/settings" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{$set->id}}">
                                <div class="form-group">
                                    <label for="title" class="col-md-3 control-label">Title 1</label>
                                    <div class="col-md-8">
                                        <input required="required" type="text" value="{{ $set->title1}}" id="title1" name="title1"
                                               class="form-control" placeholder="enter title1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="span1" class="col-md-3 control-label">Span1</label>
                                    <div class="col-md-8">
                                        <input type="text" id="span1" value="{{ $set->span1}}" name="span1" class="form-control"
                                               placeholder="Span1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="span2" class="col-md-3 control-label">Span2</label>
                                    <div class="col-md-8">
                                        <input type="text" id="span2" value="{{ $set->span2}}" name="span2" class="form-control"
                                               placeholder="Span2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="span3" class="col-md-3 control-label">Span3</label>
                                    <div class="col-md-8">
                                        <input type="text" id="span3" value="{{ $set->span3}}" name="span3" class="form-control"
                                               placeholder="Span3">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="span4" class="col-md-3 control-label">Span4</label>
                                    <div class="col-md-8">
                                        <input type="text" id="span4" value="{{ $set->span4}}" name="span4" class="form-control"
                                               placeholder="Span4">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="span5" class="col-md-3 control-label">Span5</label>
                                    <div class="col-md-8">
                                        <input type="text" id="span5" value="{{ $set->span5}}" name="span5" class="form-control"
                                               placeholder="Span5">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title2" class="col-md-3 control-label">title2</label>
                                    <div class="col-md-8">
                                        <input type="text" id="title" value="{{ $set->title2}}" name="title2" class="form-control"
                                               placeholder="title2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subtitle" class="col-md-3 control-label">Subtitle</label>
                                    <div class="col-md-8">
                                        <input type="text" id="subtitle" value="{{ $set->subtitle}}" name="subtitle" class="form-control"
                                               placeholder="Subtitle">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="images" class="col-md-3 control-label">
                                        Homepage background Image </label>
                                    <div class="col-md-8">
                                        <div class="panel-body">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="{{asset($set->image)}}" alt="homepage-image">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span><input type="file" name="image"></span>
                                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-md-offset-7">
                                    <ul class="list-inline">
                                        <li><button type="submit" class="btn btn-default btn-md">
                                                <i class="fa fa-save"></i>
                                                Save Changes
                                            </button></li>

                                    </ul>
                                </div>
                            </form>
                        </div> <!-- end main content -->
                    </div>
                </div>
            </div><!--/row-offcanvas -->

            {{-- Upload Modals --}}
            @include('admin.upload._modals')
        @endsection
        {{--scripts--}}
        @section('scripts')
            <script src="{{asset('js/scripts.js')}}"></script>
            <script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
@endsection