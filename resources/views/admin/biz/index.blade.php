@extends('admin.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3>Business <small>» Listing</small></h3>
      </div>
      <div class="col-md-6 text-right">
        <a href="/admin/biz/create" class="btn btn-success btn-md">
          <i class="fa fa-plus-circle"></i> New Business
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">

        @include('admin.partials.errors')
        @include('admin.partials.success')

        <table id="biz-table" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Business name</th>
              <th>Address</th>
              <th>phone1</th>
              <th>Featured</th>
              <th>category</th>
              <th>Sub-Category</th>
              <th>State</th>
              <th data-sortable="false">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bizs as $biz)
              <tr>
                <td>{{ $biz-> name }}</td>
                <td>{{ $biz-> address->street}}</td> 
                <td>{{ $biz-> phone1 }}</td>
                <td> 
                  <span class="featured" id="{{$biz->id}}">{{ $biz->featured }}</a></td>
                <td>@foreach($biz->cats as $cat)
                 <li>{{ $cat->name }} </li> @endforeach</td> 

                 <td>@foreach($biz->subcats as $sub)
                 <li>{{ $sub->name }} </li> @endforeach</td>
                <td>{{ $biz-> address->state->name}}</td>
                <td>
                  <a href="/admin/biz/{{$biz->id}}/edit"
                     class="btn btn-xs btn-info">
                    <i class="fa fa-edit"></i> Edit
                  </a>
                  <a href="/review/biz/{{$biz->id}}"
                     class="btn btn-xs btn-warning">
                    <i class="fa fa-eye"></i> View
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>


@stop

@section('scripts')
  <script>
    $(function() {
      $("#biz-table").DataTable({
        order: [[0, "desc"]]
      });
    });

    $(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.params = function (params) {
        params._token = $("meta[name=token]").attr("content");
        return params;
    };
    $('.featured').editable();
     $(document).on('click','.editable-submit',function(){
      var x = $(this).closest('td').children('span').attr('id');
      var y = $('.input-sm').val();
      var z = $(this).closest('td').children('span');
      $.ajax({
        url: "{{ URL::to('api/featured')}}?id="+x+"&data="+y,
        type: 'GET',
        success: function(s){
          if(s == 'status'){
          $(z).html(y);}
          if(s == 'error') {
          alert('Error Processing your Request!');}
        },
        error: function(e){
          alert('Error Processing your Request!!');
        }
      });
    /*  type:'text',
      title:'Edit Featured',
      url: '{{ URL::to('api/featured')}}',
      pk: '{{$biz->id}}',
      ajaxOptions: {
        dataType: 'json'
        }  */
          
    });
  });
  </script>
@stop