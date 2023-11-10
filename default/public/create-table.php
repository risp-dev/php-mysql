<?php

$servername = "localhost";
$dbusername = "rispdev";
$dbpassword = "69*kQuyt/Kly5";
$dbname = "november";

try{
$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $dbusername, $dbpassword);
//$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", 'rispdev', '69*kQuyt/Kly5');


$sql =  'CREATE TABLE test(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    dumbtext TEXT,
    textdate date NOT NULL DEFAULT current_timestamp
    )
    DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';

    $pdo->exec($sql);
    $output="test table created.";
}
catch(PDOException $e) {
    $output='Database error: ' . $e->getMessage() . ' in ' . 
    $e->getFile().':'.$e->getLine();
}

include __DIR__ .'/../templates/connection.html.php';
