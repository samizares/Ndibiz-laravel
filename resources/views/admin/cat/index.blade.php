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
    @include('admin.partials.errors')
    @include('admin.partials.success')
          <div class="row page-title-row">
            <div class="col-md-6">
              <h3><a href="/admin">Admin</a> <small>» Business Categories</small></h3>
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
                 <span class="btn btn-border">{{ $catt->name }} &emsp;</span><a class="m5-right fa fa-times-circle btn btn-default-inverse" href="/admin/sub?d={{$catt->id}}" data-method="DELETE" data-token="{{csrf_token()}}" data-confirm="Are you sure"></a> @endforeach
                </div>
              </td>
              <td>
                <a href="/admin/cat/{{$cat->id}}/edit"
                             class="btn btn-xs btn-default-inverse animated fadeIn" data-toggle="tooltip" data-placement="top" title="Edit Category Info">
                            <i class="fa fa-edit"></i>
                          </a>
                          <a href="/admin/cat/{{$cat->id}}/delete"
                             class="btn btn-xs btn-default-inverse animated fadeInRight" data-toggle="tooltip" data-placement="top" title="Delete Category">
                            <i class="fa fa-trash"></i>
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
@endsection
<!-- CONTENT ENDS -->

<!-- SCRIPTS STARTS -->
  @section('scripts')    
    <script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script>
    <script src="{{asset('plugins/datatable/js/datatables.js')}}"></script>
    <script src="{{asset('js/deleteHandler.js') }}"></script>
    

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
    </script>
    <script src="{{asset('js/scripts.js')}}"></script>
  @endsection
<!-- SCRIPTS ENDS -->