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

//Simply SQL2 , by Rudy Limeback. 
//Jump Start MySQL3, by Timothy Boronczyk