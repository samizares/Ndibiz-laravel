@extends('admin.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3>Categories <small>» Create New Category</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
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
    </div>
  </div>

@stop

@section('scripts')
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
@stop