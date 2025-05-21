<?php

require_once 'connection.php';

$sql = 'SELECT * FROM users';

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre >';
    print_r($data);
    echo '<pre />';

} catch (PDOException $error) {
    echo $error->getMessage();
}