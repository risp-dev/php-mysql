<?php

try {
   include __DIR__ . '/../../includes/dbConn.php';
    
    $sql = 'DELETE FROM `test` WHERE `id` = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();
    header('location: select.php');
    

}catch(PDOException $e) {
    $title = 'Error';
    $output = 'DB error ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
   
    
}