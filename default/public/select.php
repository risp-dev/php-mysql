<?php

try {
$pdo = new PDO("mysql:host=localhost;dbname=november;charset=utf8mb4", 'rispdev', '69*kQuyt/Kly5');

$output = 'Database connection established.';
      $sql = 'SELECT `dumbtext` FROM `test`';

    $result = $pdo->query($sql);

    while ($row = $result->fetch()) {
        $test[] = $row['dumbtext'];
    }
   
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    $output='Database error: ' . $e->getMessage() . ' in ' . 
    $e->getFile().':'.$e->getLine();
}
    
    include __DIR__ .'/../templates/dumbtext.html.php';

 