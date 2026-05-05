<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$password = $_POST['password'];
//Adicionar senha hash
//Fazer conexão com o banco de dados
//Persistir no banco de dados

header("Location: index.php?status=sucesso");
exit;
?>