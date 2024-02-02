<?php
class JokeWebsite {
    public function getDefaultRoute() {
        return 'joke/home';
    }
    public function getController(string $controllerName) {
        include __DIR__ . '/../dbconn/conn.php';
        //include __DIR__ . '/../classes/DatabaseTable.php'; nes yra autoload.php
        include __DIR__ . '/../controllers/AuthorController.php';
        include __DIR__ . '/../controllers/JokeController.php';

        $jokesTable = new DatabaseTable($pdo, 'joke', 'id');
        $authorsTable = new DatabaseTable($pdo, 'author', 'iod');

            if ($controllerName === 'joke') {
                $controller = new JokeController($jokesTable, $authorsTable);
            }
            else if ($controllerName === 'author') {
                $controller = new AuthorController($authorsTable);
            }
            return $controller;


    }
}