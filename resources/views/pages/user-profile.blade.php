@extends('master')
<!-- HEAD -->
@section('title', 'User Profile')
@section('stylesheets')
   <link  rel="stylesheet" href="{{asset('css/dropzone.css')}}">
   <link href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet">
   <link  rel="stylesheet" href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/nanogallery/css/nanogallery.min.css')}}">
@endsection
<!-- HEADER -->
<!-- search -->
@section('search')
    <div class="header-search map">
        <div class="header-search-bar">
            {{--PROFILE PHOTO--}}
            <figure class="center-block m0-bttm m20-top">
                <div class="profile-pic center-block">
                    {!!Html::image(isset($user->profilePhoto->image) ? $user->profilePhoto->image : 'img/user.jpg',
                        'Profile Image', array('class'=>'img-responsive center-block'))!!}
                    @if(Auth::check() && (Auth::user()->id == $user->id))
                        <a href="#" data-toggle="modal" data-target="#myProfile">
                            <p class="pic-edit">
                                {{--<i class="mdi-image-camera-alt"></i>--}}
                                <i class="fa fa-camera"></i>
                            </p>
                        </a>
                    @endif
                </div>
            </figure>
            {{--USER NAME--}}
            <h2 class="text-center m5 text-color-white text-uppercase" style="font-weight: 300;">{{$user->username}}</h2>
            {{--ADDRESS--}}
            <p class="text-center m5 text-color-white address"><i class="fa fa-map-marker"></i> Lagos, Nigeria.</p>
            {{--COUNTERS--}}
            <ul class="list-inline user-counter text-center text-color-white">
                <li><i class="fa fa-heart"></i> {{$favCount= $user->favours->count()}}
                    {{str_plural('Favourite', $favCount) }}</li>
                <li><i class="fa fa-camera"></i> {{$photosCount=$user->photos->count()}}
                    {{ str_plural('Photo', $photosCount)}} </li>
            </ul>
        </div> <!-- END .header-search-bar -->
@endsection
<!-- navigation -->
@section('mobile-header')
    @include('includes.mobile-header')
