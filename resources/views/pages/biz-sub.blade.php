@extends('master')
        <!-- HEAD -->
@section('title', 'Search by tags')
@section('stylesheets')
@endsection
        <!-- HEADER -->
<!-- search -->
@section('search')
    @include('partials.search')
@endsection
<!-- navigation -->
@section('mobile-header')
    @include('includes.mobile-header')
@endsection
<!-- CONTENT -->
@section('content')
    <div id="page-content">
        <div class="container">
            @include('partials.notifications')
            <div class="home-with-slide">
                <div class="row businesses">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="m0-top text-cap"><a href="/"><i class="fa fa-home"></i> </a> » <a href="/businesses">
                                        <small>Business Listings</small></a> » <small>{{$sub->name}}</small></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-content">
                                    <div class="product-details view-switch">
                                        <div class="row clearfix p0-top">
                                            <div class="col-md-9">
                                                <h3 class="m0-top">Showing results for "{{$sub->name}} ({{$sub->biz->count()}})"</h3>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="change-view pull-right">
                                                    <button class="grid-view active"><i class="fa fa-th"></i></button>
                                                    <button class="list-view"><i class="fa fa-bars"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix p0-top">
                                            @unless ( $bizs->isEmpty() )
                                                @foreach ($bizs as $biz)
                                                    <div class="col-sm-4 col-xs-6">
                                                        <div class="single-product p0-bttm p15-top">
                                                            <figure>
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
                                                                </div>
                                                            </figure>
                                                            <h4><a href="/biz/profile/{{$biz->slug}}/{{$biz->id}}">{{$biz->name}}</a></h4>
                                                            <p class="biz-tagline m20-bttm text-left">{{$biz->description}}</p>
                                                            <p><span class="p0-bttm">@foreach( $biz->subcats as $sub) <span><a class="btn btn-border btn-xs" href="/biz/subcat/{{$sub->slug}}">
                                                                            <i class="fa fa-tags"></i> {{$sub->name}}</a></span> @endforeach</span></p>
                                                            <p class="address-preview"><i class="fa fa-map-marker"></i> {{$biz->address->street}}, {{ $biz-> address->state->name}}</p>
                                                        </div> <!-- end .single-product -->
                                                    </div> <!-- end .col-sm-4 grid layout -->
                                                @endforeach
                                            @endunless
                                        </div> <!-- end .row -->
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

@section('scripts')
    <script type="text/javascript">
        // style switcr for list-grid view
        //--------------------------------------------------
        $(document).ready(function() {
            $('.change-view button').on('click',function(e) {
                if ($(this).hasClass('list-view')) {
                    $(this).addClass('active');
                    $('.grid-view').removeClass('active');
                    $('.page-content .view-switch').removeClass('product-details').addClass('product-details-list');
                } else if($(this).hasClass('grid-view')) {
                    $(this).addClass('active');
                    $('.list-view').removeClass('active');
                    $('.page-content .view-switch').removeClass('product-details-list').addClass('product-details');
                }
            });
        });
    </script>
    <script src="{{asset('js/scripts.js')}}"></script>
@endsection
