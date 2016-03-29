        <div class="header-search map">
            <div class="header-search-bar">
                <div class="container">
                    {!!Form::open(['method'=> 'POST', 'url'=>'/search/business', 'class'=>'']) !!}
                        {{--Keyword Search--}}
                        <ul class="list-inline m0 search-bar">
                            <li class="m0">
                                <select type="text" aria-label="category" class="" id="category" name="category"
                                      placeholder="Type a Keyword"></select>
                            </li>
                            {{--Location Search--}}
                            <li class="m0">
                                <select type="text" class="" id="location" name="location" placeholder="Select a Location"></select>
                            </li>
                            {{--Search Button--}}
                            <button class="btn btn-default-inverse" type="submit"> Find a Business <i class="fa fa-search"></i> </button>
                        </ul>
                    {!!Form::close() !!}
                </div> <!-- END .CONTAINER -->
            </div>
            <!-- END .header-search-bar -->





