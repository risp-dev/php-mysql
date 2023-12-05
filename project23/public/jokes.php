<?php
$title = 'My crazy jokes';
include __DIR__ . '/../dbconn/conn.php';

 //$sql = 'SELECT `joketext`, `id` FROM joke';

$sql = 'SELECT j.`id`, j.`joketext`, j.`jokedate`, a.`name`, a.`email`
FROM
`joke` j 
INNER JOIN `author` a
ON
j.`authorid`=a.`id`';

  $jokes = $pdo->query($sql);

  $title = 'Joke list';

  ob_start();
include __DIR__ . '/../templates/jokelist.html.php';
$output = ob_get_clean();
include __DIR__ . '/../templates/layout.html.php';