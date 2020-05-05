/*$sql = "CREATE USER \'mogaka\'@\'localhost\' IDENTIFIED VIA mysql_native_password USING \'***\'GRANT USAGE ON *.* TO \'mogaka\'@\'localhost\' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0";*/

<?php
//Conections to the database and MySQL.
//Constants:
define('DB_USER', 'Mogaka');
define('DB_PASSWORD', 'mogakafor hacking');
define('DB_HOST', 'localhost');
define('DB_NAME', 'wasifyads');

//Database connection
try {
    $dbcon = new mysqli(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    mysqli_set_charset($dbcon, 'utf8');
    //More code goes here...
} catch (Exception $e) {
    //print "An Exception occurred. Message:" . $e->getMessage();
    print "The System is busy please try again later.";
}
catch (Error $e){
    //print "An Error occurred. Message: " . $e->getMessage();
    print "The System is busy please try again later";
}
?>



