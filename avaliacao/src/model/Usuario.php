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

    /**
     * Pega o login do Usuário
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string 
     *
     * @since 1.0.0
     */
    public function getLogin(): string {
        return $this->sLogin;
    }

    /**
     * Pega o hash da senha do usuário
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string 
     *
     * @since 1.0.0
     */
    public function getHashSenha(): string {
        return md5($this->sSenha);
    }

    /**
     * Pega a senha do usuário
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string
     *
     * @since 1.0.0
     */
    public function getSenha(): string {
        return $this->sSenha;
    }

    /**
     * Pega o nível de acesso do usuário
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string 
     *
     * @since 1.0.0
     */
    public function getNivelAcesso(): string {
        return $this->sNivelAcesso;
    }
}
?>