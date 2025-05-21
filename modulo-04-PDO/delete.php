<?php

require_once 'connection.php';

$id = 1;

$sql = 'DELETE FROM users WHERE id = :id';

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
} catch (PDOException $error) {
    echo $error->getMessage();
}
