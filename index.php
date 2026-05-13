<?php
$msg = null;
$type = null;

if (isset($_GET['status']) && $_GET['status'] === 'sucesso') {
    $msg = "Cadastro realizado com sucesso!";
    $type = "sucesso";
}

if (isset($_GET['erro'])) {
    if ($_GET['erro'] === 'senha') {
        $msg = "Senha incorreta!";
        $type = "erro";
    } elseif ($_GET['erro'] === 'usuario') {
        $msg = "Usuário não encontrado!";
        $type = "erro";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de OS</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #3498db, #2c3e50);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 320px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .msg {
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .msg.erro {
            background: #e74c3c;
            color: white;
        }

        .msg.sucesso {
            background: #2ecc71;
            color: white;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            background: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }

        input[type="submit"]:hover {
            background: #2980b9;
        }

        .footer {
            text-align: center;
            margin-top: 10px;
            font-size: 13px;
            color: #666;
        }
    </style>
</head>

<body>

<div class="login-box">
    <h2>Login</h2>

    <?php if ($msg): ?>
        <div class="msg <?= $type ?>">
            <?= $msg ?>
        </div>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="password" placeholder="Senha" required>
        <input type="submit" value="Entrar">
    </form>

    <div class="footer">
        Sistema de Ordens de Serviço
    </div>
</div>

</body>
</html>