<?php

$sUsuario = 'user';
$SSenha = '123';

// Verifica se a autenticação básica está sendo usada
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Área Restrita"');
    echo 'Autenticação necessária.';
    exit;
}

// Obtém o usuário e a senha fornecidos pelo cliente
$sUsuarioFornecido = $_SERVER['PHP_AUTH_USER'];
$sSenhaFornecida = $_SERVER['PHP_AUTH_PW'];

// Verifica se o usuário e a senha fornecidos correspondem aos valores corretos
if ( $sUsuarioFornecido !== $sUsuario || $sSenhaFornecida !== $SSenha) {
    header('HTTP/1.1 401 Unauthorized');
    echo 'Usuário ou senha incorretos.';
    exit;
}

// Se a autenticação for bem-sucedida, exiba o conteúdo restrito
echo 'Autenticação bem-sucedida! Você tem acesso à área restrita.';
?>