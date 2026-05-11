<?php
require_once "cliente.php";

session_start();

$clientes = getAllClientes();
// verifica se está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?erro=nao_autorizado");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="registrarCliente.php" method="POST">
        <input type="text" name="titulo" id="titulo" placeholder="Nome do Cliente">
        <input type="email" name="email" id="email" placeholder="E-mail">
        <input type="text" name="documento" id="documento" placeholder="Documento">
        <input type="text" name="telefone" id="telefone" placeholder="Telefone">
        <input type="text" name="endereco" id="endereco" placeholder="Endereço">
        <input type="submit" value=Registrar novo cliente">
    </form>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Documento</th>
            <th>Telefone</th>
            <th>Endereço</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= $cliente['id'] ?></td>
                <td><?= $cliente['nome'] ?></td>
                <td><?= $cliente['email'] ?></td>
                <td><?= $cliente['documento'] ?></td>
                <td><?= $cliente['telefone'] ?></td>
                <td><?= $cliente['endereco'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>