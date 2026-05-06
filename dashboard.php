<?php
require_once "os.php";

session_start();

$ordens = getAllOs();
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
    <title>Dashboard</title>
</head>
<body>

    <h1>Bem-vindo, <?php echo $_SESSION['user_nome']; ?>!</h1>

    <p>Você está logado no sistema.</p>

    <a href="logout.php">Sair</a>
    <form action="registrarOs.php" method="POST">
        <input type="text" name="titulo" id="titulo" placeholder="Título">
        <input type="text" name="descricao" id="descricao" placeholder="Descrição">
        <input type="submit" value=Registrar nova OS">
    </form>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Data</th>
        </tr>
        <?php foreach ($ordens as $os): ?>
            <tr>
                <td><?= $os['id'] ?></td>
                <td><?= $os['titulo'] ?></td>
                <td><?= $os['descricao'] ?></td>
                <td><?= $os['status'] ?></td>
                <td><?= $os['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>