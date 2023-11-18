<?php
namespace Moobi\Avaliacao\utils;

class JSONConfig{
	private $aConfig;

	/**
     * Tranforma um arquivo JSON em array
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     * 
     * @param string $sCaminho
     * 
     * @since 1.0.0
     */
	public function __construct(string $sCaminho){
		$sJson = file_get_contents($sCaminho);
		$this->aConfig = json_decode($sJson, true);
	}

	/**
     * Pega o host no array de configuração
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string
     * 
     * @since 1.0.0
     */
	public function getHost(): string {
		return $this->aConfig['host'];
	}

	/**
     * Pega a porta no array de configuração
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string
     * 
     * @since 1.0.0
     */
	public function getPorta(): string {
		return $this->aConfig['porta'];
	}

	/**
     * Pega o nome do banco no array de configuração 
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string
     * 
     * @since 1.0.0
     */
	public function getDbname(): string {
		return $this->aConfig['dbname'];
	}

	/**
     * Pega o usuario no array de configuração
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string
     * 
     * @since 1.0.0
     */
	public function getUsuario(): string {
		return $this->aConfig['usuario'];
	}

	/**
     * Pega a senha no array de configuração
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string
     * 
     * @since 1.0.0
     */
	public function getSenha(): string {
		return $this->aConfig['senha'];
	}

	/**
     * Pega o array de configuração
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string
     * 
     * @since 1.0.0
     */
	public function getConfig(): array {
		return $this->aConfig;
	}
}

?>