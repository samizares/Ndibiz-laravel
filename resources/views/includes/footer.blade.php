<footer id="footer">
    <div class="main-footer">

      <div class="container">
        <div class="row">

          <div class="col-md-3 col-sm-6">
            <div class="about-globo">
              <h3 class="p5-bttm">About</h3>
              <p class="p0-top">BEAZEA Directory is a local business listing that shows you nearby
                brands and businesses to visit, shop, eat and play.</p>

            </div> <!-- End .about-globo -->
          </div> <!-- end Grid layout-->

          <div class="col-md-3 col-sm-6">
            <div class="popular-categories">
              <h3>Popular Categories</h3>

              <ul>
                <li><a href="/categories#Shopping"><i class="fa fa-shopping-cart"></i>Shopping</a></li>
                <li><a href="#"><i class="fa fa-paper-plane-o"></i>Hotels</a></li>
                <li><a href="/categories#cars"><i class="fa fa-cogs"></i>Cars</a></li>
                <li><a href="/categories#BankingandFinance"><i class="fa fa-book"></i> Banks</a></li>
                <li><a href="/categories#Restaurants"><i class="fa fa-building-o"></i>Restaurants</a></li>
              </ul>
            </div> <!-- end .popular-categories-->
          </div> <!-- end Grid layout-->

          <div class="col-md-3 col-sm-6">
            <div class="popular-categories">
              <h3>Business Owners</h3>

              <ul>
                <li><a href="/biz/create"><i class="fa "></i>Add a Business</a></li>
                <li><a href="#"><i class="fa "></i>Claim your Business Page</a></li>
                <li><a href="#"><i class="fa "></i>Advertise with Us</a></li>
                <li><a href="#"><i class="fa "></i> Login to your account</a></li>
              </ul>
            </div> <!-- end .popular-categories-->
          </div> <!-- end Grid layout-->

          <div class="col-md-3 col-sm-6">
            <div class="newsletter">
                <div id="sub-form">
                  <h3>Subscribe</h3>

                  <form id="subscribe" action="">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="Email" id="email" placeholder="Email address">
                    <button type="submit"><i class="fa fa-plus"></i></button>
                  </form>
                 </div>

              <h3>Keep In Touch</h3>

              <ul class="list-inline">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div> <!-- end .newsletter-->

          </div> <!-- end Grid layout-->
        </div> <!-- end .row -->
      </div> <!-- end .container -->
    </div> <!-- end .main-footer -->

    <div class="copyright">
      <div class="container">
        <p class="pull-left">Copyright &copy; 
                        <script type="text/javascript">
                            var currentYr = new Date();
                            var insertYr = currentYr.getFullYear();
                            document.write(insertYr);
                        </script>
                            NdiBiz Directory - All Rights Reserved. 
                            </p>
        <p class="pull-right">Powered by  <a href="#">CuriouzMind Tech</a></p>
      </div> <!-- END .container -->
    </div> <!-- end .copyright-->
</footer> <!-- end #footer --> 



