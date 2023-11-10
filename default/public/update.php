<?php

try {
$pdo = new PDO("mysql:host=localhost;dbname=november;charset=utf8mb4", 'rispdev', '69*kQuyt/Kly5');

$output = 'Database connection established.';

   //$sql = 'UPDATE test SET `textdate` = "2002-04-09", `dumbtext` = "Pakeistas tekstas 3 eil" WHERE id = 3';
   $sql = 'UPDATE test SET `dumbtext` = "Pakeistas 5 tekstas" WHERE id = 5';
  //$sql = 'DELETE FROM test WHERE id = 10';
    
        
    $affectedRows = $pdo->exec($sql);
    $output="Table updated. Affected:  " . $affectedRows . ' row(s)!';
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    $output='Database error: ' . $e->getMessage() . ' in ' . 
    $e->getFile().':'.$e->getLine();
}
    
    include __DIR__ .'/../templates/connection.html.php';

 