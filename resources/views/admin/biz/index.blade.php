@extends('admin.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3>Business <small>» Listing</small></h3>
      </div>
      <div class="col-md-6 text-right">
        <a href="#" class="btn btn-success btn-md">
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
              <th>category</th>
              <th>website</th>
              <th data-sortable="false">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bizs as $biz)
              <tr>
                <td>{{ $biz->name }}</td>
                <td>{{ $biz->address }}</td>
                <td>{{ $biz->phone1 }}</td>
                <td>{{ $biz->state->name }}</td>
                <td>{{ $biz->website}}</td>
                <td>
                  <a href="#"
                     class="btn btn-xs btn-info">
                    <i class="fa fa-edit"></i> Edit
                  </a>
                  <a href="#"
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
  </script>
@stop