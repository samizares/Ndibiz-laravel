@extends('master')
<!-- HEAD -->
@section('title', 'About Us')
@section('stylesheets')

@endsection
<!-- HEADER -->
<!-- search -->
@section('search')
    <div class="header-search map">
        <div class="header-search-bar">
            <div class="container">
                <div class="row m20-bttm text-center">
                    <div class="col-md-12">
                        <h2 class="section-title text-color-white"> About BEAZEA</h2>
                        <span class="section-subtitle text-color-white"> Get Connected!</span>
                    </div>
                </div>
            </div>
        </div>
@endsection
<!-- navigation -->
@section('mobile-header')
    @include('includes.mobile-header')
@endsection
<!-- CONTENT -->
@section('content')
     <div id="page-content" class="company-profile page-content m0">
        <div class="container">
            <div class="home-with-slide business-profile">
                <div class="m20-top">
                    <!-- inner breadcrumb -->
                    <div class="row p10-bttm page-title-row">
                        <div class="col-md-8">
                            <h3 class="m0-top"><a href="/"><i class="fa fa-home"></i> </a> » <small class="text-capitalize">About Us</small></h3>
                        </div>
                        <div class="col-md-4 text-right"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h2>10 Things You Should Know About BEAZEA.</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr class="m10">
                                </div>
                            </div>
                            <p> <i class="fa fa-check"></i>
                                BEAZEA.com was founded in 2016 to help people find great local businesses or services
                                like dentists, hair stylists, hotels, boutiques, eateries, car shops and mechanics.
                            </p>
                            <p> <i class="fa fa-check"></i>
                                BEAZEA.com gives anyone offering a product or service a platform through which they
                                can promote their offering to customers both local and international; e.g. hotels,
                                banks, beauty salons, tailors, restaurants, estate agents, lawyers, law firms,
                                architects, caterers, etc.
                            </p>
                            <p> <i class="fa fa-check"></i>
                                To register on BEAZEA.com is free and will always be free!
                            </p>
                            <p> <i class="fa fa-check"></i>
                                Anyone can register on BEAZEA.com provided you offer and operate a legitimate business
                                or service!
                            </p>
                            <p> <i class="fa fa-check"></i> A beazer is anyone who is registered on BEAZEA.com as a
                                personal or business user.</p>
                            <p> <i class="fa fa-check"></i>
                                6.	Beazers are able to connect with each other and share content on the website or to
                                other social media platforms for maximum reach to existing or potential customers – see
                                website www.beazea.com for further details.
                            </p>
                            <p> <i class="fa fa-check"></i>
                                Beazers are able to write reviews about any registered business or service on BEAZEA.com.
                            </p>
                            <p> <i class="fa fa-check"></i>
                                In addition to writing reviews, every beazer can setup a free account to post photos and
                                send messages to their customers who are beazers.
                            </p>
                            <p> <i class="fa fa-check"></i> BEAZEA.com can be accessed using a smartphone, tablet or PC.
                            </p>
                            <p> <i class="fa fa-check"></i>
                                The monthly BEAZEA.com newsletter keeps beazers in the BEAZEA community updated on
                                new entrants to the community, market trends from various sectors and lots more such as
                                interesting comments from the ‘BEAZ on the Street blog’.
                            </p>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>  <!-- end .home-with-slide -->
        </div> <!-- end .container -->
     </div> <!-- end #page-content -->
@endsection

<!-- FOOTER STARTS -->
    @section('footer')
        @include('includes.footer')
    @endsection
<!-- FOOTER ENDS -->

@section('scripts')
    <script src="{{asset('js/scripts.js')}}"></script>
@endsection
