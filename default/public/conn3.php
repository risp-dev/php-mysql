<?php

//$servername = "localhost";
//$dbusername = "rispdev";
//$dbpassword = "69*kQuyt/Kly5";
//$dbname = "november";


try {
$pdo = new PDO("mysql:host=localhost;dbname=november;charset=utf8mb4", 'rispdev', '69*kQuyt/Kly5');

$output = 'Database connection established.';

 // Set the PDO error mode to exception catching thrown during subsequent database operations
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    // Catching connection errors
    $output = 'Unable to connect to the database server ' . $e->getMessage();
}

include __DIR__ .'/../templates/connection.html.php';
