<div class="header-search-bar">
        <form>

          <!--  -->
     <div class="container">
            <button class="toggle-btn" type="submit"><i class="fa fa-bars"></i></button>

            <div class="search-value">
              <div class="keywords">
                 
                <select class="" id="keywords" name="keywords">
                  <option value="">Enter Keyword to search</option>
                </select>
              
              </div>

              <div class="select-location">
                <select id="location" name="location">
                <option value="">Choose a city...</option>
              </select> 
               <!-- {!!Form::select('location',$stateList,'Choose a city',['id'=>'location']) !!} -->
              </div>

              <div class="category-search">
                {!!Form::select('category', $catList,'Select a category',['class'=>'form-control', 'id'=>'category']) !!}
              </div>

              <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
            </div>
          </div> <!-- END .CONTAINER -->
        </form>
      </div> <!-- END .header-search-bar -->