<?php
$title = 'My crazy jokes';
include __DIR__ . '/../dbconn/conn.php';

 $sql = 'SELECT `joketext`, `id` FROM joke';

  $jokes = $pdo->query($sql);

  $title = 'Joke list';

  ob_start();
include __DIR__ . '/../templates/jokelist.html.php';
$output = ob_get_clean();
include __DIR__ . '/../templates/layout.html.php';