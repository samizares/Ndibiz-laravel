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
                <img src="{{asset('img/content/lagosnight.jpg')}}" alt="">
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
                        <h1><a class="btn btn-default btn-lg" href="/businesses"><i class="fa fa-plus-square"></i> Explore Businesses</a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- END .slider-content -->
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
                        <li class=""><a class="btn" href="/auth/login" class=""><i class="fa fa-power-off"></i> <span>Login</span></a></li>
                        @endif
                                <!-- HEADER REGISTER -->
                        @if (Auth::guest())
                            <li><a class="btn" href="/auth/register" class=""><i class="fa fa-plus-square"></i> <span>Register</span></a></li>
                        @endif
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

    @include('partials.notifications')
    <div class="register-content">
        <div class="reg-heading hidden">
            <h3>List a business for <strong class="text-color-yellowFFD231">Free</strong> now <br> <span class="btn btn-default"><a href="/biz/create">
                        <i class="fa fa-plus"></i> Add a Business</a></span></h3>
        </div>
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
    </div>
    <!-- END REGISTER-CONTENT -->
    <div id="page-content" class="home-slider-content">
        <div class="container">
            <div class="home-with-slide category-listing">
                <h3 class="section-title"><strong>Featured</strong> Categories</h3>
                <p class="section-subtitle text-color-grey444 m0-bttm">Explore our most popular business categories.</p>
                <div class="row featured-category">
                    @unless ( $featured->isEmpty() )
                        @foreach($featured as $feature)
                            @foreach ($feature->cats as $cat)
                                <div class="col-md-3">
                                    <div class="category-item">
                                        <a class="btn" href="/biz/cat/{{$cat->id}}">
                                            <span><i class="fa fa-{{$cat->image_class}}"></i> <br>
                                            <span class="biz-counter"> ({{$cat->biz->count()}}) </span> {{$cat->name}}</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endunless
                </div>
                <div class="discover-more text-center m20-bttm p10-bttm"><a class="btn btn-default" href="/categories">Discover More Categories</a></div>
            </div> <!-- end .home-with-slide -->
        </div> <!-- end .container -->
    </div>  <!-- end #page-content -->

    <div class="featured-listing" id= "featured-list">
        <div class="container">
            <h3 class="section-title"><strong>Featured</strong> Businesses</h3>
            <span class="section-subtitle text-color-greyddd">Explore top rated businesses based on customers' ratings.</span>
            <div id="businesses-slider" class="owl-carousel owl-theme clearfix p20-top">
                @unless ( $featured->isEmpty() )
                    @foreach ($featured as $feature)
                        <div class="item">
                            <div class="single-product">
                                <a href="/review/biz/{{$feature->slug}}">
                                    <figure>
                                        <img src="{{asset('img/content/post-img-1.jpg')}}" alt="">
                                        <div class="rating">
                                            <ul class="list-inline">
                                                <li>
                                                    @for ($i=1; $i <= 5 ; $i++)
                                                        <span class="glyphicon glyphicon-star{{ ($i <= $feature->rating_cache) ? '' : '-empty'}}"></span>
                                                    @endfor
                                                </li>
                                            </ul>
                                            <p>
                                                @foreach($feature->cats as $cat)
                                                    {{ $cat->name }}
                                                @endforeach
                                            </p>
                                        </div>
                                    </figure>
                                    <h4 class="text-left">{{$feature->name}}</h4>
                                    <p class="biz-tagline m20-bttm text-left">{{$feature->description}}</p>
                                    <p class="text-left m0-bttm">
                                        @foreach($feature->subcats as $sub)
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
                <a class="btn btn-default text-center" href="/businesses">Discover More Businesses</a>
            </div>
        </div>  <!-- end .container -->
    </div>  <!-- end .featured-listing -->

    <div class="register-content">
        <div class="reg-heading">
            <h3>List a business for <strong class="text-color-grey333">Free</strong> now <br> <span class="btn btn-default"><a href="/biz/create">
                        <i class="fa fa-plus"></i> Add a Business</a></span></h3>
        </div>
        <div class="registration-details hidden">
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
    </div>
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