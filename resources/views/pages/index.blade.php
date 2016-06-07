@extends('master')
        <!-- HEAD -->
@section('title', 'Home')
@section('stylesheets')
<link href="{{asset('css/sweetalert.css')}}" rel="stylesheet">
@endsection
        <!-- HEADER -->
<!-- search -->
{{--@section('search')--}}
{{--@include('partials.search')--}}
{{--@endsection--}}
<!-- slider -->
@section('slider')
    <div id="homepage" class="slider-content">
        <div id="home-slider" class="">
            <div class="item">
                <img src="{{asset('img/content/preview.jpg')}}" alt="">
                <div class="slide-content">
                    <div class="lp-content">
                        <h1 class="text-center page-title hidden-xs m5-bttm"> {{$settings->title1}} <br>
                            <p style="min-height: 55px;font-weight: 200;" class="m5-bttm"><span class="rotate">
                            <span>{{$settings->span1}}</span>
                            <span>{{$settings->span2}}</span>
                            <span>{{$settings->span3}}</span>
                            <span>{{$settings->span4}}</span>
                            <span>{{$settings->span5}}</span>
                    </span></p>
                        </h1>
                        <h1 class="page-title hidden-lg hidden-md hidden-sm m5-bttm">{{$settings->title2}}</h1>
                        <h3 class="page-subtitle m5-top">{{$settings->subtitle}}</h3>
                        <div class="col-md-offset-2 col-sm-offset-1 col-md-8 col-sm-10 col-lg-offset-3 col-lg-6">
                            {!!Form::open(['method'=> 'POST', 'url'=>'/search/business', 'class'=>'']) !!}
                            {{--Keyword Search--}}
                            <ul class="list-inline search-bar">
                                <li class="">
                                    <select type="text" required="required" aria-label="category" class="" id="category" name="category"
                                            placeholder="Type a Keyword..."></select>
                                </li>
                                {{--Location Search--}}
                                <li class="location-search">
                                    <select type="text" required="required" class="" id="location" name="location" placeholder="Select a Location"></select>
                                    {{--Search Button mobile--}}
                                    <button class="btn btn-default-inverse hidden-lg hidden-md hidden-sm" type="submit"> <i class="fa fa-search"></i> </button>
                                </li>
                                {{--Search Button desktop--}}
                                <button class="btn btn-default-inverse hidden-xs" type="submit">Search <i class="fa fa-search"></i> </button>

                            </ul>
                            {!!Form::close() !!}
                            {{--<form class="navbar-form" role="search">--}}
                                {{--<div class="input-group input-group-lg stylish-input-group2">--}}
                                    {{--<input type="text" class="form-control"  placeholder="Search Businesses" >--}}
                                    {{--<span class="input-group-addon">--}}
                                        {{--<button type="submit">--}}
                                            {{--<span class="fa fa-search"></span>--}}
                                        {{--</button>--}}
                                    {{--</span>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        </div>
                        {{--<h1 class="clearfix"><a class="btn btn-default btn-lg" href="/businesses"><i class="fa fa-plus-square"></i> Explore Businesses</a></h1>--}}
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- END .slider-content -->
@endsection
            <!-- navigation -->
@section('mobile-header')
    @include('includes.mobile-header')
@endsection
            <!-- CONTENT -->
@section('content')
    @include('partials.notifications')
    {{--Featured Businesses--}}
    <section id="page-content" class="home-slider-content">
        <div class="container">
            <div class="home-with-slide category-listing">
                <h3 class="section-title m0 p0"><strong>Featured</strong> Businesses</h3>
                <p class="section-subtitle text-color-grey444 m0-bttm">Explore featured businesses.</p>
                <div class="row featured-category">
                    @unless ( $featured->isEmpty() )
                        @foreach($featured as $biz)
                            <div class="col-md-3 col-sm-4">
                                <div class="single-product">
                                    <figure>
                                        <img src="{{isset($biz->profilePhoto->image) ? asset($biz->profilePhoto->image) :
                                               asset('img/content/office.png') }}" alt="">
                                        <div class="rating">
                                            <ul class="list-inline">
                                                <li>
                                                    @for ($i=1; $i <= 5 ; $i++)
                                                        <span class="glyphicon glyphicon-star{{ ($i <= $biz->rating_cache) ? '' : '-empty'}}"></span>
                                                    @endfor
                                                </li>
                                            </ul>
                                            <p class="">{{$biz->rating_count}} {{ Str::plural('review', $biz->rating_count)}}</p>
                                        </div>
                                    </figure>
                                    <h4><a href="/biz/profile/{{$biz->slug}}/{{$biz->id}}">{{$biz->name}}</a></h4>
                                    <p class="biz-tagline m10-bttm text-left">{{$biz->description}}</p>
                                    <p class="m5-bttm"><span class="p0-bttm">@foreach( $biz->subcats as $sub) <span><a class="btn btn-border btn-xs" href="/biz/subcat/{{$sub->slug}}">
                                                    <i class="fa fa-tags"></i> {{$sub->name}}</a></span> @endforeach</span>
                                    </p>
                                </div> <!-- end .single-product -->
                            </div> <!-- end .col-sm-4 grid layout -->
                        @endforeach
                    @endunless
                </div>
            </div> <!-- end .home-with-slide -->
        </div> <!-- end .container -->
    </section>  <!-- end #page-content -->
    {{--Recent Businesses Carousel--}}
    <section class="featured-listing" id="featured-list">
        <div class="container">
            <h3 class="section-title"><strong>Recent</strong> Businesses</h3>
            <span class="section-subtitle text-color-greyddd">Explore recently added businesses.</span>
            <div id="businesses-slider" class="owl-carousel owl-theme clearfix p20-top">
                @unless ( $recentBiz->isEmpty() )
                    @foreach ($recentBiz as $recent)
                        <div class="item">
                            <div class="single-product">
                                <a href="/biz/profile/{{$recent->slug}}/{{$recent->id}}">
                                    <figure>
                                        <img src="{{asset('img/content/office.png')}}" alt="">
                                        <div class="rating">
                                            <ul class="list-inline">
                                                <li>
                                                    @for ($i=1; $i <= 5 ; $i++)
                                                        <span class="glyphicon glyphicon-star{{ ($i <= $recent->rating_cache) ? '' : '-empty'}}"></span>
                                                    @endfor
                                                </li>
                                            </ul>
                                            <p>@foreach($recent->cats as $cat){{ $cat->name }}@endforeach</p>
                                        </div>
                                    </figure>
                                    <h4 class="text-left">{{$recent->name}}</h4>
                                    <p class="biz-tagline m10-bttm text-left">{{$recent->description}}</p>
                                    <p class="text-left m0-bttm">
                                        @foreach($recent->subcats as $sub)
                                            <span class="btn btn-border btn-xs btn-tags" role="button"><i class="fa fa-tags"></i> {{$sub->name}}</span>
                                        @endforeach
                                    </p>
                                </a>
                            </div> <!-- end .single-product -->
                        </div>
                    @endforeach
                @endunless
            </div>  <!-- end .row -->
            <div class="discover-more m20-bttm">
                <a class="btn btn-default btn-lg text-center" href="/businesses">View All Businesses</a>
            </div>
        </div>  <!-- end .container -->
    </section>  <!-- end .featured-listing -->
    {{--Register business--}}
    <section class="reg-heading text-center">
            <h3 class="text-uppercase">List a business for <strong class="text-color-grey333">Free</strong> now </h3>
            <a href="/biz/create"class="btn btn-default btn-lg m15-top"><i class="fa fa-plus"></i> Add a Business</a>
    </section>
    {{--help section--}}
    <section class="register-content hidden" style="background: rgba(238, 238, 238, 0.32);">
        <div class="registration-details">
            <div class="container">
                <h3 class="section-title"><strong>See How It Works</strong></h3>
                <span class="section-subtitle text-color-grey222 text-center">Discover how easy our directory can help you connect with businesses around you.</span>
                <div class="row m20-top m20-bttm">
                    <div class="col-md-4 m20-bttm">
                        <div class="box regular-member">
                            <i class="fa fa-user m10-bttm"></i>
                            <h4 class="p5-bttm">Choose What To Do</h4>
                            <p>Lorem ipsum dolor sit amet, wisi constituto vim in. An eum audire verterem, an rebum adipiscing has. </p>
                        </div>
                    </div>
                    <div class="col-md-4 m20-bttm">
                        <div class="box business-member">
                            <i class="fa fa-search m10-bttm"></i>
                            <h4 class="p5-bttm">Find What You Want</h4>
                            <p>Lorem ipsum dolor sit amet, wisi constituto vim in. An eum audire verterem, an rebum adipiscing has. </p>
                        </div>
                    </div>
                    <div class="col-md-4 m20-bttm">
                        <div class="box business-member">
                            <i class="fa fa-building m10-bttm"></i>
                            <h4 class="p5-bttm">Explore local businesses</h4>
                            <p>Lorem ipsum dolor sit amet, wisi constituto vim in. An eum audire verterem, an rebum adipiscing has. </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END .CONTAINER -->
        </div>
        <!-- END .REGISTRATION-DETAILS -->
    </section>
    <!-- END REGISTER-CONTENT -->
    @endsection
    <!-- FOOTER STARTS -->
    @section('footer')
    @include('includes.footer')
    @endsection
    <!-- FOOTER ENDS -->
    <!-- SCRIPTS STARTS -->
    @section('scripts')
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('plugins/owl-carousel/owl.carousel.js') }}"></script>
    <script>
        //Text rotator
        //-------------------------------------------------
        $(document).ready(function() {
            $('.rotate').rotaterator({fadeSpeed:2000, pauseSpeed:80});
        });
    </script>
    @stop
    <!-- SCRIPTS ENDS -->