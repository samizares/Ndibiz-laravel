@extends('admin.adminlayout')
@section('title', 'Admin Users')
@section('page-banner')
    <div class="header-search-bar">
        <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Admin Users</h2>
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
                <h3><a href="/admin">Admin</a> <small>» Users ({{ $totalUser}})</small></h3>
                <hr>
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
                <!-- end main content -->
            </div><!--/.col-xs-6.col-lg-4-->
        </div><!--/row-->
    </div><!--/.col-xs-12.col-sm-9-->
@endsection
@section('scripts')
    <script>
        $(function() {
            $(".user-table").DataTable({
                order: [[0, "desc"]]
            });
        });
    </script>
@endsection
