<?php
    if (isset($_GET['status']) && $_GET['status'] === 'sucesso') {
        echo "Cadastro realizado com sucesso!";
    }

    if (isset($_GET['erro'])) {
        if ($_GET['erro'] === 'senha') {
            echo "Senha incorreta!";
        }       elseif ($_GET['erro'] === 'usuario') {
            echo "Usuário não encontrado!";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de OS</title>
</head>
<body>

    <form action="login.php" method="POST">
        <input type="email" name="email" id="email">
        <input type="password" name="password" id="password">
        <input type="submit" value="Entrar">
    </form>
</body>
</html>