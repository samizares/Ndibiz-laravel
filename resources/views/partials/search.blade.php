    <div class="header-search map">
      <div class="header-search-bar">
        {!!Form::open(['method'=> 'POST', 'url'=>'/search/business']) !!}
                <div class="container">    
                  <!-- HEADER-LOG0 -->
                  <div class="mobile-logo text-center hidden-lg hidden-md m5-bttm">
                    <h2 class="text-center m0"><a href="/">Beazea</a></h2>
                    <span> Direct<i class="fa fa-globe"></i>ry</span>
                  </div>
                  <!-- END HEADER LOGO -->              
                  <div class="search-value">
                    <!-- <div class="keywords">                       
                      <select class="" id="company" name="company" placeholder="Quick search >> type business/company name"></select>
                    </div> -->
                    <!-- HEADER-LOG0 -->
                    <div class="fixed-header-logo">
                    </div>
                    <!-- END HEADER LOGO -->

                    <div class="category-search">
                      <select id="category" name="category" placeholder="Search keywords e.g. pizza, bars, restaurants..."></select> 
                    </div>
                    <span class="search-in">IN</span>


                    <div class="select-location input-group">
                      <!-- <span class="input-group-addon" id="basic-addon1"><i class="fa fa-home"></i></span> -->
                      <select class="" id="location" name="location" placeholder="Located in address, area, city, state..."></select>                     
                    </div>

                    <button class="search-btn" type="submit"><i class="fa fa-search"></i> <span class="hidden-lg hidden-md hidden-sm">Search</span></button>
                  </div>                  
                </div> <!-- END .CONTAINER -->
        {!!Form::close() !!}
      </div> <!-- END .header-search-bar -->

     
    