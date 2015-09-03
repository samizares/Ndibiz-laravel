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
              <select id="stateList" name="stateList" placeholder="select state">
                <option value="">Choose a city</option>
                <option value="25">Lagos</option>
                <option value="23">Abuja</option>
                <option value="26">Abia</option>
                </select> 
            </div> 

            <div class="form-group">
              <label for="lga">Region/Area</label> 
              <select id="lga" name="lga" placeholder="Pick an area/region">                
               </select>   
            </div>

            <div class="form-group">
              <label for="contact-person">Contact Person</label>
              <input type="text" id="contactname" name=" contactname" class="form-control" placeholder="Mr Patt" required>
            </div>
          </div>
          <div class="col-md-6">  
            <div class="form-group">
                  <label for="products">Products / Services</label>
                  <div class="category-search">                
                    {!!Form::select('cats[]', $catList, null, ['class'=>'Form-control','id'=>'cat2',
                    'multiple','data-placeholder'=>'Select Categories']) !!}
                  </div> 
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
  <script>
$(document).ready(function() {
  $("#cat2").select2({
    tags: true

  });

//});

//$(function() {
 // on("submit", function(e)
  $(document).ready(function() {
 $('#stateList').on('change', function(){
      if($(this).val() !== "select state") {
         var model=$('#lga');
        model.empty();
       $.get('{{ URL::to('api/lga') }}', {z: $(this).val()}, function(result){
        var model=$('#lga');
        model.empty();
         $.each(result.data,function(){
                          $('#lga').append('<option value="'+this.id+'">'+this.text+'</option>');

                    });
       });
     }
  });
});
  //  if($(this).val() !== "select state") {


    //   $.get('{{ URL::to('api/lga') }}', {z: $(this).val()}, function(result){
    //     $('#lga').html(result);
    //   });
  
  
  /*var state= $("#stateList").val();
 $("#lga").select2({
    ajax:{
      url: "{{ URL::to('api/lga') }}",
      dataType:'json',
      deleay:250,
      data:  {
        z:state
        },
        processResults: function (data){
          return{
            results:data
          };
        },
        cache:true
     },
     minimumInputLength:1
    
 });  */


 /*  $(function() {
      // Enable Selectize
    $('#category').selectize({
      plugins: ['remove_button'],
      valueField: 'id',
      labelField: 'name',
      searchField: ['name'],
      render:{
        option:function(item, escape) {
          return '<div><i class="fa fa-car"></i>' + escape(item.name) +'</div>';
        }
      },
      load:function(query, callback) {
        if(!query.length) return callback();
        $.ajax({
          url: '{{ URL::to('api/category') }}',
          type: 'GET',
          dataType: 'json',
          data: {
            q: query
          },
          success: function(res) {
            callback(res.data);
            }
        });
      }
      });

    });    

   var xhr;
   var state_List, $state_List;
   var lga_area, $lga_area; 
      // Enable Selectize
    $state_List= $('#stateList').selectize({ 
      
     //  $('#stateList').selectize({
    valueField: 'id',
    labelField: 'name',
    searchField: ['name'],
    render:{
        option:function(item, escape) {
          return '<div>' + escape(item.name) +'</div>';
        }
      },
      load:function(query, callback){
        if(!query.length) return callback();
        $.ajax({
          url: '{{ URL::to('api/location') }}',
          type: 'GET',
          dataType: 'json',
          data: {
            l: query
          },
          success: function(res) {
            callback(res.data);
            } 
        });
      }, 
        onChange: function(value){
          if(!value.length) return;          
         // lga_area.disable();
        //  lga_area.clearOptions();
          lga_area.load(function(callback){
                xhr && xhr.abort();
                xhr= $.ajax({
                  url: '{{ URL::to('api/lga') }}',
                 type: 'GET',
                 dataType: 'json',
                  data: {
                     z: value
                    },
                  success: function(results) {
                   // console.log(results);
                       lga_area.enable();
                      callback(results);
                    },
                  error: function() {
                  callback();
                }
                })
          });
        }
      });
      $lga_area=$('#lga').selectize({
         valueField:'id',
         labelField:'name',
         searchField:['name']         
      });

      lga_area = $lga_area[0].selectize;
      state_List= $state_List[0].selectize;

      lga_area.disable();
    /*  onChange:function(){
       // var state= $("#stateList").val();
        $.getJSON('{{ URL::to('api/lga') }}',{state:$("#stateList").val()}, function(data){
            var model=$('#lga');
            model.empty();
            $.each(data,function(index,element) {
            model.append("<option value='"+element.name+"'>" + element.name + "</option>");
              
          })
        });
       /*   $.ajax({
          url: '{{ URL::to('api/lga') }}',
          type:'get',
          data: {
            z: state
          },
          success: function(res) {
            $("#lga").html(res)
            },
            error : function(resp){} 
        }); 

       }  */

 
 /*   $("#stateList").change(function(){
      $.get('{{ URL::to('api/lga') }}',{z:$("#stateList").val()}, function(data){
            var model=$('#lga');
            model.empty();
            $.each(data,function(index,element) {
            model.append("<option value='"+element.name+"'>" + element.name + "</option>");
              
          })
        });
    })    */
 

</script>  
@stop