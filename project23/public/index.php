<?php

include __DIR__ . '/../dbconn/conn.php';

$sql = 'SELECT `joketext` 
FROM `joke` 
ORDER BY `id` DESC 
LIMIT 1';

$result = $pdo->query($sql);

//while ($row = $result->fetch()) {
    foreach ($result as $row) {
    $jokes[] = $row['joketext'];
}


include __DIR__ . '/../templates/layout.html.php';
include __DIR__ . '/../templates/index.html.php';