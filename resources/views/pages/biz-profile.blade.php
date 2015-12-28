@extends('master')
<!-- HEAD -->
@section('title', 'Business Profile')
@section('stylesheets')
   <link  rel="stylesheet" href="{{asset('css/dropzone.css')}}">
    <link  rel="stylesheet" href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('../plugins/nanogallery/css/nanogallery.min.css')}}">
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
            @include('partials.notifications')
            <div class="home-with-slide business-profile">
                <div class="row">
                    {{--MAIN CONTENT--}}
                    <div class="col-md-8">
                        {{--PROFILE OVERVIEW--}}
                        <div class="row profile-overview">
                             @include('partials.notifications')
                            <div class="col-md-3 col-sm-3">
                                {{--COUNTERS MOBILE--}}
                                <ul class="list-inline user-counter hidden-md hidden-lg hidden-sm">
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
                                    <div class="profile-pic">
                                      {!!Html::image(isset($biz->profilePhoto->image) ? $biz->profilePhoto->image : 'img/company.png',
                                        'Profile Image', array('class'=>'img-responsive center-block'))!!}
                                        <a href="" data-toggle="modal" data-target="#myBizProfile">
                                            @if(Auth::check() && (Auth::user()->id == $biz->owner))
                                                <p class="pic-edit">
                                                    <i class="mdi-image-camera-alt"></i>
                                                    <span class="text-uppercase">Change Picture</span>
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
                                                <a class="btn btn-border" href="/biz/cat/{{$cat->id}}">{{$cat->name}}</a></span> @endforeach
                                        @foreach($biz->subcats as $sub)<span><a class="btn btn-border" href="/biz/subcat/{{$sub->id}}">{{$sub->name}}</a></span>@endforeach</p>
                                        {{--ADDRESS--}}
                                        <p class="biz-profile-address"><i class="fa fa-map-marker"></i> <span>{{$biz->address->street}}
                                            </span>, <span>{{$biz->address->lga->name}}</span>, <span>{{ $biz-> address->state->name}}</span>, Nigeria.</p>
                                        {{--PHONE 1--}}
                                        <p class="biz-profile-phone1"><i class="fa fa-phone"></i> (+234)-{{$biz->phone1}}</p>
                                        {{--PHONE 2--}}
                                        <p class="biz-profile-phone2"> <i class="fa fa-phone"></i> (+234)-{{$biz->phone2}}</p>
                                        {{--WEBSITE--}}
                                        <p class="biz-profile-site"><i class="fa fa-external-link"></i> <a class="link"
                                           href="{{$biz->website}}" target="_blank">{{$biz->website}}</a></p>
                                        <hr class="hidden-lg hidden-md hidden-sm">
                                        {{--COUNTERS TABLET & DESKTOP--}}
                                        <ul class="list-inline user-counter hidden-xs">
                                            {{--<li><i class="fa fa-heart"></i> {{$favCount= $biz->favoured->count()}}--}}
                                                {{--{{str_plural('Favourite', $favCount) }}</li>--}}
                                            <li><i class="fa fa-comments"></i>{{$biz->rating_count}}
                                                {{ Str::plural('review', $biz->rating_count)}}</li>
                                            <li><i class="fa fa-camera"></i>{{$photosCount=$biz->photos->count()}}
                                                {{ str_plural('Photo', $photosCount)}} </li>
                                        </ul>
                                    </div>
                                    {{--ACTION BUTTONS--}}
                                    <div class="col-md-4 action-btns m0-bttm">
                                        <ul class="list-inline m0-bttm">
                                            {{--FAVOURITES BUTTON--}}
                                            @if(Auth::check() && (Auth::user()->id !== $biz->owner))
                                            <li>
                                                @if($favourited=in_array($biz->id, $favourites))
                                                    <form method="POST" action ="/favourites/{{ $biz->id}}">
                                                        {!! csrf_field() !!}
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        @else
                                                            <form method="POST" action="/favourites">
                                                                {!! csrf_field() !!}
                                                                <input type="hidden" name="biz_id" value="{{$biz->id}}">
                                                                @endif
                                                                <button type="submit" class="btn btn-border {{ $favourited ? 'favorited' : 'not-favorited' }}">
                                                                    <i class="fa fa-heart"></i>{{ $favourited ? 'Unfavourite' : 'Favorite' }}</button>
                                                            </form>
                                                    </form>
                                            </li>
                                            @endif
                                            {{--SHARE BUTTON--}}
                                            {{--<li><a href="" type="button" class="btn btn-border"><i class="fa fa-share-alt"></i> Share</a></li>--}}
                                            <li>
                                                <button type="button" id="btn-share" class="btn btn-border popover-html" data-container="body"
                                                        data-toggle="popover" data-placement="top">
                                                  <span>
                                                    <i class="fa fa-share-square-o"></i>
                                                    <strong>Share</strong>
                                                  </span>
                                                </button>
                                                <!-- Popover hidden content -->
                                                <span id="bizShare" class="hidden">
                                                  <a target="_blank" href="#" class="btn-media twitter text-center">
                                                      <i class="fa fa-twitter"></i>
                                                  </a>
                                                  <a target="_blank" href="#" class="btn-media facebook">
                                                      <i class="fa fa-facebook"></i>
                                                  </a>
                                                  <a target="_blank" href="#" class="btn-media google-plus">
                                                      <i class="fa fa-google-plus"></i>
                                                  </a>
                                                </span>
                                            </li>
                                            {{--EDIT PROFILE--}}
                                            @if(Auth::check() && (Auth::user()->id == $biz->owner))
                                            <li>
                                                <a href="" type="button" class="btn btn-border" data-toggle="tooltip" title="Edit Profile"><i class="fa fa-pencil"></i>
                                                    Edit profile</a>
                                            </li>
                                            {{--ADD PHOTO--}}
                                            <li><a href="" type="button" class="btn btn-border" data-toggle="modal" data-target="#myModal" title="Add Photo">
                                                    <i class="fa fa-camera"></i> Add photo</a>
                                            </li>
                                            @endif
                                            {{--CLAIM BUSINESS--}}
                                            <li>
                                                @if(! $biz->claimed)
                                                    <a href="#" type="button" class="btn btn-border" data-toggle="modal" data-target="#myClaim">
                                                            Claim Business</a>
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
                                  <li class=""><a href="#gallery" role="tab" data-toggle="tab"><i class="fa fa-camera"></i> <span class="">Gallery</span></a></li>
                                  <li><a href="#contact" role="tab" data-toggle="tab"><i class="fa fa-envelope-o"></i> <span class="">Contact</span></a></li>
                                    <li><a href="#reviews" role="tab" data-toggle="tab"><i class="fa fa-comments"></i> <span class="">Reviews</span></a></li>
                                    <li><a href="#edit" role="tab" data-toggle="tab"><i class="fa fa-comments"></i> <span class="">Edit Profile</span></a></li>
                                </ul>
                              </div> <!-- end .page-sidebar -->
                            </div> <!-- end .main-grid layout -->
                            {{--TAB CONTENT RIGHT--}}
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="tab-content">
                                    {{--GALLERY--}}
                                    <div class="tab-pane" id="gallery">
                                        <div class="company-product m20-top">
                                          <h3 class="text-uppercase m10-top">Gallery</h3>
                                          <div class="row">
                                                <div id="nanoGallery3">
                                                    @foreach($biz->photos as $photo)
                                                        <a href="{{$photo->path}}" data-ngthumb="{{$photo->path}}" data-ngdesc="Description1">
                                                            Title Image1
                                                        </a>
                                                        {{--<button><i class="fa fa-trash"></i></button>--}}
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
                                                    <div class="col-md-12">
                                                      <div class="row">
                                                       {{--MAP--}}
                                                       <div class="col-md-6">
                                                        <div id="location2" class="contact-map-company">
                                                            {{--<div id="floating-panel">--}}
                                                                {{--<input id="address" type="textbox" value="{{$biz->address->lga->name}}, {{$biz->address->state->name}}">--}}
                                                                {{--<input id="submit" type="button" value="Geocode">--}}
                                                            {{--</div>--}}
                                                            <div id="map2"></div>
                                                        </div> <!-- end .map-section -->
                                                       </div>
                                                       {{--OPENING TIMES--}}
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
                                                    </div>
                                                    {{--ADDRESS--}}
                                                    <div class="col-md-12">
                                                        <div class="address-details clearfix">
                                                            <i class="fa fa-map-marker"></i>
                                                            <p>
                                                                <span>{{$biz->address->street}}, {{$biz->address->lga->name}}</span>
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
                                    {{--EDIT PROFILE--}}
                                    <div class="tab-pane" id="edit">
                                        <div class="company-ratings m20-top">
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
                                                        <input required type="text" value="{{$biz->address->street}}" id="address" name="address"
                                                               class="form-control" placeholder="Ajose Adeogun street">
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
                                                        <input type="text" id="website" value="{{ $biz->website}}" name="website" class="form-control"
                                                               placeholder="www.pattsbar.com.ng">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cat" class="col-md-3 control-label">Business Email Address</label>
                                                    <div class="col-md-8">
                                                        <input type="email" id="email" value="{{ $biz->email}}" name="email" class="form-control"
                                                               placeholder="info@pattsbar.com.ng">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cat" class="col-md-3 control-label">Contact Name</label>
                                                    <div class="col-md-8">
                                                        <input type="text" id="contactname" value="{{ $biz->contactname}}" name=" contactname"
                                                               class="form-control" placeholder="Mr Patt" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cat" class="col-md-3 control-label">Phone number 1</label>
                                                    <div class="col-md-8">
                                                        <input type="text" id="contact" value="{{ $biz->phone1}}" name="phone1" class="form-control"
                                                               placeholder="Phone number 1">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cat" class="col-md-3 control-label">Phone number 2</label>
                                                    <div class="col-md-8">
                                                        <input type="text" value="{{ $biz->phone2}}" id="contact" name="phone2"class="form-control"
                                                               placeholder="Phone number 2">
                                                    </div>
                                                </div>
                                                <div class="col-md-7 col-md-offset-3">
                                                    <ul class="list-inline">
                                                        <li><button type="submit" class="btn btn-default btn-md">
                                                            <i class="fa fa-save"></i>
                                                            Save Changes
                                                        </button></li>
                                                        <li><button type="button" class="btn btn-default-inverse btn-md"
                                                                data-toggle="modal" data-target="#modal-delete">
                                                            <i class="fa fa-times-circle"></i>
                                                            Remove Business
                                                        </button></li>
                                                    </ul>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- end .tab-content -->
                            </div> <!-- end .main-grid layout -->
                        </div> <!-- end .row -->
                    </div>
                    {{--MAIN CONTENT ENDS--}}
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
            </div>  <!-- end .home-with-slide -->
        </div> <!-- end .container -->
     </div> <!-- end #page-content -->
    {{--CLAIM BUSINESS FORM MODAL--}}
    <div class="modal fade" id = "myClaim" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
        <div class = "modal-dialog">
            {!!Form::open( array('url' =>'/claimbiz/'.$biz->id, 'files'=> true, 'method'=>'post'))!!}
            {!!Form::hidden('id', $biz->id)!!}
            <div class = "modal-content">
                <div class="modal-header">
                    <h4 class="modal-title p0-bttm m0-bttm" id="myModalLabel">
                        Claim this business to Manage it </h4>
                        <p>To manage this business on Beazea Directory, verify the information below.</p>
                </div>
                <div class="modal-body">
                    {{--<p>Enter your details below(You must be the business owner or staff of the company to own this business)</p>--}}

                    <div class="biz-info">
                        <h5 class="m0 p0 text-uppercase"><strong>Business Info:</strong></h5>
                        <p class="m0 p0 text-capitalize"><span class="text-uppercase">Business Name:</span> {{$biz->name}}</p>
                        <p class="m0 p0 text-capitalize"><span class="text-uppercase">Location:</span> {{$biz->address->state->name}}</p>
                        <p class="m0 p0 text-capitalize"><span class="text-uppercase">Phone Number:</span> (+234)-{{$biz->phone1}}</p>
                    </div>
                    <br>
                    <div class="claimer-info">
                        <h5 class="m0 p0 text-uppercase"><strong>Claimer Info: </strong></h5>
                        <p class="m0 p0 text-capitalize"><span class="text-uppercase">Name:</span> Username</p>
                        <p class="m0 p0 text-capitalize"><span class="text-uppercase">Email:</span> User Email</p>
                    </div>
                    <br>
                    {{--<div class="form-group">--}}
                        {{--<div class="col-md-5">Full Name</div>--}}
                        {{--<div class="col-md-7">--}}
                            {{--<input required type="text" id="name" name="name" class="form-control" placeholder="Full name" value="{{ old('name')}}">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<div class="col-md-5">Email Address</div>--}}
                        {{--<div class="col-md-7">--}}
                             {{--<input required type="text" id="address" name="address" class="form-control" placeholder="Email" value="{{ old('address')}}">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-group">
                      <div class="checkbox">
                          <label><input type="checkbox" value=""> I am authorised to manage the profile of this business and I agree to the
                              <a class="link" href="#">Terms & Conditions</a></label>
                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">If Owner or Authorised staff, kindly upload a document showing evidences of your ownership/authorisation (*Optional)</div>
                        <div class="col-md-12">
                            <div class="center-block fileinput fileinput-new" data-provides="fileinput">
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
                </div>
                <div class="modal-footer">
                    <ul class="list-inline">
                        <li><button type="submit" class="btn btn-default">Claim now</button></li>
                        <li><button type="button" class="btn btn-default-inverse" data-dismiss="modal">Close</button></li>
                    </ul>
                </div>
            </div><!-- /.modal-content -->
            {!!Form::close()!!}
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
    <script type="text/javascript" src="{{asset('../plugins/nanogallery/jquery.nanogallery.min.js')}}"></script>
    <script src="{{asset('js/dropzone.js')}}"></script>
    <script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyDx7umcXDlgwqLPXkusQQ538yOq6FunvGA&signed_in=true&callback=initMap') }}" async defer></script>
    {{--CUSTOM PAGE SCRIPTS--}}
    <script>
        {{--GOOGLE MAPS--}}
       function initMap() {
            var map2 = new google.maps.Map(document.getElementById('map2'), {
                zoom: 5,
//                center: {lat: 6.5481425, lng: 3.1173043}
                center: {lat: 9.0611087, lng: 4.1770644}
            });
           var geocoder = new google.maps.Geocoder();

//           getElementById('address')
           document.addEventListener('load', function() {
               geocodeAddress(geocoder, map2);
           });
        }
        function geocodeAddress(geocoder, resultsMap) {
            var address = document.getElementById('address').value;
            geocoder.geocode({'address': address}, function(results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    resultsMap.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>
    <script type="text/javascript">
            {{--SOCIAL SHARE--}}
            $(document).ready(function() {
            $("#btn-share").popover({
                html : true,
                container : '#btn-share',
                content: function() {
                    return $('#bizShare').html();
                },
                template: '<div class="popover" role="tooltip"><div class="popover-content"></div></div>'
            });
            $(document).click(function (event) {
                // hide share button popover
                if (!$(event.target).closest('#btn-share').length) {
                    $('#btn-share').popover('hide')
                }
            });
            $("a.twitter").attr("href", "https://twitter.com/home?status=" + window.location.href);
            $("a.facebook").attr("href", "https://www.facebook.com/sharer/sharer.php?u=" + window.location.href);
            $("a.google-plus").attr("href", "https://plus.google.com/share?url=" + window.location.href);
            {{--DROPZONE--}}
            $(document).ready(function() {
                Dropzone.autoDiscover = false;
                $(document).on('click','#myClaim',function(){
                    var myDropzone = new Dropzone("form#uploadFile", { url: "/profile/upload", autoProcessQueue: true});
                });
                $(document).on('click','#myModal',function(){
                    var myDropzone = new Dropzone("form#uploadFile2", { url: "/biz/{{$biz->id}}/upload", autoProcessQueue: true});
                });
            });
        });
        //SET ACTIVE TAB ON RELOAD
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
        {{--NANOGALLERY--}}
        $(document).ready(function () {
            $("#nanoGallery3").nanoGallery({
                itemsBaseURL:"{{asset('/')}}",
                thumbnailHoverEffect:'imageScale150',
                thumbnailHeight:200,
                thumbnailWidth: 250
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

    </script>
    {{--CUSTOM PAGE SCRIPTS ENDS--}}
    <script src="{{asset('js/xeditable.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
@stop
