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
              <h2 class="page-title animated fadeInLeft" style="margin:0;">Admin >> Business Listings</h2>
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
          <h3><a href="/admin">Admin</a> <small>» Business Listings({{ $totalBiz}})</small></h3>
        </div>
        <div class="col-md-6 text-right">
          <a href="/admin/biz/create" class="btn btn-default-inverse btn-md">
            <i class="fa fa-plus-circle"></i> New Business
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9 col-md-push-3">

          <table id="biz-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Business name</th>
                <th>Featured</th>
                <th>category</th>
                <th>Sub-Category</th>
                <th>State</th>
                <th data-sortable="false">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bizs as $biz)
                <tr>
                  <td>{{ $biz-> name }}</td>
                  <td> 
                    <span class="featured" id="{{$biz->id}}">{{ $biz->featured }}</span></td>
                  <td>@foreach($biz->cats as $cat)
                   <li>{{ $cat->name }} </li> @endforeach</td> 

                   <td>@foreach($biz->subcats as $sub)
                   <li>{{ $sub->name }} </li> @endforeach</td>
                  <td>{{ $biz-> address->state->name}}</td>
                  <td>
                     <a href="/review/biz/{{$biz->id}}"
                               class="btn btn-xs btn-default-inverse animated fadeInLeft" data-toggle="tooltip" data-placement="top" title="View Business Info">
                              <i class="fa fa-eye"></i>
                            </a>
                            <a href="/admin/biz/{{$biz->id}}/edit"
                               class="btn btn-xs btn-default-inverse animated fadeIn" data-toggle="tooltip" data-placement="top" title="Edit Business Info">
                              <i class="fa fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-xs btn-default-inverse animated fadeInRight" data-toggle="modal" 
                            data-id="{{$biz->id}}" data-name="{{$biz->name}}" data-target="#modal-delete"
                             title="Delete this biz"><i class="fa fa-times-circle"></i>
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
                      <h2>Admin Biz Panel</h2>
                      <div class="single-product"></div>
                  </div>
            </div>
        </div> <!-- end .page-sidebar -->
      </div> <!-- end row-->
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
            Are you sure you want to delete this Business?
          </p>
        </div>
        <div class="modal-footer">
          <form class="form-horizontal" method="POST" action="/admin/biz/delete">
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
              $("#biz-table").DataTable({
                order: [[0, "desc"]]
              });
            });

            $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.fn.editable.defaults.mode = 'popup';
            $.fn.editable.defaults.params = function (params) {
                params._token = $("meta[name=token]").attr("content");
                return params;
            };
            $('.featured').editable();
             $(document).on('click','.editable-submit',function(){
              var x = $(this).closest('td').children('span').attr('id');
              var y= $("input:text").val();
           //   var y = $('.input-sm').val();
              var z = $(this).closest('td').children('span');
              $.ajax({
                url: "{{ URL::to('api/featured')}}?id="+x+"&data="+y,
                type: 'GET',
                success: function(s){
                  if(s == 'status'){
                  $(z).html(y);}
                  if(s == 'error') {
                  alert('Error Processing your Request!');}
                },
                error: function(e){
                  alert('Error Processing your Request!!');
                }
              });
            /*  type:'text',
              title:'Edit Featured',
              url: '{{ URL::to('api/featured')}}',
              pk: '{{$biz->id}}',
              ajaxOptions: {
                dataType: 'json'
                }  */
                  
            });
          });

       $(document).ready(function () {
          $('#modal-delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
    var bizid = button.data('id') // Extract info from data-* attributes
    var bizname = button.data('name')
    
    var title = 'Confirm Delete  Biz #' + bizid + ' from database';
    var content = 'Are you sure want to remove ' + bizname + ' from database?';
    
    // Update the modal's content.
    var modal = $(this)
    modal.find('.modal-title').text(title);
    modal.find('.modal-body').text(content);
    modal.find('button.btn-danger').val(bizid);
           });

          });
    </script>
   <script src="{{asset('js/scripts.js')}}"></script> 
  @endsection
<!-- SCRIPTS ENDS -->