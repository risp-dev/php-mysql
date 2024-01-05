<?php 

// function totalJokes($database) {
//     $stmt = $database->prepare('SELECT COUNT(*) FROM `joke` ');

// $stmt->execute();

// $row = $stmt->fetch();
// return $row[0];
// }

function total($pdo, $table) {
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM `'. $table .'`');
    $stmt->execute();

    $row = $stmt->fetch();
    return $row[0];
}

function findAll($pdo, $table) {
    $stmt = $pdo->prepare('SELECT * FROM `'. $table .'`');
    $stmt->execute();
    return $stmt->fetchAll();
}

function findById($pdo, $table, $primaryKey, $value) {
    $query = 'SELECT * FROM `' . $table .'`  WHERE `'. $primaryKey . '`= :value';
   //??? $stmt = 'SELECT * FROM `' . $table .'`  WHERE `'. $primaryKey . '`= :value';

    $values = [
        'value' => $value
    ];
    $stmt = $pdo->prepare($query);
    $stmt->execute($values);
    return $stmt->fetch();
}

function find($pdo, $table, $field, $value) {
    $query = 'SELECT * FROM `' . $table .'` WHERE `'. $field .'` = :value';

    $values = [
        'value' => $value
    ];
    $stmt = $pdo->prepare($query);
    $stmt->execute($values);
    return $stmt->fetchAll();
}



function processDates($values) {
    foreach ($values as $key => $value) {
        if ($value instanceof DateTime) {
            $values[$key] = $value->format('Y-m-d H:i:s');
        }
    }
    return $values;
    }


// function insertJoke($pdo, $joketext, $authorid) {
//     $stmt = $pdo->prepare('INSERT INTO `joke` (`joketext`, `jokedate`, `authorid`)
//     VALUES
//     (:joketext, :jokedate, :authorid)');
    
//     $values = [
//     ':joketext' => $joketext,
//     ':authorid' => $authorid,
//     ':jokedate' => date('Y-m-d')
//     ];
    
//     $stmt->execute($values);
//     }

// function insertJoke($pdo, $values) {
//     $query = 'INSERT INTO  `joke` (';

//     foreach ($values as $key => $value) {
//         $query .= '`' . $key . '`,';
//     }

//     $query = rtrim($query, ',');
   
//     $query .= ') VALUES (';

//     foreach ($values as $key => $value) {
//         $query .= ':' . $key . ',';
//     }
//     $query = rtrim($query, ',');
//     $query .= ')';

//     $values = processDates($values);

//     $stmt = $pdo->prepare($query);
//     $stmt->execute($values);
// }

function insert($pdo, $table, $values) {
    $query = 'INSERT INTO `'. $table .'` (';
    foreach ($values as $key => $value) {
        $query .='`'. $key .'`,';
        //$query .= '`' . $key . '`,';
    }
    $query = rtrim($query, ',');
    $query .=') VALUES (';

    foreach($values as $key => $value) {
        $query .= ':'. $key .',';
    }
    $query = rtrim($query,',');
    $query .= ')';

    $values = processDates($values);

    $stmt = $pdo->prepare($query);
    $stmt->execute($values);
}

    // function updateJoke($pdo, $jokeId, $joketext, $authorId) {
    //     $stmt = $pdo->prepare('UPDATE `joke` 
    //     SET 
    //         `authorId` = :authorId,
    //         `joketext` = :joketext
    //         WHERE `id` = :id');

    //         $values = [
    //             ':joketext' => $joketext,
    //             ':authorId' => $authorId,
    //             ':id' => $jokeId
    //         ];
    //         $stmt->execute($values);
    // }

// function updateJoke($pdo, $values) {
//         $query = ' UPDATE `joke` SET ';

//         foreach ($values as $key => $value) {
//             $query .= '`'. $key . '` = :' . $key . ',';
//         }
//         $query = rtrim($query, ',');
//         $query .= ' WHERE `id` = :primaryKey' ;
//         $values['primaryKey'] = $values['id'];
//         $values = processDates($values);
        
//         $stmt = $pdo->prepare($query);
//         $stmt->execute($values);
//     }

function update($pdo, $table, $primaryKey, $values) {
    $query = ' UPDATE `' . $table . '` SET ';
    foreach($values as $key => $value) {
        $query.= '`'. $key .'` =:'. $key .',';
    }
    $query = rtrim($query, ',');
    $query .= ' WHERE `'. $primaryKey .'`  = :primaryKey';
    
    $values['primaryKey'] = $values['id'];
    $values = processDates($values);

    $stmt = $pdo->prepare($query);
    $stmt->execute($values);
}

// function deleteJoke($pdo, $id) {
//         $stmt = $pdo->prepare('DELETE FROM `joke` WHERE `id` = :id');
    
//         $values = [
//             'id' => $id
//         ];
//         $stmt->execute($values);
//     }

function delete($pdo, $table, $field, $value) {
    $values = [':value' => $value];
    $stmt = $pdo->prepare('DELETE FROM `'. $table .'` WHERE `'. $field .'` = :value');
    $stmt->execute($values);
}

function allJokes($pdo) {
        $stmt = $pdo->prepare('SELECT `joke`.`id`, `joketext`, `jokedate`, `name`, `email`
    FROM `joke` INNER JOIN `author`
ON `authorid` = `author`.`id`');

$stmt->execute();
return $stmt->fetchAll();
    }

// function allJokes($pdo) {
//         $stmt = $pdo->prepare('SELECT `joke`.`id`, `joketext`, `name`, `email`
//     FROM `joke` INNER JOIN `author`
// ON `authorid` = `author`.`id`');

// $stmt->execute();
// return $stmt->fetchAll();
//     }

// function save($pdo, $table, $primaryKey, $record) {
//     try{
//         if(empty($record[$primaryKey])) {
//             unset($record[$primaryKey]);
//         }
//         insert($pdo, $table, $record);
//     }
//     catch (PDOException $e) {
//         update($pdo, $table, $primaryKey, $record);
//     }
// }
function save($pdo, $table, $primaryKey, $record) {
	try {
        if (empty($record[$primaryKey])) {
          unset($record[$primaryKey]);
        }
        insert($pdo, $table, $record);
	}
	catch (PDOException $e) {
		update($pdo, $table, $primaryKey, $record);
	}
}