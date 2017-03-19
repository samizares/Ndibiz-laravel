@extends('master')
<!-- HEAD -->
@section('title', 'FAQs')
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
     <div id="page-content" class="company-profile page-content m0">
        <div class="container">
            <div class="home-with-slide business-profile">
                <div class="company-profile company-contact m20-top">
                    <!-- inner breadcrumb -->
                    <div class="row p10-bttm page-title-row">
                        <div class="col-md-8">
                            <h3 class="m0-top"><a href="/"><i class="fa fa-home"></i> </a> »
                                <small class="text-capitalize">Frequently Asked Questions</small></h3>
                        </div>
                        <div class="col-md-4 text-right"></div>
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
