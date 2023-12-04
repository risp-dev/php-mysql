<?php

include __DIR__ . '/../dbconn/conn.php';

$sql = 'DELETE FROM `joke` WHERE `id` = :id';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':id', $_POST['id']);
$stmt->execute();

header('location: jokes.php');
    
    
    
    
    include __DIR__ . '/../templates/layout.html.php';
    ob_start(); 
    include __DIR__ .'/../templates/jokelist.html.php';
    $output = ob_get_clean();