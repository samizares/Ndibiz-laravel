@extends('admin.adminlayout')
        <!-- HEAD STARTS-->
@section('title', 'Businesses')
@section('stylesheets')
    <link href="{{asset('plugins/Bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/datatable/css/datatables.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/datatable/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-editable/bootstrap-editable.css')}}" rel="stylesheet">
    @endsection
            <!-- HEAD ENDS-->
    <!-- HEADER STARTS -->
    <!-- PAGE BANNER -->
@section('page-banner')
    <div class="header-search map">
        <div class="header-search-bar">
            <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Businesses</h2>
        </div> <!-- END .header-search-bar -->
        @endsection
                <!-- navigation -->
        @section('mobile-navbar')
            @include('admin.partials.mobile-navbar')
        @endsection
        @section('content')
            <div class="row-offcanvas row-offcanvas-left admin-content">
                {{--SIDEBAR MENU--}}
                @include('admin.partials.sidebar-nav')
                {{--CONTENT--}}
                <div id="main" class="row">
                    <p class="visible-xs visible-sm">
                        <button type="button" class="admin-drawer-btn btn btn-default-inverse btn-xs" data-toggle="offcanvas">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            Click to view Admin Menu</button>
                    </p>
                    <div class="col-md-12">
                        <div class="row page-title-row">
                            <div class="col-md-6">
                                <h3><a href="/admin">Admin</a> <small>» Business Listings({{ $totalBiz}})</small></h3>
                            </div>
                            <div class="col-md-6 text-right m20-top">
                                <a href="/admin/biz/create" class="btn btn-default-inverse btn-md">
                                    <i class="fa fa-plus-circle"></i> New Business
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="row m15-left m15-right">
                            @include('admin.partials.errors')
                            @include('admin.partials.success')
                            {{--DataTables--}}
                            <table id="biz-table" class="user-table table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Business name</th>
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
                                        <td>
                                            <span class="featured" id="{{$biz->id}}">{{ $biz->featured }}</span></td>
                                        <td>@foreach($biz->cats as $cat)
                                                <li>{{ $cat->name }} </li> @endforeach</td>

                                        <td>@foreach($biz->subcats as $sub)
                                                <li>{{ $sub->name }} </li> @endforeach</td>
                                        <td>{{ $biz-> address->state->name}}</td>
                                        <td>
                                            <a href="/review/biz/{{$biz->id}}"
                                               class="btn btn-xs btn-default-inverse animated fadeInLeft" data-toggle="tooltip" data-placement="top" title="View Business Info">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="/admin/biz/{{$biz->id}}/edit"
                                               class="btn btn-xs btn-default-inverse animated fadeIn" data-toggle="tooltip" data-placement="top" title="Edit Business Info">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-xs btn-default-inverse animated fadeInRight" data-toggle="modal"
                                               data-id="{{$biz->id}}" data-name="{{$biz->name}}" data-target="#modal-delete"
                                               title="Delete this biz"><i class="fa fa-times-circle"></i>
                                            </a>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end main content -->
                    </div>
                </div>
            </div><!--/row-offcanvas -->

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
                                Are you sure you want to delete this Business?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <form class="form-horizontal" method="POST" action="/admin/biz/delete">
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
        @endsection
        {{--scripts--}}
        @section('scripts')
            <script src="{{asset('js/jquery-2.1.3.min.js') }}"></script>
            <script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script>
            <script src="{{asset('plugins/datatable/js/datatables.js')}}"></script>
            <script src="{{asset('plugins/bootstrap-editable/bootstrap-editable.min.js')}}"></script>
            <!-- Page Scripts -->
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
                    $.fn.editable.defaults.mode = 'popup';
                    $.fn.editable.defaults.params = function (params) {
                        params._token = $("meta[name=token]").attr("content");
                        return params;
                    };
                    $('.featured').editable();
                    $(document).on('click','.editable-submit',function(){
                        var x = $(this).closest('td').children('span').attr('id');
                        var y= $("input:text").val();
                        //   var y = $('.input-sm').val();
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
                $(document).ready(function () {
                    $('#modal-delete').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget) // Button that triggered the modal
                        var bizid = button.data('id') // Extract info from data-* attributes
                        var bizname = button.data('name')

                        var title = 'Confirm Delete  Biz #' + bizid + ' from database';
                        var content = 'Are you sure want to remove ' + bizname + ' from database?';

                        // Update the modal's content.
                        var modal = $(this)
                        modal.find('.modal-title').text(title);
                        modal.find('.modal-body').text(content);
                        modal.find('button.btn-danger').val(bizid);
                    });

                });
            </script>
@endsection