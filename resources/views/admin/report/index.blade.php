@extends('admin.adminlayout')
@section('title', 'Admin Reports')
@section('page-banner')
    <div class="header-search-bar">
        <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Admin Reports</h2>
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
                    <div class="col-md-12">
                        <h3><a href="/admin">Admin</a> <small>» Business Reports({{ $totalReport}})</small></h3>
                    </div>
                </div>
                <hr>
                {{--main-content dataTables--}}
                <div class="row m15-left m15-right">
                    <div class="col-md-12">
                        @include('admin.partials.errors')
                        @include('admin.partials.success')
                        {{--DataTables--}}
                        <table id="report-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Biz ID</th>
                                <th>Business Name</th>
                                <th>Reporter Email</th>
                                <th>Complaints</th>
                                <th>Reasons <i class="fa fa-message"></i></th>
                                <th data-sortable="false">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($reports as $report)
                                <?php $biz_id = $report->biz_id; ?>
                                <?php $biz = App\Biz::findOrFail($biz_id); ?>
                                <tr>
                                    <td> {{ $report-> id }}</td>
                                    <td>{{ $biz->name }}</td>
                                    <td>{{ $report->contact_email }}</td>
                                    <td>{{ $report-> complaint }}</td>
                                    <td>{{ $report-> explain }}</td>

                                    <td><a href="#" class="btn btn-xs btn-default-inverse animated fadeInRight" data-toggle="modal"
                                           data-id="{{$report->id}}" data-name="{{$biz->name}}" data-target="#report-delete"
                                           title="Delete this report"><i class="fa fa-times-circle"></i>
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
    <div class="modal fade" id="report-delete" tabIndex="-1">
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
                        Are you sure you want to delete this Report?
                    </p>
                </div>
                <div class="modal-footer">
                    <form class="form-horizontal" method="POST" action="/admin/report/delete">
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
@section('scripts')
    @if(Session::has('success_code') && Session::get('success_code') == 220)
        <script type="text/javascript">
            $(function() {
                swal({ title: "Success!",
                    text: "{{ Session::get('report')}}",
                    type: "success"
                });
            });
        </script>
    @endif

    <script type="text/javascript">
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
            $("#report-table").DataTable({
                order: [[0, "desc"]]
            });
        });


        $('#report-delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var reportID = button.data('id') // Extract info from data-* attributes
            var bizname = button.data('name')

            var title = 'Confirm Delete  Report #' + reportID + ' from database';
            var content = 'Are you sure want to delete report about ' + bizname + ' from database?';

            // Update the modal's content.
            var modal = $(this)
            modal.find('.modal-title').text(title);
            modal.find('.modal-body').text(content);
            modal.find('button.btn-danger').val(reportID);
        });

    </script>
@endsection
