<div class="form-group">
  <label for="name" class="col-md-3 control-label">
   Sub Categories(Readonly)
  </label>
  <div class="col-md-8">
     {!!Form::select('sub_cats[]', $subcats,$list,['class'=>'form-control', 'multiple'=>'multiple','id'=>'sub_cat']) !!}
  </div>
</div>

<div class="form-group">
  <label for="meta_description" class="col-md-3 control-label">
    Meta Description
  </label>
  <div class="col-md-8">
    <textarea class="form-control" id="meta_description" name="meta_description"
     rows="3">{{  $cat->meta_description }}</textarea>
  </div>
</div>

<div class="form-group">
  <label for="image_class" class="col-md-3 control-label">
    Image Class(Font Awesome)
  </label>
  <div class="col-md-8">
     {!!Form::select('image_class', $image_class,$cat->image_class,['class'=>'form-control', 'id'=>'image_class']) !!}
  </div>
</div>
