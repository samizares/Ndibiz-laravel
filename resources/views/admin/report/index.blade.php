@extends('master')
<!-- HEAD STARTS-->
  @section('title', 'Admin')
  @section('stylesheets')     
    <link href="{{asset('plugins/datatable/css/datatables.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/datatable/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet"> 
    <link href="{{asset('plugins/bootstrap-editable/bootstrap-editable.css')}}" rel="stylesheet">
    
  @endsection
<!-- HEAD ENDS-->

<!-- HEADER STARTS -->
  <!-- breadcrumbs -->
  @section('breadcrumb')
        <div class="breadcrumb">
          <div class="featured-listing" style="margin:0;">
              <h2 class="page-title animated fadeInLeft" style="margin:0;">Admin >> Reports/Complaints Page</h2>
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
<!-- HEADER ENDS -->

<!-- CONTENT STARTS -->
@section('content')
    <div id="page-content" class="home-slider-content">
    <div class="container">
     <div class="home-with-slide">
      @include('admin.partials.errors')
      @include('admin.partials.success')
      <div class="row page-title-row">
        <div class="col-md-6">
          <h3><a href="/admin">Admin</a> <small>» Business Reports({{ $totalReport}})</small></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9 col-md-push-3">

          <table id="report-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Biz ID</th>
                <th>Business Name</th>
                <th>Reporter Email</th>
                <th>Complaints</th>
                <th>Reasons <i class="fa fa-message"></i></th>
                <th data-sortable="false">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($reports as $report)  
              <?php $biz_id = $report->biz_id; ?>  
              <?php $biz = App\Biz::findOrFail($biz_id); ?>            
                <tr>
                  <td> {{ $report-> id }}</td>
                   <td>{{ $biz->name }}</td>
                   <td>{{ $report->contact_email }}</td>
                   <td>{{ $report-> complaint }}</td>
                   <td>{{ $report-> explain }}</td>
                
                  <td><a href="#" class="btn btn-xs btn-default-inverse animated fadeInRight" data-toggle="modal" 
                            data-id="{{$report->id}}" data-name="{{$biz->name}}" data-target="#report-delete"
                             title="Delete this report"><i class="fa fa-times-circle"></i>
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
                      <h2>Admin User Panel</h2>
                      <div class="single-product"></div>
                  </div>
            </div>
        </div> <!-- end .page-sidebar -->
      </div> <!-- end row-->
     </div> <!-- end .home-with-slide -->
    </div> <!-- end .container -->
  </div>  <!-- end #page-content -->

   {{-- Confirm Delete --}}
  <div class="modal fade" id="report-delete" tabIndex="-1">
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
            Are you sure you want to delete this Report?
          </p>
        </div>
        <div class="modal-footer">
          <form class="form-horizontal" method="POST" action="/admin/report/delete">
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
  
@endsection
<!-- CONTENT ENDS -->

<!-- SCRIPTS STARTS -->
  @section('scripts')    
   <!-- <script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script> -->
    <script src="{{asset('plugins/datatable/js/datatables.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-editable/bootstrap-editable.min.js')}}"></script>

    @if(Session::has('success_code') && Session::get('success_code') == 220)
    <script type="text/javascript">
    $(function() {
        swal({ title: "Success!", 
                text: "{{ Session::get('report')}}",
                type: "success"
            });
    });
    </script>
    @endif

    <script type="text/javascript">
        // Datatables
        //-----------------------------------------------------
        

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

          $(function() {
              $("#report-table").DataTable({
                order: [[0, "desc"]]
              });
            });

         
          $('#report-delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
    var reportID = button.data('id') // Extract info from data-* attributes
    var bizname = button.data('name')
    
    var title = 'Confirm Delete  Report #' + reportID + ' from database';
    var content = 'Are you sure want to delete report about ' + bizname + ' from database?';
    
    // Update the modal's content.
    var modal = $(this)
    modal.find('.modal-title').text(title);
    modal.find('.modal-body').text(content);
    modal.find('button.btn-danger').val(reportID);
           });
      
    </script>
   <script src="{{asset('js/scripts.js')}}"></script>
  @endsection
<!-- SCRIPTS ENDS -->