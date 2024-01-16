<?php

try {
    include __DIR__ . '/../dbconn/conn.php';
    include __DIR__ . '/../classes/DatabaseTable.php';
    include __DIR__ .'/../controllers/AuthorController.php';

    $jokesTable = new DatabaseTable($pdo, 'joke', 'id');
    $authorsTable = new DatabaseTable($pdo, 'author', 'id');
    
    $authorController = new AuthorController($authorsTable);

    $action = $_GET['action'] ?? 'home';

    if ($action == strtolower($action)) {
        $page = $authorController->$action();
    }else {
        http_response_code(301);
        header('LocatiomL index.php?action=' . strtolower($action));
    }
    $title = $page['title'];
    $variable = $page['variables'] ?? [];
    $output = loadTemplate($page['template'], $variables);
}catch(PDOException $e) {
    $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}
include __DIR__ . '/../templates/layout.html.php';