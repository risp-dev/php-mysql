<?php 

function totaljokes($database) {
    $stmt = $database->prepare('SELECT COUNT(*) FROM `joke` ');

$stmt->execute();

$row = $stmt->fetch();
return $row[0];
}

function getJoke($pdo, $id) {
    $stmt = $pdo->prepare('SELECT * FROM `joke` WHERE `id` = :id');
    $values = [
        'id'=> $id
    ];
    $stmt->execute($values);
    return $stmt->fetch();
}

function insertJoke($pdo, $joketext, $authorid) {
    $stmt = $pdo->prepare('INSERT INTO `joke` (`joketext`, `jokedate`, `authorid`)
    VALUES
    (:joketext, :jokedate, :authorid)');
    
    $values = [
    ':joketext' => $joketext,
    ':authorid' => $authorid,
    ':jokedate' => date('Y-m-d')
    ];
    
    $stmt->execute($values);
    }