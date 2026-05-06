<?php
require_once 'os.php';

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$userId = 1;

createOs($titulo, $descricao, $userId);

header("Location: dashboard.php?status=os_criada");
exit;
?>