@endsection
<!-- CONTENT -->
@section('content')
  <div id="page-content" class="company-profile page-content m0 user-profile">
    <div class="container">
    @include('partials.notifications')
      <div class="home-with-slide">
        <div class="row">
            {{--MAIN CONTENT--}}
            <div class="col-md-8">
              {{--PROFILE OVERVIEW--}}
                @if(Auth::check() && (Auth::user()->id == $user->id))
                    <div class="row">
                        {{--ACTION BUTTONS--}}
                        <div class="col-md-12 action-btns">
                            <ul class="list-inline m0-bttm">
                                <li><a href="#" type="button" class="btn btn-border" data-toggle="modal" data-target="#myModal" title="Add Photo"><i class="fa fa-camera"></i>
                                        Add photo</a></li>
                            </ul>
                        </div>
                    </div>
                @endif
              <hr>
              {{--TABS--}}
            <div class="row businesses profile-tabs">
                {{--TABS SIDEBAR LEFT--}}
              <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="page-sidebar company-sidebar">
                    <ul class="company-category nav nav-tabs home-tab" role="tablist">
                        @if(Auth::check() && (Auth::user()->id == $user->id))
                            <li class="active">
                                <a href="#claimed-biz" role="tab" data-toggle="tab"><i class="fa fa-building-o"></i> <span class="">Claimed Businesses</span></a>
                            </li>
                        @endif
                        <li>
                            <a href="#fav" role="tab" data-toggle="tab"><i class="fa fa-heart"></i> <span class="">Favourites</span></a>
                        </li>
                        <li>
                            <a href="#company-reviews" role="tab" data-toggle="tab"><i class="fa fa-comments"></i>
                                <span class="">Business Reviews</span></a>
                        </li>
                        <li>
                          <a href="#biz-photos" role="tab" data-toggle="tab"><i class="fa fa-camera"></i>
                              <span class="">Gallery</span></a>
                        </li>
                        @if(Auth::check() && (Auth::user()->id == $user->id))
                        <li>
                            <a href="#edit" role="tab" data-toggle="tab"><i class="fa fa-building-o"></i> <span class="">Edit Profile</span></a>
                        </li>
                        @endif
                    </ul>
                  </div> <!-- end .page-sidebar -->
              </div>
                {{--TAB CONTENT RIGHT--}}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="tab-content">
                      {{--CLAIMED BUSINESSES--}}
                      <div class="tab-pane active fade in" id="claimed-biz">
                          <div class="favourite-biz">
                              <h3 class="text-uppercase m10-top">Claimed Businesses</h3>
                              <div class="row clearfix">
                                  @unless ( $owner->isEmpty() )
                                      @foreach ($owner as $biz)
                                          <div class="col-md-6 col-sm-6">
                                              <div class="single-product">
                                                  <figure><a href="/review/biz/{{$biz->slug}}">
                                                          <img src="{{isset($biz->profilePhoto->image) ? asset($biz->profilePhoto->image) :
                                               asset('img/content/post-img-10.jpg') }}" alt="">
                                                          <div class="rating">
                                                              <ul class="list-inline">
                                                                  <li>
                                                                      @for ($i=1; $i <= 5 ; $i++)
                                                                          <span class="glyphicon glyphicon-star{{ ($i <= $biz->rating_cache) ? '' : '-empty'}}"></span>
                                                                      @endfor
                                                                  </li>
                                                              </ul>
                                                              <p class="">{{$biz->rating_count}} {{ Str::plural('review', $biz->rating_count)}}</p>
                                                          </div></a>
                                                  </figure>
                                                  <h4><a href="/review/biz/{{$biz->slug}}">{{$biz->name}}</a></h4>
                                                  <p class="m5-bttm"><span data-toggle="modal" data-target="#delClaimModal"
                                                                           data-bizid="{{$biz->id}}" data-claimbiz="{{$biz->name}}" title="Remove from claimed biz">
                                        <a><i class="fa fa-trash"></i></a></span></p>
                                              </div> <!-- end .single-product -->
                                          </div>
                                      @endforeach
                                  @endunless
                              </div>  <!-- end .row -->
                          </div>  <!-- end -->
                      </div>
                      {{--FAVOURITES--}}
                      <div class="tab-pane" id="fav">
                          <div class="favourite-biz">
                              <h3 class="text-uppercase m10-top">Favourite Businesses</h3>
                              @include('partials.favourite')
                              <div class="row clearfix">
                                  @unless ( $bizs->isEmpty() )
                                      @foreach ($bizs as $biz)
                                          <div class="col-md-6 col-sm-6">
                                              <div class="single-product">
                                                  <figure><a href="/review/biz/{{$biz->slug}}">
                                                          <img src="{{isset($biz->profilePhoto->image) ? asset($biz->profilePhoto->image) :
                                               asset('img/content/post-img-10.jpg') }}" alt="">

                                                          <div class="rating">
                                                              <ul class="list-inline">
                                                                  <li>
                                                                      @for ($i=1; $i <= 5 ; $i++)
                                                                          <span class="glyphicon glyphicon-star{{ ($i <= $biz->rating_cache) ? '' : '-empty'}}"></span>
                                                                      @endfor
                                                                  </li>
                                                              </ul>
                                                              <p class="">{{$biz->rating_count}} {{ Str::plural('review', $biz->rating_count)}}</p>
                                                          </div></a>
                                                  </figure>
                                                  <h4><a href="/review/biz/{{$biz->slug}}">{{$biz->name}}</a></h4>
                                                  <p class="m5-bttm"><span data-toggle="modal" data-target="#favModal"
                                                                           data-id="{{$biz->id}}" data-bizname="{{$biz->name}}" title="Remove from favourites">
                                        <a><i class="fa fa-trash"></i></a></span></p>
                                              </div> <!-- end .single-product -->
                                          </div>
                                      @endforeach
                                  @endunless
                              </div>  <!-- end .row -->
                          </div>  <!-- end -->
                      </div>
                      {{--REVIEWS--}}
                      <div class="tab-pane" id="company-reviews">
                          <div class="company-ratings">
                              <h3 class="text-uppercase m10-top">Reviews (5 star ratings)</h3>
                              <div class="rating-with-details">
                                  @unless ( $user->reviews->isEmpty() )
                                      @foreach($user->reviews as $review)
                                          <div class="single-content">
                                              <div class="company-rating-box">
                                                  <ul class="list-inline">
                                                      @for ($i=1; $i <= 5 ; $i++)
                                                          <li><a href="#"><i class="fa fa-star{{ ($i <= $review->rating) ? '' : '-o'}}"></i></a></li>
                                                      @endfor
                                                  </ul>
                                              </div>
                                              <div class="rating-details">
                                                  <div class="meta">
                                                      <a href="#"><strong>{{$review->biz->name  }}</strong></a>
                                                      - {{ $review->timeago}}
                                                  </div>
                                                  <div class="content">
                                                      <p>{{$review->comment}}</p>
                                                  </div>
                                              </div>
                                          </div> <!-- end .single-content -->
                                      @endforeach
                                  @endunless


                              </div> <!-- end .rating-with-details -->
                          </div> <!-- end .company-rating -->
                      </div>
                      {{--GALLERY--}}
                      <div class="tab-pane" id="biz-photos">
                        <div class="company-product">
                          <h3 class="text-uppercase m10-top">Gallery</h3>
                          <div class="row">
                                <div class="col-md-12" id="nanoGallery3">
                                  @foreach($user->photos as $photo)
                                    <a href="{{$photo->path}}" data-ngthumb="{{$photo->path}}"
                                    data-ngdesc="Description1">Title Image1</a>
                                  @endforeach
                                </div>
                          </div> <!-- end .row -->
                        </div> <!-- end .company-product -->
                      </div>
                      {{--PROFILE EDIT--}}
                      <div class="tab-pane" id="edit">
                          <div class="company-ratings">
                              <h3 class="text-uppercase m10-top">Edit Profile</h3>
                              <div class="rating-with-details">
                                  @include('admin.partials.errors')
                                  <form class="form-horizontal" role="form" method="POST" action="/profile/edit/{{$user->id}}">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <input type="hidden" name="id" value="{{$user->id}}">
                                      <div class="form-group">
                                          <label for="cat" class="col-md-3 control-label">User Name</label>
                                          <div class="col-md-8">
                                              <input required="required" type="text" value="{{ $user->username}}" id="name" name="name"
                                                 class="form-control" placeholder="username">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="email" class="col-md-3 control-label">Email Address</label>
                                          <div class="col-md-8">
                                              <input type="email" id="email" value="{{ $user->email}}" name="email" class="form-control"
                                                     placeholder="">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="email" class="col-md-3 control-label">Select cities you want periodic Updates on</label>
                                           <div class="col-md-8">
                                                  {!!Form::select('state[]', $stateIds, Input::old('state'), ['class'=>'form-control','id'=>'stateList',
                                                    'multiple']) !!}

                                          </div>
                                      </div>

                                      <div class="form-group">
                                           <label for="email" class="col-md-3 control-label">Select categories you want periodic Updates On</label>
                                           <div class="col-md-8">
                                                  {!!Form::select('cats[]', $catIds,Input::old('cats[]') , ['class'=>'form-control','id'=>'category3','multiple']) !!}
                                             </div>
                                      </div>


                                     <div class="form-group">
                                        <label for="notify" class="col-md-3 control-label">Notify me of periodic updates</label>
                                           <div class="col-md-8">
                                             <p class="checkbox">
                                                <label>{!!Form::checkbox('notify',$user->notify,['id'=>'notify']) !!}
                                            </p>
                                        </div>
                                     </div>

                                      <div class="col-md-7 col-md-offset-3">
                                          <ul class="list-inline">
                                              <li><button type="submit" class="btn btn-default btn-md">
                                                  <i class="fa fa-save"></i>
                                                  Save Changes
                                              </button></li>

                                          </ul>
                                      </div>
                                  </form>
                              </div> <!-- end .rating-with-details -->
                          </div> <!-- end .company-rating -->
                      </div>
                  </div> <!-- end .tab-content -->
              </div> <!-- end .main-grid layout -->
            </div> <!-- end .row -->
          </div>
            {{--SIDEBAR RIGHT--}}
            <div class="col-md-4">
                @include('includes.sidebar')
            </div>
        </div>
      </div> <!-- end .home-with-slide -->
    </div> <!-- end .container -->
  </div>  <!-- end #page-content -->

  {{--MODALS BEGIN--}}

  {{--MODAL GALLERY PICTURES UPLOAD--}}
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class = "modal-dialog">
        <div class = "modal-content">
           <div class = "modal-header">
              <h4 class = "modal-title" id = "myModalLabel">Uploaded Photos</h4>
           </div>
           <div class = "modal-body">
               <h3>Add new Photos</h3>
               <form id="uploadFile" action"" method="POST" class="dropzone">
                {{csrf_field()}}

               </form>
           </div>
           <div class = "modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  {{--MODAL DELETE FAVOURITE BIZ--}}
  <div class="modal fade" id="favModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class = "modal-dialog">
        <div class = "modal-content">
           <div class = "modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class = "modal-title" id="myModalLabel">Confirm Delete</h4>
           </div>
           <div class = "modal-body">
               <h4>Are you sure you want to delete this favourite business</h4>
           </div>
           <div class = "modal-footer">
             <form class="form-horizontal" role="form" method="POST" action="/deleteFav">
              <input type="hidden" name="userId" value="{{ $user->id}}">
              {{csrf_field()}}
             <button type="submit" name="yes" class="btn btn-danger">Yes</button>
             </form>
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

    {{--MODAL DELETE CLAIMED BIZ--}}
  <div class="modal fade" id="delClaimModal" tabindex="-1" role="dialog" aria-labelledby="myClaimLabel" aria-hidden="true">
    <div class = "modal-dialog">
        <div class = "modal-content">
           <div class = "modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class = "modal-title" id="myClaimLabel">Confirm Delete</h4>
           </div>
           <div class = "modal-body">
               <h4>Are you sure you want to delete this claimed business</h4>
           </div>
           <div class = "modal-footer">
             <form class="form-horizontal" role="form" method="POST" action="/deleteClaimed">
              <input type="hidden" name="userId" value="{{ $user->id}}">
              {{csrf_field()}}
             <button type="submit" name="yes" class="btn btn-danger">Yes</button>
             </form>
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


  {{--MODAL PROFILE PHOTO UPLOAD--}}
  <div class = "modal fade" id = "myProfile" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
    <div class = "modal-dialog">
        <div class = "modal-content">
           <div class = "modal-header"><h3 class = "modal-title" id = "myModalLabel">Upload Profile Photo</h3></div>
           <div class = "modal-body">
                <div class="container-fluid">
                    {!! Form::open( array('url' =>'/profile/'.$user->id.'/photo', 'files'=> true, 'method'=>'post')) !!}
                    {!!Form::hidden('id', $user->id)!!}
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <h2 class="panel-title">Add Profile Photo</h2>
                            @if (Session::get('errors'))<div class="alert alert-error alert-danger"><a name="error">{{{ Session::get('errors') }}}</a></div>@endif
                            @if (Session::get('notices'))<div class="alert"><a name="notice">{{{ Session::get('notices') }}}</a></div>@endif
                        </div>
                        <div class="panel-body">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img src="{{asset('img/user.jpg')}}" alt="..."></div>
                              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                              <div>
                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span><input type="file" name="image"></span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                              </div>
                            </div>
                        </div>
                        <div class="panel-footer"><span>{!!Form::submit('Submit', array('class' => 'btn btn-default-inverse btn-sm') ) !!}</span></div>
                    </div>
                    {!!Form::close() !!}
                 </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  {{--MODALS END--}}

