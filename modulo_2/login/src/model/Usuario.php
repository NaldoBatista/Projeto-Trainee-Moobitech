<?php
namespace Moobi\model;
require_once '/var/www/html/programa_de_trainee/modulo_2/login/src/utils/hashSenha.php';
class Usuario {

    private $sUsuario;
    private $sSenha;

    private $iNivelAcesso;

    public function __construct($sUsuario, $sSenha, $iNivelAcesso) {
        $this->sUsuario = $sUsuario;
        $this->sSenha = $sSenha;
        $this->iNivelAcesso = $iNivelAcesso;
    }

    public function getUsuario(): string {
        return $this->sUsuario;
    }

    public function getSenha(): string {
        return hashSenha($this->sSenha);
    }

    public function getNivelAcesso(): int {
        return $this->iNivelAcesso;
    }
}

?>