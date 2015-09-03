@extends('admin.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3>All Location Covered <small>» Listing</small></h3>
      </div>
      <div class="col-md-6 text-right">
        <a href="/admin/location/create" class="btn btn-success btn-md">
          <i class="fa fa-plus-circle"></i> Add Location
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">

        @include('admin.partials.errors')
        @include('admin.partials.success')

        <table id="loc-table" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>State</th>
              <th>Region</th>
              <th>Total Area/region In state </th>
              <th data-sortable="false">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($states as $state)
              <tr>
                <td>{{ $state-> name }}</td>

                <td>@foreach($state-> lgas as $area)
                 <li>{{ $area->name }} </li> @endforeach</td> 
                <td>{{count($state->lgas)}}</td>
                <td>
                  <a href="/admin/location/{{$state->id}}/edit"
                     class="btn btn-xs btn-info">
                    <i class="fa fa-edit"></i> Edit
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
      $("#loc-table").DataTable({
        order: [[0, "desc"]]
      });
    });
  </script>
@stop