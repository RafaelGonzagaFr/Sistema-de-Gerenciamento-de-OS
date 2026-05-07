<?php
require_once 'db.php';

function createCliente($nome, $email, $documento, $telefone, $endereco) {
    $db = conn();

    $sql = "INSERT INTO clientes (nome, email, documento, telefone, endereco) VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);

    return $stmt->execute([$nome, $email, $documento, $telefone, $endereco]);
}

function getAllClientes() {
    $db = conn();

    $sql = "SELECT * FROM clientes";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getClienteByDocumento($documento) {
    $db = conn();

    $sql = "SELECT * FROM clientes WHERE documento = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$documento]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}