@extends('master')
<!-- HEAD -->
@section('title', 'Business Profile')
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

     <div id="page-content" class="company-profile page-content">
        <div class="container">
            <div class="home-with-slide business-profile">
                <div class="row">

                    <div class="col-md-8">
                        {{--PROFILE OVERVIEW--}}
                        <div class="row profile-overview">
                             @include('partials.notifications')
                            <div class="col-md-3 col-sm-3">
                                {{--COUNTERS MOBILE--}}
                                <ul class="list-inline user-counter hidden-md hidden-lg hidden-sm">
                                    {{--<li><i class="fa fa-heart"></i> {{$favCount= $biz->favoured->count()}}--}}
                                        {{--{{str_plural('Favourite', $favCount) }}</li>--}}
                                    <li><i class="fa fa-comments"></i>{{$biz->rating_count}}
                                        {{ Str::plural('review', $biz->rating_count)}}</li>
                                    <li><i class="fa fa-camera"></i>{{$photosCount=$biz->photos->count()}}
                                        {{ str_plural('Photo', $photosCount)}} </li>
                                </ul>
                                {{--BIZ NAME MOBILE--}}
                                <h2 class="username hidden-lg hidden-md hidden-sm">{{$biz->name}}</h2>
                                {{--BIZ STARS RATING--}}
                                <ul class=" hidden-lg hidden-md hidden-sm list-inline text-center m5-bttm">
                                    <li>
                                        @for ($i=1; $i <= 5 ; $i++)
                                            <span class="glyphicon glyphicon-star{{ ($i <= $biz->rating_cache) ? '' : '-empty'}}"></span>
                                        @endfor
                                    </li>
                                </ul>
                                {{--PROFILE PHOTO--}}
                                <figure class="center-block">
                                    <div class="profile-pic"><a href="" data-toggle="modal" data-target="#myBizProfile">
                                      {!!Html::image(isset($biz->profilePhoto->image) ? $biz->profilePhoto->image : 'img/content/post-img-10.jpg',
                                        'Profile Image', array('class'=>'img-responsive center-block'))!!}
                                     @if(Auth::check() && (Auth::user()->id == $biz->owner))
                                      <p class="pic-edit">
                                        <i class="mdi-image-camera-alt"></i>
                                         <span>Change Picture</span>
                                      </p>
                                      @endif
                                    </a>
                                    </div>
                                </figure>

                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        {{--BIZ NAME TABLET & DESKTOP--}}
                                        <h2 class="username hidden-xs">{{$biz->name}}</h2>
                                        {{--BIZ STARS RATING--}}
                                        <ul class=" hidden-xs list-inline m5-bttm">
                                            <li>
                                                @for ($i=1; $i <= 5 ; $i++)
                                                    <span class="glyphicon glyphicon-star{{ ($i <= $biz->rating_cache) ? '' : '-empty'}}"></span>
                                                @endfor
                                            </li>
                                        </ul>
                                        {{--CATEGORIES--}}
                                        <p class="biz-profile-cats m5-bttm"><i class="fa fa-tags" style="margin-top:2px;"></i> @foreach($biz->cats as $cat)<span>
                                                <a class="btn btn-border" href="#">{{$cat->name}}</a></span> @endforeach
                                        @foreach($biz->subcats as $sub)<span><a class="btn btn-border" href="#">{{$sub->name}}</a></span>@endforeach</p>
                                        {{--ADDRESS--}}
                                        <p class="biz-profile-address"><i class="fa fa-map-marker"></i> <span>{{$biz->address->street}}
                                            </span>, <span>{{$biz->address->lga->name}}</span>, <span>{{ $biz-> address->state->name}}</span>, Nigeria.</p>
                                        {{--PHONE 1--}}
                                        <p class="biz-profile-phone1"><i class="fa fa-phone"></i> (+234)-{{$biz->address->phone1}}</p>
                                        {{--PHONE 2--}}
                                        <p class="biz-profile-phone2"> <i class="fa fa-phone"></i> (+234)-{{$biz->address->phone2}}</p>
                                        {{--WEBSITE--}}
                                        <p class="biz-profile-site"><i class="fa fa-external-link"></i> <a class="link"
                                           href="{{$biz->website}}" target="_blank">{{$biz->website}}</a></p>
                                        <hr class="hidden-lg hidden-md hidden-sm">
                                        {{--COUNTERS TABLET & DESKTOP--}}
                                        <ul class="list-inline user-counter hidden-xs">
                                            <li><i class="fa fa-heart"></i> {{$favCount= $biz->favoured->count()}}
                                                {{str_plural('Favourite', $favCount) }}</li>
                                            <li><i class="fa fa-comments"></i>{{$biz->rating_count}}
                                                {{ Str::plural('review', $biz->rating_count)}}</li>
                                            <li><i class="fa fa-camera"></i>{{$photosCount=$biz->photos->count()}}
                                                {{ str_plural('Photo', $photosCount)}} </li>
                                        </ul>
                                    </div>
                                    {{--ACTION BUTTONS--}}
                                    <div class="col-md-4 action-btns m0-bttm">
                                        <ul class="list-inline m0-bttm">
                                            @if(Auth::guest())
                                             <a href="/favourites" type="submit" class="btn btn-border not-favorited">
                                            <i class="fa fa-heart"></i>Favourite<span class="badge badge-inverse">
                                                        {{$biz->favoured->count()}}</span></a>
                                              @endif

                                          @if(Auth::check())
                                            <li>
                                                {{--*/ $favourites= Auth::user()->favours->lists('id')->all() /*--}}
                                                {{--*/ $favourited= in_array($biz->id, $favourites) /*--}}
                                                    <form id="favourForm" action="">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                             <input type="hidden" id="bizID" name="biz_id" value="{{$biz->id}}">
                            
                                                        <button type="submit" id="favourBtn" class="btn btn-border {{$favourited ? 'favorited' : 'not-favorited'}}">
                                                        <i class="fa fa-heart"></i>
                                                        {{ $favourited ? 'Unfavourite' : 'Favourite' }}<span class="badge badge-inverse">
                                                        {{$biz->favoured->count()}}</span></button>
                                                    </form>
                                            </li>
                                            @endif
                                            {{--SHARE BUTTON--}}
                                            <li><a title="" data-original-title="" data-placement="bottom" data-toggle="popover" data-container="body" type="button" 
                                                data-html="true" href="#" class="btn btn-border">Share <i class="fa fa-share-alt"></i></a>
                                                <div id="popover-content" class="hide">
                                                  <span class='st_facebook_large' displayText='Facebook'></span>
                                                   <span class='st_twitter_large' displayText='Tweet'></span>
                                                     <span class='st_googleplus_large' displayText='Google +'></span>
                                                </div>                                            
                                            </li>
                                            {{--EDIT PROFILE--}}
                                            <li>
                                                @if(Auth::check() && (Auth::user()->id == $biz->owner))
                                                    <a href="" type="button" class="btn btn-border" data-toggle="tooltip" title="Edit Profile"><i class="fa fa-pencil"></i>
                                                    Edit profile</a>
                                                @endif
                                            </li>

                                             @if(Auth::check())
                                            {{--ADD PHOTO--}}
                                            <li><a href="" type="button" class="btn btn-border" data-toggle="modal" data-target="#myModal" title="Add Photo">
                                                    <i class="fa fa-camera"></i> Add photo</a></li>
                                            @endif
                                            @if(Auth::guest())
                                                    <a href="/profile/photo" type="button" class="btn btn-border">
                                                           <i class="fa fa-camera"></i> Add Photo</a>
                                                    @endif

                                            {{--CLAIM BUSINESS--}}
                                            <li>
                                                @if(! $biz->claimed)
                                                    @if(Auth::check())
                                                        <a href="#" type="button" class="btn btn-border" data-toggle="modal" data-target="#myClaim">
                                                            Claim Business</a>
                                                    @endif
                                                    @if(Auth::guest())
                                                    <a href="/claimbiz" type="button" class="btn btn-border">
                                                            Claim Business</a>
                                                    @endif
                                                @endif
                                            </li>

                                            <li>
                                                @if(Auth::check())
                                                <a href="" type="button" class="btn btn-border" data-toggle="modal" data-target="#reportModal"
                                                title="Report this biz"><i class="fa fa-microphone"></i>Report this biz</a>

                                                @endif
                                                @if(Auth::guest())
                                                <a href="/report" type="button" class="btn btn-border"><i class="fa fa-microphone"></i>Report this 
                                                    biz</a>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
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
                                    <a href="#gallery" role="tab" data-toggle="tab"><i class="fa fa-camera"></i> <span class="">Gallery</span></a>
                                  </li>
                                  <li>
                                    <a href="#contact" role="tab" data-toggle="tab"><i class="fa fa-envelope-o"></i> <span class="">Contact</span></a>
                                  </li>
                                  <li>
                                    <a href="#reviews" role="tab" data-toggle="tab"><i class="fa fa-comments"></i> <span class="">Reviews</span></a>
                                  </li>
                                  @if(Auth::check() && (Auth::user()->id == $biz->owner))
                                  <li>
                                    <a href="#edit" role="tab" data-toggle="tab"><i class="fa fa-building-o"></i> <span class="">Edit Biz</span></a>
                                 </li>
                                 @endif
                                </ul>
                              </div> <!-- end .page-sidebar -->
                            </div> <!-- end .main-grid layout -->
                            {{--TAB CONTENT RIGHT--}}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="tab-content">
                                    {{--GALLERY--}}
                                    <div class="tab-pane active" id="gallery">
                                        <div class="company-product m20-top">
                                          <h3 class="text-uppercase m10-top">Gallery</h3>
                                          <div class="row">
                                                <div id="nanoGallery3">
                                                    @foreach($biz->photos as $photo)
                                                        <a href="{{$photo->path}}" data-ngthumb="{{$photo->path}}" data-ngdesc="Description1">Title Image1</a>
                                                    @endforeach
                                                </div>
                                          </div> <!-- end .row -->
                                        </div> <!-- end .company-product -->
                                    </div> <!-- end .tab-pane -->
                                    {{--CONTACT--}}
                                    <div class="tab-pane" id="contact">
                                        <div class="company-profile company-contact m20-top">
                                              <div class="row">
                                                  <h3 class="text-uppercase m10-top">Contact Us</h3>
                                                    <div class="col-md-6">
                                                        <div class="contact-map-company">
                                                            <div id="map"></div>
                                                        </div> <!-- end .map-section -->
                                                        <div class="address-details clearfix">
                                                            <i class="fa fa-map-marker"></i>
                                                            <p>
                                                                <span>{{$biz->address->street}}</span>
                                                                <span>{{$biz->address->lga->name}}</span>
                                                                <span>{{$biz->address->state->name}}, Nigeria.</span>
                                                            </p>
                                                        </div>
                                                        <div class="address-details clearfix">
                                                            <i class="fa fa-phone"></i>
                                                            <p>
                                                                <span><strong>Phone 1:</strong> {{$biz->phone1}}</span>
                                                                <span><strong>Phone 2:</strong> {{$biz->phone2}}</span>
                                                            </p>
                                                        </div>
                                                        <div class="address-details clearfix">
                                                            <i class="fa fa-envelope-o"></i>
                                                            <p>
                                                                <span><strong>E-mail:</strong> {{$biz->email}}</span>
                                                                <span><strong>Website:</strong> {{$biz->website}}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="opening-hours table-responsive p10 text-center">
                                                            <h3 class="m0 p0"><i class="fa fa-clock-o"></i> Opening Hours</h3>
                                                            <table class="table">
                                                                <tbody>
                                                                <tr><th>Mon:</th>
                                                                    <td> <a class="mon_from" id="{{$mon->id}}">{{$mon->open_time}}</a>AM</td>
                                                                    <td> <a class="mon_to" id="{{$mon->id}}">{{$mon->close_time}}</a>PM</td>
                                                                </tr>
                                                                <tr><th>Tues:</th>
                                                                    <td> <span class="tue_from" id="{{$tue->id}}">{{$tue->open_time}}</span>AM</td>
                                                                    <td> <span class="tue_to" id="{{$tue->id}}">{{$tue->close_time}}</span>PM</td>
                                                                </tr>

                                                                <tr><th>Wed:</th>
                                                                    <td> <span class="wed_from" id="{{$wed->id}}">{{$wed->open_time}}</span>AM</td>
                                                                    <td> <span class="wed_to" id="{{$wed->id}}">{{$wed->close_time}}</span>PM</td></tr>

                                                                <tr><th>Thurs:</th>
                                                                    <td> <span class="thu_from" id="{{$thu->id}}">{{$thu->open_time}}</span>AM</td>
                                                                    <td> <span class="thu_to" id="{{$thu->id}}">{{$thu->close_time}}</span>PM</td></tr>

                                                                <tr><th>Fri:</th>
                                                                    <td> <span class="fri_from" id="{{$fri->id}}">{{$fri->open_time}}</span>AM</td>
                                                                    <td> <span class="fri_to" id="{{$fri->id}}">{{$fri->close_time}}</span>PM</td></tr>

                                                                <tr><th>Sat:</th>
                                                                    <td> <span class="sat_from" id="{{$sat->id}}">{{$sat->open_time}}</span>AM</td>
                                                                    <td> <span class="sat_to" id="{{$sat->id}}">{{$sat->close_time}}</span>PM</td></tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                              </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3>Send Us A Message</h3>
                                                    <form class="comment-form">
                                                <div class="row">
                                                  <div class="col-md-4">
                                                    <input type="text" placeholder="Name *" required>
                                                  </div>
                                                  <div class="col-md-4">
                                                    <input type="email" placeholder="Email *" required>
                                                  </div>
                                                  <div class="col-md-4">
                                                    <input type="url" placeholder="Website">
                                                  </div>
                                                </div>
                                                <textarea placeholder="Your Comment ..." required></textarea>
                                                <button type="submit" class="btn btn-default"><i class="fa fa-envelope-o"></i> Send Message</button>
                                              </form>
                                                </div>
                                            </div>
                                        </div> <!-- end .company-contact -->
                                    </div> <!-- end .tab-pane -->
                                    {{--REVIEWS--}}
                                    <div class="tab-pane" id="reviews">
                                         <div class="company-ratings m20-top">
                                            <h3 class="text-uppercase m10-top">Reviews (5 star ratings)</h3>
                                            <div class="rating-with-details">
                                                <div class="ratings">
                                                    <p class="pull-right">{{$ratingCount=$biz->rating_count}} {{ Str::plural('Review', $ratingCount)}}</p>
                                                    <p>
                                                        @for ($i=1; $i <= 5 ; $i++)
                                                          <span class="glyphicon glyphicon-star{{ ($i <= $biz->rating_cache) ? '' : '-empty'}}"></span>
                                                        @endfor
                                                        {{ number_format($biz->rating_cache, 1)}} stars
                                                    </p>
                                                </div>
                                                <div class="container">
                                                     <div class="row" style="margin-top:40px;">
                                                       <div class="col-md-6">
                                                         <div class="well well-sm">
                                                            <div class="text-right">
                                                                <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
                                                            </div>
                                                            <div class="row" id="post-review-box" style="display:none;">
                                                              <div class="col-md-12">
                                                                 <form accept-charset="UTF-8" method="POST" action="/review/biz/{{$biz->id}}">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <input id="ratings-hidden" name="rating" type="hidden" value="{{old('rating')}}">
                                                                    <textarea class="form-control animated" cols="50" id="new-review" name="comment"
                                                                              value="{{old('comment')}}" placeholder="Enter your review here..." rows="5">
                                                                    </textarea>
                                                                     <div class="text-right">
                                                                         <div class="stars starrr" data-rating="0"></div>
                                                                            <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                                                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                                                                            <button class="btn btn-success btn-sm" type="submit">Save</button>
                                                                     </div>
                                                                 </form>
                                                              </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                     </div>
                                                </div>
                                                @include('admin.partials.errors')
                                                @include('admin.partials.success')
                                                @foreach($reviews as $review)
                                                    <hr>
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
                                                          <a href="#"><strong>{{$review->user->username  }}</strong></a>
                                                          - {{ $review->timeago}}
                                                        </div>
                                                        <div class="content">
                                                          <p>{{$review->comment}}</p>
                                                        </div>
                                                      </div>
                                                </div> <!-- end .single-content -->
                                            @endforeach
                                            {!! $reviews->render() !!}
                                         </div> <!-- end .rating-with-details -->
                                     </div> <!-- end .company-rating -->
                                    </div>
                                    <div class="tab-pane" id="edit">
                          <div class="company-ratings">
                              <h3 class="text-uppercase m10-top">Edit Biz Profile</h3>
                              <div class="rating-with-details">
                                  @include('admin.partials.errors')
                                  <form class="form-horizontal" role="form" method="POST" action="/biz/{{$biz->id}}">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <input type="hidden" name="_method" value="PUT">
                                      <input type="hidden" name="id" value="{{$biz->id}}">
                                      <div class="form-group">
                                          <label for="cat" class="col-md-3 control-label">Business Name</label>
                                          <div class="col-md-8">
                                              <input required="required" type="text" value="{{ $biz->name}}" id="name" name="name"
                                                 class="form-control" placeholder="name">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="cat" class="col-md-3 control-label">Business Description</label>
                                          <div class="col-md-8">
                                              <input required="required" type="text" value="{{ $biz->description}}" id="description" name="description"
                                                 class="form-control" placeholder="description">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="cat" class="col-md-3 control-label">Business tagline</label>
                                          <div class="col-md-8">
                                              <input required="required" type="text" value="{{ $biz->tagline}}" id="tagline" name="tagline"
                                                 class="form-control" placeholder="business slogan/tagline">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="email" class="col-md-3 control-label">Business Address</label>
                                          <div class="col-md-8">
                                              <input type="text" id="address" value="{{ $biz->address->street}}" name="address" class="form-control"
                                                     placeholder="Business Address">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="email" class="col-md-3 control-label">Business Email</label>
                                          <div class="col-md-8">
                                              <input type="email" id="email" value="{{ $biz->address->email}}" name="email" class="form-control"
                                                     placeholder="Business Email">
                                          </div>
                                      </div>
                                      
                                      <div class="form-group">
                                            <label for="cat" class="col-md-3 control-label">Business state</label>
                                            <div class="col-md-8">
                                                @if($state=$biz->address->state)@endif
                                                 {!!Form::select('state', $stateList, $state->name, ['class'=>'form-control','id'=>'stateList',
                                                    'placeholder'=>'select state']) !!}
                                            </div>
                                     </div>

                                     {{--REGION--}}
                                    <div class="form-group">
                                            <label for="image_class" class="col-md-3 control-label">
                                                 Create Region/area</label>
                                           <div class="col-md-8">
                                                 {!!Form::select('lga[]', $state->lgas->lists('name','id'), $biz->address->lga_id,
                                                  ['class'=>'form-control','id'=>'lga','placeholder'=>'Edit Regions','multiple']) !!}
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
                    {{--MAIN CONTENT ENDS--}}
                    {{--SIDEBAR RIGHT--}}
                    <div class="col-md-4">
                    @include('includes.sidebar')
                    </div>
                </div>
            </div>  <!-- end .home-with-slide -->
        </div> <!-- end .container -->
     </div> <!-- end #page-content -->

    {{--CLAIM BUSINESS FORM MODAL--}}
    @if(Auth::check())
    <div class="modal fade" id ="myClaim" tabindex= "-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class = "modal-dialog">
            <div class = "modal-content">
                <div class="modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                    <h4 class = "modal-title" id = "myModalLabel">
                        <h3> Claim this business to Manage it</h3>
                    </h4>
                </div>
                <div class="modal-body">
                     @include('admin.partials.errors')
                    <p>Enter your details below(You must be the business owner or staff of the company to own this business)</p>
                    {!! Form::open( array('url' =>'/claimbiz/'.$biz->id, 'files'=> true, 'method'=>'post')) !!}
                    {!!Form::hidden('biz_id', $biz->id) !!}
                    <div class="form-group">
                        <div class="col-md-5">Full Name</div>
                        <div class="col-md-7">
                            <input required type="text" id="fullname" name="fullname" class="form-control" placeholder="Full name" value="{{ old('name')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5">Email Address</div>
                        <div class="col-md-7">
                             <input required type="text" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('address')}}">
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-5">Are you the owner of this business?</div>
                      <div class="col-md-7"><input type="radio" name="ownership" value="YES">YES
                        <input type="radio" name="ownership" value="NO">NO
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5">If Owner, can you please upload a document showing evidences of your ownership</div>
                        <div class="col-md-5">
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
                    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>
                    {!!Form::submit('Submit', array('class' => 'btn btn-primary btn-sm') ) !!}
               {!! Form::close() !!}
           </div>
                <div class="modal-footer"></div>
            </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    @endif

     {{--Report Modal--}}
    <div class="modal fade" id="reportModal" tabindex ="-1" role ="dialog" aria-labelledby="myReportModal" aria-hidden ="true" >
        <div class = "modal-dialog">
            <div class = "modal-content">
               <div class = "modal-header">
                  <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                  <h3 class = "modal-title" id = "myModalLabel">Report This Biz</h3>
               </div>
               <div class = "modal-body">
                    <div class="container-fluid">
                        {!! Form::open( array('url' =>'/reportBiz','method'=>'post')) !!}
                        {!!Form::hidden('id', $biz->id)!!}
                            <div class="panel panel-default text-center">
                                <div class="panel-heading">
                                    <h2 class="panel-title">Report this biz</h2>
                                    @if (Session::get('errors'))
                                    <div class="alert alert-error alert-danger"><a name="error">{{{ Session::get('errors') }}}</a></div>
                                    @endif
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-md-5">What are you reporting?</div>
                                        <div class="col-md-7">
                                            <select name="complaint">
                                                 <option value="wrong business details">wrong business details</option>
                                                 <option value="business does not exists">business does not exists</option>
                                                 <option value="i want to own this business">i want to own this business</option>
                                                 <option value="other reasons">other reasons</option>
                                            </select>
                                        </div>
                                 </div>
                                 <br/>

                                 <div class="form-group">
                                        <div class="col-md-5">Explain your reason</div>
                                        <div class="col-md-7">
                                            <textarea name="explain" rows="5" required>
                                            </textarea>
                                        </div>
                                 </div>
                                 <br></br>

                                 <div class="form-group">
                                        <div class="col-md-5">Email address</div>
                                        <div class="col-md-7">
                                            <input type="email" class="form-control" name="email" placeholder="Enter email address to contact you!!!" id="email" required/>
                                        </div>
                                 </div>
                                </div>
                                <div class="panel-footer">
                                    <span>{!!Form::submit('Submit', array('class' => 'btn btn-primary btn-sm') ) !!}</span>
                                </div>
                            </div>
                        {!!Form::close() !!}
                    </div>
               </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    

    {{--BUSINESS LOGO--}}
    <div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
        <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Uploaded Business Profile Photos</h4>
               </div>
               <div class="modal-body">
                   <h3>Add new Photos</h3>
                   <form id="uploadFile2" action="" method="POST" class="dropzone">
                    {{csrf_field()}}
                   </form>
               </div>
               <div class = "modal-footer">
                 <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>
               </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    {{--BUSINESS PICTIURES--}}
    <div class = "modal fade" id = "myBizProfile" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true" >
        <div class = "modal-dialog">
            <div class = "modal-content">
               <div class = "modal-header">
                  <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                  <h3 class = "modal-title" id = "myModalLabel">Upload Biz Profile Photo</h3>
               </div>
               <div class = "modal-body">
                    <div class="container-fluid">
                        {!! Form::open( array('url' =>'/bizprofile/'.$biz->id.'/photo', 'files'=> true, 'method'=>'post')) !!}
                        {!!Form::hidden('id', $biz->id)!!}
                            <div class="panel panel-default text-center">
                                <div class="panel-heading">
                                    <h2 class="panel-title">Add Biz Profile Photo</h2>
                                    @if (Session::get('errors'))
                                    <div class="alert alert-error alert-danger"><a name="error">{{{ Session::get('errors') }}}</a></div>
                                    @endif
                                    @if (Session::get('notices'))
                                    <div class="alert"><a name="notice">{{{ Session::get('notices') }}}</a></div>
                                    @endif
                                </div>
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
                                <div class="panel-footer">
                                    <span>{!!Form::submit('Submit', array('class' => 'btn btn-primary btn-sm') ) !!}</span>
                                </div>
                            </div>
                        {!!Form::close() !!}
                    </div>
               </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

<!-- FOOTER STARTS -->
    @section('footer')
        @include('includes.footer')
    @endsection
<!-- FOOTER ENDS -->

@section('scripts')
    <script src="{{asset('plugins/nanogallery/jquery.nanogallery.min.js')}}"></script>
    <script src="{{asset('js/dropzone.js')}}"></script>
    <script src="{{asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>

    @if(!empty(Session::has('error_code')) && Session::get('error_code') == 5)
    <script type="text/javascript">
        $(function() {
         $('#myClaim').modal('show');
            });
    </script>
    @endif

    @if(Session::has('success_code') && Session::get('success_code') == 220)
    <script type="text/javascript">
    $(function() {
        swal({ title: "Success!", 
                text: "{{ Session::get('report')}}",
                type: "success"
            });
    });
    </script>
    @endif

    @if(Session::has('success_code') && Session::get('success_code') == 230)
    <script type="text/javascript">
    $(function() {
        swal({ title: "Success!", 
                text: "{{ Session::get('success_claim')}}",
                type: "success"
            });
    });
    </script>
    @endif

     {{--DROPZONE--}}
    <script type="text/javascript">
        $(document).ready(function() {
            Dropzone.autoDiscover = false;
            $(document).on('click','#myClaim',function(){
                var myDropzone = new Dropzone("form#uploadFile", { url: "/profile/upload", autoProcessQueue: true});
            });
            $(document).on('click','#myModal',function(){
                var myDropzone = new Dropzone("form#uploadFile2", { url: "/biz/{{$biz->id}}/upload", autoProcessQueue: true});
            });

            $('#favourForm').submit(function() {                
              var biz_id= $('#bizID').val();
              
              $.ajax({ url: "{{ URL::to('/favourites')}}",
                    data: {biz_id: biz_id},
                    dataType: 'json',
                    type: 'post',
                 success: function(output) {
                     $.each(output.data, function(){
                        if(this.id==0){
                            console.log(this.text);
                            $('#favourBtn').empty().html('<button id="favourBtn" type="submit" class="btn btn-border favorited"><i class="fa fa-heart"></i>favourite<span class="badge badge-inverse">' +this.count+ '</span></button>');
                      }

                        if(this.id==1){
                         console.log(this.text);
                      $('#favourBtn').empty().html('<button id="favourBtn" type="submit" class="btn btn-border not-favorited"><i class="fa fa-heart"></i>Unfavourite <span class="badge badge-inverse">' + this.count + '</span></button>');
                      }

                  });
                     
                         }
                });

               return false;
                }); // end submit()
        });
        
        {{--SET ACTIVE TAB ON RELOAD--}}
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
        {{--GOOGLE MAPS--}}
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
        {{--SET ACTIVE TAB--}}
//        $(document).ready(function() {
//            $('li:first-child').addClass('active');
//            //  $('.tab-pane:first-child ').addClass('active');
//        });
        {{--NANOGALLERY--}}
        $(document).ready(function () {
            $("#nanoGallery3").nanoGallery({
                itemsBaseURL:"{{asset('/')}}",
                thumbnailHoverEffect:'imageScale150',
                thumbnailHeight:100,
                thumbnailWidth: 150
            });
        });
        //REVIEW BOX
        $(function(){
            $('#new-review').autosize({append: "\n"});
            var reviewBox = $('#post-review-box');
            var newReview = $('#new-review');
            var openReviewBtn = $('#open-review-box');
            var closeReviewBtn = $('#close-review-box');
            var ratingsField = $('#ratings-hidden');
            openReviewBtn.click(function(e)
            {
                reviewBox.slideDown(400, function()
                {
                    $('#new-review').trigger('autosize.resize');
                    newReview.focus();
                });
                openReviewBtn.fadeOut(100);
                closeReviewBtn.show();
            });
            closeReviewBtn.click(function(e)
            {
                e.preventDefault();
                reviewBox.slideUp(300, function()
                {
                    newReview.focus();
                    openReviewBtn.fadeIn(200);
                });
                closeReviewBtn.hide();
            });
            $('.starrr').on('starrr:change', function(e, value){
                ratingsField.val(value);
            });
        });
            (function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

            var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

            $(document).ready(function() {
             $("#stateList").select2({
                 tags: true
                });
                });

         $(document).ready(function() {
             $("#lga").select2({
             tags: true
            });
         });
    </script>
    <!-- FB PLUGIN JAVASCRIPT CODE -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=221153544678812";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- ./ FB PLUGIN -->
    <!-- Sharing plugin -->
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options(
                {publisher: "462b8e41-098f-4d6e-af7f-52472fed576a", doNotHash: false,
                    doNotCopy: false, hashAddressBar: true, displayText: "27Colours"});
    </script>
    <script>
        $("[data-toggle=popover]").popover({
            html: true,
            content: function() {
                return $('#popover-content').html();
            }
        });
    </script>
    {{--CUSTOM PAGE SCRIPTS ENDS--}}
    <script src="{{asset('js/scripts.js')}}"></script>
@endsection
