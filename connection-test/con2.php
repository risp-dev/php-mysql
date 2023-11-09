<?php 

$servername = "localhost";
$dbusername = "rispdev";
$dbpassword = "69*kQuyt/Kly5";
$dbname = "november";

$connection = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    if($connection -> connect_error) {
        die("". $connection -> connect_error);
    }
    echo "Connected";
    $connection -> close();
