<?php

include __DIR__ . '/../dbconn/conn.php';

$sql = 'SELECT `joketext` FROM `joke`';
$result = $pdo->query($sql);

    foreach ($result as $row) {
    $jokes[] = $row['joketext'];
}

include __DIR__ . '/../templates/layout.html.php';
include __DIR__ .'/../templates/jokelist.html.php';