<?php

require_once 'EmpresaDao.php';

class Empresa {
    private $sNome;
    private $sEmail;
    private $sCnpj;
    private $sCep;
    private $sEstado;
    private $sCidade;
    private $sBairro;
    private $sLogradouro;
    private $sTelefone;

    public function __construct(
        string $nome,
        string $email,
        string $cnpj,
        string $cep,
        string $estado,
        string $cidade,
        string $bairro,
        string $logradouro,
        string $telefone
    ) {
        $this->sNome = $nome;
        $this->sEmail = $email;
        $this->sCnpj = $cnpj;
        $this->sCep = $cep;
        $this->sEstado = $estado;
        $this->sCidade = $cidade;
        $this->sBairro = $bairro;
        $this->sLogradouro = $logradouro;
        $this->sTelefone = $telefone;
    }

    public function save() {
        $oEmpresaDao = new EmpresaDao();
        $oEmpresaDao->save($this);
    }

    public function getNome() {
        return $this->sNome;
    }

    public function getEmail() {
        return $this->sEmail;
    }

    public function getCnpj() {
        return $this->sCnpj;
    }

    public function getCep() {
        return $this->sCep;
    }

    public function getEstado() {
        return $this->sEstado;
    }

    public function getCidade() {
        return $this->sCidade;
    }

    public function getBairro() {
        return $this->sBairro;
    }

    public function getLogradouro() {
        return $this->sLogradouro;
    }

    public function getTelefone() {
        return $this->sTelefone;
    }
}

?>