<?php
session_start();
$_SESSION['nome'] = $_GET['nome'];
?>

<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Navegação</title>
</head>
<body>
    <h1>Dados pessoais</h1>
    <h2><?php echo $_SESSION['nome'] ?></h2>

    <form action="curriculo.php" method="post"> 

        <label for="">Qual sua idade?  </label>
        <input type="text" name="idade" > <br>

        <label for="">Qual seu e-mail? </label>
        <input type="email" name="email" > <br>

        <label for="">Qual seu endereço? </label>
        <input type="text" name="endereco" > <br>

        <button class="btn" type="submit" >Avançar</button>

    </form>
</body>
</html>