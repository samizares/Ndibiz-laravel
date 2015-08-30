@extends('admin.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3>Business <small>» Create New Business</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">New Business form</h3>
          </div>
          <div class="panel-body">

            @include('admin.partials.errors')

            <form class="form-horizontal" role="form" method="POST"  action="/admin/biz">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business Name</label>
                  <div class="col-md-8">
                   <input required type="text" id="name" name="name" class="form-control" placeholder="Patt's Bar">                  
                  </div>
            </div>
             <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business Address</label>
                 <div class="col-md-8">
                 <input required type="text" id="address" name="address" class="form-control" placeholder="Ajose Adeogun street">
                  
                </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business state</label>
                 <div class="col-md-8">
                     {!!Form::select('state', $stateList, null, ['class'=>'form-control','id'=>'stateList',
                    'placeholder'=>'select state']) !!}
                  
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
                  {!!Form::select('cats[]', $catList, null, ['class'=>'form-control','id'=>'category',
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
                 <input type="text" id="website" name="website" class="form-control" placeholder="www.pattsbar.com.ng">
                  
                </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business Email Address</label>
                 <div class="col-md-8">
                  <input type="email" id="email" name="email" class="form-control" placeholder="info@pattsbar.com.ng">
                  
                </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Contact Name</label>
                 <div class="col-md-8">
                 <input type="text" id="contactname" name=" contactname" class="form-control" placeholder="Mr Patt" required>
                  
                </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Phone number 1</label>
                 <div class="col-md-8">
                <input type="text" id="contact" name="phone1" class="form-control" placeholder="Phone number 1">
                  
                </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Phone number 2</label>
                    <div class="col-md-8">
                       <input type="text" id="contact" name="phone2"class="form-control" placeholder="Phone number 2">                
                    </div>
            </div>


              <div class="form-group">
                <div class="col-md-7 col-md-offset-3">
                  <button type="submit" class="btn btn-primary btn-md">
                    <i class="fa fa-plus-circle"></i>
                      Add New Business
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
    placeholder: 'select state',
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
@stop