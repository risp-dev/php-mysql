<?php

try {
$pdo = new PDO("mysql:host=localhost;dbname=november;charset=utf8mb4", 'rispdev', '69*kQuyt/Kly5');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

 