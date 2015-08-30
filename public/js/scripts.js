
  //  scrollspy fixed searchbar
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


  // header login register scripts
  //-------------------------------------------
  $("document").ready(function($){
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
  });
    // Header Social Toggle
    // ---------------------------------------------------------
  $("document").ready(function($){
    var $headerSocialToggle = $('#header .header-social');

    $headerSocialToggle.children('a').on('click', function (event) {
      event.preventDefault();
      $(this).parent('.header-social').toggleClass('active');
    });

    $headerSocialToggle.on('clickoutside touchendoutside', function () {
      if ($headerSocialToggle.hasClass('active')) { $headerSocialToggle.removeClass('active'); }
    });

  });
  // SELECTIZE
  // ---------------------------------------------------------
       $(function() {
      // Enable Selectize
              $('#location').selectize({
              valueField: 'id',
              labelField: 'name',
              searchField: ['name'],
              renrender:{
                  option:function(item, escape) {
                    return '<div>' + escape(item.name) +'</div>';
                  }
                },
                load:function(query, callback){
                  if(!query.length) return callback();
                  $.ajax({
                    url: './api/location',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                      l: query
                    },
                    success: function(res) {
                      callback(res.data);
                      } 
                  });
                }
            });
          });

              $(function() {
                // Enable Selectize
              $('#category').selectize({
                valueField: 'id',
                labelField: 'name',
                searchField: ['name'],
                render:{
                  option:function(item, escape) {
                    return '<div><i class="fa fa-home"></i>' + ' ' + escape(item.name) +'</div>';
                  }
                },
                load:function(query, callback) {
                  if(!query.length) return callback();
                  $.ajax({
                    url: './api/category',
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

               $(function() {
                // Enable Selectize
                  $('#company').selectize({
                    valueField: 'id',
                    searchField: ['name'],
                    labelField: 'name',
                    render:{
                      option:function(item, escape) {
                        return '<div><i class="fa fa-female"></i>' + ' ' + escape(item.name) +'</div>';
                       }
                      },
                    load:function(query, callback) {
                      if(!query.length) return callback();
                      $.ajax({
                        url: './api/company',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                          m: query
                        },
                        success: function(res) {
                          callback(res.data);
                          }
                      });
                    }
                  });
              });

                $(function() {
                // Enable Selectize
              $('#category3').select2({
                placeholder: 'search category',
                tags: true,

                });
          });

  // our-partners slider customize
  //-----------------------------------------
  $(document.ready(function) {
    $("#partners-slider").owlCarousel({
      autoPlay: 3000,
      items : 6,
      itemsDesktop : [1199,4],
      itemsDesktopSmall : [979,3],
      itemsTablet: [600,2]
    });
  });

  // featured businesses slider customize
  //-----------------------------------------
  $(document.ready(function) {
    $("#businesses-slider").owlCarousel({
      autoPlay: 3000,
      items : 5,
      itemsDesktop : [1199,4],
      itemsDesktopSmall : [979,3],
      itemsTablet: [600,2],
      paginationNumbers: true,
      paginationSpeed : 400
    });
  });

  // home slider section
  //-------------------------------------------
  $(document).ready(function() {
    var homeSlide = $("#home-slider");

    $("homeSlide").owlCarousel({
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
  });

   
