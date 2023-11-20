<?php

try {
include_once __DIR__ . '/../../includes/dbConn.php';
include_once __DIR__ . '/../../includes/DatabaseFunctions.php';

    $allJokes = allJokes($pdo);
    $title = 'List of Jokes';
    $totalJokes = totalJokes($pdo);

    ob_start();

    include __DIR__ . '/../templates/dumbtext.html.php';

    $output = ob_get_clean();
   
}
catch(PDOException $e) {
  $title = 'Error we have: ';
    $output='Database error: ' . $e->getMessage() . ' in ' . 
    $e->getFile().':'.$e->getLine();
}
    
    include __DIR__ .'/../templates/layout.html.php';

 