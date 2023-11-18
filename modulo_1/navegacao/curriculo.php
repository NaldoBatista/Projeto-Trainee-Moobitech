<?php
session_start();

if (empty($_SESSION['idade'])) {
    $_SESSION['idade'] = $_POST['idade'];
};
if (empty($_SESSION['email'])) {
    $_SESSION['email'] = $_POST['email'];
};
if (empty($_SESSION['endereco'])) {
    $_SESSION['endereco'] = $_POST['endereco'];
};

//var_dump($_SESSION, $_POST);
// Utilizado para debugar o codigo.
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Currículo</h1>

    <h3>Nome: 
        <?php echo $_SESSION['nome'] ?>
    </h3>
    <h3>Idade:
        <?php echo $_SESSION['idade'] ?>
    </h3>
    <h3>E-mail:
        <?php echo $_SESSION['email'] ?>
    </h3>
    <h3>Endereco:
        <?php echo $_SESSION['endereco'] ?>
    </h3>

    <form action="registro.php"  method="post">

        <label for="">Faça login: </label>
        <br>
        <input type="text" name="login" placeholder="login">
        <br>
        <input type="password" name="senha" placeholder="senha">
        <br>
        <button class="btn" type="submit" >Avançar</button>

    </form>
</body>
</html>