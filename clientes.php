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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        table th {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            text-align: left;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        table tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Cadastro de Clientes</h1>

    <div class="card">
        <form action="registrarCliente.php" method="POST">
            <input type="text" name="titulo" placeholder="Nome do Cliente" required>
            <input type="email" name="email" placeholder="E-mail">
            <input type="text" name="documento" placeholder="Documento">
            <input type="text" name="telefone" placeholder="Telefone">
            <input type="text" name="endereco" placeholder="Endereço">
            <input type="submit" value="Registrar novo cliente">
        </form>
    </div>

    <div class="card">
        <table>
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
    </div>
</div>

</body>
</html>