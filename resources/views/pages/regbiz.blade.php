@extends('master')
<!-- HEAD STARTS-->
@section('title', 'Register A Business')
@section('stylesheets')
    <link href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet">
    <link  rel="stylesheet" href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
    <link  rel="stylesheet" href="{{asset('css/dropzone.css')}}">
@endsection
<!-- search -->
@section('search')
    <div class="header-search map">
        <div class="header-search-bar">
            <div class="container">
                <div class="row m20-bttm text-center">
                    <div class="col-md-12">
                        <h2 class="section-title text-color-white"> Add a free business listing to BEAZEA Directory</h2>
                        <span class="section-subtitle text-color-white"> You're just steps away from setting up a free business profile on Nigeria's leading online business directory.</span>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('mobile-header')
    @include('includes.mobile-header')
@endsection
<!-- HEAD ENDS-->
<!-- CONTENT STARTS -->
@section('content')
  <div class="m20-bttm">
    <div class="container">
        @include('admin.partials.errors')
        @include('admin.partials.success')
      <div class="row m20-bttm m20-top">
          {{--REGISTRATION FORM--}}
        <div class="col-md-8 reg-form">
          <div class="page-forms">
              <form id="myAwesomeDropzone" class="form-horizontal dropzone" role="form" method="POST" action="/biz" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  {{--BUSINESS NAME--}}
                  <div class="form-group">
                   <label for="cat" class="col-md-3 control-label">Business Name</label>
                    <div class="col-md-8">
                     <input required type="text" id="name" name="name" class="form-control" placeholder="e.g. Patt's Bar" value="{{ old('name')}}">
                    </div>
                  </div>
                  {{--TAGLINE--}}
                  <div class="form-group">
                      <label for="cat" class="col-md-3 control-label">Tagline</label>
                      <div class="col-md-8">
                          <input type="text" id="tagline" name="tagline" class="form-control" placeholder="e.g. Bar & Nightclub" value="{{ old('tagline')}}">
                      </div>
                  </div>
                  {{--DESCRIPTION--}}
                  <div class="form-group">
                      <label for="cat" class="col-md-3 control-label">Description</label>
                      <div class="col-md-8">
                          <input type="text" id="description" name="description" class="form-control" placeholder="e.g. A brief description of the business" value="{{ old('description')}}">
                      </div>
                  </div>
                  {{--CATEGORY--}}
                  <div class="form-group">
                      <label for="cats" class="col-md-3 control-label">Business Category</label>
                      <div class="col-md-8">
                          <select id="cat3" name="cats[]" multiple class="form-control" required="required">
                          <option></option>  
                              @if(old('cats'))
                                
                                  <option selected value="">Choose Again</option>
                                         
                              @else
                                @foreach ($catList as $key =>$value)
                                  <option value="{{$key}}">{{ $value }}</option>
                                @endforeach
                              @endif
                                 
                             </select>
                      </div>
                  </div>

                  {{--SUB-CATEGORY / TAGS--}}
                  <div class="form-group">
                      <label for="sub" class="col-md-3 control-label">
                          Sub categories</label>
                      <div class="col-md-8">
                          <select id="sub" name="sub[]" value="{{ old('sub[]')}}" class="form-control" multiple> </select>
                      </div>
                  </div>

                  {{--Displaying bank Sort Code field if Category is banking and finance --}}
                  <div id="sort_code" class="form-group" style="display:none;">
                      <label for="sort_code" class="col-md-3 control-label">
                          Bank Sort Code</label>
                      <div class="col-md-8">
                          <input type="text" name="sort_code" class="form-control" placeholder="e.g. Enter bank's sort code here" value="{{ old('name')}}">
                      </div>
                  </div>
                  {{--STREET ADDRESS--}}
                   <div class="form-group">
                       <label for="address" class="col-md-3 control-label">Business Address</label>
                       <div class="col-md-8">
                       <input type="text" id="address" required name="address" class="form-control" placeholder="e.g. Ajose Adeogun street" value="{{ old('address')}}">
                      </div>
                  </div>
                  {{--STATE--}}
                  <div class="form-group">
                       <label for="cat" class="col-md-3 control-label">Business state</label>
                       <div class="col-md-8">                    
                          <select id="stateList" name="state" placeholder="select state" class="form-control">
                            <option></option>
                             @foreach ($stateList as $key =>$value)  
                                  @if(old('state') == $key) 
                                      <option selected value="{{ $key }}">{{ $stateList[$key] }}</option>   
                                  @else 
                                      <option value="{{ $key}}">{{ $value }}</option>      
                                  @endif
                                       
                             @endforeach
                          </select>

                      </div>
                  </div>
                  {{--REGION--}}
                  <div class="form-group">
                    <label for="lga" class="col-md-3 control-label">
                      Region/area</label>
                        <div class="col-md-8">
                          <select id="lga" name="lga" value="{{ old('lga')}}" class="form-control"> </select>
                        </div>
                  </div>
                  {{--IMAGES--}}
                  <div class="form-group">
                      <label for="images" class="col-md-3 control-label">
                          Upload Business Profile Image (optional)</label>
                      <div class="col-md-8">
                          {{--<input type="file"> --}}
                         {{--<div class="dropzone-previews"></div> --}}
                          {{--<div class="dropzone dropzone-previews" id="myAwesomeDropzone"></div> --}}
                          <div class="panel-body">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                      <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="{{asset('img/user.jpg')}}" alt="...">
                                      </div>
                                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                      <div>
                                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span><input type="file" name="image"></span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                      </div>
                                    </div>
                                </div>
                      </div>
                  </div>
                  {{--WEBSITE--}}
                  <div class="form-group">
                       <label for="website" class="col-md-3 control-label">Business website</label>
                       <div class="col-md-8">
                       <input type="text" id="website" name="website" value="{{ old('website')}}" class="form-control" placeholder="e.g. www.pattsbar.com.ng">
                      </div>
                  </div>
                  {{--EMAIL--}}
                  <div class="form-group">
                       <label for="email" class="col-md-3 control-label">Business Email</label>
                       <div class="col-md-8">
                        <input type="email" id="email" name="email" value="{{ old('email')}}" class="form-control" placeholder="e.g. info@pattsbar.com.ng">
                      </div>
                  </div>
                  {{--CONTACT PERSON / OWNER NAME--}}
                  <div class="form-group">
                       <label for="contactname" class="col-md-3 control-label">Contact Name</label>
                       <div class="col-md-8">
                       <input type="text" id="contactname" name=" contactname" value="{{ old('contactname')}}" class="form-control" placeholder="Mr Patt">
                      </div>
                  </div>
                  {{--PHONE 1--}}
                  <div class="form-group">
                       <label for="phone1" class="col-md-3 control-label">Phone number 1</label>
                       <div class="col-md-8">
                      <input type="text" id="phone1" name="phone1" value="{{ old('phone1')}}" class="form-control" placeholder="Phone number 1">
                      </div>
                  </div>
                  {{--PHONE 2--}}
                  <div class="form-group">
                       <label for="phone2" class="col-md-3 control-label">Phone number 2</label>
                          <div class="col-md-8">
                             <input type="text" id="phone2" name="phone2" value="{{ old('phone2')}}" class="form-control" placeholder="Phone number 2">
                          </div>
                  </div>
                  {{--SUBMIT OR CANCEL--}}
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <button type="submit" class="btn btn-default btn-lg">
                          <i class="fa fa-plus-circle"></i>
                            Add New Business
                        </button>
                      </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <a href="/" class="btn btn-border btn-block btn-lg">
                                Back Home
                            </a>
                        </div>
                    </div>

                  </form>
          </div>
        </div>
        <div class="col-md-4 reg-info">
            <div class="post-sidebar">
                  <div class="latest-post-content p0-bttm">
                      <h2>Why join BEAZEA Directory?</h2>
                      <div class="">
                          <ul>
                              <li>Feature your business in the Nigeria's most popular online business directory</li>
                              <li>Improved visibility in local Google searches</li>
                              <li>Get found by mobile, tablet and desktop users</li>
                          </ul>
                      </div>
                  </div>
                  <div class="latest-post-content reg-guide">
                      <h2>How to get Your Business Seen</h2>
                      <ul class="list-group p0-left p0-right">
                          <li href="#" class="list-group-item">
                              <img class="pull-left" src="{{asset('img/content/reg-step1.png')}}" alt="">
                              <h4 class="list-group-item-heading">Add Your Business Information</h4>
                              <p class="list-group-item-text"></p>
                          </li>
                          <li href="#" class="list-group-item">
                              <img class="pull-left" src="{{asset('img/content/reg-step2.png')}}" alt="">
                              <h4 class="list-group-item-heading">Upload Your Business Logo</h4>
                              <p class="list-group-item-text"></p>
                          </li>
                          <li href="#" class="list-group-item">
                              <img class="pull-left" src="{{asset('img/content/reg-step3.png')}}" alt="">
                              <h4 class="list-group-item-heading">Get Your Business Verified!</h4>
                              <p class="list-group-item-text"></p>
                          </li>
                          <div class="">
                              <img class="center-block" src="{{asset('img/content/finish4.png')}}" alt="">
                          </div>
                      </ul>
                  </div>
                    <div class="latest-post-content">
                        <h2>Attract even more customers</h2>
                        <div class="">
                            <p>Want to guarantee a high ranking, page one position for relevant local searches? Call us today to discuss our range of enhanced advertising solutions.</p>
                            <p><span style="font-size: 1.9em; color: #000;">Call (+234)-0803-XXX-XXXX</span></p>
                        </div>
                    </div>
            </div>
        </div>
      </div> <!-- end .row -->
    </div> <!-- end .container -->
  </div>  <!-- end form-content -->
