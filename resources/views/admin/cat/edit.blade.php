@extends('admin.adminlayout')
<!-- HEAD STARTS-->
  @section('title', 'Admin')
  @section('stylesheets')
    <link href="{{asset('plugins/datatable/css/datatables.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/datatable/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('plugins/bootstrap-editable/bootstrap-editable.css')}}" rel="stylesheet"> -->
  @endsection
<!-- HEAD ENDS-->

<!-- HEADER STARTS -->
    <!-- search -->
@section('search')
    <div class="header-search map">
        <div class="header-search-bar">
            <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Edit Category</h2>
        </div> <!-- END .header-search-bar -->
        @endsection
                <!-- navigation -->
        @section('header-navbar')
            <div class="header-nav-bar">
                <div class="container">
                    <nav class="hidden-lg hidden-md">
                        <button><i class="fa fa-bars"></i></button>
                        <ul class="primary-nav list-unstyled">
                            @if (Auth::check())
                                <li class="hidden-lg hidden-md dropdown text-center">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menu1">
                                        <i class="fa fa-user"></i> {{Auth::user()->username}} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu text-center" role="menu" aria-labelledby="menu1">
                                        <li class=""><a href="#">View Profile</a></li>
                                        <li class="divider"></li>
                                        <li><a class="btn" href="/auth/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                                    </ul>
                                </li>
                            @else
                                <li><a class="btn" href="/auth/login" class=""><i class="fa fa-power-off"></i> <span>Login</span></a></li>
                                @endif
                                        <!-- HEADER REGISTER -->
                                @if (Auth::guest())
                                    <li><a class="btn" href="/auth/register" class=""><i class="fa fa-plus-square"></i> <span>Register</span></a></li>
                                @endif
                                <li class="hidden-lg hidden-md dropdown text-center">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menu1">
                                        <i class="fa fa-user"></i> Pages <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu text-center" role="menu" aria-labelledby="menu1">
                                        <li class=""><a href="/admin/biz">Businesses</a></li>
                                        <li class=""><a href="/admin/user">Users</a></li>
                                        <li class=""><a href="/admin/cat">Categories</a></li>
                                        <li class=""><a href="/admin/location">Location</a></li>
                                        <li class=""><a href="/admin/report">Reports</a></li>
                                        <li class=""><a href="/admin/upload">Uploads</a></li>
                                    </ul>
                                </li>
                                <li class="text-center"><a href="/biz/create" class=""><i class="fa fa-plus"></i> Add a Business</a></li>
                                <li class="text-center"><a href="/"><i class="fa fa-arrow-left"></i> go to Site</a></li>
                        </ul>
                    </nav>
                </div> <!-- end .container -->
            </div> <!-- end .header-nav-bar -->
            @endsection
<!-- HEADER ENDS -->

<!-- CONTENT STARTS -->
@section('content')
  <div id="page-content" class="home-slider-content">
  <div class="container">
   <div class="home-with-slide">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3><a href="/admin">Admin</a> » <a href="/admin/cat">Business Categories</a> » <small>Edit Category</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Category Edit Form</h3>
          </div>
          <div class="panel-body">

            @include('admin.partials.errors')
            @include('admin.partials.success')

            <form class="form-horizontal" role="form" method="POST" action="/admin/cat/{{$cat->id}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="{{$cat->id}}">

              <div class="form-group">
                <label for="cat" class="col-md-3 control-label">Category</label>
                <div class="col-md-8">
                   {!!Form::select('name', $cats,$cat->name,['class'=>'form-control', 'id'=>'cat_name']) !!}
                </div>
              </div>

              @include('admin.cat._form')

              <div class="form-group">
                <div class="col-md-7 col-md-offset-3">
                  <button type="submit" class="btn btn-primary btn-md">
                    <i class="fa fa-save"></i>
                      Save Changes
                  </button>
                </div>
              </div>

            </form>

          </div>
        </div>
      </div>
      <div class="col-md-3 col-md-pull-9 category-toggle">
           <button><i class="fa fa-briefcase"></i></button>
                <div class="post-sidebar">
                      <div class="latest-post-content">
                          <h2>Admin Panel</h2>
                          <div class="single-product"></div>
                      </div>
                </div>
      </div> <!-- end .page-sidebar -->
    </div>
    </div> <!-- end .home-with-slide -->
    </div> <!-- end .container -->
  </div>  <!-- end #page-content -->
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
          <form method="POST" action="/admin/cat/{{ $cat->id }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE">
            <button type="button" class="btn btn-default"
                    data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">
              <i class="fa fa-times-circle"></i> Yes
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection


<!-- SCRIPTS STARTS -->
@section('scripts')
  <script src="{{ asset('plugins/bootstrap-3.3.5/js/bootstrap.js') }}"></script>
  <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
  <script>
    $(document).ready(function() {
        $("button.btn-hover").hover(function(){
          $(this).addClass('animated pulse');
        })
    });

    $(document).ready(function() {
      $("#cat_name").select2({
        tags: true
      });
    });
    $(document).ready(function() {
      $("#image_class").select2({
        tags: true
      });
    });
    $(document).ready(function() {
      $("#sub_cat").select2({
        tags: true
      });
    });
  </script>
  <script src="{{asset('js/scripts.js')}}"></script>
@endsection