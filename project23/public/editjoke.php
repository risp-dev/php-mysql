<?php
try{
include __DIR__ .'/../dbconn/conn.php';
include __DIR__ .'/../dbconn/dbfunctions.php';

if (isset($_POST['joketext'])){
    updateJoke($pdo, $_POST['jokeid'], $_POST['joketext'], 1);

    header('Location: jokes.php');

    }else {
        $joke = getJoke($pdo, $_GET['id']);

        $title = 'Edit joke';

        ob_start();
        include __DIR__ .'/../templates/editjoke.html.php';

        $output = ob_get_clean();
    }
}catch(PDOException $e){
    $title = 'Error';

    $output = 'Database error:' . $e->getMessage() . 'in' . $e->getFile() .''. $e->getLine();
}

include __DIR__ .'/../templates/layout.html.php';
