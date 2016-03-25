@extends('admin.adminlayout')
<!-- HEAD STARTS-->
  @section('title', 'Admin')
  @section('stylesheets')
    {{--<link href="{{asset('plugins/datatable/css/datatables.css')}}" rel="stylesheet">--}}
    {{--<link href="{{asset('plugins/datatable/css/dataTables.bootstrap.css')}}" rel="stylesheet">--}}
    {{--<link href="{{asset('plugins/bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">--}}
    <link href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet">
    {{--<!-- <link href="{{asset('plugins/bootstrap-editable/bootstrap-editable.css')}}" rel="stylesheet"> -->--}}
  @endsection
<!-- HEAD ENDS-->

<!-- HEADER STARTS -->
  <!-- breadcrumbs -->
    <!-- search -->
@section('search')
    <div class="header-search map">
        <div class="header-search-bar">
            <h2 class="text-center m20-bttm text-color-white text-uppercase" style="font-weight: 300;">Update "{{ $biz->name}}" info</h2>
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
     <div class="row page-title-row">
      <div class="col-md-12">
        <h3><a href="/admin">Admin</a> » <a href="/admin/biz">Businesses</a> » <small> Edit Business Info</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Business form</h3>
          </div>
          <div class="panel-body">

            @include('admin.partials.errors')

            <form class="form-horizontal" role="form" method="POST" action="/admin/biz/{{$biz->id}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="id" value="{{$biz->id}}">

              <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business Name</label>
                  <div class="col-md-8">
                   <input required type="text" value="{{ $biz->name}}" id="name" name="name" class="form-control" placeholder="Patt's Bar">
                  </div>
             </div>
             <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business Address</label>
                 <div class="col-md-8">
                 <input required type="text" value="{{$biz->address->street}}" id="address" name="address" class="form-control" placeholder="Ajose Adeogun street">

                </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business state</label>
                 <div class="col-md-8">
                     {!!Form::select('state', $stateList, $biz->address->state_id, ['class'=>'form-control',
                     'id'=>'stateList','placeholder'=>'select state']) !!}

                </div>
            </div>
            <div class="form-group">
              <label for="image_class" class="col-md-3 control-label">
                Business Region/area</label>
                  <div class="col-md-8">
                    {!!Form::select('lga', $lgaList, $biz->address->lga_id, ['class'=>'form-control',
                     'id'=>'lga','placeholder'=>'select state']) !!}
                  </div>
            </div>


             <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business Category</label>
                 <div class="col-md-8">
                  {!!Form::select('cats[]', $catList, $cat, ['class'=>'form-control','id'=>'category_edit', 'multiple']) !!}

                </div>
            </div>
            <div class="form-group">
              <label for="image_class" class="col-md-3 control-label">
                Sub categories</label>
                  <div class="col-md-8">
                    {!!Form::select('sub[]', $subList, $sub, ['class'=>'form-control','id'=>'sub_edit','multiple']) !!}
                  </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business website</label>
                 <div class="col-md-8">
                 <input type="text" id="website" value="{{ $biz->website}}" name="website" class="form-control" placeholder="www.pattsbar.com.ng">

                </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Business Email Address</label>
                 <div class="col-md-8">
                  <input type="email" id="email" value="{{ $biz->email}}" name="email" class="form-control" placeholder="info@pattsbar.com.ng">

                </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Contact Name</label>
                 <div class="col-md-8">
                 <input type="text" id="contactname" value="{{ $biz->contactname}}" name=" contactname" class="form-control" placeholder="Mr Patt" required>

                </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Phone number 1</label>
                 <div class="col-md-8">
                <input type="text" id="contact" value="{{ $biz->phone1}}" name="phone1" class="form-control" placeholder="Phone number 1">

                </div>
            </div>
            <div class="form-group">
                 <label for="cat" class="col-md-3 control-label">Phone number 2</label>
                    <div class="col-md-8">
                       <input type="text" value="{{ $biz->phone2}}" id="contact" name="phone2"class="form-control" placeholder="Phone number 2">
                    </div>
            </div>


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
  </div>
</div>


@endsection
<!-- CONTENT ENDS -->

<!-- SCRIPTS STARTS -->
@section('scripts')
<script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script>
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $("button.btn-hover").hover(function(){
          $(this).addClass('animated pulse');
        })
    });
    $(document).ready(function() {
      $("#category_edit").select2({
        // tags: true,
      });
    });
    $(document).ready(function() {
      var y=[];
     $('#category_edit').change(function(){
          if($(this).val() !== "select business category") {
             var model=$('#sub_edit');
            model.empty();
           $.get('{{ URL::to('api/subcat') }}', {y: $(this).val()}, function(result){
             $.each(result.data,function(){
                  $('#sub_edit').append('<option value="'+this.id+'">'+this.text+'</option>');
            });
           });
         }
      });
    });
    $(document).ready(function() {
      $("#stateList").select2({
      });
    });
    $(document).ready(function() {
      $("#lga").select2({
      });
    });


    $(document).ready(function() {
      $("#sub_edit").select2({
      //  tags: true,
      });
    });
</script>
<script src="{{asset('js/scripts.js')}}"></script>
@endsection