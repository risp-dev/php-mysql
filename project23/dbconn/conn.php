<?php
try {
$pdo = new PDO("mysql:host=localhost;dbname=project24;charsert=utf8mb4;",  'antrekotas', 'vmo/opUp73GnXuRx');

$output = 'Prisijungiau';

}catch (PDOException $e){

    $output = 'Klaida: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}

include __DIR__ . '/../templates/connection.html.php';