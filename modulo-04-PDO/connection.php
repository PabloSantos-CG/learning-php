<?php

$db = 'mysql';
$host = 'localhost';
$dbName = 'mydb_pdo';
$username = 'root';
$password = '';

$dsn = "$db:host=$host;dbname=$dbName";

try {
    $pdo = new PDO($dsn, $username, $password);
    echo 'Connection started <hr />';
} catch (PDOException $err) {
    echo $err->getMessage();
}
