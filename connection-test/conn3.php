<?php

$servername = "localhost";
$dbusername = "rispdev";
$dbpassword = "69*kQuyt/Kly5";
$dbname = "november";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if($conn -> connect_error) {
    die("". $conn -> connect_error);
}

echo "Prisijungiau";
$conn -> close();