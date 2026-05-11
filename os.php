<?php
require_once 'db.php';

function createOs($titulo, $descricao, $clienteId) {
    $db = conn();

    $sql = "INSERT INTO os (titulo, descricao, cliente_id) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);

    return $stmt->execute([$titulo, $descricao, $clienteId]);
}

function getAllOs() {
    $db = conn();

    $sql = "SELECT * FROM os";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllOsWithClientName() {
    $db = conn();

    $sql = "SELECT 
                os.id,
                os.titulo,
                os.descricao,
                os.status,
                os.created_at,
                clientes.nome AS cliente_nome
            FROM os
                INNER JOIN clientes 
                    ON clientes.id = os.cliente_id;";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



?>