@extends('master')
<!-- HEAD -->
@section('title', 'Confirm Page')
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
                        <h2 class="section-title text-color-white"> Instructions to confirm your account</h2>
                        
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
                            <h3 class="m0-top"><a href="/"><i class="fa fa-home"></i> </a> » <small class="text-capitalize">Confirmation</small></h3>
                        </div>
                        <div class="col-md-4 text-right"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-6">
                            <h4><h4>Please visit your email address at {{ $user->email }} to activate your account</h4></h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr class="m10">
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">                           
                                   <a class="btn btn-default btn-md" href="/profile/{{$user->id}}"><i class="fa fa-btn fa-envelope"></i> My profile</a>
                                    
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
@endsection
