@extends('master')
<!-- HEAD -->
@section('title', 'User Profile')
@section('stylesheets')
   <link  rel="stylesheet" href="{{asset('css/dropzone.css')}}">
   <link  rel="stylesheet" href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('plugins/nanogallery/css/nanogallery.min.css')}}">
@endsection
<!-- HEADER -->
<!-- search -->
@section('search')
  @include('partials.search')
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
                                <i class="fa fa-user"></i> {{Auth::user()->username}} <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu" aria-labelledby="menu1">
                                <li><a href="/profile/{{Auth::user()->id}}">View Profile</a></li>
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
                        {{--<li class="text-center"><a href="/businesses" class=""><i class="fa fa-building"></i> Explore</a></li>--}}
                        <li class="dropdown text-center">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-building-o"></i> Explore</a>
                            <ul class="dropdown-menu">
                                <li><a href="/businesses" class=""><i class="fa fa-building"></i> Businesses</a></li>
                                <li><a href="/categories" class=""><i class="fa fa-sort"></i> Categories</a></li>
                                <li><a href="/locations" class=""><i class="fa fa-map-marker"></i> Locations</a></li>
                            </ul>
                        </li>
                        <li class="text-center"><a href="/biz/create" class=""><i class="fa fa-plus"></i> Add a Business</a></li>

                        <li class="divider"></li>
                </ul>
            </nav>
        </div> <!-- end .container -->
    </div> <!-- end .header-nav-bar -->
