@extends('admin.adminlayout')
@section('title', 'Admin Categories')
@section('page-banner')
    <div class="header-search-bar">
        <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Admin Categories</h2>
    </div> <!-- END .header-search-bar -->
@endsection
@section('main-content')
    <div class="col-xs-12 col-sm-9">
        <p class="visible-xs">
            <button type="button" class="btn btn-default-inverse btn-xs" data-toggle="offcanvas">
                Click to view Admin Menu <i class="glyphicon glyphicon-chevron-right"></i></button>
        </p>
        <div class="row">
            <div class="col-md-12">
                <div class="row page-title-row">
                    <div class="col-md-6">
                        <h3><a href="/admin">Admin</a> <small>» Categories ({{ $totalCat}})</small></h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <h3><a href="/admin/cat/create" class="btn btn-default-inverse btn-md">
                                <i class="fa fa-plus-circle"></i> New Category
                            </a></h3>
                    </div>
                </div>
                <hr>
                {{--main-content dataTables--}}
                <div class="row m15-left m15-right">
                    <div class="col-md-12">
                        @include('admin.partials.errors')
                        @include('admin.partials.success')
                        {{--DataTables--}}
                        <table id="cats-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th data-sortable="true">Category</th>
                                <th data-sortable="false">Font Awesome Image</th>
                                <th class="hidden-md">Meta Description</th>
                                <th data-sortable="true">Sub categories</th>
                                <th data-sortable="false">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($cats as $cat)
                                <tr>
                                    <td>{{ $cat->name }}</td>
                                    <td> <i class="fa fa-{{$cat->image_class}}"> </i> </td>
                                    <td class="hidden-md">{{ $cat->meta_description }}</td>
                                    <td>
                                        <div class="btn-group">@foreach($cat->subcats as $catt)
                                                <li>{{ $catt->name }}
                                                    <a href="#" class="btn btn-xs btn-default-inverse animated fadeInRight" data-toggle="modal"
                                                       data-sid="{{$catt->id}}" data-sname="{{$catt->name}}" data-target="#delete-sub"
                                                       title="Delete this Category"><i class="fa fa-times-circle"></i>
                                                    </a></li> @endforeach

                                        </div>
                                    </td>
                                    <td>
                                        <a href="/admin/cat/{{$cat->id}}/edit"
                                           class="btn btn-xs btn-default-inverse animated fadeIn" data-toggle="tooltip" data-placement="top" title="Edit Category Info">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-default-inverse animated fadeInRight" data-toggle="modal"
                                           data-id="{{$cat->id}}" data-name="{{$cat->name}}" data-target="#modal-delete"
                                           title="Delete this Category"><i class="fa fa-times-circle"></i>
                                        </a>

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end main content -->
            </div><!--/.col-xs-6.col-lg-4-->
        </div><!--/row-->
    </div><!--/.col-xs-12.col-sm-9-->
    {{-- Confirm Delete --}}
    <div class="modal fade" id="modal-delete" tabIndex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">Please Confirm</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        Are you sure you want to delete this Category?
                    </p>
                </div>
                <div class="modal-footer">
                    <form class="form-horizontal" method="POST" action="/admin/cat/delete">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">Close</button>
                        <button type="submit" name="yes" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i> Yes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete Subcategory--}}
    <div class="modal fade" id="delete-sub" tabIndex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">Please Confirm</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        Are you sure you want to delete this Sub-Category?
                    </p>
                </div>
                <div class="modal-footer">
                    <form class="form-horizontal" method="POST" action="/admin/sub/delete">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">Close</button>
                        <button type="submit" name="sub" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i> Yes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // Datatables
        //-----------------------------------------------------
        $(document).ready(function () {
            $('.bizpop').popover({
                content: function () {
                    // Get the content from the hidden sibling.
                    return $(this).siblings('.viewbiz').html();
                },
                trigger: 'click',
                placement: 'left'
            });
        });
        $(function() {
            $("#cats-table").DataTable({
            });
        });
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.fn.editable.defaults.mode = 'popup';
            $.fn.editable.defaults.params = function (params) {
                params._token = $("meta[name=token]").attr("content");
                return params;
            };
            $('.featured').editable();

        });
        $(document).ready(function () {
            $('#modal-delete').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var catid = button.data('id') // Extract info from data-* attributes
                var catname = button.data('name')

                var title = 'Confirm Delete ' + catname + ' from database';
                var content = 'Are you sure want to remove ' + catname + ' from database?';

                // Update the modal's content.
                var modal = $(this)
                modal.find('.modal-title').text(title);
                modal.find('.modal-body').text(content);
                modal.find('button.btn-danger').val(catid);
            });

            $('#delete-sub').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var subid = button.data('sid') // Extract info from data-* attributes
                var subname = button.data('sname')

                var title = 'Confirm Delete ' + subname + ' from database';
                var content = 'Are you sure want to remove ' + subname + ' from database?';

                // Update the modal's content.
                var modal = $(this)
                modal.find('.modal-title').text(title);
                modal.find('.modal-body').text(content);
                modal.find('button.btn-danger').val(subid);
            });
        });
    </script>
@endsection
