<?php
try {
    //code...
    $pdo = new PDO('mysql:host=localhost;dbname=wasifyads', 'root', 'mogakafor hacking');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
} catch (PDOException $e) {
    //throw $th;
    $output = 'Unable to connect to the database: ' . $e->getMessage() . 'in' . $e->getFile() . ':' . $e->getLine();
}
?>