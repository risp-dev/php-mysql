<?php
$title = 'Hi there';
include __DIR__ . '/../dbconn/conn.php';
include __DIR__ .'/../dbconn/dbfunctions.php';

 $sql = 'SELECT `joketext` 
 FROM `joke` 
 ORDER BY `id` DESC 
 LIMIT 1';

// $joke1 = getJoke($pdo, 1);
// echo $joke1['joketext'];
// $joke2 = getJoke($pdo, 2);
// echo $joke2['joketext'];
// $joke3 = getJoke($pdo, 3);
// echo $joke3['joketext'];


$result = $pdo->query($sql);

//while ($row = $result->fetch()) {
    foreach ($result as $row) {
    $jokes[] = $row['joketext'];
}
ob_start();
include __DIR__ . '/../templates/index.html.php';
$output = ob_get_clean();
include __DIR__ . '/../templates/layout.html.php';
