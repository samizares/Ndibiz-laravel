@extends('admin.adminlayout')
<!-- HEAD STARTS-->
  @section('title', 'Admin')
  @section('stylesheets')
    <link href="{{asset('plugins/bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
  @endsection
<!-- HEAD ENDS-->

<!-- HEADER STARTS -->
    <!-- search -->
@section('search')
    <div class="header-search map">
        <div class="header-search-bar">
            <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Create New Location</h2>
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
        <h3><a href="/admin">Admin</a> » <a href="/admin/location">Locations</a> » <small>Create New Location</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">New region/area Form</h3>
          </div>
          <div class="panel-body">
            @include('admin.partials.errors')
            <form class="form-horizontal" role="form" method="POST"  action="/admin/location">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                       <label for="cat" class="col-md-3 control-label">Business state</label>
                       <div class="col-md-8">
                           {!!Form::select('state', $stateList, null, ['class'=>'form-control','id'=>'stateList',
                          'placeholder'=>'select state']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="image_class" class="col-md-3 control-label">
                      Create Region/area</label>
                        <div class="col-md-8">
                          <select id="lga" name="lga[]" class="form-control" multiple="multiple"> </select>
                        </div>
                  </div>

              <div class="form-group">
                <div class="col-md-7 col-md-offset-3">
                  <button type="submit" class="btn btn-primary btn-md">
                    <i class="fa fa-plus-circle"></i>
                      Add New region
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
@endsection

@section('scripts')
  <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
  <script>
    $(document).ready(function() {
      $("#stateList").select2({
        placeholder: 'select state',
        tags:true,
      });
    });
    $(document).ready(function() {
     $('#stateList').change(function(){
          if($(this).val() !== "select state") {
             var model=$('#lga');
            model.empty();
           $.get('{{ URL::to('api/lga')}}', {z: $(this).val()}, function(result){
             $.each(result.data,function(){
                              $('#lga').append('<option value="'+this.id+'">'+this.text+'</option>');
                        });
           });
         }
      });
    });
    $(document).ready(function() {
      $("#lga").select2({
        placeholder: 'create areas',
        tags: true,
      });
    });
  </script>
@stop