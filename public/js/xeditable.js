 $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.fn.editable.defaults.mode = 'popup';
            $.fn.editable.defaults.params = function (params) {
                params._token = $("meta[name=token]").attr("content");
                return params;
            };
            $('.mon_from').editable();
             $(document).on('click','.editable-submit',function(event){
              event.stopPropagation();
              var x = $(this).closest('td').children('span').attr('id');
              var y= $("input:text").val();
            //  var y = $('.input-sm').val();
              var z = $(this).closest('td').children('span');
              $.ajax({
                url: "{{ URL::to('api/opened')}}?id="+x+"&data="+y,
                type: 'GET',
                success: function(s){
                  if(s == 'status'){
                  $(z).html(y);}
                  if(s == 'error') {
                  alert('Error Processing your Request!');}
                },
                error: function(e){
                  alert('Error Processing your Request!!');
                }
              });                            
            });


  
             $('.mon_to').editable();
             $(document).on('click','.editable-submit',function(){
              var x = $(this).closest('td').children('span').attr('id');
              var y= $("input:text").val();
           //   var y = $('.input-sm').val();
              var z = $(this).closest('td').children('span');
              $.ajax({
                url: "{{ URL::to('api/closed')}}?id="+x+"&data="+y,
                type: 'GET',
                success: function(s){
                  if(s == 'status'){
                  $(z).html(y);}
                  if(s == 'error') {
                  alert('Error Processing your Request!');}
                },
                error: function(e){
                  alert('Error Processing your Request!!');
                }
              });                          
            });


             $('.tue_from').editable();
             $(document).on('click','.editable-submit',function(){
              var x = $(this).closest('td').children('span').attr('id');
              var y= $("input:text").val();
           //   var y = $('.input-sm').val();
              var z = $(this).closest('td').children('span');
              $.ajax({
                url: "{{ URL::to('api/featured')}}?id="+x+"&data="+y,
                type: 'GET',
                success: function(s){
                  if(s == 'status'){
                  $(z).html(y);}
                  if(s == 'error') {
                  alert('Error Processing your Request!');}
                },
                error: function(e){
                  alert('Error Processing your Request!!');
                }
              });                          
            });

             $('.tue_to').editable();
             $(document).on('click','.editable-submit',function(){
              var x = $(this).closest('td').children('span').attr('id');
              var y= $("input:text").val();
           //   var y = $('.input-sm').val();
              var z = $(this).closest('td').children('span');
              $.ajax({
                url: "{{ URL::to('api/featured')}}?id="+x+"&data="+y,
                type: 'GET',
                success: function(s){
                  if(s == 'status'){
                  $(z).html(y);}
                  if(s == 'error') {
                  alert('Error Processing your Request!');}
                },
                error: function(e){
                  alert('Error Processing your Request!!');
                }
              });                          
            });

             $('.wed_from').editable();
             $(document).on('click','.editable-submit',function(){
              var x = $(this).closest('td').children('span').attr('id');
              var y= $("input:text").val();
           //   var y = $('.input-sm').val();
              var z = $(this).closest('td').children('span');
              $.ajax({
                url: "{{ URL::to('api/featured')}}?id="+x+"&data="+y,
                type: 'GET',
                success: function(s){
                  if(s == 'status'){
                  $(z).html(y);}
                  if(s == 'error') {
                  alert('Error Processing your Request!');}
                },
                error: function(e){
                  alert('Error Processing your Request!!');
                }
              });                          
            });

             $('.wed_to').editable();
             $(document).on('click','.editable-submit',function(){
              var x = $(this).closest('td').children('span').attr('id');
              var y= $("input:text").val();
           //   var y = $('.input-sm').val();
              var z = $(this).closest('td').children('span');
              $.ajax({
                url: "{{ URL::to('api/featured')}}?id="+x+"&data="+y,
                type: 'GET',
                success: function(s){
                  if(s == 'status'){
                  $(z).html(y);}
                  if(s == 'error') {
                  alert('Error Processing your Request!');}
                },
                error: function(e){
                  alert('Error Processing your Request!!');
                }
              });                          
            });

             $('.thu_from').editable();
             $(document).on('click','.editable-submit',function(){
              var x = $(this).closest('td').children('span').attr('id');
              var y= $("input:text").val();
           //   var y = $('.input-sm').val();
              var z = $(this).closest('td').children('span');
              $.ajax({
                url: "{{ URL::to('api/featured')}}?id="+x+"&data="+y,
                type: 'GET',
                success: function(s){
                  if(s == 'status'){
                  $(z).html(y);}
                  if(s == 'error') {
                  alert('Error Processing your Request!');}
                },
                error: function(e){
                  alert('Error Processing your Request!!');
                }
              });                          
            });

             $('.thu_to').editable();
             $(document).on('click','.editable-submit',function(){
              var x = $(this).closest('td').children('span').attr('id');
              var y= $("input:text").val();
           //   var y = $('.input-sm').val();
              var z = $(this).closest('td').children('span');
              $.ajax({
                url: "{{ URL::to('api/featured')}}?id="+x+"&data="+y,
                type: 'GET',
                success: function(s){
                  if(s == 'status'){
                  $(z).html(y);}
                  if(s == 'error') {
                  alert('Error Processing your Request!');}
                },
                error: function(e){
                  alert('Error Processing your Request!!');
                }
              });                          
            });

             $('.fri_from').editable();
             $(document).on('click','.editable-submit',function(){
              var x = $(this).closest('td').children('span').attr('id');
              var y= $("input:text").val();
           //   var y = $('.input-sm').val();
              var z = $(this).closest('td').children('span');
              $.ajax({
                url: "{{ URL::to('api/featured')}}?id="+x+"&data="+y,
                type: 'GET',
                success: function(s){
                  if(s == 'status'){
                  $(z).html(y);}
                  if(s == 'error') {
                  alert('Error Processing your Request!');}
                },
                error: function(e){
                  alert('Error Processing your Request!!');
                }
              });                          
            });

             $('.fri_to').editable();
             $(document).on('click','.editable-submit',function(){
              var x = $(this).closest('td').children('span').attr('id');
              var y= $("input:text").val();
           //   var y = $('.input-sm').val();
              var z = $(this).closest('td').children('span');
              $.ajax({
                url: "{{ URL::to('api/featured')}}?id="+x+"&data="+y,
                type: 'GET',
                success: function(s){
                  if(s == 'status'){
                  $(z).html(y);}
                  if(s == 'error') {
                  alert('Error Processing your Request!');}
                },
                error: function(e){
                  alert('Error Processing your Request!!');
                }
              });                          
            });

             $('.sat_from').editable();
             $(document).on('click','.editable-submit',function(){
              var x = $(this).closest('td').children('span').attr('id');
              var y= $("input:text").val();
           //   var y = $('.input-sm').val();
              var z = $(this).closest('td').children('span');
              $.ajax({
                url: "{{ URL::to('api/featured')}}?id="+x+"&data="+y,
                type: 'GET',
                success: function(s){
                  if(s == 'status'){
                  $(z).html(y);}
                  if(s == 'error') {
                  alert('Error Processing your Request!');}
                },
                error: function(e){
                  alert('Error Processing your Request!!');
                }
              });                          
            });

             $('.sat_to').editable();
             $(document).on('click','.editable-submit',function(){
              var x = $(this).closest('td').children('span').attr('id');
              var y= $("input:text").val();
           //   var y = $('.input-sm').val();
              var z = $(this).closest('td').children('span');
              $.ajax({
                url: "{{ URL::to('api/featured')}}?id="+x+"&data="+y,
                type: 'GET',
                success: function(s){
                  if(s == 'status'){
                  $(z).html(y);}
                  if(s == 'error') {
                  alert('Error Processing your Request!');}
                },
                error: function(e){
                  alert('Error Processing your Request!!');
                }
              });                          
            });

             $('.sun_from').editable();
             $(document).on('click','.editable-submit',function(){
              var x = $(this).closest('td').children('span').attr('id');
              var y= $("input:text").val();
           //   var y = $('.input-sm').val();
              var z = $(this).closest('td').children('span');
              $.ajax({
                url: "{{ URL::to('api/featured')}}?id="+x+"&data="+y,
                type: 'GET',
                success: function(s){
                  if(s == 'status'){
                  $(z).html(y);}
                  if(s == 'error') {
                  alert('Error Processing your Request!');}
                },
                error: function(e){
                  alert('Error Processing your Request!!');
                }
              });                          
            });

             $('.sun_to').editable();
             $(document).on('click','.editable-submit',function(){
              var x = $(this).closest('td').children('span').attr('id');
              var y= $("input:text").val();
           //   var y = $('.input-sm').val();
              var z = $(this).closest('td').children('span');
              $.ajax({
                url: "{{ URL::to('api/featured')}}?id="+x+"&data="+y,
                type: 'GET',
                success: function(s){
                  if(s == 'status'){
                  $(z).html(y);}
                  if(s == 'error') {
                  alert('Error Processing your Request!');}
                },
                error: function(e){
                  alert('Error Processing your Request!!');
                }
              });                          
            });

          });