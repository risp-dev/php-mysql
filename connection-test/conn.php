<?php

$servername = "localhost";
$username = "rispdev";
$password = "69*kQuyt/Kly5";
$dbname = "november";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("". $conn->connect_error);
}
echo"connected!";
$conn ->close();