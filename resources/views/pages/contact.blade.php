@extends('master')
<!-- HEAD -->
@section('title', 'Contact Us')
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
     <div id="page-content" class="company-profile page-content">
        <div class="container">
            <div class="home-with-slide business-profile">
                <div class="company-profile company-contact m20-top">
                    <div class="row">
                        <h3 class="text-uppercase m10-top">Contact Us</h3>
                        <div class="col-md-12">
                            {{--MAP--}}
                            <div class="contact-map-company">
                                <div id="map"></div>
                            </div> <!-- end .map-section -->
                        </div>
                    </div>
                    {{--CONTACT FORM--}}
                    <div class="row">
                        <div class="col-md-8">
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
                        <div class="col-md-4">
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
    <script src="{{asset('plugins/nanogallery/jquery.nanogallery.min.js')}}"></script>
    <script src="{{asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{asset('https://maps.googleapis.com/maps/api/js') }}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
@endsection
