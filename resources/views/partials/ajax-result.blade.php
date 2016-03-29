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
                                  <h4><a href="/review/biz/{{$biz->slug}}">{{$biz->name}}</a></h4>
                                    <p class="biz-tagline m20-bttm text-left">{{$biz->description}}</p>
                                    <p class="m5-bttm"><span class="p0-bttm">@foreach( $biz->subcats as $sub) <span><a class="btn btn-border btn-xs" href="/biz/subcat/{{$sub->slug}}">
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