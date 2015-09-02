@extends('admin.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3>State <small>» Create New Regions/Area</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">New region/area Form</h3>
          </div>
          <div class="panel-body">

            @include('admin.partials.errors')

            <form class="form-horizontal" role="form" method="POST"  action="/admin/location">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business state</label>
                 <div class="col-md-8">
                     {!!Form::select('state', $stateList, null, ['class'=>'form-control','id'=>'stateList',
                    'placeholder'=>'select state']) !!}
                  
                </div>
            </div>
            <div class="form-group">
              <label for="image_class" class="col-md-3 control-label">
                Create Region/area</label>
                  <div class="col-md-8">
                    <select id="lga" name="lga[]" class="form-control" multiple="multiple"> </select>  
                  </div>
            </div>
          </div>
        </div>



              <div class="form-group">
                <div class="col-md-7 col-md-offset-3">
                  <button type="submit" class="btn btn-primary btn-md">
                    <i class="fa fa-plus-circle"></i>
                      Add New region
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
  $("#lga").select2({
    placeholder: 'create areas',
    tags: true,
  });
});
</script>
@stop