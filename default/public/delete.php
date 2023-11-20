<?php

try {
   include __DIR__ . '/../../includes/dbConn.php';
   include __DIR__ . '/../../includes/DatabaseFunctions.php';
    
    // $sql = 'DELETE FROM `test` WHERE `id` = :id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->bindValue(':id', $_POST['id']);
    // $stmt->execute();
    // header('location: select.php');

    deleteJoke($pdo, $_POST['id']);
    header(Location: select.php);
    
}catch(PDOException $e) {
    $title = 'Error';
    $output = 'DB error ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}
include __DIR__ . '/../templates/layout.html.php';