@endsection
<!-- CONTENT ENDS-->
<!-- FOOTER STARTS -->
@section('footer')
  @include('includes.footer')
@endsection
<!-- FOOTER ENDS -->

@section('scripts')
  <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
  <script src="{{asset('plugins/nanogallery/jquery.nanogallery.min.js')}}"></script>
  <script src="{{asset('js/dropzone.js')}}"></script>
  <script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
  <script type="text/javascript">
        {{--DROPZONE PHOTO UPLOAD--}}
        $(document).ready(function() {
          // $.fn.modal.Constructor.prototype.enforceFocus = function() {};
              Dropzone.autoDiscover = false;
              var url1= '../profile/{{$user->id}}';
              $(document).on('click','#myModal',function(){
                  //     var myDropzone = new Dropzone("form#uploadFile", { url: "/profile/{{$user->id}}/upload",
                  // autoProcessQueue: true});
                  $("form#uploadFile").dropzone({ url: "/profile/{{$user->id}}/upload" });
              });
              $(function () { $('#myModal').on('hide.bs.modal', function () {
                  window.location.replace(url1);
                  //  $('#biz-photos').load(document.URL +  ' #biz-photos');
              });
          });
        });

        $(document).ready(function() {
            // show active tab on reload
            if (location.hash !== '') $('a[href="' + location.hash + '"]').tab('show');
            // remember the hash in the URL without jumping
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
               if(history.pushState) {
                    history.pushState(null, null, '#'+$(e.target).attr('href').substr(1));
               } else {
                    location.hash = '#'+$(e.target).attr('href').substr(1);
               }
            });
        });

        //GOOGLE MAPS
        $(document).ready(function() {
          function initialize() {
              var mapCanvas = document.getElementById('map');
              var mapOptions = {
                  center: new google.maps.LatLng(44.5403, -78.5463),
                  zoom: 8,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
              }
              var map = new google.maps.Map(mapCanvas, mapOptions)
          }
          google.maps.event.addDomListener(window, 'load', initialize);
        });
        //SET ACTIVE TAB
        $(document).ready(function() {
            $('ul.home-tab li:first-child').addClass('active');
        });
        //NANO GALLERY
        $(document).ready(function () {
            $("#nanoGallery3").nanoGallery({
                itemsBaseURL:"{{asset('/')}}",
                thumbnailHoverEffect:'imageScale150',
                thumbnailHeight:100,
                thumbnailWidth: 200
            });
        });
         $(document).ready(function () {
          $('#favModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
    var bizid = button.data('id') // Extract info from data-* attributes
    var bizname = button.data('bizname')

    var title = 'Confirm Delete  Biz #' + bizid + ' from favourite';
    var content = 'Are you sure want to remove ' + bizname + ' from favourites?';

    // Update the modal's content.
    var modal = $(this)
    modal.find('.modal-title').text(title);
    modal.find('.modal-body').text(content);
    modal.find('button.btn-danger').val(bizid);
           });

           $('#delClaimModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
    var bizid = button.data('bizid') // Extract info from data-* attributes
    var bizname = button.data('claimbiz')

    var title = 'Confirm Delete  Biz #' + bizid + ' from favourite';
    var content = 'Are you sure want to remove ' + bizname + ' from Climed Biz?';

    // Update the modal's content.
    var modal = $(this)
    modal.find('.modal-title').text(title);
    modal.find('.modal-body').text(content);
    modal.find('button.btn-danger').val(bizid);
           });
          });
  </script>
  <script src="{{asset('js/scripts.js')}}"></script>
@endsection
