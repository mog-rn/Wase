<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  # code...
  require("cap.php");//recaptcha check
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>WASIFYAds</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/rangeslider.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  <!--Validate the input-->
        <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        # code...
        require('connect.php'); 
      }
        ?>
  
  <div class="site-wrap">
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar container py-0 bg-white" role="banner">

      <!-- <div class="container"> -->
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><img src="images/wasify.png" alt="" style="float: left;" width="100px" height="100px"><a href="index.html" class="text-black mb-0">Classy<span class="text-primary">Ads</span>  </a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="index.html">Home</a></li>
                <li><a href="listings.html">Ads</a></li>
                <li class="has-children">
                  <a href="about.html">About</a>
                  <ul class="dropdown">
                    <li><a href="#">The Company</a></li>
                    <li><a href="#">The Leadership</a></li>
                    <li><a href="#">Philosophy</a></li>
                    <li><a href="#">Careers</a></li>
                  </ul>
                </li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>

                <li class="ml-xl-3 login"><a href="login.html"><span class="border-left pl-xl-4"></span>Log In</a></li>
                <li class="active"><a href="register.html">Register</a></li>

                <li><a href="#" class="cta"><span class="bg-primary text-white rounded">+ Post an Ad</span></a></li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-auto py-3 col-6 text-right" style="position: relative; top: 3px;">
            <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
          </div>

        </div>
      <!-- </div> -->
      
    </header>

  
    
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1>Register</h1>
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 mb-5"  data-aos="fade">
      <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            # code...
            require('process-register-page.php');
          }
            ?>
          <form action="register-page.php" class="p-5 bg-white" method="post" onsubmit="return checked();" name="regform" id="regform">
             
             <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="first_name">Title</label> 
                  <input type="text" id="first_name" class="form-control" placeholder="Mr, Mrs, Miss" maxlength="12" pattern='[a-zA-Z]'
                  value="<?php if (isset($_POST['title'])) 
                    # code...
                    echo htmlspecialchars($_POST['first_name'], ENT_QUOTES);
                    
                  ?>">
                </div>
              </div>

             <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="first_name">First Name*</label> 
                  <input type="text" id="first_name" class="form-control" maxlength="30" title="Alphabetic and space only max of 30 characters"
                  value= 
                         "<?php
                         if (isset($_POST['first_name'])) 
                           # code...
                         echo htmlspecialchars($_POST['first_name'], ENT_QUOTES);
                         ?>">
                </div>
              </div>
              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="last_name">Last Name*</label> 
                  <input type="text" id="last_name" class="form-control" maxlength="40" required title="Alphabetic and space only max of 30 characters"
                  value= 
                         "<?php
                         if (isset($_POST['last_name'])) 
                           # code...
                         echo htmlspecialchars($_POST['last_name'], ENT_QUOTES);
                         ?>">
                </div>
              </div>
              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email*</label> 
                  <input type="email" id="email" class="form-control" maxlength="60" required 
                  value= 
                         "<?php
                         if (isset($_POST['email'])) 
                           # code...
                         echo htmlspecialchars($_POST['email'], ENT_QUOTES);
                         ?>">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="subject">Password</label> 
                  <input type="password" id="subject" name="password1" class="form-control" title="One number, one uppercase letter, one lowercase letter, one special character, with 8-12 characters" minlength="8" maxlength="12"
                  value= 
                         "<?php
                         if (isset($_POST['password1'])) 
                           # code...
                         echo htmlspecialchars($_POST['password1'], ENT_QUOTES);
                         ?>">
                         <span class="message" style="text-align:center">Between 8 - 12 chracters.</span>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="subject">Re-type Password*</label> 
                  <input type="password" id="subject" class="form-control" name="password2" minlength="8" maxlength="12" required 
                  value= 
                         "<?php
                         if (isset($_POST['password2'])) 
                           # code...
                         echo htmlspecialchars($_POST['password2'], ENT_QUOTES);
                         ?>">
                </div>
              </div>
              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="address">Address*</label> 
                  <input type="text" name="address1" id="address" class="form-control" maxlength="30" required 
                  value= 
                         "<?php
                         if (isset($_POST['address1'])) 
                           # code...
                         echo htmlspecialchars($_POST['address1'], ENT_QUOTES);
                         ?>">
                </div>
              </div>
              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="address2">Address 2</label> 
                  <input type="text" id="address2"  name="address2" class="form-control" maxlength="30" required 
                  value= 
                         "<?php
                         if (isset($_POST['address2'])) 
                           # code...
                         echo htmlspecialchars($_POST['address2'], ENT_QUOTES);
                         ?>">
                </div>
              </div>
              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="city">City*</label> 
                  <input type="city" id="city" name="city" class="form-control" maxlength="30" required 
                  value= 
                         "<?php
                         if (isset($_POST['city'])) 
                           # code...
                         echo htmlspecialchars($_POST['city'], ENT_QUOTES);
                         ?>">
                </div>
              </div>
              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="country">Country*</label> 
                  <input type="text" id="state_country" name="state_country" class="form-control" maxlength="30" required 
                  value= 
                         "<?php
                         if (isset($_POST['state_country'])) 
                           # code...
                         echo htmlspecialchars($_POST['state_country'], ENT_QUOTES);
                         ?>">
                </div>
              </div>
              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="zcode_pcode">Zip/Postal Code*</label> 
                  <input type="text" id="zcode_pcode" class="form-control" maxlength="30" required 
                  value= 
                         "<?php
                         if (isset($_POST['zcode_pcode'])) 
                           # code...
                         echo htmlspecialchars($_POST['zcode_pcode'], ENT_QUOTES);
                         ?>">
                </div>
              </div>
              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="telephone">Telephone Number*</label> 
                  <input type="tel" id="phone" name="phone" class="form-control" maxlength="30" required 
                  value= 
                         "<?php
                         if (isset($_POST['phone'])) 
                           # code...
                         echo htmlspecialchars($_POST['phone'], ENT_QUOTES);
                         ?>">
                </div>
              </div>
              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for=""></label> 
                  <div class="col-md-12">
                      <div class="float-left g-recaptcha"
                      data-sitekey=""></div>
                  </div>
                </div>
              </div>
              

              <div class="row form-group">
                <div class="col-12">
                  <p>Have an account? <a href="login.php">Log In</a></p>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Register" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

  
            </form>
          </div>
          
        </div>
      </div>
    </div>

    
    <div class="newsletter bg-primary py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h2>Newsletter</h2>
            <p>To receive our Yearly Newsletter please Subscribe.</p>
          </div>
          <div class="col-md-6">
            
            <form class="d-flex">
              <input type="text" class="form-control" placeholder="Email">
              <input type="submit" value="Subscribe" class="btn btn-white"> 
            </form>
          </div>
        </div>
      </div>
    </div>
    
    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-6">
                <h2 class="footer-heading mb-4">About</h2>
                <p>This is a digitalized platform that helps you realize your vision of improving your business by reaching a wider market through the online world. Your Success is Our Goal.</p>
              </div>
              
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Navigations</h2>
                <ul class="list-unstyled">
                  <li><a href="about.html">About Us</a></li>
                  <li><a href="about.html">Services</a></li>
                  <li><a href="">Testimonials</a></li>
                  <li><a href="contact.html">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-md-4">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-whatsapp"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <form action="#" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Search products..." aria-label="Enter Email" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary text-white" type="button" id="button-addon2">Search</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/rangeslider.min.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>