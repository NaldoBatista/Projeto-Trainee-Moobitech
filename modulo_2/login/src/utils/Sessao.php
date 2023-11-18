<?php
class Sessao {
    
    public static function setNotificacao($sNotificacao) {
        session_start();
        $_SESSION['notificacao'] = $sNotificacao;
    } 

    public static function getNotificacao() {
        session_start();
        if(!empty($_SESSION['notificacao'])) {
            $sNotificacao = $_SESSION['notificacao'];
            $_SESSION['notificacao'] = null;
            return $sNotificacao;
        }
    }

    public static function login($aUsuario) {
        session_start();
        $aLogin = [
            'usuario' => $aUsuario['usuario'],
            'nivel_acesso' => $aUsuario['nivel_acesso']
        ];

        $_SESSION['login'] = $aLogin;
    }

    public static function getUsuario() {
        session_start();
        if (!empty($_SESSION['login'])) {
            return $_SESSION['login']['usuario'];
        }
    }

    public static function destruirSessao() {
        session_start();
        $_SESSION = null;
        session_destroy();
    }

    public static function getNivelAcesso(){
        session_start();
        return $_SESSION['login']['nivel_acesso'];
    } 
}