<?php

function loadTemplate($templateFileName, $variables = []) {
    extract($variables);
    
    ob_start();
    include __DIR__ .'/../templates/' . $templateFileName;
    return ob_get_clean();
}   

try {
include __DIR__ . '/../dbconn/conn.php';
include __DIR__ . '/../classes/DatabaseTable.php';
include __DIR__ . '/../controllers/JokeController.php';
include __DIR__ . '/../controllers/AuthorController.php';

$jokesTable = new DatabaseTable($pdo, 'joke', 'id');
$authorsTable = new DatabaseTable($pdo, 'author', 'id');

$action = $_GET['actioon'] ?? 'home';
$controllerName = $_GET['controller'] ?? 'joke';

if ($cotrollerName === 'joke') {
    $controller = new JokeController($jokesTable, $authorsTable);
} else if ($controllerName === 'author') {
    $controller = new AuthorController($authorsTable);
}

        if($action == strtolower($action) && $controllerName == strtolower($controllerName)) {
            $page = $controller->$action();
        }else {
            http_response_code(301);
            header('Location: index.php?controller=' . strtolower($controllerName) . '&action=' . strtolower($action));
        }
            $title = $page['title'];

            $variables = $page['variables'] ?? [];
            $output = loadTemplate($page['template'], $variables);
    }
    catch (PDOException $e) {
        $title = 'Error';
        $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();

    }

include __DIR__ . '/../templates/layout.html.php';
