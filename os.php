<?php
require_once 'db.php';

function createOs($titulo, $descricao, $userId) {
    $db = conn();

    $sql = "INSERT INTO os (titulo, descricao, user_id) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);

    return $stmt->execute([$titulo, $descricao, $userId]);
}

function getAllOs() {
    $db = conn();

    $sql = "SELECT * FROM os";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



?>