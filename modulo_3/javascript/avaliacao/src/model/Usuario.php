<?php
namespace Moobi\Avaliacao\model;

class Usuario {
    private $sLogin;
    private $sSenha;
    private $sNivelAcesso;

    public function __construct(string $sLogin, string $sSenha, string $sNivelAcesso) {
        $this->sLogin = $sLogin;
        $this->sSenha = $sSenha;
        $this->sNivelAcesso = $sNivelAcesso;
    }

    public function getLogin(): string {
        return $this->sLogin;
    }

    public function getHashSenha(): string {
        return md5($this->sSenha);
    }

    public function getSenha(): string {
        return $this->sSenha;
    }

    public function getNivelAcesso(): string {
        return $this->sNivelAcesso;
    }
}
?>