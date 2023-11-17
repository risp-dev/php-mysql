<?php

function allJokes($dbase) {
    $stmt = $dbase->prepare('SELECT COUNT(*) FROM `test`');
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
/*function getInsertDumb($pdo, $dumbtext, $authorid) {
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
*/
function updateJoke($pdo, $jokeId, $joketext, $authorId) {
    $stmt = $pdo->prepare('UPDATE `joke` SET
    `authorId` = :authorId,
    `joketext` = :joketext
    WHERE `id` = :id');
    $values = [
    ':joketext' => $joketext,
    ':authorId' => $authorId,
    ':id' => $jokeId
    ];
    $stmt->execute($values);
    }
