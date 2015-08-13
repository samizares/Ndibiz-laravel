@extends('master')

@section('content')

<div class="breadcrumb">

        <div class="featured-listing">
            <h2 class="page-title">Business Registration</h2>
        </div>

      </div>
<div class="header-nav-bar">
      <div class="container">
        <nav>

          <button><i class="fa fa-bars"></i></button>

          <ul class="primary-nav list-unstyled">
            <li class="bg-color"><a href="index.php">Home<i class="fa fa-home"></i></a></li>
            <li class=""><a href="categories.php">Categories<i class="fa fa-angle-down"></i></a></li>
            <li><a href="about-us.php">About Us</a></li>
            <li><a href="contact-us.php">Contact Us</a></li>
          </ul>
        </nav>
      </div> <!-- end .container -->
    </div> <!-- end .header-nav-bar -->
  </header> <!-- end #header -->
  <div id="page-content" class="home-slider-content">
    <div class="container">
      <div class="page-forms">
        <form method="POST"  action="/biz">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
          <h3 class="text-center">Create a business profile and become visible to your customers.</h3>

           @include('admin.partials.errors')
            @include('admin.partials.success')
          
          <div class="col-md-6">     
            <div class="form-group">
              <label for="name">Business Name</label>
              <input required type="text" id="name" name="name" class="form-control" placeholder="Patt's Bar">
            </div>         
            <div class="form-group">
              <label for="address1">Address 1</label>
              <input required type="text" id="address" name="address" class="form-control" placeholder="Ajose Adeogun street">
            </div>  
            <div class="form-group">
              <label for="address2">Address 2</label>
              <input type="text" id="address2" name="address2" class="form-control" placeholder="V/Island">
            </div>  
             <div class="form-group">
              <label for="state">State</label>
              {!!Form::select('state', $stateList,null,['class'=>'form-control', 'id'=>'stateList']) !!}
            </div> 

            <div class="form-group">
              <label for="lga">Local Government Area</label>
               {!!Form::select('lga', [],null,['class'=>'form-control', 'id'=>'lga']) !!}
            </div>

            <div class="form-group">
              <label for="contact-person">Contact Person</label>
              <input type="text" id="contactname" name=" contactname" class="form-control" placeholder="Mr Patt" required>
            </div>
          </div>
          <div class="col-md-6">  
            <div class="form-group">
              <label for="products">Products / Services</label>
              {!!Form::select('product', $catList,null,['class'=>'form-control', 'id'=>'cats_name']) !!}
            </div>    
            <div class="form-group">
              <label for="website">Website address</label>
              <input type="text" id="website" name="website" class="form-control" placeholder="www.pattsbar.com.ng">
            </div>         
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="info@pattsbar.com.ng">
            </div>  
            <div class="form-group">
              <label for="contact">Phone Number 1</label>
              <input type="text" id="contact" name="phone1" class="form-control" placeholder="Phone number 1">
            </div>  
             <div class="form-group">
              <label for="contact2">Phone Number 2</label>
              <input type="text" id="contact" name="phone2"class="form-control" placeholder="Phone number 2">
            </div> 
          </div>
          <input type="submit" class="btn btn-default" value="Add Business">
        </div> <!-- end .row -->
        </form>
      </div> <!-- end .home-with-slide -->
    </div> <!-- end .container -->
  </div>  <!-- end #page-content -->
  
  @endsection
  
  @section('scripts')
 <!-- <script>
$(document).ready(function() {
  $("#cat_name").select2({
    placeholder: 'Choose your business category',

  });

});


$(document).ready(function() {
  $("#stateList").select2({
    placeholder: 'Choose the state your business is located at'
  });
});

$(document).ready(function() {
  $("#lga").select2({
  });
});
</script>  -->
@stop