<?php
if (isset($_POST['joketext'])) {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=project24;charsert=utf8mb4;",  'antrekotas', 'vmo/opUp73GnXuRx');
        include_once __DIR__ .'/../dbconn/dbfunctions.php';

       // insertJoke($pdo, $_POST['joketext'], 1);
       insert($pdo, 'joke', [
        'authorId' => 1,
        'joketext' => $_POST['joketext'],
        'jokedate' => new DateTime()
       ]
    );
       
       
        //$output = '';
        //$sql = 'INSERT INTO `joke` SET
        //`joketext` = :joketext,
       // `jokedate` = CURDATE()';
       // $stmt = $pdo->prepare($sql);
       // $stmt->bindValue(':joketext', $_POST['joketext']) ;
       // $stmt->execute();
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