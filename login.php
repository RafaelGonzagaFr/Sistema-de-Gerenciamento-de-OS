<?php
require_once 'users.php';

$email = $_POST['email'] ?? '';
$senha = $_POST['password'] ?? '';

$user = getUserByEmail($email);

if ($user) {
    if (password_verify($senha, $user['senha'])) {

        session_start();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nome'] = $user['nome'];

        header("Location: dashboard.php");
        exit;
    } else {
        header("Location: index.php?erro=senha");
        exit;
    }
} else 
    header("Location: index.php?erro=usuario");
    exit;
?>