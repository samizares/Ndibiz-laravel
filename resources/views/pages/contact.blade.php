@extends('master')
        <!-- HEAD -->
@section('title', 'Contact Us')
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
                        <h2 class="section-title text-color-white text-uppercase">  Get in touch!</h2>
                        <!-- <span class="section-subtitle text-color-white"> Get in touch!</span> -->
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
    <div id="page-content" class="company-profile page-content m0-top">
        <div class="container">
            <div class="home-with-slide business-profile">
                <div class="company-profile company-contact m20-top">
                    <!-- inner breadcrumb -->
                    <div class="row p10-bttm page-title-row">
                        <div class="col-md-8">
                            <h3 class="m0-top"><a href="/"><i class="fa fa-home"></i> </a> »
                                <small class="text-capitalize">Contact Us</small></h3>
                        </div>
                        <div class="col-md-4 text-right"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center">Tell Us. we love feedback.</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr class="m10">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {{--MAP--}}
                                    <div class="contact-map-company">
                                        <div id="map" class="map"></div>
                                    </div> <!-- end .map-section -->
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--CONTACT FORM--}}
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Send Us A Message</h3>
                            <form class="comment-form">
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <input class="form-control" type="text" placeholder="Name *" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input class="form-control" type="email" placeholder="Email *" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input class="form-control" type="url" placeholder="Website">
                                    </div>
                                </div>
                                <textarea placeholder="Your Comment ..." required></textarea>
                                <button type="submit" class="btn btn-default"><i class="fa fa-envelope-o"></i> Send Message</button>
                            </form>
                        </div>
                        <div class="col-md-4 hidden">
                            {{--ADDRESS--}}
                            <div class="address-details clearfix">
                                <i class="fa fa-map-marker"></i>
                                <p>
                                    <span>Lagos, Nigeria.</span>
                                </p>
                            </div>
                        </div>
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
    <script>
        function initMap() {
            var bizLocation = {lat: 6.5244, lng: 3.3792};
            var map = new google.maps.Map(document.getElementById('map'), {
                center: bizLocation,
                zoom: 8
            });

            var image = "{{asset('img/map-marker.png')}}";
            var marker = new google.maps.Marker({
                position: bizLocation,
                map: map,
                icon: image,
                title: "Lagos City"
            });
        }
    </script>
    <script async defer src="{{asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyBp4QFoQcshg0TCPGqIl5h1bONEJDYJ0yA&callback=initMap')}}"></script>
@endsection
