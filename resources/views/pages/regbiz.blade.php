@extends('master')
<!-- HEAD STARTS-->
  @section('title', 'Register A Business')
  @section('stylesheets')     
    <!-- <link href="{{asset('plugins/bootstrap-3.3.5/css/bootstrap.css')}}" rel="stylesheet"> -->
    <link href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet">
  @endsection
<!-- HEAD ENDS-->

<!-- HEADER STARTS -->
  <!-- breadcrumbs -->
  @section('breadcrumb')
        <div class="breadcrumb">
          <div class="featured-listing" style="margin:0;">
              <h2 class="page-title animated fadeInLeft" style="margin:0;">Business Registration</h2>
          </div>
        </div>
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
      <div class="page-forms">
        <form method="POST"  action="/biz">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
          
          <div class="col-md-8">     
            <div class="form-group">
              <label for="name">Business Name</label>
              <input required type="text" id="name" name="name" class="form-control" placeholder="Patt's Bar">
            </div>         
            <div class="form-group">
              <label for="address1">Address 1</label>
              <input required type="text" id="address" name="address" class="form-control" placeholder="Ajose Adeogun street">
            </div>  
            <div class="form-group">
              <label for="address2">Address 2</label>
              <input type="text" id="address2" name="address2" class="form-control" placeholder="V/Island">
            </div>  
             <div class="form-group">
              <label for="state">State</label>
              {!!Form::select('state', $stateList, null, ['class'=>'form-control','id'=>'stateList',
                    'placeholder'=>'select state']) !!}
            </div> 

            <div class="form-group">
              <label for="lga">Region/Area</label> 
              <select id="lga" name="lga" class="form-control"> </select>    
            </div>

            <div class="form-group">
              <label for="contact-person">Contact Person</label>
              <input type="text" id="contactname" name=" contactname" class="form-control" placeholder="Mr Patt" required>
            </div>

            <div class="form-group">
                  <label for="products">Products / Services</label>
                  <div class="category-search">                
                    {!!Form::select('cats[]', $catList, null, ['class'=>'Form-control','id'=>'cat2',
                    'multiple','data-placeholder'=>'Select Categories']) !!}
                  </div> 
            </div>   
            <div class="form-group">
              <label for="website">Website address</label>
              <input type="text" id="website" name="website" class="form-control" placeholder="www.pattsbar.com.ng">
            </div>         
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="info@pattsbar.com.ng">
            </div>  
            <div class="form-group">
              <label for="contact">Phone Number 1</label>
              <input type="text" id="contact" name="phone1" class="form-control" placeholder="Phone number 1">
            </div>  
             <div class="form-group">
              <label for="contact2">Phone Number 2</label>
              <input type="text" id="contact" name="phone2"class="form-control" placeholder="Phone number 2">
            </div> 
            <input type="submit" class="btn btn-default" value="Add Business">
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
          </div> <!-- end .page-sidebar -->
        </div> <!-- end .row -->
        </form>
      </div> <!-- end .home-with-slide -->
    </div> <!-- end .container -->
  </div>  <!-- end #page-content -->  
@endsection
  
@section('scripts')
  <!-- // <script src="{{asset('plugins/bootstrap-3.3.5/js/bootstrap.js')}}"></script> -->
  <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
  <script>
    $(document).ready(function() {
      $("#cat2").select2({
        tags: true
      });

    $(document).ready(function() {
       $('#stateList').on('change', function(){
            if($(this).val() !== "select state") {
               var model=$('#lga');
              model.empty();
             $.get('{{ URL::to('api/lga') }}', {z: $(this).val()}, function(result){
              var model=$('#lga');
              model.empty();
               $.each(result.data,function(){
                                $('#lga').append('<option value="'+this.id+'">'+this.text+'</option>');

                          });
             });
           }
        });
      });
  </script>  
@stop