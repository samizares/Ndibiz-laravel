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
              <h2 class="page-title animated fadeInLeft" style="margin:0;">Admin >> User Listings</h2>
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
          <h3><a href="/admin">Admin</a> <small>» User Listings({{ $totalUser}})</small></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9 col-md-push-3">

          <table id="user-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Confirmed </th>
                <th>Notify</th>
                <th>Admin</th>
                <th data-sortable="false">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{ $user-> username }}</td>
                   <td>{{ $user-> email }}</td>
                   <td>{{ $user-> confirmed }}</td>
                   <td>{{ $user-> notify }}</td>
                  <td> 
                    <span class="admin" id="{{$user->id}}">{{ $user->admin }}</span></td>
                
                  <td><a href="/profile/{{$user->id}}" class="btn btn-xs btn-default-inverse animated fadeInLeft"
                  data-toggle="tooltip" data-placement="top" title="View User Info"><i class="fa fa-eye"></i> </a>
                  | @if(Auth::user()->id == $user->id)  <a href="/admin/user/{{$user->id}}/edit"
                               class="btn btn-xs btn-default-inverse animated fadeInLeft" data-toggle="tooltip" data-placement="top" title="View User Info">
                              <i class="fa fa-edit"></i>
                            </a>

                            @endif
              
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
              $("#user-table").DataTable({
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
            $('.admin').editable();
             $(document).on('click','.editable-submit',function(){
              var x = $(this).closest('td').children('span').attr('id');
              var y= $("input:text").val();
           //   var y = $('.input-sm').val();
              var z = $(this).closest('td').children('span');
              $.ajax({
                url: "{{ URL::to('api/admin')}}?id="+x+"&data="+y,
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
           
                  
            });
          });
    </script>
   <script src="{{asset('js/scripts.js')}}"></script>
  @endsection
<!-- SCRIPTS ENDS -->