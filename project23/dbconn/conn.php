<?php
try {
$pdo = new PDO("mysql:host=localhost;dbname=project23;charsert=utf8mb4;",  'plombyras', '(xePExhUv.6qI02B');

$output = 'Prisijungiau';

}catch (PDOExemtion $e){

    $output = 'Klaida: ' . $e->getMessage() . ' in ' . $e->getFilename() . ':' . $e->getLine();
}

include __DIR__ . '/../templates/connection.html.php';