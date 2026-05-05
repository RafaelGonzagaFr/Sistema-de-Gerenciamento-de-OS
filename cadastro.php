<?php
require_once 'users.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

createUser($nome, $email, $password);

header("Location: index.php?status=sucesso");
exit;
?>