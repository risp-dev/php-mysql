<?php
try {
$pdo = new PDO("mysql:host=localhost;dbname=project24;charset=utf8mb4;",  'antrekotas', 'vmo/opUp73GnXuRx');

$output = '';

}catch (PDOException $e){

    $output = 'Klaida: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}

include __DIR__ . '/../templates/connection.html.php';