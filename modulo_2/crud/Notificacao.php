<?php
class Notificacao {
    
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
}