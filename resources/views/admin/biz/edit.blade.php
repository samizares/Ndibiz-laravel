@extends('master')
<!-- HEAD STARTS-->
  @section('title', 'Admin')
  @section('stylesheets')     
    <link href="{{asset('plugins/datatable/css/datatables.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/datatable/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('plugins/bootstrap-editable/bootstrap-editable.css')}}" rel="stylesheet"> -->
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
     <div class="row page-title-row">
      <div class="col-md-12">
        <h3><a href="/admin">Admin</a> » <a href="/admin/biz">Businesses</a> » <small> Edit Business Info</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Business form</h3>
          </div>
          <div class="panel-body">

            @include('admin.partials.errors')

            <form class="form-horizontal" role="form" method="POST" action="/admin/biz/{{$biz->id}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="id" value="{{$biz->id}}">

              <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business Name</label>
                  <div class="col-md-8">                
                   <input required type="text" value="{{ $biz->name}}" id="name" name="name" class="form-control" placeholder="Patt's Bar">                  
                  </div>
             </div>
             <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business Address</label>
                 <div class="col-md-8">
                 <input required type="text" value="{{$biz->address->street}}" id="address" name="address" class="form-control" placeholder="Ajose Adeogun street">
                  
                </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business state</label>
                 <div class="col-md-8">
                     {!!Form::select('state', $stateList, $biz->address->state_id, ['class'=>'form-control',
                     'id'=>'stateList','placeholder'=>'select state']) !!}
                  
                </div>
            </div>
            <div class="form-group">
              <label for="image_class" class="col-md-3 control-label">
                Business Region/area</label>
                  <div class="col-md-8">
                    <select id="lga" name="lga" class="form-control"> </select>  
                  </div>
            </div>

            
             <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business Category</label>
                 <div class="col-md-8">
                  {!!Form::select('cats[]', $catList, $cat, ['class'=>'form-control','id'=>'category',
                  'multiple']) !!}
                  
                </div>
            </div>
            <div class="form-group">
              <label for="image_class" class="col-md-3 control-label">
                Sub categories</label>
                  <div class="col-md-8">
                    <select id="sub" name="sub[]" class="form-control" multiple="multiple"> </select>  
                  </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business website</label>
                 <div class="col-md-8">
                 <input type="text" id="website" value="{{ $biz->website}}" name="website" class="form-control" placeholder="www.pattsbar.com.ng">
                  
                </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business Email Address</label>
                 <div class="col-md-8">
                  <input type="email" id="email" value="{{ $biz->email}}" name="email" class="form-control" placeholder="info@pattsbar.com.ng">
                  
                </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Contact Name</label>
                 <div class="col-md-8">
                 <input type="text" id="contactname" value="{{ $biz->contactname}}" name=" contactname" class="form-control" placeholder="Mr Patt" required>
                  
                </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Phone number 1</label>
                 <div class="col-md-8">
                <input type="text" id="contact" value="{{ $biz->phone1}}" name="phone1" class="form-control" placeholder="Phone number 1">
                  
                </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Phone number 2</label>
                    <div class="col-md-8">
                       <input type="text" value="{{ $biz->phone2}}" id="contact" name="phone2"class="form-control" placeholder="Phone number 2">                
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
                   Delete
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
  </div>
</div>
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
          <form method="POST" action="/admin/biz/{{ $biz->id }}">
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
<!-- CONTENT ENDS -->

<!-- SCRIPTS STARTS -->
@section('scripts')
<script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script>
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $("button.btn-hover").hover(function(){
          $(this).addClass('animated pulse');
        })
    });
    $(document).ready(function() {
      $("#category").select2({
         placeholder: 'select business category',
      });

    });

    $(document).ready(function() {
      var y=[];
     $('#category').change(function(){
          if($(this).val() !== "select business category") {
             var model=$('#sub');
            model.empty();
           $.get('{{ URL::to('api/subcat') }}', {y: $(this).val()}, function(result){
             $.each(result.data,function(){
                              $('#sub').append('<option value="'+this.id+'">'+this.text+'</option>');

                        });
           });
         }
      });
    });

    $(document).ready(function() {
      $("#stateList").select2({
      });
    });

    $(document).ready(function() {
     $('#stateList').change(function(){
          if($(this).val() !== "select state") {
             var model=$('#lga');
            model.empty();
           $.get('{{ URL::to('api/lga')}}', {z: $(this).val()}, function(result){       
             $.each(result.data,function(){
                              $('#lga').append('<option value="'+this.id+'">'+this.text+'</option>');

                        });
           });
         }
      });
    });

    $(document).ready(function() {
      $("#sub").select2({
        placeholder: 'select or create subcategories',
        tags: true,
      });
    });
</script>
<script src="{{asset('js/scripts.js')}}"></script>
@endsection