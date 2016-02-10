@extends('master')
<!-- HEAD STARTS-->
  @section('title', 'Admin')
  @section('stylesheets')     
     <link href="{{asset('plugins/bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
     <link  rel="stylesheet" href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
  @endsection
<!-- HEAD ENDS-->

<!-- HEADER STARTS -->
  <!-- breadcrumbs -->
@section('breadcrumb')
      <div class="breadcrumb">
        <div class="featured-listing" style="margin:0;">
            <h2 class="page-title animated fadeInLeft" style="margin:0;"><i class="fa fa-home"></i> Admin</h2>
        </div>
      </div>
@endsection
<!-- navigation -->
@section('header-navbar')
        <div class="header-nav-bar">
            <div class="container">
              <nav>
                <button><i class="fa fa-bars"></i></button>
                @include('admin.partials.navbar')
              </nav>
            </div> <!-- end .container -->
        </div> <!-- end .header-nav-bar -->   
@endsection
@section('content')
  <div id="page-content" class="home-slider-content">
    <div class="container">
      <div class="home-with-slide">
        <div class="row">
          <div class="col-md-9 col-md-push-3">
            <div class="page-content">
              <h3 class="text-uppercase m10-top">Edit Home Page Settings</h3>
              <div class="rating-with-details">
                                  @include('admin.partials.errors')
                                   @include('admin.partials.success')
                                  <form class="form-horizontal" role="form" method="POST" action="/admin/settings" enctype="multipart/form-data">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">        
                                      <input type="hidden" name="id" value="{{$set->id}}">
                                      <div class="form-group">
                                          <label for="title" class="col-md-3 control-label">Title 1</label>
                                          <div class="col-md-8">
                                              <input required="required" type="text" value="{{ $set->title1}}" id="title1" name="title1"
                                                 class="form-control" placeholder="enter title1">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="span1" class="col-md-3 control-label">Span1</label>
                                          <div class="col-md-8">
                                              <input type="text" id="span1" value="{{ $set->span1}}" name="span1" class="form-control"
                                                     placeholder="Span1">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="span2" class="col-md-3 control-label">Span2</label>
                                          <div class="col-md-8">
                                              <input type="text" id="span2" value="{{ $set->span2}}" name="span2" class="form-control"
                                                     placeholder="Span2">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="span3" class="col-md-3 control-label">Span3</label>
                                          <div class="col-md-8">
                                              <input type="text" id="span3" value="{{ $set->span3}}" name="span3" class="form-control"
                                                     placeholder="Span3">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="span4" class="col-md-3 control-label">Span4</label>
                                          <div class="col-md-8">
                                              <input type="text" id="span4" value="{{ $set->span4}}" name="span4" class="form-control"
                                                     placeholder="Span4">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <label for="span5" class="col-md-3 control-label">Span5</label>
                                          <div class="col-md-8">
                                              <input type="text" id="span5" value="{{ $set->span5}}" name="span5" class="form-control"
                                                     placeholder="Span5">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="title2" class="col-md-3 control-label">title2</label>
                                          <div class="col-md-8">
                                              <input type="text" id="title" value="{{ $set->title2}}" name="title2" class="form-control"
                                                     placeholder="title2">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="subtitle" class="col-md-3 control-label">Subtitle</label>
                                          <div class="col-md-8">
                                              <input type="text" id="subtitle" value="{{ $set->subtitle}}" name="subtitle" class="form-control"
                                                     placeholder="Subtitle">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="images" class="col-md-3 control-label">
                                             Homepage background Image </label>
                                          <div class="col-md-8">
                                             <div class="panel-body">
                                                 <div class="fileinput fileinput-new" data-provides="fileinput">
                                                     <div class="fileinput-new thumbnail">
                                                          <img src="{{asset($set->image)}}" alt="homepage-image">
                                                     </div>
                                                  <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                      <div>
                                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span><input type="file" name="image"></span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                      </div>
                                    </div>
                                </div>
                      </div>
                  </div>
                                      <div class="col-md-7 col-md-offset-7">
                                          <ul class="list-inline">
                                              <li><button type="submit" class="btn btn-default btn-md">
                                                  <i class="fa fa-save"></i>
                                                  Save Changes
                                              </button></li>
                                              
                                          </ul>
                                      </div>
                                  </form>
                              </div> <!-- end .rating-with-details -->

            </div> <!-- end .page-content -->
          </div>
          <div class="col-md-3 col-md-pull-9 category-toggle">
            <button><i class="fa fa-briefcase"></i></button>

            <div class="page-sidebar">
              <div class="post-sidebar">
                      <div class="post-categories">
                          <h2>Admin Panel</h2>
                          <ul>
                            <li><a href="#admin/cat/">Categories <i class="fa fa-arrow-right"></i></a></li>
                            <li><a href="#admin/biz/">Businesses</a></li>
                            <li><a href="#admin/location/">Locations</a></li>
                            <li><a href="#admin/upload/">Uploads</a></li>
                            <li><a href="#">Reviews</a></li>
                          </ul>
                      </div>
              </div>
            </div> <!-- end .page-sidebar -->
          </div> <!-- end grid layout-->
        </div> <!-- end .row -->
      </div> <!-- end .home-with-slide -->
    </div> <!-- end .container -->
  </div>  <!-- end #page-content -->
@endsection

@section('scripts')
<script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
  <script>
   
  </script>
@endsection