<?php
try {
include __DIR__ . '/../dbconn/conn.php';
//include __DIR__ . '/../dbconn/dbfunctions.php';
include __DIR__ . '/../classes/DatabaseTable.php';

//$sql = 'DELETE FROM `joke` WHERE `id` = :id';
//deleteJoke($pdo, $_POST['id']);
//delete($pdo, 'joke', 'id', $_POST['id']);
$jokesTable = new DatabaseTable($pdo, 'joke', 'id');
$jokesTable->delete('id', $_POST['id']);

//$stmt = $pdo->prepare($sql);
//$stmt->bindValue(':id', $_POST['id']);
//$stmt->execute();

header('Location: jokes.php');
}catch(PDOException $e) {  
    $title = 'Klaida';

    $output = 'Database error ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
   // ob_start(); 
   // include __DIR__ .'/../templates/jokelist.html.php';
   // $output = ob_get_clean();
}
    include __DIR__ . '/../templates/layout.html.php';