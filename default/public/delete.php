<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=november;charset=utf8mb4', 'rispdev', '69*kQuyt/Kly5');
    
    $sql = 'DELETE FROM `test` WHERE `id` = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();
    header('location: select.php');
    

}catch(PDOException $e) {
    $title = 'Error';
    $output = 'DB error ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
   
    
}