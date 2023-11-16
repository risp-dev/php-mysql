<?php

try {
include_once __DIR__ . '/../../includes/dbConn.php';
include_once __DIR__ . '/../../includes/DatabaseFunctions.php';

echo allJokes($pdo);

/*
include_once __DIR__ . '/../includes/DatabaseConnection.php';
function totalJokes() {
$stmt = $pdo->prepare('SELECT COUNT(*) FROM `joke`');
$stmt->execute();
$row = $stmt->fetch();
return $row[0];
233 PHP & MySQL: Novice to Ninja, 7th Edition}
echo totalJokes();
*/


//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$output = 'Database connection established.';

$sql = 'SELECT `test`.`id`, `dumbtext`, `name`, `email`
FROM `test` INNER JOIN  `author`
ON `authorid` = `author`.`id`';

     // $sql = 'SELECT `dumbtext`, `id` FROM test';
    $jokes = $pdo->query($sql);

   /* while ($row = $dumbtext->fetch()) {
        $jokes[] = $row['dumbtext'];
    }
*/
    $title = 'List of Jokes';

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

 