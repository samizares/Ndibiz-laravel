@extends('master')
<!-- HEAD -->
@section('title', 'Business Listings')
@section('stylesheets')
<link href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet">
@endsection
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
          <div class="col-md-8">
            <!-- inner breadcrumb -->
            <div class="row p10-bttm page-title-row">
              <div class="col-md-8">
                <h3 class="m0-top"><a href="/"><i class="fa fa-home"></i> </a> » <small>Business Listings</small></h3>
              </div>
              <div class="col-md-4 text-right"></div>
            </div>
              {{--filters--}}
              <hr class="m5">
              <h4>Filters</h4>
            <div class="row m15-top m5-left m5-right">
                <div class="col-md-4">
                    <div class="form-group">
                         {!!Form::select('loc', $stateListID, Input::old('state'), ['class'=>'form-control','id'=>'stateList',
                          'placeholder'=>'All Locations']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                       {!!Form::select('cat', $catListID,Input::old('cats[]') , ['class'=>'form-control','id'=>'cat',
                       'placeholder'=>'All categories']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                          {!!Form::select('sub', $subListID,Input::old('cats[]') , ['class'=>'form-control','id'=>'sub2',
                       'placeholder'=>'Select Sub-Categories']) !!}
                    </div>
                </div>
            </div>
              <hr class="m5">
              {{--business listings--}}
            <div class="row businesses">
              <div class="col-md-12">
                <div class="page-content">
                  <div class="product-details view-switch">
                    <div class="tab-content">

                      <div class="tab-pane" id="">
                        <div class="row p0-top">
                          <div class="col-md-4">
                            {{--<h3 class="m0-top">{{$bizs->name}}</h3>--}}
                          </div>
                          <div class="col-md-8">
                            <div class="change-view pull-right hidden">
                                <button class="grid-view active"><i class="fa fa-th"></i></button>
                                <button class="list-view"><i class="fa fa-bars"></i></button>
                            </div>
                          </div>
                        </div>
                        <div id="result" class="row clearfix p5-top">
                              @foreach ($bizs as $biz)
                              <div class="col-md-4 col-sm-3">
                                <div class="single-product">
                                  <figure>
                                    <img src="{{isset($biz->profilePhoto->image) ? asset($biz->profilePhoto->image) :
                                               asset('img/content/post-img-10.jpg') }}" alt="">
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
                                    <p class="m5-bttm"><span class="p0-bttm">@foreach( $biz->subcats as $sub)
                                        <span><a class="btn btn-border btn-xs" href="/biz/subcat/{{$sub->slug}}">
                                        <i class="fa fa-tags"></i> {{$sub->name}}</a></span> @endforeach</span>
                                    </p>
                                </div> <!-- end .single-product -->
                              </div> <!-- end .col-sm-4 grid layout -->
                              @endforeach
                              <div class="clearfix container">
                                 <!-- <?php echo $bizs->render(); ?> -->
                                      {!! $bizs->appends(Input::except('page'))->render() !!}
                              </div>
                          </div> <!-- end .row -->
                      </div> <!-- end .tabe-pane -->

                    </div> <!-- end .tabe-content -->
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
    <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    {{--<script src="{{asset('../node_modules/vue/dist/vue.js')}}"></script>--}}
    {{--<script src="{{asset('../node_modules/vu-strap/dist/vue-strap.js')}}"></script>--}}
    {{--VUE JS COMPONENTS--}}
    {{--<script>--}}
{{--//        var affix = require('vue-strap').affix;--}}
        {{--var aside = require('vue-strap').alert;--}}

        {{--new Vue({--}}
            {{--components: {--}}
{{--//                'affix': affix,--}}
{{--//                'aside': aside,--}}
                {{--'alert': alert--}}
            {{--}--}}
        {{--})--}}
    {{--</script>--}}
    {{--JQUERY PLUGINS--}}

    <script type="text/javascript">

    $(document).ready(function() {
      $("#stateList").select2({
        placeholder: 'All states'
      });

      $("#cat").select2({
        placeholder: 'All categories'
      });

      $("#sub2").select2({
        placeholder: 'Select subcategories',
       // tags: true,
      });



     $('#stateList').change(function(){
          if($(this).val() !== "All states") {
           $.get('{{ URL::to('api/ajax/location')}}', {z: $(this).val()}, function(result){
              console.log(result);
              if(! result.error) {
             $('#result').empty().html(result);
                 }else {
                  console.log(result.error);
                  $('#result').empty().append(result.error);
                 }

           });
         }
      });

     $('#cat').change(function(e){
      //e.stopPropagation();
      // var model=$('#sub2');
       //  model.select2("val", "");
        if($(this).val() != "All categories"){
           $.get('{{URL::to('api/ajax/category')}}',{cat: $(this).val()}, function(result){
           // console.log(result);
            if(!result.error) {
              $('#result').empty().html(result);
            }else{
             // console.log(result.error);
              $('#result').empty().append(result.error);
             }

           });
          //  model.empty();
          // $.get('{{ URL::to('api/subcat2') }}', {y: $(this).val()}, function(result){
          //   $.each(result.data,function(){
               //       model.append('<option value="'+this.id+'">'+this.text+'</option>');

               //    });
          // });

        }


     });

     $('#sub2').change(function(){
          if($(this).val() !== "Select subcategories") {
             $.get('{{URL::to('api/ajax/subcategory')}}',{sub: $(this).val()}, function(result){
           // console.log(result);
            if(!result.error) {
              $('#result').empty().html(result.html);
            }else{
             // console.log(result.error);
              $('#result').empty().append(result.error);
             }

           });

          }
        });

      $('#result').on('click', '.pagination a', function (e) {
                getBizs($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });

      function getBizs(page) {
            $.ajax({
                url : '?page=' + page,
                dataType: 'json',
            }).done(function (data) {
                $('#result').html(data);
            }).fail(function () {
                alert('Bizs could not be loaded.');
            });
        }


    });
        $(document).ready(function() {
            $('li:first-child').addClass('active');
            $('.tab-pane:first-child').addClass('active');
        });
      // style switcher for list-grid view
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
