<?php
require 'src/Sessao.php';
require 'config/conexao.php';
require 'src/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pegando dados do formulario com a super global post.
    $sNome = $_POST['nome'];
    $sUsuario = $_POST['usuario'];
    $sSenha = $_POST['senha'];

    // Inicializando sessao
    Sessao::iniciarSessao();
    Sessao::criarSessao($sNome, $sUsuario, $sSenha);

    // Salvando cadastro no banco de dados.
    $conn = conexao();
    $oUsuario = new Usuario($conn);
    $oUsuario->adicionarUsuario(Sessao::getNome(), Sessao::getUsuario(), Sessao::getSenha());

    //var_dump($_SESSION);
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

    <h1>Cadastro</h1>

    <form action="" method="post">

        <label for="">Nome:</label>
        <input type="text" name="nome" >
        <br>
        <label for="">Usuario:</label>
        <input type="text" name="usuario" >
        <br>
        <label for="">Senha:</label>
        <input type="password" name="senha" >
        <br>
        <button type="submit" >Cadastrar</button>

    </form>

</body>
</html>