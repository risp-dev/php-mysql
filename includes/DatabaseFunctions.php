<?php

function allJokes($dbase) {
    $stmt = $dbase->prepare('SELECT COUNT(*) FROM `test`');
    $stmt->execute();
    $row = $stmt->fetch();
    return $row[0];
}

