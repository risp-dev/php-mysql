<?php
$title = 'My crazy jokes';
try {
include __DIR__ . '/../dbconn/conn.php';
include __DIR__ .'/../dbconn/dbfunctions.php';

 //$sql = 'SELECT `joketext`, `id` FROM joke';

// $sql = 'SELECT j.`id`, j.`joketext`, j.`jokedate`, a.`name`, a.`email`
// FROM
// `joke` j 
// INNER JOIN `author` a
// ON
// j.`authorid`=a.`id`';

$sql = 'SELECT `joke`.`id`, `joketext`, `name`, `email`
    FROM `joke` INNER JOIN `author`
      ON `authorid` = `author`.`id`';

  $jokes = $pdo->query($sql);

  $title = 'Joke list';
  $totalJokes = totalJokes($pdo);

ob_start();
include __DIR__ . '/../templates/jokelist.html.php';
$output = ob_get_clean();
} catch (PDOException $e) {
  $title = 'An error has accured';

  $output = 'Database error '. $e->getMessage() . 'in ' . $e->getFile() . ':' . $e->getLine();
}
include __DIR__ . '/../templates/layout.html.php';