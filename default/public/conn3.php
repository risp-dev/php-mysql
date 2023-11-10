<?php

$servername = "localhost";
$dbusername = "rispdev";
$dbpassword = "69*kQuyt/Kly5";
$dbname = "november";

//$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
try {
$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $dbusername, $dbpassword);
//$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$output = 'Database connection established.';

 // Set the PDO error mode to exception
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "Prisijungiau";
} catch(PDOException $e) {
    // If there's an error, catch it and print the error message
    //echo "Connection failed: " . $e->getMessage();
    $output = 'Unable to connect to the database server ' . $e->getMessage();
}

include __DIR__ .'/../templates/connection.html.php';
//C:\xampp\htdocs\ninja\php-mysql\default\templates\connection.html.php