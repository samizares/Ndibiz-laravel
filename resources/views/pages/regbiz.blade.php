@extends('admin.layout')
<!-- HEAD STARTS-->
  @section('title', 'Register A Business')
  @section('stylesheets')
      <link href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet">
      <link  rel="stylesheet" href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
      <link  rel="stylesheet" href="{{asset('css/dropzone.css')}}">
  @endsection
<!-- HEAD ENDS-->
<!-- CONTENT STARTS -->
@section('content')
  <div class="m20-bttm">
    <div class="container">
      @include('admin.partials.errors')
      @include('admin.partials.success')
      <div class="row m20-bttm">
        <div class="col-md-12">
            <h2 class="section-title"> Add a free business listing to BEAZEA Directory</h2>
            <span class="section-subtitle"> You're just steps away from setting up a free business profile on Nigeria's leading online business directory.</span>
        </div>
      </div>
        <hr>
      <div class="row m20-bttm">
        <div class="col-md-8">
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
                          <input required type="text" id="tagline" name="tagline" class="form-control" placeholder="e.g. Bar & Nightclub" value="{{ old('name')}}">
                      </div>
                  </div>
                  {{--DESCRIPTION--}}
                  <div class="form-group">
                      <label for="cat" class="col-md-3 control-label">Description</label>
                      <div class="col-md-8">
                          <input required type="text" id="description" name="description" class="form-control" placeholder="e.g. A brief description of the business" value="{{ old('name')}}">
                      </div>
                  </div>
                  {{--CATEGORY--}}
                  <div class="form-group">
                      <label for="cat" class="col-md-3 control-label">Business Category</label>
                      <div class="col-md-8">
                          {!!Form::select('cats[]', $catListID,Input::old('cats[]') , ['class'=>'form-control','id'=>'category3','multiple']) !!}
                      </div>
                  </div>
                  {{--SUB-CATEGORY / TAGS--}}
                  <div class="form-group">
                      <label for="image_class" class="col-md-3 control-label">
                          Sub categories</label>
                      <div class="col-md-8">
                          <select id="sub" name="sub[]" value="{{ old('sub[]')}}" class="form-control" multiple="multiple"> </select>
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
                       <label for="cat" class="col-md-3 control-label">Business Address</label>
                       <div class="col-md-8">
                       <input required type="text" id="address" name="address" class="form-control" placeholder="e.g. Ajose Adeogun street" value="{{ old('address')}}">
                      </div>
                  </div>
                  {{--STATE--}}
                  <div class="form-group">
                       <label for="cat" class="col-md-3 control-label">Business state</label>
                       <div class="col-md-8">
                           {!!Form::select('state', $stateListID, Input::old('state'), ['class'=>'form-control','id'=>'stateList',
                          'placeholder'=>'select state']) !!}
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

                {{-- <div class="form-group">--}}
                     {{-- <label for="images" class="col-md-3 control-label">--}}
                     {{--     Upload Business Gallery Images(optional)</label>--}}
                     {{-- <div class="col-md-8">--}}

                        {{-- <div class="dropzone dropzone-previews"></div>--}}
                    {{-- </div> --}}
                 {{-- </div> --}}
                  {{--OPENING TIMES--}}
                  {{--<div class="form-group">--}}
                      {{--<label for="times" class="col-md-3 control-label">--}}
                          {{--Opening times</label>--}}
                      {{--<div class="col-md-8">--}}
                          {{--<select id="times" name="times" value="{{ old('times')}}" class="form-control" multiple="multiple">--}}
                              {{--<option value="monday">Monday: &nbsp; 9:00am - 5:00pm</option>--}}
                              {{--<option value="monday">Tuesday: &nbsp; 9:00am - 5:00pm</option>--}}
                              {{--<option value="monday">Wednesday: &nbsp; 9:00am - 5:00pm</option>--}}
                              {{--<option value="monday">Thursday: &nbsp; 9:00am - 5:00pm</option>--}}
                              {{--<option value="monday">Friday: &nbsp; 9:00am - 5:00pm</option>--}}
                              {{--<option value="monday">Saturday: &nbsp; 9:00am - 5:00pm</option>--}}
                              {{--<option value="monday">Sunday: &nbsp; Closed</option>--}}
                          {{--</select>--}}
                          {{--<select name="day" id="day" class="form-control">--}}
                              {{--<option value="monday">Monday</option>--}}
                          {{--</select>--}}
                          {{--<select name="opens" id="opens" class="form-control">--}}
                              {{--<option value="am">9:00am</option>--}}
                          {{--</select>--}}
                          {{--<select name="closes" id="closes" class="form-control">--}}
                              {{--<option value="pm">5:00pm</option>--}}
                          {{--</select>--}}
                      {{--</div>--}}
                  {{--</div>--}}
                  {{--WEBSITE--}}
                  <div class="form-group">
                       <label for="website" class="col-md-3 control-label">Business website</label>
                       <div class="col-md-8">
                       <input type="text" id="website" name="website" value="{{ old('website')}}" class="form-control" placeholder="e.g. www.pattsbar.com.ng">
                      </div>
                  </div>
                  {{--EMAIL--}}
                  <div class="form-group">
                       <label for="email" class="col-md-3 control-label">Business Email Address</label>
                       <div class="col-md-8">
                        <input type="email" id="email" name="email" value="{{ old('email')}}" class="form-control" placeholder="e.g. info@pattsbar.com.ng">
                      </div>
                  </div>
                  {{--CONTACT PERSON / OWNER NAME--}}
                  <div class="form-group">
                       <label for="contactname" class="col-md-3 control-label">Contact Name</label>
                       <div class="col-md-8">
                       <input type="text" id="contactname" name=" contactname" value="{{ old('contactname')}}" class="form-control" placeholder="Mr Patt" required="required">
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
                            <a href="/" class="btn btn-danger btn-block btn-lg">
                                Back Home
                            </a>
                        </div>
                    </div>

                  </form>
          </div>
        </div>
        <div class="col-md-4">
            <div class="post-sidebar">
                  <div class="latest-post-content">
                      <h2>Why join BEAZEA Directory?</h2>
                      <div class="single-product">
                          <ul>
                              <li>Feature your business in the Nigeria's most popular online business directory</li>
                              <li>Improved visibility in local Google searches</li>
                              <li>Get found by mobile, tablet and desktop users</li>
                          </ul>
                      </div>
                  </div>
                    <p><img class="center-block" src="{{asset('img/content/devices.jpg')}}" alt=""></p>
                  <div class="latest-post-content">
                      <h2>Business already on BEAZEA Directory?</h2>
                      <div class="single-product">
                          <p>Take a moment to create a BEAZEA Directory account and start customising your business profile with contact details, opening times, images and more.</p>
                          <p><a class="form-links" href="/auth/login">Click here to get started now</a></p>
                      </div>
                  </div>
                    <div class="latest-post-content">
                        <h2>Attract even more customers</h2>
                        <div class="single-product">
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

@section('scripts')
   <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
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
    });

     $(document).ready(function() {
      $('#category3').change(function(){
        var selection= $(this).val();
        if(selection == 44) {
          $("#sort_code").show();
          }
          else {
            $("#sort_code").hide();
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
    });

    $(document).ready(function() {
      $("#sub").select2({
        placeholder: 'select or create subcategories',
       // tags: true,
      });

       $(document).ready(function() {
         $("#lga").select2({
          placeholder: 'select a state first',
        });
      });

         });
  </script>
@stop