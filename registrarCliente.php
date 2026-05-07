<?php
require_once 'cliente.php';

$nome = $_POST['titulo'];
$email = $_POST['email'];
$documento = $_POST['documento'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];

createCliente($nome, $email, $documento, $telefone, $endereco);

header("Location: clientes.php?status=cliente_criado");
exit;
?>