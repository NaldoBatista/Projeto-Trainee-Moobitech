<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Navegação</title>
</head>
<body>
    <h1>Navegação</h1>
    <form action="dados_pessoais.php" method="get">
        <label for="">Qual é o seu nome?</label>
        <input type="text" name="nome">

        <button class="btn" type="submit">Avançar</button>
    </form>
</body>
</html>