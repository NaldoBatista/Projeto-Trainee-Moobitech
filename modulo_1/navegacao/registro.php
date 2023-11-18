<?php
session_start();

$sSenha = 'moobitech';
$_SESSION['login'] = $_SESSION['nome'];

if ($_POST['login'] != $_SESSION['login'] || $_POST['senha'] != $sSenha ) {
    header('Location:curriculo.php');
}

//var_dump($_POST);
//var_dump($_SESSION);
// Utilizado para debugar o codigo.

$tHoraAtual = new DateTimeImmutable();
$tSeisHoras = new DateTimeImmutable('06:00:00');
$tDozeHoras = new DateTimeImmutable('12:00:00');
$tDezoitoHoras = new DateTimeImmutable('18:00:00');

$sSaudacao = '';
if($tHoraAtual >= $tSeisHoras && $tHoraAtual < $tDozeHoras) {
    $saudacao = 'Bom Dia!';
} else if ($tHoraAtual >= $tDozeHoras && $tHoraAtual < $tDezoitoHoras) {
    $sSaudacao = 'Boa Tarde!';
} else {
    $sSaudacao = 'Boa Noite!';
};
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
    <h1><?php echo $tHoraAtual->format('H:i:s') ?></h1>
    <h1><?php echo $sSaudacao ?></h1>
</body>
</html>