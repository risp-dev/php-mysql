<?php
try{
include __DIR__ .'/../dbconn/conn.php';
//include __DIR__ .'/../dbconn/dbfunctions.php';
include __DIR__ . '/../classes/DatabaseTable.php';

$jokesTable = new DatabaseTable($pdo, 'joke', 'id');

if (isset($_POST['joke'])) {
    $joke = $_POST['joke'];
    $joke['jokedate'] = new DateTime();
    $joke['authorId'] = 2;
    
    $jokesTable->save($joke);
    //save($pdo, 'joke', 'id', $joke);
        
    header('location: jokes.php');
    
    } else {
        if (isset($_GET['id'])) {
           //$joke = find($pdo, 'joke', 'id', $_GET['id'])[0] ?? null;
            $joke = $jokesTable->find('id', $_GET['id'])[0] ?? nul;
        }
        else {
            $joke = null;
        }

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
