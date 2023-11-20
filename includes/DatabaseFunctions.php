<?php

function totalJokes($pdo) {
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM `test`');
    $stmt->execute();
    $row = $stmt->fetch();
    return $row[0];
}

function getJoke($pdo, $id) {
    $stmt = $pdo->prepare('SELECT * FROM `test` WHERE `id` = :id');
    
        $values = [
            'id' => $id 
        ];

    $stmt->execute($values);

    return $stmt->fetch();
    
}
function insertJoke($pdo, $dumbtext, $authorid) {
    $stmt = $pdo->prepare('INSERT INTO `test` 
    (`dumbtext`, `authorid`)
    VALUES
    (:dumbtext, :authorid)');

    $values = 
    [
        ':dumbtext' => $dumbtext,
        ':authorid' => $authorid
    ];
    $stmt->execute($values);
}

function updateJoke($pdo, $jokeid, $joketext, $authorid) {
    $stmt = $pdo->prepare('UPDATE `test` SET
    `authorid` = :authorid,
    `joketext` = :joketext
    WHERE `id` = :id');
    $values = [
    ':joketext' => $joketext,
    ':authorid' => $authorid,
    ':id' => $jokeid
    ];
    $stmt->execute($values);
    }

    function deleteJoke($pdo, $id) {
        $stmt = $pdo->prepare('DELETE FROM `test` WHERE `id` = :id');
        $values = [
            ':id' => $id
        ];
        $stmt->execute($values);
    }

    function allJokes($pdo) {
        $stmt = $pdo->prepare('SELECT `test`.`id`, `dumbtext`, `name`, `email`
        FROM `test` INNER JOIN `author`
        ON `authorid` = `author`.`id`');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    
