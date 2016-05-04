<footer id="footer">
    <div class="main-footer">
      <div class="container">
          {{--newsletter subscription--}}
        <div class="row">
          <div class="col-md-12">
            <div class="newsletter text-center">
                <h3 class="m0-top"><strong>Subscribe to our newsletter</strong></h3>
                <div id="sub-form">
                  <form class="form-inline" id="subscribe" action="">
                   <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="form-control" type="Email" id="email" placeholder="Email address">
                       <button type="submit" class="btn btn-default btn-block"> Subscribe</button>
                   </div>

                  </form>
                </div>
            </div> <!-- end .newsletter-->
          </div> <!-- end Grid layout-->
        </div> <!-- end .row -->
      </div> <!-- end .container -->
    </div> <!-- end .main-footer -->
    <div class="copyright">
      <div class="container">
          <div class="row">
              <div class="col-md-12 text-center">
                  <ul class="list-inline footer-nav">
                      <li><a href="/aboutus">About Us</a></li>
                      <li>|</li>
                      <li><a href="/contact">Contact Us</a></li>
                  </ul>
                  <p id="copyright" class="text-capitalize text-center pull-none"></p>
              </div>
          </div>
        <div class="row hidden">
            <div class="col-md-6 text-left text-capitalize">
                <ul class="list-inline footer-nav">
                    <li><a href="/faqs">FAQs</a></li>
                    <li>|</li>
                    <li><a href="/tos">Terms &amp; Conditions</a></li>
                    <li>|</li>
                    <li><a href="/privacy">Privacy Policy</a></li>
                    <li>|</li>
                    <li><a href="/aboutus">About Us</a></li>
                    <li>|</li>
                    <li><a href="/contact">Contact Us</a></li>
                </ul>
                <p id="copyright"></p>
            </div>
            <div class="col-md-6">
                <ul class="list-inline pull-right p0 hidden">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
      </div> <!-- END .container -->
    </div> <!-- end .copyright-->
</footer> <!-- end #footer -->



