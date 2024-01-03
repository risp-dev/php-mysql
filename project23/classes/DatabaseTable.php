<?php 
$databaseTable = new DatabaseTable();
$databaseTable->pdo = $pdo;
$databaseTable->table = 'joke';
$databaseTable->primaryKey = 'id';

class DatabaseTable {
    public $pdo;
    public $table;
    public $primaryKey;

//    public function total($pdo, $table) {

//         $stmt = $pdo->prepare('SELECT COUNT(*) FROM `'. $table .'`');
//         $stmt->execute();

//         $row = $stmt->fetch();
//         return $row[0];
//     } 
public function total() {
    $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM `'. $this->table .'`');
    $stmt->execute();

    $row = $stmt->fetch();
    return $row[0];
}

    // public function find($pdo, $table, $field, $value) {
    //     $query = 'SELECT * FROM `' . $table .'` WHERE `'. $field .'` = :value';

    //     $values = [
    //         'value' => $value
    //     ];
    //     $stmt = $pdo->prepare($query);
    //     $stmt->execute($values);
    //     return $stmt->fetchAll();
    // }
    public function find($field, $value) {
        $query = 'SELECT * FROM `'. $this->table .'` WHERE `'. $field .'` = :value';
        $values = [
            'value' => $value
        ];
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($values);
        return $stmt->fetchAll();
    }

    // private function insert($pdo, $table, $values) {
    //     $query = 'INSERT INTO `'. $table .'` (';
            
    //     foreach ($values as $key => $value) {
    //         $query .='`'. $key .'`,';
            
    //     }
    //     $query = rtrim($query, ',');
    //         $query .=') VALUES (';
    
    //     foreach($values as $key => $value) {
    //         $query .= ':'. $key .',';
    //     }
    //     $query = rtrim($query,',');
    //     $query .= ')';
    
    //     $values = $this->processDates($values);
    
    //     $stmt = $pdo->prepare($query);
    //     $stmt->execute($values);
    // }

    private function insert($values) {
        $query = 'INSERT INTO `'. $this->table .'` (';

        foreach($values as $key => $value) {
            $query .= '`' . $key .'`,';
        }
        $query = rtrim($query, ',');
        $query .= ') VALUES (';
        
        foreach ($values as $key => $value) {
            $query .= ':' . $key . ',';
        }

        $query = rtrim($query, ',');
        $query .= ')';

        $values = $this->processDates($values);

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($values);
    }

    // private function update($pdo, $table, $primaryKey, $values) {
    //     $query = ' UPDATE `' . $table . '` SET ';
    //     foreach($values as $key => $value) {
    //         $query.= '`'. $key .'` =:'. $key .',';
    //     $query = rtrim($query, ',');
    //     $query .= ' WHERE `'. $primaryKey .'`  = :primaryKey';     
    //     $values['primaryKey'] = $values['id'];
    //     $values = $this->processDates($values);
    //     $stmt = $pdo->prepare($query);
    //     $stmt->execute($values);
    // }
    private function update($values) {
        $query = 'UPDATE `'. $this->table.'` SET ';
        foreach($values as $key => $value) {
            $query .= '`'. $key .'` = :' . $key .',';
        }
        $query = rtrim($query, ',');
        $query .= ' WHERE `'. $this->primaryKey .'` = :primaryKey';

        $values['primaryKey'] = $values['id'];
        $values = $this->processDates($values);
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($values);

    }

    // public function delete($pdo, $table, $field, $value) {
    //     $values = [':value' => $value];
    //     $stmt = $pdo->prepare('DELETE FROM `'. $table .'` WHERE `'. $field .'` = :value');
    //     $stmt->execute($values);
    // }

    public function delete($field, $value) {
        $values = [':value' => $value];

        $stmt = $this->pdo->prepare('DELETE FROM `'. $this->table. '` WHERE `'. $field .' = :value`');
        $stmt->execute($values);
    }

    // public function findAll($pdo, $table) {
    //     $stmt = $pdo->prepare('SELECT * FROM `'. $table .'`');
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }
    public function findAll() {
        $stmt = $this->pdo->prepare('SELECT * FROM `'. $this->table .'`');
        $stmt->execute();
        return $result->fetchAll();
    }

    private function processDates($values) {
        foreach ($values as $key => $value) {
            if ($value instanceof DateTime) {
                $values[$key] = $value->format('Y-m-d H:i:s');
            }
        }
        return $values;
    }

    // public function save($pdo, $table, $primaryKey, $record) {
    //     try {
    //         if (empty($record[$primaryKey])) {
    //           unset($record[$primaryKey]);
    //         }
    //         $this->insert($pdo, $table, $record);
    //     }
    //     catch (PDOException $e) {
    //         $this->update($pdo, $table, $primaryKey, $record);
    //     }
    // }
    public function save($record) {
        try{
            if(empty($record[$this->primaryKey])) {
                unset($record[$this->primaryKey]);
            }
            $this->insert($record);
        }catch(PDOException $e) {
            $this->update($record);
        }
    }

}