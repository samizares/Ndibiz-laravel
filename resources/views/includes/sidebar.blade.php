                       <div class="post-sidebar">
                           <!-- AD BAR MINI -->
                           <div class="recently-added ad-mini">
                               <div class="category-item">
                                   <h1 class="text-center m5-bttm"> <small>Advertisement</small>
                                       <p class="rotate m10-top">
                                           <span>GTBank Flex Account</span>
                                           <span>Jevniks restaurants</span>
                                           <span>Oriental Hotel</span>
                                           <span>UBA</span>
                                       </p>
                                   </h1>
                               </div>
                           </div>
                           <!-- FEATURED BUSINESSES -->
                           <div class="latest-post-content">
                               <h2>Featured Businesses</h2>
                               @if ( ! $featured-> isEmpty() )
                                   @foreach ($featured as $feature)
                                       <div class="latest-post clearfix">
                                           <div class="post-image">
                                               <img src="{{isset($feature->profilePhoto->image) ? asset($feature->profilePhoto->image) :
                                               asset('img/content/latest_post_1.jpg') }}" alt="">
                                           </div>
                                           <h4><a href="/review/biz/{{$feature->slug}}">{{$feature->name}}</a></h4>
                                           <p>{{$feature->description}}</p>
                                           <a class="read-more" href="/review/biz/{{$feature->slug}}"><i class="fa fa-angle-right"></i>View profile</a>
                                       </div> <!-- end .latest-post -->
                                   @endforeach
                               @endif
                           </div>
                           <!-- RECENTLY ADDED BUSINESSES -->
                           <div class="recently-added">
                               <h2>Recently Added</h2>
                               @if ( ! $recent-> isEmpty() )
                                   @foreach ($recent as $new)
                                       <div class="latest-post clearfix">
                                           <div class="post-image">
                                               <img src="{{isset($new->profilePhoto->image) ? asset($new->profilePhoto->image) :
                                               asset('img/content/latest_post_1.jpg') }}" alt="">
                                               {{--<p><span>12</span>Sep</p>--}}
                                           </div>
                                           <h4><a href="/review/biz/{{$new->slug}}">{{$new->name}}</a></h4>
                                           <p>{{$new->description}}</p>
                                           <a class="read-more" href="/review/biz/{{$new->slug}}"><i class="fa fa-angle-right"></i>View profile</a>
                                       </div> <!-- end .latest-post -->
                                   @endforeach
                               @endif
                           </div>
                           <!-- AD BAR MEDIUM -->
                           <div class="ad-midi hidden">
                               <h1 class="text-center m5-bttm"> <small>Advertisement</small></h1>
                               <div id="carousel" class="carousel slide carousel-fade sidebar-ad2" data-ride="carousel">
                                   <!-- Carousel items -->
                                   <div class="carousel-inner">
                                       <div class="active item"><img src="{{asset('img/content/advert1.png')}}" alt=""></div>
                                       <div class="item"><img src="{{asset ('img/content/advert2.png')}}" alt=""></div>
                                       <div class="item"><img src="{{asset ('img/content/advert3.png')}}" alt=""></div>
                                   </div>
                               </div>
                           </div>
                           <!-- RECENT REVIEWS -->
                           {{--<div class="recently-added">--}}
                               {{--<h2>Recent Reviews</h2>--}}
                           {{--</div>--}}
                       </div>
