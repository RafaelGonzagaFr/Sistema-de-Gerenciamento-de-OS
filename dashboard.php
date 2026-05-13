<?php
require_once "os.php";
require_once 'cliente.php';

session_start();

$ordens = getAllOsWithClientName();

// verifica se está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?erro=nao_autorizado");
    exit;
}

$clientes = getAllClientes();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
        }

        header {
            background: #2c3e50;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header a {
            color: #fff;
            text-decoration: none;
            margin-left: 15px;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 0 20px;
        }

        h2 {
            margin-top: 0;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        form input, form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        form input[type="submit"] {
            background: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }

        form input[type="submit"]:hover {
            background: #2980b9;
        }

        .actions {
            margin-bottom: 15px;
        }

        .actions a {
            background: #2ecc71;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
        }

        .actions a:hover {
            background: #27ae60;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        table th {
            background: #3498db;
            color: white;
            padding: 12px;
            text-align: left;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        table tr:hover {
            background: #f1f1f1;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        .status {
            padding: 5px 10px;
            border-radius: 6px;
            color: white;
            font-size: 12px;
            display: inline-block;
        }

        .status.aberto {
            background: #f39c12;
        }

        .status.fechado {
            background: #2ecc71;
        }
    </style>
</head>

<body>

<header>
    <div>
        <strong>Dashboard</strong>
    </div>
    <div>
        Bem-vindo, <?= htmlspecialchars($_SESSION['user_nome']); ?> |
        <a href="clientes.php">Clientes</a>
        <a href="logout.php">Sair</a>
    </div>
</header>

<div class="container">

    <div class="card">
        <h2>Nova Ordem de Serviço</h2>

        <form action="registrarOs.php" method="POST">
            <input type="text" name="titulo" placeholder="Título" required>
            <input type="text" name="descricao" placeholder="Descrição">

            <select name="cliente_id" required>
                <option value="">Selecione um cliente</option>
                <?php foreach($clientes as $cliente): ?>
                    <option value="<?= $cliente['id'] ?>">
                        <?= htmlspecialchars($cliente['nome']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Registrar nova OS">
        </form>
    </div>

    <div class="card">
        <h2>Ordens de Serviço</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Cliente</th>
                <th>Data</th>
            </tr>

            <?php foreach ($ordens as $os): ?>
                <tr>
                    <td><?= $os['id'] ?></td>
                    <td><?= htmlspecialchars($os['titulo']) ?></td>
                    <td><?= htmlspecialchars($os['descricao']) ?></td>
                    <td>
                        <span class="status <?= strtolower($os['status']) ?>">
                            <?= $os['status'] ?>
                        </span>
                    </td>
                    <td><?= htmlspecialchars($os['cliente_nome']) ?></td>
                    <td><?= $os['created_at'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</div>

</body>
</html>