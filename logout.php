<?php
session_start();//accessing the current section
//if no session variables exists then redirect the user
if (!isset($_SESSION['member_id'])) {
  # code...
  header("location:index.php");
  exit();
  //cancels and redirects the user 

}
else {
  # code...
  $_SESSION = array();//Destroy the variables 
  $params = session_get_cookie_params();
  //Destroy the cookie
  setcookie(session_name(), ", time()-42000,
  $params["path"], $params["domain],
  $params["secure"], $params["httponly"]);

  if (session_status() == PHP_SESSION_ACTIVE) {
    # code...
    session_destroy();//Destroy the session itself  
  }header("location:index.php");
}

?>