<?php
namespace Website;
class JokeWebsite implements \Ninja\Website {
    public function getDefaultRoute(): string {
        return '/joke/home';
    }

    public function getController(string $controllerName): ?object {
        $pdo = new \PDO("mysql:host=localhost;dbname=project24;charset=utf8mb4;",  'antrekotas', 'vmo/opUp73GnXuRx');

        $jokesTable = new \Ninja\DatabaseTable($pdo, 'joke', 'id');
        $authorsTable = new \Ninja\DatabaseTable($pdo, 'author', 'id');

        if($controllerName === 'joke') {
            $controller = new \Website\Controllers\Joke($jokesTable, $authorsTable);
        }
        else if($controllerName === 'register') {
            $controller = new \Website\Controllers\Register($authorsTable);
        }
        //return $controller;
        else {
            $controller = null;
    }
    return $controller;
}
}