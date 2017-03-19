@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong>
    There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if ($errors = Session::get('errors2'))
 <div class="alert alert-danger">
    <strong>Whoops!</strong>
    There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif