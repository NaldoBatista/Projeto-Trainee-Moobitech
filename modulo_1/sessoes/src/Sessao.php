<?php

class Sessao {

    public static function iniciarSessao() {
        if ( session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function criarSessao(string $nome, string $usuario, string $senha) {
        $aSessao = ['nome' => $nome, 'usuario' => $usuario, 'senha' => $senha];
        session_start();
        $_SESSION['sessao'] = $aSessao;
    }

    public static function getNome() {
        return $_SESSION['sessao']['nome'];
    }

    public static function getUsuario() {
        return $_SESSION['sessao']['usuario'];
    }

    public static function getSenha() {
        return $_SESSION['sessao']['senha'];
    }

    public static function destruirSessao() {
        self::iniciarSessao();
        session_destroy();
    }
}

?>