<?php
//Database connection info
Define('DB_USER', 'root');
Define('DB_PASSWORD', 'mogakafor hacking');
Define('DB_HOST', 'localhost');
Define('DB_NAME', 'wasifyads');

//Assigning the database connections to a variable $dbcon:
try {
    //code...
    $dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($dbcon, 'utf8');
    //more code goes here later
} catch (Exception $e) {
    //throw $th;
    //print "An excption error occurred. Message: " . $e->getMessage();
    print "The System is busy try again later";
}
catch(Error $e) {
    //Print "An Error occurred. Message: " . $e->getMessage();
    print "The System is busy please try again later. ";
}
?>