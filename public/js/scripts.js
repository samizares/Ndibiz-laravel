
  //  scrollspy fixed searchbar
  $(document).ready(function(){
      var nav = $('.header-search-bar');

      $(window).scroll(function () {
        if ($(this).scrollTop() > 60) {
            nav.addClass("sticky").fadeIn(2000);
            nav.addClass("fixed-header-logo");
            nav.removeClass("scroll-btn");
        } else {
            nav.removeClass("sticky");
            nav.removeClass("fixed-header-logo");
            nav.addClass("scroll-btn");
        }

      });
    });


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
    
  
  // our-partners slider customize
  //-----------------------------------------
  $(document).ready(function() {
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


  
   
