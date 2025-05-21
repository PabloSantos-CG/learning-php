<?php

require_once 'connection.php';

$sql = 'INSERT INTO users (username, password) VALUES (:username, :password)';

try {
    $stmt = $pdo->prepare($sql);

    $username = 'Fulano22';
    $password = 'Ful@2.PHP';

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    $stmt->execute();
} catch (PDOException $error) {
    echo $error->getMessage();
}
