<?php

try {
$pdo = new PDO("mysql:host=localhost;dbname=project24;charset=utf8mb4", 'antrekotas', 'vmo/opUp73GnXuRx') ;

$sql = 'DELETE from `jokes` WHERE id = ``';
$stmt = $pdo->prepare($sql) ;
$stmt->execute() ;  
}