@endsection
<!-- CONTENT -->
@section('content')
  <div id="page-content" class="company-profile page-content user-profile">
    <div class="container">
    @include('partials.notifications')
      <div class="home-with-slide">
        <div class="row">
            {{--MAIN CONTENT--}}
          <div class="col-md-8">
              {{--PROFILE OVERVIEW--}}
            <div class="row profile-overview">
              <div class="col-md-3 col-sm-3 ">
                  <ul class="list-inline user-counter hidden-md hidden-lg hidden-sm">
                      <li><i class="fa fa-heart"></i> {{$favCount= $user->favours->count()}}
                          {{str_plural('Favourite', $favCount) }}</li>
                      <li><i class="fa fa-comments"></i>{{$revCount= $user->reviews->count()}}
                          {{ str_plural('Review', $revCount)}}</li>
                      <li><i class="fa fa-camera"></i>{{$photosCount=$user->photos->count()}}
                          {{ str_plural('Photo', $photosCount)}} </li>
                  </ul>
                  <h2 class="username hidden-md hidden-lg hidden-sm">{{$user->username}}</h2>
                <figure class="center-block">
                    <div class="profile-pic"><a href="" data-toggle="modal" data-target="#myProfile">
                      {!!Html::image(isset($user->profilePhoto->image) ? $user->profilePhoto->image : 'img/user.jpg',
                        'Profile Image', array('class'=>'img-responsive center-block'))!!}
                      <p class="pic-edit">
                        <i class="mdi-image-camera-alt"></i> 
                         <span>Change Picture</span>
                      </p></a>
                    </div>
                </figure>
              </div>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="row">
                    <div class="col-md-8">
                      <h2 class="username hidden-xs">{{$user->username}}</h2>
                        <p class="m5-bttm address"><i class="fa fa-map-marker"></i> Lagos, Nigeria.</p>
                        <p class="checkbox">
                            <label>
                                <input type="checkbox" style="width:auto;"> Notify me of updates
                            </label>
                        </p>
                      <ul class="list-inline user-counter hidden-xs">
                        <li><i class="fa fa-heart"></i> {{$favCount= $user->favours->count()}}
                          {{str_plural('Favourite', $favCount) }}</li>
                        <li><i class="fa fa-comments"></i>{{$revCount= $user->reviews->count()}}
                          {{ str_plural('Review', $revCount)}}</li>
                        <li><i class="fa fa-camera"></i>{{$photosCount=$user->photos->count()}}
                          {{ str_plural('Photo', $photosCount)}} </li>
                      </ul>
                    </div>
                    <hr class="hidden-lg hidden-md hidden-sm">
                    {{--ACTION BUTTONS--}}
                    @if(Auth::check() && (Auth::user()->id == $user->id))
                    <div class="col-md-4 action-btns">
                        <ul class="list-inline m0-bttm">
                            <li><a href="#" type="button" class="btn btn-border" data-toggle="tooltip" title="Edit Profile"><i class="fa fa-pencil"></i> Edit profile</a></li>
                            <li><a href="#" type="button" class="btn btn-border" data-toggle="modal" data-target="#myModal" title="Add Photo"><i class="fa fa-camera"></i>
                                    Add photo</a></li>
                            <li><a href="#" type="button" class="btn btn-border" data-toggle="tooltip" title="Add Review"><i class="fa fa-star"></i> Add review</a></li>
                        </ul>
                    </div>
                    @endif
                </div>
              </div>
            </div>
              <hr>
              {{--TABS CONTENT--}}
            <div class="row businesses profile-tabs">
                {{--TABS SIDEBAR LEFT--}}
              <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="page-sidebar company-sidebar">
                    <ul class="company-category nav nav-tabs home-tab" role="tablist">
                        <li class="active">
                          <a href="#biz-photos" role="tab" data-toggle="tab"><i class="fa fa-camera"></i> <span class="">Gallery</span></a>
                        </li>
                        <li>
                          <a href="#fav" role="tab" data-toggle="tab"><i class="fa fa-heart"></i> <span class="">Favourites</span></a>
                        </li>
                        <li>
                          <a href="#company-reviews" role="tab" data-toggle="tab"><i class="fa fa-comments"></i> <span class="">Reviews</span></a>
                        </li>
                    </ul>
                  </div> <!-- end .page-sidebar -->
              </div>
                {{--TAB CONTENT RIGHT--}}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="tab-content">
                      {{--GALLERY--}}
                      <div class="tab-pane active" id="biz-photos">
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
                      </div> <!-- end .tab-pane -->
                      {{--FAVOURITES--}}
                      <div class="tab-pane" id="fav">
                        <div class="favourite-biz">
                          <h3 class="text-uppercase m10-top">Favourite Businesses</h3>
                          <div class="row clearfix">
                            @unless ( $bizs->isEmpty() )
                            @foreach ($bizs as $biz)
                                <div class="col-md-6 col-sm-6">
                                  <div class="single-product">
                                      <figure><a href="/review/biz/{{$biz->id}}">
                                          <img src="{{asset('img/content/post-img-10.jpg') }}" alt="">
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
                                      <h4><a href="/review/biz/{{$biz->id}}">{{$biz->name}}</a></h4>
                                      <p class="m5-bttm"><span data-toggle="tooltip" title="Remove from favourites"><a href=""><i class="fa fa-trash"></i></a></span></p>
                                  </div> <!-- end .single-product -->
                                </div>
                            @endforeach
                            @endunless
                          </div>  <!-- end .row -->
                        </div>  <!-- end -->
                      </div> <!-- end .tab-pane -->
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
                  </div> <!-- end .tab-content -->
              </div> <!-- end .main-grid layout -->            
            </div> <!-- end .row -->
          </div>
            {{--SIDEBAR RIGHT--}}
            <div class="col-md-4">
                <div class="post-sidebar">
                    <!-- AD BAR MINI -->
                    <div class="recently-added ad-mini">
                        <div class="category-item">
                            <h1 class="text-center m5-bttm"> <small>Advertisement</small>
                                <p class="rotate m10-top">
                                    <span>GTBank Flex Account</span>
                                    <span>Jevniks restaurants</span>
                                    <span>Oriental Hotel</span>
                                    <span>UBA</span>
                                </p>
                            </h1>
                        </div>
                    </div>
                    <!-- FEATURED BUSINESSES -->
                    <div class="latest-post-content">
                        <h2>Featured Businesses</h2>
                        @if ( ! $featured-> isEmpty() )
                            @foreach ($featured as $feature)
                                <div class="latest-post clearfix">
                                    <div class="post-image">
                                        <img src="{{asset('img/content/latest_post_1.jpg') }}" alt="">
                                    </div>
                                    <h4><a href="/review/biz/{{$feature->id}}">{{$feature->name}}</a></h4>
                                    <p>Check out this great business on Ndibiz.</p>
                                    <a class="read-more" href="/review/biz/{{$feature->id}}"><i class="fa fa-angle-right"></i>View profile</a>
                                </div> <!-- end .latest-post -->
                            @endforeach
                        @endif
                    </div>
                    <!-- RECENTLY ADDED BUSINESSES -->
                    <div class="recently-added">
                        <h2>Recently Added</h2>
                        @if ( ! $recent-> isEmpty() )
                            @foreach ($recent as $new)
                                <div class="latest-post clearfix">
                                    <div class="post-image">
                                        <img src="{{asset('img/content/latest_post_1.jpg') }}" alt="">
                                        <p><span>12</span>Sep</p>
                                    </div>
                                    <h4><a href="/review/biz/{{$new->id}}">{{$new->name}}</a></h4>
                                    <p>Recent Biz added on Ndibiz</p>
                                    <a class="read-more" href="/review/biz/{{$new->id}}"><i class="fa fa-angle-right"></i>View profile</a>
                                </div> <!-- end .latest-post -->
                            @endforeach
                        @endif
                    </div>
                    <!-- AD BAR MEDIUM -->
                    <div class="ad-midi">
                        <h1 class="text-center m5-bttm"> <small>Advertisement</small></h1>
                        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="active item"><img src="../img/content/ad1.png" alt=""></div>
                                <div class="item"><img src="{{asset ('img/content/ad1.jpg')}}" alt=""></div>
                                <div class="item"><img src="{{asset ('img/content/ad1.jpg')}}" alt=""></div>
                            </div>
                        </div>
                    </div>
                    <!-- RECENT REVIEWS -->
                    <div class="recently-added">
                        <h2>Recent Reviews</h2>
                    </div>
                </div>
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
  <script src="{{asset('plugins/nanogallery/jquery.nanogallery.min.js')}}"></script>
  <script src="{{asset('js/dropzone.js')}}"></script>
  <script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('https://maps.googleapis.com/maps/api/js')}}"></script>
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
            $('li:first-child').addClass('active');
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
  </script>
  <script src="{{asset('js/scripts.js')}}"></script>
@endsection
