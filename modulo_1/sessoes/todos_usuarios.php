<?php
require 'config/conexao.php';
require 'src/Usuario.php';

$conn = conexao();

$usuario = new Usuario($conn);
$usuarios = $usuario->exibirTodos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Todos Usuarios Cadastrados</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Usuario</th>
                <th>Senha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuarios as $u): ?>
                <tr>
                    <th><?php echo $u['id']?></th>
                    <th><?php echo $u['nome']?></th>
                    <th><?php echo $u['usuario']?></th>
                    <th><?php echo $u['senha']?></th>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <br>
    <a href="geral.php">
        <button>voltar</button>
    </a>

</body>
</html>