@endsection
<!-- CONTENT ENDS-->
<!-- FOOTER STARTS -->
@section('footer')
    @include('includes.footer')
@endsection
<!-- FOOTER ENDS -->
{{--PAGE SCRIPTS--}}
@section('scripts')
   <script src="{{asset('js/dropzone.js')}}"></script>
   <script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
     {{--CUSTOM PAGE SCRIPTS--}}

    <script type="text/javascript">
    {{--DROPZONE--}}
            Dropzone.autoDiscover = false;
            Dropzone.options.myAwesomeDropzone = {
              //previewsContainer: ".dropzone-previews",
              autoProcessQueue: false,
              uploadMultiple: true,
              parallelUploads: 100,
              maxFiles: 5,

              // The setting up of the dropzone
     init: function() {
     var myDropzone = this;

    // First change the button to actually tell Dropzone to process the queue.
    this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
      // Make sure that the form isn't actually being sent.
      e.preventDefault();
      e.stopPropagation();
      myDropzone.processQueue();
    });
            }
        }

    $(document).ready(function() {
      $("#cat3").select2({
         placeholder: 'select business category',
      });
    });

    
     
     $('#cat3').click(function(){
          // var y=[]; 
          if($(this).val() !== "select business category") {
             var model=$('#sub');
            model.empty();
           $.get('{{ URL::to('api/subcat') }}', { y: $(this).val() }, function(result){
             $.each(result.data,function(){
                              $('#sub').append('<option value="'+this.id+'">'+this.text+'</option>');
                        });
           });
         }
      });
  
    
      
     $('#cat3').change(function(){
     // var y=[];
         var selection= $(this).val();
          if(selection !== "select business category") {
             var model=$('#sub');
            model.empty();
           $.get('{{ URL::to('api/subcat') }}', {y: $(this).val()}, function(result){
             $.each(result.data,function(){
                              $('#sub').append('<option value="'+this.id+'">'+this.text+'</option>');

                        });
           });
         }
          if(selection == 44) {
          $("#sort_code").show();
          }
          else {
            $("#sort_code").hide();
          }

      });

     
      $("#stateList").select2({
        placeholder: 'select state'
    });
    
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
    

    
     $('#stateList').click(function(){
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
   

   
      $("#sub").select2({
        placeholder: 'select a category first',
       // tags: true,
      });

       
         $("#lga").select2({
          placeholder: 'select a state first',
        });
        
  </script>
    <script src="{{asset('js/scripts.js')}}"></script>
@stop