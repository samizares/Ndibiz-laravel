<footer id="footer">
    <div class="main-footer">
      <div class="container">
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
        <p class="pull-left text-capitalize">Copyright &copy;
                        <script type="text/javascript">
                            var currentYr = new Date();
                            var insertYr = currentYr.getFullYear();
                            document.write(insertYr);
                        </script>
                            NdiBiz Directory - All Rights Reserved.
        </p>
          <ul class="list-inline pull-right p0">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
      </div> <!-- END .container -->
    </div> <!-- end .copyright-->
</footer> <!-- end #footer -->



