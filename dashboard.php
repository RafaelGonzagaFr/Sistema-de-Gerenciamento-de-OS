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
</head>
<body>

    <h1>Bem-vindo, <?php echo $_SESSION['user_nome']; ?>!</h1>

    <p>Você está logado no sistema.</p>

    <a href="logout.php">Sair</a>
    <form action="registrarOs.php" method="POST">
        <input type="text" name="titulo" id="titulo" placeholder="Título">
        <input type="text" name="descricao" id="descricao" placeholder="Descrição">
        <select name="cliente_id" required>
        <option value="">Selecione um cliente</option>
        <?php foreach($clientes as $cliente): ?>
            <option value="<?= $cliente['id'] ?>">
                <?= htmlspecialchars($cliente['nome']) ?>
            </option>
        <?php endforeach; ?>

    </select>
        <input type="submit" value=Registrar nova OS">
    </form>

    <a href="clientes.php">Registrar cliente</a>

    <table border="1">
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
                <td><?= $os['titulo'] ?></td>
                <td><?= $os['descricao'] ?></td>
                <td><?= $os['status'] ?></td>
                <td><?= $os['cliente_nome'] ?></td>
                <td><?= $os['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>