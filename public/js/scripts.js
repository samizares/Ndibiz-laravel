
      //  scrollspy fixed searchbar
        $(document).ready(function(){
            var nav = $('.header-top-bar');
            $(window).scroll(function () {
              if ($(this).scrollTop() > 60) {
                  nav.addClass("sticky").fadeIn(2000);
                  nav.removeClass("scroll-btn");
              } else {
                  nav.removeClass("sticky");
                  nav.addClass("scroll-btn");
              }
            });
        });

      $(document).ready(function () {
          $('ul.nav li.dropdown').hover(function() {
              $(this).find('.dropdown-menu').stop(true, true).fadeIn(100);
          }, function() {
              $(this).find('.dropdown-menu').stop(true, true).fadeOut(100);
          });
      })

      // header login register scripts
      //-------------------------------------------
        $(document).ready(function($) {
          var $headerLoginRegister = $('#header .header-login, #header .header-register, .company-profile .social-link');

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

      // Text rotator scripts
      //-------------------------------------------
      (function($){
          $.fn.extend({
              rotaterator: function(options) {

                  var defaults = {
                      fadeSpeed: 500,
                      pauseSpeed: 100,
                      child:null
                  };

                  var options = $.extend(defaults, options);

                  return this.each(function() {
                      var o =options;
                      var obj = $(this);
                      var items = $(obj.children(), obj);
                      items.each(function() {$(this).hide();})
                      if(!o.child){var next = $(obj).children(':first');
                      }else{var next = o.child;
                      }
                      $(next).fadeIn(o.fadeSpeed, function() {
                          $(next).delay(o.pauseSpeed).fadeOut(o.fadeSpeed, function() {
                              var next = $(this).next();
                              if (next.length == 0){
                                  next = $(obj).children(':first');
                              }
                              $(obj).rotaterator({child : next, fadeSpeed : o.fadeSpeed, pauseSpeed : o.pauseSpeed});
                          })
                      });
                  });
              }
          });
      })(jQuery);

      // our-partners slider customize
      //-----------------------------------------
        $(document).ready(function() {
          $("#partners-slider").owlCarousel({
            autoPlay: 3000,
            items : 6,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [979,3],
            itemsTablet: [600,2],
              stopOnHover : true
          });

          // featured businesses slider customize
          //-----------------------------------------
          $("#businesses-slider").owlCarousel({
            autoPlay: 3000,
            items : 5,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [979,3],
            itemsTablet: [600,2],
            pagination: true,
              stopOnHover : true
          });

          // featured businesses slider customize
          //-----------------------------------------
          $("#categories-slider").owlCarousel({
            autoPlay: 3000,
            items : 5,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [979,3],
            itemsTablet: [600,2],
            paginationNumbers: true,
            paginationSpeed : 400
          });
        });

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



