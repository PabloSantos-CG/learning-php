<?php

require_once 'connection.php';

$id = 2;
$newUsername = 'UmNovoNomeSurge';
$newPassword = 'UmaNovaSenhaSurge';

$sql = 'UPDATE users SET username = :newUsername, password = :newPassword WHERE id = :id';

try {
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':newUsername', $newUsername);
    $stmt->bindParam(':newPassword', $newPassword);
    $stmt->execute();

    $stmt = $pdo->prepare('SELECT * FROM users');
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre >';
    print_r($data);
    echo '<pre />';

} catch (PDOException $error) {
    echo $error->getMessage();
}
