<?php
$title = 'My crazy jokes';

$jokesTable = new DatabaseTable();
$jokesTable->pdo = $pdo;
$jokesTable->table = 'joke';
$jokesTable->primaryKey = 'id';
$joke1 = $jokesTable->find('id', 1)[0];
$joke2 = $jokesTable->find('id', 2)[0];