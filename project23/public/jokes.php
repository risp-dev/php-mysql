<?php
$title = 'My crazy jokes';
try {
include __DIR__ . '/../dbconn/conn.php';
include __DIR__ . '/../classes/DatabaseTable.php';
//include __DIR__ .'/../dbconn/dbfunctions.php';

$jokesTable = new DatabaseTable($pdo, 'joke', 'id');
$authorsTable = new DatabaseTable($pdo, 'author', 'id');

$result = $jokesTable->findAll();
//$result = findAll($pdo, 'joke');

$jokes = [];
foreach ($result as $joke) {
  $author = $authorsTable->find('id', $joke['authorid'])[0];
  //$author = find($pdo, 'author', 'id', $joke['authorid'])[0];
  $jokes[] = [
    'id'=> $joke['id'],
    'joketext' => $joke['joketext'],
    'jokedate' => $joke['jokedate'],
    'name' => $author['name'],
    'email'=> $author['email'],
  ];
}
 
  $title = 'Joke list';
  $totalJokes = $jokesTable->total();
  //$totalJokes = total($pdo, 'joke');

ob_start();
include __DIR__ . '/../templates/jokelist.html.php';
$output = ob_get_clean();
} catch (PDOException $e) {
  $title = 'An error has accured';

  $output = 'Database error '. $e->getMessage() . 'in ' . $e->getFile() . ':' . $e->getLine();
}
include __DIR__ . '/../templates/layout.html.php';