@extends('admin.adminlayout')
@section('title', 'Admin Create New Category')
@section('page-banner')
    <div class="header-search-bar">
        <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Create New Category</h2>
    </div> <!-- END .header-search-bar -->
@endsection
@section('main-content')
    <div class="col-xs-12 col-sm-9">
        <p class="visible-xs">
            <button type="button" class="btn btn-default-inverse btn-xs" data-toggle="offcanvas">
                Click to view Admin Menu <i class="glyphicon glyphicon-chevron-right"></i></button>
        </p>
        <div class="row">
            <div class="col-md-12">
                <div class="row page-title-row">
                    <div class="col-md-12">
                        <h3><a href="/admin">Admin</a> » <a href="/admin/cat">Business Categories</a> » <small>New Category</small></h3>
                    </div>
                </div>
                <hr>
                {{--main-content dataTables--}}
                <div class="row m15-left m15-right">
                    @include('admin.partials.errors')
                    <form class="form-horizontal" role="form" method="POST"  action="/admin/cat">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                        <div class="form-group">
                            <label for="cat" class="col-md-3 control-label">Category Names</label>
                            <div class="col-md-8">

                                {!!Form::select('category_name', $catList,null,['class'=>'form-control', 'id'=>'cat_name',
                                'placeholder'=>'Create Category']) !!}

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
                                <!--  <select id="subcat" name="subcat" class="form-control"> </select> -->
                                {!!Form::select('subcategory_name[]', $subcats,null,['class'=>'form-control',
                                'id'=>'subcat', 'multiple'=>'multiple']) !!}

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
                <!-- end main content -->
            </div><!--/.col-xs-6.col-lg-4-->
        </div><!--/row-->
    </div><!--/.col-xs-12.col-sm-9-->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            /*  $.ajaxSetup({
             headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
             }); */

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
            $("#subcat").select2({
                tags: true,
                placeholder: 'create a Sub-Category',
            });
        });


        /* $(document).ready(function() {
         $('#cat_name').on('change', function(){
         if($(this).val() !== "Select/Create Category") {
         var model=$('#subcat');
         model.empty();
         $.get('{{ URL::to('api/subcat2') }}', {y: $(this).val()}, function(result){
         $.each(result.data,function(){
         $('#subcat').append('<option value="'+this.id+'">'+this.text+'</option>');

         });

         $('#meta_description').val(result.desc);
         console.log(result.desc)

         });
         }
         });
         });  */
    </script>
@endsection
