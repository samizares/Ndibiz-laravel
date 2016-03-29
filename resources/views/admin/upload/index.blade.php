@extends('admin.adminlayout')
        <!-- HEAD STARTS-->
@section('title', 'Uploads')
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
            <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Uploads</h2>
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
                                <h3><a href="/admin">Admin</a> <small>» Uploads</small></h3>
                            </div>
                            <div class="col-md-6 text-right m20-top">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-default-inverse" data-toggle="modal" data-target="#modal-folder-create"><i class="fa fa-plus-circle"></i> New Folder
                                    </button>
                                    <button type="button" class="btn btn-default-inverse" data-toggle="modal" data-target="#modal-file-upload"><i class="fa fa-upload"></i> Upload</button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row m15-left m15-right">
                            @include('admin.partials.errors')
                            @include('admin.partials.success')
                            {{--DataTables--}}
                            <table id="uploadsTable" class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Size</th>
                                    <th data-sortable="false">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{-- The Subfolders --}}
                                @foreach ($subfolders as $path => $name)
                                    <tr>
                                        <td>
                                            <a href="/admin/upload?folder={{ $path }}">
                                                <i class="fa fa-folder fa-lg fa-fw"></i>
                                                {{ $name }}
                                            </a>
                                        </td>
                                        <td>Folder</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>
                                            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                                <div class="btn-group" role="group">
                                                    <a class="btn btn-xs btn-default-inverse animated fadeIn" type="button" href="/admin/upload?folder={{ $path }}"
                                                       data-toggle="tooltip" title="Open folder" data-position="top">
                                                        <i class="fa fa-folder fa-lg fa-fw"></i>
                                                        Open folder
                                                    </a></div>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-xs btn-default-inverse animated fadeInRight"
                                                            onclick="delete_folder('{{ $name }}')" data-toggle="tooltip" title="Delete folder" data-position="top">
                                                        <i class="fa fa-trash fa-lg"></i>
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                {{-- The Files --}}
                                @foreach ($files as $file)
                                    <tr>
                                        <td>
                                            <a href="{{ $file['webPath'] }}">
                                                @if (is_image($file['mimeType']))
                                                    <i class="fa fa-file-image-o fa-lg fa-fw"></i>
                                                @else
                                                    <i class="fa fa-file-o fa-lg fa-fw"></i>
                                                @endif
                                                {{ $file['name'] }}
                                            </a>
                                        </td>
                                        <td>{{ $file['mimeType'] or 'Unknown' }}</td>
                                        <td>{{ $file['modified']->format('j-M-y g:ia') }}</td>
                                        <td>{{ human_filesize($file['size']) }}</td>
                                        <td>
                                            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                                @if (is_image($file['mimeType']))
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-xs btn-default-inverse animated fadeIn"
                                                                onclick="preview_image('{{ $file['webPath'] }}')" data-toggle="tooltip" title="Open image" data-position="top">
                                                            <i class="fa fa-eye fa-lg"></i>
                                                            View Image
                                                        </button>
                                                    </div>
                                                @endif
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-xs btn-default-inverse animated fadeInRight"
                                                            onclick="delete_file('{{ $file['name'] }}')" data-toggle="tooltip" title="Delete image" data-position="top">
                                                        <i class="fa fa-trash fa-lg"></i>
                                                        Delete
                                                    </button></div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div> <!-- end main content -->
                    </div>
                </div>
            </div><!--/row-offcanvas -->

            {{-- Upload Modals --}}
            @include('admin.upload._modals')
        @endsection
        {{--scripts--}}
        @section('scripts')
            <script src="{{asset('js/jquery-2.1.3.min.js') }}"></script>
            <script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script>
            <script src="{{asset('plugins/datatable/js/datatables.js')}}"></script>
            <script src="{{asset('plugins/bootstrap-editable/bootstrap-editable.min.js')}}"></script>
            <!-- Page Scripts -->
            <script type="text/javascript">

                // Confirm file delete
                function delete_file(name) {
                    $("#delete-file-name1").html(name);
                    $("#delete-file-name2").val(name);
                    $("#modal-file-delete").modal("show");
                }
                // Confirm folder delete
                function delete_folder(name) {
                    $("#delete-folder-name1").html(name);
                    $("#delete-folder-name2").val(name);
                    $("#modal-folder-delete").modal("show");
                }
                // Preview image
                function preview_image(path) {
                    $("#preview-image").attr("src", path);
                    $("#modal-image-view").modal("show");
                }
                // Datatables
                //-----------------------------------------------------
                $(function() {
                    $("#uploads-table").DataTable();
                });
                $(function() {
                    $("#category").DataTable();
                });
            </script>
@endsection