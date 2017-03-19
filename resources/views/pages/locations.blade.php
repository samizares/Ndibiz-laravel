@extends('master')
        <!-- HEAD -->
@section('title', 'Locations')
        <!-- HEADER -->
<!-- search -->
@section('search')
    @include('partials.search')
@endsection
@section('mobile-header')
    @include('includes.mobile-header')
@endsection
<!-- CONTENT -->
@section('content')
  <div id="page-content">
    <div class="container">
        @include('partials.notifications')
      <div class="home-with-slide category-listing">
        <div class="row">
          <div class="col-md-12">
            <!-- inner breadcrumb -->
            <div class="row p10-bttm page-title-row">
              <div class="col-md-12">
                <h3 class="m0-top"><a href="/"><i class="fa fa-home"></i> </a> » <small>Locations</small></h3>
              </div>
            </div>
              <hr class="m0 p0">
            <div class="row categories">
              <div class="col-md-12">
                  <div class="row">
                      @foreach($states as $state)
                          <div class="col-md-4">
                              <ul class="list-unstyled">
                              <li>
                                  <h3 class="text-uppercase">{{$state->name}} <strong>({{$state->biz->count()}})</strong></h3>
                                  @foreach($state->lgas as $area)
                                  <p><a class="text-capitalize" href="">{{$area->name}} <strong>({{$area->biz->count()}})</strong></a></p>
                                  @endforeach
                              </li>
                              </ul>
                          </div>
                      @endforeach
                  </div>
              </div>
            </div> <!-- end .row -->
          </div>
        </div>
      </div> <!-- end .home-with-slide -->
    </div> <!-- end .container -->
  </div>  <!-- end #page-content -->
@endsection
<!-- CONTENT ENDS-->
<!-- FOOTER STARTS -->
@section('footer')
  @include('includes.footer')
@endsection
<!-- FOOTER ENDS -->
@section('scripts')
    <script type="text/javascript">

    </script>
    <script src="{{asset('js/scripts.js')}}"></script>
@endsection
