        <div class="header-search map">
            <div class="header-search-bar">
                {!!Form::open(['method'=> 'POST', 'url'=>'/search/business']) !!}
                <div class="container">
                    <div class="input-group">
                      <select type="search" aria-label="category" class="form-control" id="category" name="category" placeholder="Search businesses"></select>
                      <div class="select-location input-group">
                            <select class="" id="location" name="location" placeholder="Located in address, area, city, state..."></select>
                        </div>
                        <button class="search-btn" type="submit"><i class="fa fa-search"></i> <span class="hidden-lg hidden-md hidden-sm">Search</span></button>
                      </div>
                    </div>
                </div> <!-- END .CONTAINER -->
                {!!Form::close() !!}
        </div>
        <!-- END .header-search-bar -->





