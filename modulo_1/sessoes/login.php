<?php
require 'src/Sessao.php';
require 'src/Usuario.php';
require 'config/conexao.php';

//session_start();
//var_dump($_SESSION);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    Sessao::iniciarSessao();

    if(Sessao::getUsuario() == $_POST['usuario'] && Sessao::getSenha() == $_POST['senha']) {
        header('Location: geral.php');
    } else {
        echo 'Usuário ou senha incorreta!';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>

    <form action="" method="post">

        <label for="">Usuario:</label>
        <input type="text" name="usuario" >
        <br>
        <label for="">Senha:</label>
        <input type="password" name="senha">
        <br>
        <button type="submit">Login</button>

    </form>

</body>
</html>