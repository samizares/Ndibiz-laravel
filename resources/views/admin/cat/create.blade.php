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
   <div class="home-with-slide">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3><a href="/admin">Admin</a> » <a href="/admin/cat">Business Categories</a> » <small>New Category</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">New Category Form</h3>
          </div>
          <div class="panel-body">

            @include('admin.partials.errors')

            <form class="form-horizontal" role="form" method="POST"  action="/admin/cat">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Category Names</label>
                 <div class="col-md-8">

                  {!!Form::select('name', $cats,null,['class'=>'form-control', 'id'=>'cat_name',
                  'placeholder'=>'Select/Create Category']) !!}
                  
              </div>
            </div>

            <div class="form-group">
                <label for="image_class" class="col-md-3 control-label">
                  Category Image(Font Awesome)
                </label>
               <div class="col-md-8">
                 {!!Form::select('cat_image', $all_image,null,['class'=>'form-control',
                 'placeholder'=>'Select Category Image', 'id'=>'cat_image']) !!}
              </div>
          </div>

          <div class="form-group">
              <label for="meta_description" class="col-md-3 control-label">
                 Meta Description
               </label>
              <div class="col-md-8">
                  <textarea class="form-control" id="meta_description" name="meta_description"
                   rows="3">Enter tag description</textarea>
              </div>
           </div>

           <div class="form-group">
                 <label for="name" class="col-md-3 control-label">
                     Sub Categories
                 </label>
                <div class="col-md-8">
                   <select id="subcat" name="subcat" class="form-control"> </select> 
                  <!--  {!!Form::select('sub_cats', $subcats,null,['class'=>'form-control','id'=>'sub_cat']) !!}-->
                </div>
            </div>

           <div class="form-group">
                 <label for="image_class" class="col-md-3 control-label">
                     Sub-category Image(Font Awesome)
                 </label>
                   <div class="col-md-8">
                    
                  {!!Form::select('sub_image', $all_image,null,['class'=>'form-control', 'id'=>'sub_image',
                  'placeholder'=>'Select Sub-category Image']) !!}
              </div>
            </div>



              <div class="form-group">
                <div class="col-md-7 col-md-offset-3">
                  <button type="submit" class="btn btn-primary btn-md">
                    <i class="fa fa-plus-circle"></i>
                      Add New Category/Sub-category
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
@endsection

@section('scripts')
  <script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script>
  <script src="{{asset('plugins/select2/select2.min.js')}}"></script>  
  <script>
    $(document).ready(function() {
      $("#cat_name").select2({
        tags: true,

      });

    });


    $(document).ready(function() {
      $("#cat_image").select2({
        placeholder: 'Choose Category Image',
        tags: true,
      });
    });

    $(document).ready(function() {
      $("#sub_image").select2({
        placeholder: 'Choose Sub-Category Image',
        tags: true,
      });
    });


    $(document).ready(function() {
     $('#cat_name').on('change', function(){
          if($(this).val() !== "Select/Create Category") {
             var model=$('#subcat');
            model.empty();
           $.get('{{ URL::to('api/subcat') }}', {y: $(this).val()}, function(result){
             $.each(result.data,function(){
                              $('#subcat').append('<option value="'+this.id+'">'+this.text+'</option>');

                        });
              
                $('#meta_description').val(result.desc);
                console.log(result.desc)
              
           });
         }
      });
    });

    $(document).ready(function() {
      $("#subcat").select2({
        placeholder: 'create a sub category',
        tags: true,
      });
    });
  </script>
  <script src="{{asset('js/scripts.js')}}"></script>
@stop