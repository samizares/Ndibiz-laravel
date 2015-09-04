@extends('master')
<!-- HEAD STARTS-->
  @section('title', 'Admin')
  @section('stylesheets')     
    <link href="{{asset('plugins/datatable/css/datatables.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/datatable/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
  @endsection
<!-- HEAD ENDS-->

<!-- HEADER STARTS -->
  <!-- breadcrumbs -->
@section('breadcrumb')
      <div class="breadcrumb">
        <div class="featured-listing" style="margin:0;">
            <h2 class="page-title" style="margin:0;">Admin >> <span>Uploads</span></h2>
        </div>
      </div>
@endsection
<!-- navigation -->
@section('header-navbar')
        <div class="header-nav-bar">
            <div class="container">
              <nav>
                <button><i class="fa fa-bars"></i></button>
                @include('admin.partials.navbar')
              </nav>
            </div> <!-- end .container -->
        </div> <!-- end .header-nav-bar -->   
@endsection
<!-- CONTENT -->
@section('content')
      <div id="page-content" class="home-slider-content">
      <div class="container">
       <div class="home-with-slide">
        @include('admin.partials.errors')
        @include('admin.partials.success')
        <div class="row page-title-row">
          <div class="col-md-6">
            <h3><a href="/admin">Admin</a> <small>» Uploads</small></h3>
          </div>
          <div class="col-md-6 text-right">
            
            <div class="btn-group" role="group"> 
              <button type="button" class="btn btn-default-inverse" data-toggle="modal" data-target="#modal-folder-create"><i class="fa fa-plus-circle"></i> New Folder
              </button>
              <button type="button" class="btn btn-default-inverse" data-toggle="modal" data-target="#modal-file-upload"><i class="fa fa-upload"></i> Upload</button>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-9 col-md-push-3">
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
          </div>
          <div class="col-md-3 col-md-pull-9 category-toggle">
            <button><i class="fa fa-briefcase"></i></button>
            <div class="post-sidebar">
                  <div class="latest-post-content">
                      <h2>Admin Panel</h2>
                      <div class="single-product"></div>
                  </div>
            </div>
        </div> <!-- end .page-sidebar -->
        </div>
        </div> <!-- end .home-with-slide -->
        </div> <!-- end .container -->
      </div>  <!-- end #page-content -->

  @include('admin.upload._modals')

@endsection
<!-- CONTENT ENDS -->
<!-- SCRIPTS STARTS -->
  @section('scripts')    
    <script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script>
    <script src="{{asset('plugins/datatable/js/datatables.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>

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
<!-- SCRIPTS ENDS -->
