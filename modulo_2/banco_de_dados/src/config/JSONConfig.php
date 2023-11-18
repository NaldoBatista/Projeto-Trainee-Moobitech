<?php
namespace Moobi\BancoDeDados\config;
class JSONConfig{
	private $aConfig;

	public function __construct($sPath){
		$sJson = file_get_contents($sPath);
		$this->aConfig = json_decode($sJson, true);
	}

	public function getHost() {
		return $this->aConfig['host'];
	}

	public function getPorta() {
		return $this->aConfig['porta'];
	}

	public function getDbname() {
		return $this->aConfig['dbname'];
	}

	public function getUsuario() {
		return $this->aConfig['usuario'];
	}

	public function getSenha() {
		return $this->aConfig['senha'];
	}
}

?>