@extends('admin.layout')
@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3>Categories <small>» Listing</small></h3>
      </div>
      <div class="col-md-6 text-right">
        <a href="/admin/cat/create" class="btn btn-success btn-md">
          <i class="fa fa-plus-circle"></i> New Category|SubCategory
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        @include('admin.partials.errors')
        @include('admin.partials.success')

        <table id="cats-table" class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>Category</th>
            <th>Font Awesome Image</th>
            <th class="hidden-md">Meta Description</th>
            <th data-sortable="false">Sub categories</th>
            <th data-sortable="false">Actions</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($cats as $cat)
            <tr>
              <td>{{ $cat->name }}</td>
               <td> <i class="fa fa-{{$cat->image_class}}"> </i> </td>
              <td class="hidden-md">{{ $cat->meta_description }}</td>
              <td>@foreach($cat->subcats as $catt)
                 <li>{{ $catt->name }} &emsp; <a href="/admin/sub?d={{$catt->id}}" data-method="DELETE" 
                     data-token="{{csrf_token()}}" data-confirm="Are you sure">
                      <i class="fa fa-times-circle"></i> Delete </a> 
                     
                    </li> @endforeach</td>
              <td>
                <a href="/admin/cat/{{$cat->id}}/edit"
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
<script src="{{asset('js/deleteHandler.js') }}"></script>
  <script>
    $(function() {
      $("#cats-table").DataTable({
      });
    });
  </script>
@stop