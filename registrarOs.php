<?php
require_once 'os.php';

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$clienteId = 1;

createOs($titulo, $descricao, $clienteId);

header("Location: dashboard.php?status=os_criada");
exit;
?>