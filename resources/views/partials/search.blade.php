        <div class="header-search map">
            <div class="header-search-bar">
                {!!Form::open(['method'=> 'POST', 'url'=>'/search/business', 'class'=>'form-inline']) !!}
                <div class="container">
                    {{--Keyword Search--}}
                    <div class="row">
                    <div class="form-group col-md-5 col-sm-5 col-xs-12">
                        <select type="text" aria-label="category" class="form-control" id="category" name="category"
                              placeholder="Type a Keyword" style="width: 100%"></select>
                    </div>
                    {{--Location Search--}}
                    <div class="form-group col-md-5 col-sm-5 col-xs-12">
                        <select type="text" class="form-control" style="width: 100%" id="location" name="location" placeholder="Select a Location"></select>
                    </div>
                    {{--Search Button--}}
                    <button class="col-md-2 btn btn-default-inverse form-control" type="submit"> <i class="fa fa-search"></i> Search</button>
                    </div>
                </div> <!-- END .CONTAINER -->
                {!!Form::close() !!}
            </div>
            <!-- END .header-search-bar -->





