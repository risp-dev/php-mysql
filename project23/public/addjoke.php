<?php
if (isset($_POST['joketext'])) {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=project24;charsert=utf8mb4;",  'antrekotas', 'vmo/opUp73GnXuRx');
        
        //$output = '';
        $sql = 'INSERT INTO `joke` SET
        `joketext` = :joketext,
        `jokedate` = CURDATE()';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':joketext', $_POST['joketext']) ;
        $stmt->execute();
        header('Location: index.php');
        
        }catch (PDOException $e){
        
            $output = 'Klaida: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
        }
}else {
    $title = "Add new joke";
    ob_start();
    include __DIR__ ."/../templates/addjoke.html.php";
    $output = ob_get_clean();   
}
include __DIR__ ."/../templates/layout.html.php";