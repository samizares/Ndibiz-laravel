@extends('master')
<!-- HEAD STARTS-->
  @section('title', 'Admin')
  @section('stylesheets')     
     <link href="{{asset('plugins/bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
     <link href="{{asset('plugins/jplist/jplist.core.min.css')}}" rel="stylesheet">
  @endsection
<!-- HEAD ENDS-->

<!-- HEADER STARTS -->
  <!-- breadcrumbs -->
@section('breadcrumb')
      <div class="breadcrumb">
        <div class="featured-listing" style="margin:0;">
            <h2 class="page-title animated fadeInLeft" style="margin:0;">Admin >> Business Categories</h2>
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
          <div class="row page-title-row">
            <div class="col-md-6">
              <h3><a href="/admin">Admin</a> <small>» Business Categories ({{ $totalCat}})</small></h3>
            </div>
            <div class="col-md-6 text-right">
              <h3><a href="/admin/cat/create" class="btn btn-default-inverse btn-md">
                <i class="fa fa-plus-circle"></i> New Category
              </a></h3>
            </div>
          </div>

    <div class="row">
            <div class="col-md-9 col-md-push-3">

        @include('admin.partials.errors')
        @include('admin.partials.success')

        <table id="cats-table" class="table table-striped table-bordered">
          <thead>
          <tr>
            <th data-sortable="true">Category</th>
                  <th data-sortable="false">Font Awesome Image</th>
                  <th class="hidden-md">Meta Description</th>
                  <th data-sortable="true">Sub categories</th>
                  <th data-sortable="false">Actions</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($cats as $cat)
            <tr>
              <td>{{ $cat->name }}</td>
               <td> <i class="fa fa-{{$cat->image_class}}"> </i> </td>
              <td class="hidden-md">{{ $cat->meta_description }}</td>
              <td>
                <div class="btn-group">@foreach($cat->subcats as $catt)
                  <li>{{ $catt->name }}
                   <a href="#" class="btn btn-xs btn-default-inverse animated fadeInRight" data-toggle="modal" 
                            data-sid="{{$catt->id}}" data-sname="{{$catt->name}}" data-target="#delete-sub"
                             title="Delete this Category"><i class="fa fa-times-circle"></i>
                            </a></li> @endforeach
                 
                </div>
              </td>
              <td>
                <a href="/admin/cat/{{$cat->id}}/edit"
                             class="btn btn-xs btn-default-inverse animated fadeIn" data-toggle="tooltip" data-placement="top" title="Edit Category Info">
                            <i class="fa fa-edit"></i>
                          </a>
                         <a href="#" class="btn btn-xs btn-default-inverse animated fadeInRight" data-toggle="modal" 
                            data-id="{{$cat->id}}" data-name="{{$cat->name}}" data-target="#modal-delete"
                             title="Delete this Category"><i class="fa fa-times-circle"></i>
                            </a>

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
          <form class="form-horizontal" method="POST" action="/admin/cat/delete">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="button" class="btn btn-default"
                    data-dismiss="modal">Close</button>
            <button type="submit" name="yes" class="btn btn-danger">
              <i class="fa fa-times-circle"></i> Yes
            </button>
          </form>
        </div>
      </div>
    </div>
  </div> 

  {{-- Delete Subcategory--}}
  <div class="modal fade" id="delete-sub" tabIndex="-1">
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
            Are you sure you want to delete this Sub-Category?
          </p>
        </div>
        <div class="modal-footer">
          <form class="form-horizontal" method="POST" action="/admin/sub/delete">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="button" class="btn btn-default"
                    data-dismiss="modal">Close</button>
            <button type="submit" name="sub" class="btn btn-danger">
              <i class="fa fa-times-circle"></i> Yes
            </button>
          </form>
        </div>
      </div>
    </div>
  </div> 

@endsection
<!-- CONTENT ENDS -->

<!-- SCRIPTS STARTS -->
  @section('scripts')    
    <script src="{{asset('plugins/datatable/js/datatables.js')}}"></script>
    
    <script type="text/javascript">
        // Datatables
        //-----------------------------------------------------
          $(function() {
            $("#cats-table").DataTable({
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

          $(document).ready(function () {
          $('#modal-delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
    var catid = button.data('id') // Extract info from data-* attributes
    var catname = button.data('name')
    
    var title = 'Confirm Delete ' + catname + ' from database';
    var content = 'Are you sure want to remove ' + catname + ' from database?';
    
    // Update the modal's content.
    var modal = $(this)
    modal.find('.modal-title').text(title);
    modal.find('.modal-body').text(content);
    modal.find('button.btn-danger').val(catid);
           });

$('#delete-sub').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
    var subid = button.data('sid') // Extract info from data-* attributes
    var subname = button.data('sname')
    
    var title = 'Confirm Delete ' + subname + ' from database';
    var content = 'Are you sure want to remove ' + subname + ' from database?';
    
    // Update the modal's content.
    var modal = $(this)
    modal.find('.modal-title').text(title);
    modal.find('.modal-body').text(content);
    modal.find('button.btn-danger').val(subid);
           });
          });
    </script>
    <script src="{{asset('js/scripts.js')}}"></script>
  @endsection
<!-- SCRIPTS ENDS -->