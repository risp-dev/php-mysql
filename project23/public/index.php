<?php
$title = 'Hi there';
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
ob_start();
include __DIR__ . '/../templates/index.html.php';
$output = ob_get_clean();
include __DIR__ . '/../templates/layout.html.php';
