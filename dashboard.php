<?php
session_start();

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

</body>
</html>