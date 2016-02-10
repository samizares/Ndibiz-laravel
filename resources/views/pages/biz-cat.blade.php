@extends('master')
        <!-- HEAD -->
@section('title', 'Search by category')
@section('stylesheets')
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
                </ul>
            </nav>
        </div> <!-- end .container -->
    </div> <!-- end .header-nav-bar -->
    @endsection
            <!-- CONTENT -->
@section('content')
    <div id="page-content">
        <div class="container">
            @include('partials.notifications')
            <div class="home-with-slide">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="m0-top text-cap"><a href="/"><i class="fa fa-home"></i> </a> » <a href="/businesses"><small>Business Listings</small></a> » <small>{{$cat->name}}</small></h3>
                            </div>
                        </div>
                        <div class="row businesses">
                            <div class="col-md-12">
                                <div class="page-content">
                                    <div class="product-details-list view-switch">
                                        <div class="row clearfix p0-top">
                                            <div class="col-md-9">
                                                <h3 class="m0-top">Showing results for "{{$cat->name}} ({{$cat->biz->count()}})"</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="change-view pull-right">
                                                    <button class="grid-view"><i class="fa fa-th"></i></button>
                                                    <button class="list-view active"><i class="fa fa-bars"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p0-top">
                                            @unless ( $bizs->isEmpty() )
                                                @foreach ($bizs as $biz)
                                                    <div class="col-sm-4 col-xs-6">
                                                        <div class="single-product p0-bttm p15-top">
                                                            <figure>
                                                               {!!Html::image(isset($biz->profilePhoto->image) ? $biz->profilePhoto->image : 'img/content/post-img-10.jpg',
                                                                    'Profile Image', array('class'=>'img-responsive center-block'))!!}
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
                                                            <h4><a href="/review/biz/{{$biz->slug}}">{{$biz->name}}</a></h4>
                                                            <p class="biz-tagline m20-bttm text-left">{{$biz->description}}.</p>
                                                            <p><span class="p0-bttm">@foreach( $biz->subcats as $sub) <span><a class="btn btn-border btn-xs" href="/biz/subcat/{{$sub->slug}}">
                                                                            <i class="fa fa-tags"></i> {{$sub->name}}</a></span> @endforeach</span></p>
                                                            <p class="address-preview"><i class="fa fa-map-marker"></i> {{$biz->address->street}}, {{ $biz-> address->state->name}}</p>
                                                        </div> <!-- end .single-product -->
                                                    </div> <!-- end .col-sm-4 grid layout -->
                                                @endforeach
                                            @endunless
                                        </div>
                                    </div> <!-- end .product-details -->
                                </div> <!-- end .page-content -->
                            </div>
                        </div> <!-- end .row -->
                    </div>
                    <!-- SIDEBAR RIGHT -->
                    <div class="col-md-4">
                        @include('includes.sidebar')
                    </div>
                </div>
            </div>
        </div> <!-- end .container -->
    </div>  <!-- end #page-content -->
    @endsection
            <!-- FOOTER STARTS -->
    @section('footer')
    @include('includes.footer')
    @endsection
            <!-- FOOTER ENDS -->
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('li:first-child').addClass('active');
            $('.tab-pane:first-child ').addClass('active');
        });
        // style switcr for list-grid view
        //--------------------------------------------------
        $(document).ready(function() {
            $('.change-view button').on('click',function(e) {
                if ($(this).hasClass('grid-view')) {
                    $(this).addClass('active');
                    $('.list-view').removeClass('active');
                    $('.page-content .view-switch').removeClass('product-details-list').addClass('product-details');
                } else if($(this).hasClass('list-view')) {
                    $(this).addClass('active');
                    $('.grid-view').removeClass('active');
                    $('.page-content .view-switch').removeClass('product-details').addClass('product-details-list');
                }
            });
        });
    </script>
    <script src="{{asset('js/scripts.js')}}"></script>
@endsection
