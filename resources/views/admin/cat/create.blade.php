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

                  {!!Form::select('name', $cats,null,['class'=>'form-control', 'id'=>'cat_name','placeholder'=>'Select Category']) !!}
                  
              </div>
            </div>

             <div class="form-group">
  <label for="name" class="col-md-3 control-label">
   Sub Categories
  </label>
  <div class="col-md-8">
     {!!Form::select('sub_cats[]', $subcats,null,['class'=>'form-control', 'multiple','id'=>'sub_cat']) !!}
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
  <label for="image_class" class="col-md-3 control-label">
    Image Class(Font Awesome)
  </label>
  <div class="col-md-8">
     {!!Form::select('image_class', $image_class,null,['class'=>'form-control', 'id'=>'image_class']) !!}
  </div>
</div>



              <div class="form-group">
                <div class="col-md-7 col-md-offset-3">
                  <button type="submit" class="btn btn-primary btn-md">
                    <i class="fa fa-plus-circle"></i>
                      Add New Category
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
  $("#image_class").select2({
    placeholder: 'Choose/create  new fontawesome class',
    tags: true,
  });
});

$(document).ready(function() {
  $("#sub_cat").select2({
    placeholder: 'create a sub category',
    tags: true,
  });
});

$(document).ready(function() {
 $('#stateList').on('change', function(){
      if($(this).val() !== "select state") {
         var model=$('#lga');
        model.empty();
       $.get('{{ URL::to('api/lga') }}', {z: $(this).val()}, function(result){
        var model=$('#lga');
        model.empty();
         $.each(result.data,function(){
                          $('#lga').append('<option value="'+this.id+'">'+this.text+'</option>');

                    });
       });
     }
  });
});
</script>
@stop