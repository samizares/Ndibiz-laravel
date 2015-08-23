;(function($) {

  "use strict";

  var $body = $('body');
  // var $head = $('head');
  // var $mainWrapper = $('#main-wrapper');

  // Mediaqueries
  // ---------------------------------------------------------
  // var XS = window.matchMedia('(max-width:767px)');
  // var SM = window.matchMedia('(min-width:768px) and (max-width:991px)');
  // var MD = window.matchMedia('(min-width:992px) and (max-width:1199px)');
  // var LG = window.matchMedia('(min-width:1200px)');
  // var XXS = window.matchMedia('(max-width:480px)');
  // var SM_XS = window.matchMedia('(max-width:991px)');
  // var LG_MD = window.matchMedia('(min-width:992px)');


  // jquery ui call functionfor calendar
  //------------------------------------------------
  $( "#datepicker" ).datepicker();

  // Touch
  // ---------------------------------------------------------
  var dragging = false;

  $body.on('touchmove', function() {
    dragging = true;
  });

  $body.on('touchstart', function() {
    dragging = false;
  });


  // Advanced search toggle
  var $SearchToggle = $('.header-search-bar .search-toggle');
  $SearchToggle.hide();

  $('.header-search-bar .toggle-btn').on('click', function(e){
    e.preventDefault();
    $SearchToggle.slideToggle(300);
  });


  // navbar toggle
  //------------------------------------------------
  $('.header-nav-bar button').on('click',function(){
    $('.header-nav-bar').toggleClass('active');
  });

  var $headerNavBar = $('#header .header-nav-bar, .header-nav-bar button');

  $headerNavBar.each(function () {
    var $this = $(this);

    $this.on('clickoutside touchendoutside', function () {
      if ($this.hasClass('active')) { $this.removeClass('active'); }
    });
  });

  // Category toggle
  //-------------------------------------------------

  $('.category-toggle button').on('click',function(){
    $('.category-toggle').toggleClass('active');
  });

  var $CategoryTtoggle = $('.category-toggle');

  $CategoryTtoggle.each(function () {
    var $this = $(this);

    $this.on('clickoutside touchendoutside', function () {
      if ($this.hasClass('active')) { $this.removeClass('active'); }
    });
  });

// Dropzone - Picture Upload
//--------------------------------------------



// Gallery Nanogallery
//--------------------------------------------
  $(document).ready(function () {
         jQuery("#nanoGallery").nanoGallery({
            thumbnailWidth: 'auto',
            thumbnailHeight: 100,
            locationHash: false,
            thumbnailHoverEffect:'borderLighter,imageScaleIn80',
            itemsBaseURL:'http://brisbois.fr/nanogallery/demonstration/'
          });
    });

//Text rotator
//-------------------------------------------------
  
    $(document).ready(function () {
        $("#demo").wordsrotator({
        words: ['Local Restaurants (Mama Put)','Hotels','Mechanic Workshops'], // Array of words, it may contain HTML values
        randomize: true, //show random entries from the words array
        animationIn: "flipInY", //css class for entrace animation
        animationOut: "flipOutY", //css class for exit animation
        speed: 3000 // delay in milliseconds between two words
        });

         $("#demo2").wordsrotator({
        words: ['Lagos','Abuja','PortHarcourt'], // Array of words, it may contain HTML values
        randomize: true, //show random entries from the words array
        animationIn: "rotateInUpLeft", //css class for entrace animation
        animationOut: "flipOutY", //css class for exit animation
        speed: 3000 // delay in milliseconds between two words
        });
    });
   

  //home slide tab-content hide
  //---------------------------------------
  $('.home-tab li > a').on('click', function(){

    $CategoryTtoggle.removeClass('active');
  });

  // home map tab-content hide
  //---------------------------------------------
  $('.accordion-tab li > div a').on('click', function(){

    $CategoryTtoggle.removeClass('active');
  });


  // our-partners slider customize
  //-----------------------------------------
  $("#partners-slider").owlCarousel({
    autoPlay: 3000,
    items : 6,
    itemsDesktop : [1199,4],
    itemsDesktopSmall : [979,3],
    itemsTablet: [600,2]
  });

  // featured businesses slider customize
  //-----------------------------------------
  $("#businesses-slider").owlCarousel({
    autoPlay: 3000,
    items : 5,
    itemsDesktop : [1199,4],
    itemsDesktopSmall : [979,3],
    itemsTablet: [600,2],
    paginationNumbers: true,
    paginationSpeed : 400
  });


  // home slider section
  //-------------------------------------------
  var homeSlide = $("#home-slider");

  homeSlide.owlCarousel({
    autoPlay: 3000,
    navigation : false, // Show next and prev buttons
    slideSpeed : 600,
    paginationSpeed : 600,
    singleItem:true

  });


  // Custom Navigation Events
    $(".next").click(function(){
      homeSlide.trigger('owl.next');
    });
    $(".prev").click(function(){
      homeSlide.trigger('owl.prev');
    });




  // UOU Selects
  // ---------------------------------------------------------
 

  // map initialization
  //-----------------------------------

  // home-map customization

  $("#map_canvas").goMap({

    maptype: 'HYBRID',
    scrollwheel: false,
    zoom: 10,
    markers: [{
        latitude: 6.5482201,
        longitude: 3.3975005,
        icon: 'img/content/map-marker.png',
        html: 'NdiBiz'
    }]
  });

  // company map initialization

  $("#company_map_canvas").goMap({

    maptype: 'HYBRID',
    zoom: 15,
    scrollwheel: false,
    address: 'Ikoyi, Lagos, Nigeria',
    markers: [{
        latitude: 37.7762546,
        longitude: -122.43277669999998,
        icon: 'img/content/map-marker-company.png',
        html: 'NdiBiz'
      },{
        latitude: 37.77013804160774,
        longitude: -122.40819811820984,
        icon: 'img/content/map-marker-company.png',
        html: 'NdiBiz'
    }]
  });

  // company-map-street


  // contact map
  $("#contact_map_canvas").goMap({
    maptype: 'ROADMAP',
    zoom: 13,
    scrollwheel: false,

    markers: [{
      latitude: 37.793100669930396,
      longitude: -122.41769313812256,
      icon: 'img/content/map-marker-company.png',
      html: 'NdiBiz'
    }]
  });


  // company-contact map
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (event) {
    if(event.target.outerText == 'CONTACT'){
      $("#contact_map_canvas_one").goMap({
        maptype: 'ROADMAP',
        zoom: 13,
        scrollwheel: false,

        markers: [{
          latitude: 37.792218928191865,
          longitude: -122.43700504302979,
          icon: 'img/content/map-marker-company.png'
        }]
      });


      $("#contact_map_canvas_two").goMap({

        maptype: 'ROADMAP',
        zoom: 13,
        scrollwheel: false,

        markers: [{
          latitude: 37.77125750792944,
          longitude: -122.4085521697998,
          icon: 'img/content/map-marker-company.png'
        }]
      });
    }
  });


  // distance slider initialize

  // distance slider

  $( "#slider-range-min" ).slider({
    range: "min",
    value: 42,
    min: 1,
    max: 100,
    slide: function( event, ui ) {
      $( "#amount" ).val( ui.value +   "km" );
    }
  });
  $( "#amount" ).val( $( "#slider-range-min" ).slider( "value" ) +   "km");


  $( "#slider-range-search" ).slider({
    range: "min",
    value: 42,
    min: 1,
    max: 100,
    slide: function( event, ui ) {
      $( "#amount-search" ).val( ui.value +   "km" );
    }
  });
  $( "#amount-search" ).val( $( "#slider-range-search" ).slider( "value" ) +   "km");




  $( "#slider-range-search-day" ).slider({
    range: "min",
    value: 20,
    min: 1,
    max: 300,
    slide: function( event, ui ) {
      $( "#amount-search-day" ).val(  "<"  + ui.value );
    }
  });
  $( "#amount-search-day" ).val( "<" +  $( "#slider-range-search-day" ).slider( "value" ) );





  // Accordion
  // ---------------------------------------------------------
  $('.accordion').each(function () {

    $(this).find('ul > li > a').on('click', function (event) {
      event.preventDefault();

      var $this = $(this),
        $li = $this.parent('li'),
        $div = $this.siblings('div'),
        $siblings = $li.siblings('li').children('div');

      if (!$li.hasClass('active')) {
        $siblings.slideUp(250, function () {
          $(this).parent('li').removeClass('active');
        });

        $div.slideDown(250, function () {
          $li.addClass('active');
        });
      } else {
        $div.slideUp(250, function () {
          $li.removeClass('active');
        });
      }
    });

  });



  // header login register scripts
  //-------------------------------------------

  var $headerLoginRegister = $('#header .header-login, #header .header-register');

  $headerLoginRegister.each(function () {
    var $this = $(this);

    $this.children('a').on('click', function (event) {
      event.preventDefault();
      $this.toggleClass('active');
    });

    $this.on('clickoutside touchendoutside', function () {
      if ($this.hasClass('active')) { $this.removeClass('active'); }
    });
  });



  var $headerNavbar = $('#header .header-nav-bar .primary-nav > li');

  $headerNavbar.each(function () {
    var $this = $(this);

    $this.children('a').on('click', function (event) {
      $this.toggleClass('active');
    });

    $this.on('clickoutside touchendoutside', function () {
      if ($this.hasClass('active')) { $this.removeClass('active'); }
    });
  });




  // Header Language Toggle
  // ---------------------------------------------------------
  var $headerLanguageToggle = $('#header .header-language');

  $headerLanguageToggle.children('a').on('click', function (event) {
    event.preventDefault();
    $(this).parent('.header-language').toggleClass('active');
  });

  $headerLanguageToggle.on('clickoutside touchendoutside', function () {
    if ($headerLanguageToggle.hasClass('active')) { $headerLanguageToggle.removeClass('active'); }
  });

  // Header Social Toggle
  // ---------------------------------------------------------
  var $headerSocialToggle = $('#header .header-social');

  $headerSocialToggle.children('a').on('click', function (event) {
    event.preventDefault();
    $(this).parent('.header-social').toggleClass('active');
  });

  $headerSocialToggle.on('clickoutside touchendoutside', function () {
    if ($headerSocialToggle.hasClass('active')) { $headerSocialToggle.removeClass('active'); }
  });

    // Header Social Toggle
  // ---------------------------------------------------------
  var $pageSocialToggle = $('#profile .social-share');

  $pageSocialToggle.children('a').on('click', function (event) {
    event.preventDefault();
    $(this).parent('.social-share').toggleClass('active');
  });

  $pageSocialToggle.on('clickoutside touchendoutside', function () {
    if ($pageSocialToggle.hasClass('active')) { $pageSocialToggle.removeClass('active'); }
  });


  // sub-categories remove and active class
  //-----------------------------------------------------
  var $CategoryLink = $('#categories .accordion ul li div a');

  $CategoryLink.on('click', function(){
    $(this)
      .addClass('active')
      .siblings().removeClass('active')
      .parent().parent().siblings('li').children('div a').click(function(){
        $CategoryLink.removeClass('active');
      });
  });


  // Datatables
  //-----------------------------------------------------
    $(document).ready(function() {
        $('#cats-table').DataTable({
            "paging":   true,
            "pagingType": "full_numbers"
        });
    });

   // Create category
  //-----------------------------------------------------
  $(document).ready(function() {
    $("#cat_name").select2({
      placeholder: 'Create new category',
      tags: true,

    });

  });


  $(document).ready(function() {
    $("#image_class").select2({
      placeholder: 'Choose/create  new fontawesome class',
      tags: true,
    });
  });

  $(document).ready(function() {
    $("#sub_cat").select2({
      placeholder: 'create a sub category',
      tags: true,
    });
  });

  // Edit category
  //-----------------------------------------------------
  $(document).ready(function() {
  $("#cat_name").select2({
    tags: true

  });

});


$(document).ready(function() {
  $("#image_class").select2({
    tags: true
  });
});

$(document).ready(function() {
  $("#sub_cat").select2({
    tags: true
  });
});

// View Biz
//-----------------------------------------------------
$(function() {
      $("#biz-table").DataTable({
        order: [[0, "desc"]]
      });
    });

// Uploads
//-----------------------------------------------------
// Confirm file delete
$(document).ready(function() {
    function delete_file(name) {
      $("#delete-file-name1").html(name);
      $("#delete-file-name2").val(name);
      $("#modal-file-delete").modal("show");
    }

    // Confirm folder delete
    function delete_folder(name) {
      $("#delete-folder-name1").html(name);
      $("#delete-folder-name2").val(name);
      $("#modal-folder-delete").modal("show");
    }

    // Preview image
    function preview_image(path) {
      $("#preview-image").attr("src", path);
      $("#modal-image-view").modal("show");
    }

    // Startup code
    $(function() {
      $("#uploads-table").DataTable();
    });

     $(function() {
      $("#category").DataTable();
    });
  });
  // style switcr for list-grid view
  //--------------------------------------------------
  $('.change-view button').on('click',function(e) {

    if ($(this).hasClass('grid-view')) {
      $(this).addClass('active');
      $('.list-view').removeClass('active');
      $('.page-content .view-switch').removeClass('product-details-list').addClass('product-details');

    } else if($(this).hasClass('list-view')) {
      $(this).addClass('active');
      $('.grid-view').removeClass('active');
      $('.page-content .view-switch').removeClass('product-details').addClass('product-details-list');
      }
  });




  // company-heading slider content
  //--------------------------------------------------------
  $('.button-content button').on('click',function(e) {
    console.log('clickes');

    if ($(this).hasClass('general-view-btn')) {
      $(this).addClass('active')
      .siblings().removeClass('active')
      .parent().parent().next().css("left","0%");


    } else if($(this).hasClass('map-view-btn')) {
      $(this).addClass('active')
      .siblings().removeClass('active')
      .parent().parent().next().css("left","-100%");

    } else if($(this).hasClass('male-view-btn')) {
      $(this).addClass('active')
     .siblings().removeClass('active')
     .parent().parent().next().css("left","-200%");
    }

  });


  $("a").click(function(e){
    if($(this).attr("href") === '#'){
      e.preventDefault();
    }
  });


}(jQuery));



$("document").ready(function($){
  var nav = $('.header-search-bar');

  $(window).scroll(function () {
    if ($(this).scrollTop() > 60) {
        nav.addClass("sticky");

    } else {
        nav.removeClass("sticky");
    }

  });
});


