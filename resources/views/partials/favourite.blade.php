@if (Session::has('fav'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>
      <i class="fa fa-check-circle fa-lg fa-fw"></i> Success.  
    </strong>
    {{ Session::get('fav') }}
  </div>
@endif

@if (Session::has('claim'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>
      <i class="fa fa-check-circle fa-lg fa-fw"></i> Success.  
    </strong>
    {{ Session::get('claim') }}
  </div>
@endif