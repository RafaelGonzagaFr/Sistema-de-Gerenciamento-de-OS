<?php
require_once 'db.php';

function createUser($nome, $email, $senha) {
    $db = conn();

    $sql = "INSERT INTO users (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);

    return $stmt->execute([$nome, $email, $senha]);
}

function getUserByEmail($email) {
    $db = conn();

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$email]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}