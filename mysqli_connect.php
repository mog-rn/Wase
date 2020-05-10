/*$sql = "CREATE USER \'mogaka\'@\'localhost\' IDENTIFIED VIA mysql_native_password USING \'***\'GRANT USAGE ON *.* TO \'mogaka\'@\'localhost\' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0";*/

<?php



include 'wasifyads/config.php';
$connect = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbDatabase);
if (!$connect) {
    # code...
    echo "Failed to connect to database".mysqli_connect_error();

}
?>