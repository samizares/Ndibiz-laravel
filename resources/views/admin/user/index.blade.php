@extends('admin.adminlayout')
        <!-- HEAD STARTS-->
@section('title', 'Users')
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
            <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Admin Users</h2>
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
                            <div class="col-md-12">
                                <h3><a href="/admin">Admin</a> <small>» Users ({{ $totalUser}})</small></h3>
                            </div>
                        </div>
                        <hr>
                        <div class="row m15-left m15-right">
                            @include('admin.partials.errors')
                            @include('admin.partials.success')
                            {{--DataTables--}}
                            <table class="user-table table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Confirmed </th>
                                    <th>Notify</th>
                                    <th>Admin</th>
                                    <th data-sortable="false">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user-> username }}</td>
                                        <td>{{ $user-> email }}</td>
                                        <td>{{ $user-> confirmed }}</td>
                                        <td>{{ $user-> notify }}</td>
                                        <td><span class="admin" id="{{$user->id}}">{{ $user->admin }}</span></td>
                                        <td><a href="/profile/{{$user->id}}" class="btn btn-xs btn-default-inverse animated fadeInLeft"
                                               data-toggle="tooltip" data-placement="top" title="View User Info"><i class="fa fa-eye"></i> </a>
                                            | @if(Auth::user()->id == $user->id)  <a href="/admin/user/{{$user->id}}/edit"
                                                                                     class="btn btn-xs btn-default-inverse animated fadeInLeft" data-toggle="tooltip" data-placement="top" title="View User Info">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end main content -->
                    </div>
                </div>
            </div><!--/row-offcanvas -->
        @endsection
        {{--scripts--}}
        @section('scripts')
            <script src="{{asset('js/jquery-2.1.3.min.js') }}"></script>
            <script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script>
            <script src="{{asset('plugins/datatable/js/datatables.js')}}"></script>
            <script src="{{asset('plugins/bootstrap-editable/bootstrap-editable.min.js')}}"></script>
            <!-- Page Scripts -->
            <script>
                $(function() {
                    $(".user-table").DataTable({
                        order: [[0, "desc"]]
                    });
                });
            </script>
@endsection