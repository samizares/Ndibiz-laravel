@extends('master')
<!-- HEAD STARTS-->
  @section('title', 'Register A Business')
  @section('stylesheets')     
    <link href="{{asset('../plugins/Bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('../plugins/select2/select2.min.css')}}" rel="stylesheet">
  @endsection
<!-- HEAD ENDS-->

<!-- HEADER STARTS -->
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
                        <i class="fa fa-user"></i> {{Auth::user()->username}} <span class="caret"></span></a>
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
                  <li class="text-center"><a href="/businesses" class=""><i class="fa fa-building"></i> Explore</a></li>
                  <li class="text-center"><a href="/biz/create" class=""><i class="fa fa-plus"></i> Add a Business</a></li>

                  <li class="divider"></li>
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
      @include('admin.partials.errors')
      @include('admin.partials.success')
      <div class="row page-title-row">
        <div class="col-md-12">
          <h3><a href="/businesses">Businesses</a> » <small> Add New Business</small></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">    
          <div class="page-forms">
              <form class="form-horizontal" role="form" method="POST"  action="/admin/biz">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                   <label for="cat" class="col-md-3 control-label">Business Name</label>
                    <div class="col-md-8">
                     <input required type="text" id="name" name="name" class="form-control" placeholder="Patt's Bar" value="{{ old('name')}}">                  
                    </div>
                  </div>
                   <div class="form-group">
                       <label for="cat" class="col-md-3 control-label">Business Address</label>
                       <div class="col-md-8">
                       <input required type="text" id="address" name="address" class="form-control" placeholder="Ajose Adeogun street" value="{{ old('address')}}">
                        
                      </div>
                  </div>
                  <div class="form-group">
                       <label for="cat" class="col-md-3 control-label">Business state</label>
                       <div class="col-md-8">
                           {!!Form::select('state', $stateList, Input::old('state'), ['class'=>'form-control','id'=>'stateList',
                          'placeholder'=>'select state']) !!}
                        
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="image_class" class="col-md-3 control-label">
                      Business Region/area</label>
                        <div class="col-md-8">
                          <select id="lga" name="lga" value="{{ old('lga')}}" class="form-control"> </select>  
                        </div>
                  </div>

                  
                   <div class="form-group">
                       <label for="cat" class="col-md-3 control-label">Business Category</label>
                       <div class="col-md-8">
                        {!!Form::select('cats[]', $catList,Input::old('cats[]') , ['class'=>'form-control','id'=>'category3',
                        'multiple']) !!}
                        
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="image_class" class="col-md-3 control-label">
                      Sub categories</label>
                        <div class="col-md-8">
                          <select id="sub" name="sub[]" value="{{ old('sub[]')}}" class="form-control" multiple="multiple"> </select>  
                        </div>
                  </div>
                  <div class="form-group">
                       <label for="cat" class="col-md-3 control-label">Business website</label>
                       <div class="col-md-8">
                       <input type="text" id="website" name="website" value="{{ old('website')}}" class="form-control" placeholder="www.pattsbar.com.ng">
                        
                      </div>
                  </div>
                  <div class="form-group">
                       <label for="cat" class="col-md-3 control-label">Business Email Address</label>
                       <div class="col-md-8">
                        <input type="email" id="email" name="email" value="{{ old('email')}}" class="form-control" placeholder="info@pattsbar.com.ng">
                        
                      </div>
                  </div>
                  <div class="form-group">
                       <label for="cat" class="col-md-3 control-label">Contact Name</label>
                       <div class="col-md-8">
                       <input type="text" id="contactname" name=" contactname" value="{{ old('contactname')}}" class="form-control" placeholder="Mr Patt" required>
                        
                      </div>
                  </div>
                  <div class="form-group">
                       <label for="cat" class="col-md-3 control-label">Phone number 1</label>
                       <div class="col-md-8">
                      <input type="text" id="contact" name="phone1" value="{{ old('phone1')}}" class="form-control" placeholder="Phone number 1">
                        
                      </div>
                  </div>
                  <div class="form-group">
                       <label for="cat" class="col-md-3 control-label">Phone number 2</label>
                          <div class="col-md-8">
                             <input type="text" id="contact" name="phone2" value="{{ old('phone2')}}" class="form-control" placeholder="Phone number 2">                
                          </div>
                  </div>


                    <div class="form-group">
                      <div class="col-md-7 col-md-offset-3">
                        <button type="submit" class="btn btn-primary btn-md">
                          <i class="fa fa-plus-circle"></i>
                            Add New Business
                        </button>
                      </div>
                    </div>

                  </form>
          </div>
        </div>
        <div class="col-md-3">
            <div class="post-sidebar">
                  <div class="latest-post-content">
                      <h2>Registration Guides</h2>
                      <div class="single-product"></div>
                  </div>

                  <div class="latest-post-content">
                      <h2>Registration Benefits</h2>
                      <div class="single-product"></div>
                  </div>
            </div>
        </div> 
      </div> <!-- end .row -->
    </div> <!-- end .container -->
  </div>  <!-- end #page-content -->  
@endsection
  
@section('scripts')
  <script src="{{asset('../plugins/Bootstrap-3.3.5/js/bootstrap.js')}}"></script>
  <script src="{{asset('../plugins/select2/select2.min.js')}}"></script>
  <script>
    

    $(document).ready(function() {
      $("#category3").select2({
         placeholder: 'select business category',
      });

    });

    $(document).ready(function() {
      var y=[];
     $('#category3').click(function(){
          if($(this).val() !== "select business category") {
             var model=$('#sub');
            model.empty();
           $.get('{{ URL::to('api/subcat') }}', {y: $(this).val()}, function(result){
             $.each(result.data,function(){
                              $('#sub').append('<option value="'+this.id+'">'+this.text+'</option>');

                        });
           });
         }
      });
    });

    $(document).ready(function() {
      var y=[];
     $('#category3').change(function(){
          if($(this).val() !== "select business category") {
             var model=$('#sub');
            model.empty();
           $.get('{{ URL::to('api/subcat') }}', {y: $(this).val()}, function(result){
             $.each(result.data,function(){
                              $('#sub').append('<option value="'+this.id+'">'+this.text+'</option>');

                        });
           });
         }
      });
    });

    $(document).ready(function() {
      $("#stateList").select2({
        placeholder: 'select state',
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
      $("#sub").select2({
        placeholder: 'select or create subcategories',
       // tags: true,
      });
    });
  </script>  
@stop