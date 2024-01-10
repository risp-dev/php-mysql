<?php

function loadTemplate($templateFileName, $variables) {
    extract($variables);
    ob_start();
    include __DIR__ .'/../templates/' . $templateFileName;
    return ob_get_clean();
}   

try {
include __DIR__ . '/../dbconn/conn.php';
include __DIR__ . '/../classes/DatabaseTable.php';
include __DIR__ . '/../controllers/JokeController.php';

$jokesTable = new DatabaseTable($pdo, 'joke', 'id');
$authorsTable = new DatabaseTable($pdo, 'author', 'id');

$jokeController = new JokeController($jokesTable, $authorsTable);

//action replace ifelse
$action = $_GET['action'] ?? 'home';

//upperCase to lowerCase
if($action == strtolower($action)) {
    $jokeController->$action();
    } else {
        http_response_code(301);
        header('Location: index.php?action=' . strtolower($action));
        exit;
    }


$page = $jokeController->$action();

// if(isset($_GET['edit'])) {
//     $page = $jokeController->edit();
// }else if (isset($_GET['delete'])) {
//     $page = $jokeController->delete();
// }else if(isset($_GET['list'])) {
//     $page = $jokeController->list();
// }else {
//     $page = $jokeController->home();
// }
$title = $page['title'];

$variables = $page['variables'] ?? [];
$output = loadTemplate($page['template'], $variables);

// if (isset($page['variables'])) {
//     extract($page['variables']);
// }
//$output = $page['output'];
// ob_start();

// include __DIR__ . '/../templates/' . $page['template'];
// $output = ob_get_clean();

}catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}

include __DIR__ . '/../templates/layout.html.php';
