@extends('master')
<!-- HEAD STARTS-->
  @section('title', 'Admin')
  @section('stylesheets')     
   <link href="{{asset('plugins/datatable/css/datatables.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/datatable/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet">
  @endsection
<!-- HEAD ENDS-->

<!-- HEADER STARTS -->
  <!-- breadcrumbs -->
  @section('breadcrumb')
        <div class="breadcrumb">
          <div class="featured-listing" style="margin:0;">
              <h2 class="page-title animated fadeInLeft" style="margin:0;">Admin >> Edit Location</h2>
          </div>
        </div>
  @endsection

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
<!-- HEADER ENDS -->
<!-- HEADER ENDS -->

<!-- CONTENT STARTS -->
@section('content')
  <div id="page-content" class="home-slider-content">
  <div class="container">
   <div class="home-with-slide">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3><a href="/admin">Admin</a> » <a href="/admin/location">Locations</a> » <small>Edit Location</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit region/area Form</h3>
          </div>
          <div class="panel-body">
            @include('admin.partials.errors')
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
                         {!!Form::select('lga[]', $areas, $areas, ['class'=>'form-control','id'=>'lga','placeholder'=>'Edit Regions','multiple']) !!}
                        </div>
                  </div>

               <div class="form-group">
                <div class="col-md-7 col-md-offset-3">
                  <button type="submit" class="btn btn-primary btn-md">
                    <i class="fa fa-save"></i>
                      Save Changes
                  </button>
                  <button type="button" class="btn btn-danger btn-md"
                          data-toggle="modal" data-target="#modal-delete">
                    <i class="fa fa-times-circle"></i>
                   Delete State and All Regions
                  </button>
                  <button type="button" class="btn btn-danger btn-md"
                          data-toggle="modal" data-target="#modal-deleteArea">
                    <i class="fa fa-times-circle"></i>
                   Delete Selected Regions
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
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
            Are you sure you want to delete the selected Areas this state?
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
{{--<script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script> --}}
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
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
    <script src="{{asset('js/scripts.js')}}"></script>
    @endsection