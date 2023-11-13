<?php

try {
$pdo = new PDO("mysql:host=localhost;dbname=november;charset=utf8mb4", 'rispdev', '69*kQuyt/Kly5');

$output = 'Database connection established.';
      $sql = 'SELECT `dumbtext` FROM `test`';

    $result = $pdo->query($sql);

    while ($row = $result->fetch()) {
        $jokes[] = $row['dumbtext'];
    }

    $title = 'List of Jokes';

    ob_start();

    include __DIR__ . '/../templates/dumbtext.html.php';

    $output = ob_get_clean();
   
  //  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    $output='Database error: ' . $e->getMessage() . ' in ' . 
    $e->getFile().':'.$e->getLine();
}
    
    include __DIR__ .'/../templates/layout.html.php';

 