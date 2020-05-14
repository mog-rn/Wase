<?php                                                                                //#1
session_start();
if (!isset($_SESSION['user_level']) || ($_SESSION['user_level'] != 1))
{
    header("Location: login.php");
    exit();
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
            <h1 class="mb-0 site-logo"><img src="images/wasify.png" alt="" style="float: left;" width="100px" height="100px"><a href="index.html" class="text-black mb-0">WASIFY<span class="text-primary">Ads</span>  </a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="index.html">Home</a></li>
                <li><a href="listings.html">Ads</a></li>
                <li class="has-children active">
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
                <li><a href="register.html">Register</a></li>

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
            <h2 class="text-center">These are the registered users</h2>
    <p>

    <?php
try {
// This script retrieves all the records from the users table.                  
require('mysqli_connect.php'); // Connect to the database.
// Make the query:
// Nothing passed from user safe query
$query = "SELECT last_name, first_name, email, ";
$query .= "DATE_FORMAT(registration_date, '%M %d, %Y')";
$query .=
        " AS regdat, userid FROM users ORDER BY registration_date ASC";
// Prepared statement not needed since hardcoded
$result = mysqli_query ($dbcon, $query); // Run the query.
if ($result) { // If it ran OK, display the records.
// Table header.                                                                
echo '<table class="table table-striped">
<tr>
<th scope="col">Edit</th>
<th scope="col">Delete</th>
<th scope="col">Last Name</th>
<th scope="col">First Name</th>
<th scope="col">Email</th>
<th scope="col">Date Registered</th>
</tr>';
// Fetch and print all the records:                                             
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
               // Remove special characters that might already be in table to   
               // reduce the chance of XSS exploits
               $user_id = htmlspecialchars($row['userid'], ENT_QUOTES);
               $last_name = htmlspecialchars($row['last_name'], ENT_QUOTES);
               $first_name = htmlspecialchars($row['first_name'], ENT_QUOTES);
               $email = htmlspecialchars($row['email'], ENT_QUOTES);
               $registration_date = htmlspecialchars($row['regdat'], ENT_QUOTES);                                 
               echo '<tr>
                       <td><a href="edit_user.php?id=' . $user_id . '">Edit</a></td>
                       <td><a href="delete_user.php?id=' . $user_id . '">Delete</a></td>’;                         
               echo     '<td>' . $last_name . '</td>
                       <td>' . $first_name . '</td>
                       <td>' . $email . '</td>
                       <td>' . $registration_date . '</td>
               </tr>';
        }
        echo '</table>'; // Close the table.                                    
        mysqli_free_result ($result); // Free up the resources.
}
else { // If it did not run OK.
// Error message:
echo
'<p class="text-center">The current users could not be retrieved. ';
echo 'We apologize for any inconvenience.</p>';
// Debug message:
// echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
exit;
} // End of if ($result)
mysqli_close($dbcon); // Close the database connection.
}
catch(Exception $e) // We finally handle any problems here
{
     // print "An Exception occurred. Message: " . $e->getMessage();
     print "The system is busy please try later";
}
catch(Error $e)
{
      //print "An Error occurred. Message: " . $e->getMessage();
      print "The system is busy please try again later.";
         }
?>
</div>
    
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <h1>About Us</h1>
                <p class="mb-0">A World Class Classified Company</p>
              </div>
            </div>

            
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
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Contact Us</a></li>
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
            
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  <a href="#" target="_blank" ></a>
            
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
}