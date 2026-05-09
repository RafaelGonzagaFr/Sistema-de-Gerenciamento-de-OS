<?php
require_once 'os.php';

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$clienteId = $_POST['cliente_id'];;

createOs($titulo, $descricao, $clienteId);

header("Location: dashboard.php?status=os_criada");
exit;
?>