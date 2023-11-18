<?php
namespace Moobi\Avaliacao\model;

class Filiado {
    private $sNome;
    private $sCpf;
    private $sRg;
    private $sDataNascimento;
    private $iIdade;
    private $sEmpresa;
    private $sCargo;
    private $sSituacao;
    private $sTelefoneResidencial;
    private $sTelefoneCelular;
    private $sDataUltimaAtualizacao;

    public function __construct(
        string $sNome,
        string $sCpf,
        string $sRg,
        string $sDataNascimento,
        string $sEmpresa,
        string $sCargo,
        string $sSituacao,
        string $sTelefoneResidencial,
        string $sTelefoneCelular,
        string $sDataUltimaAtualizacao
    ) {
        $this->sNome = $sNome;
        $this->sCpf = $sCpf;
        $this->sRg = $sRg;
        $this->sDataNascimento = $sDataNascimento;
        $this->sEmpresa = $sEmpresa;
        $this->sCargo = $sCargo;
        $this->sSituacao = $sSituacao;
        $this->sTelefoneResidencial = $sTelefoneResidencial;
        $this->sTelefoneCelular = $sTelefoneCelular;
        $this->sDataUltimaAtualizacao = $sDataUltimaAtualizacao;
    }

    public function getNome(): string {
        return $this->sNome;
    }

    public function getCpf(): string {
        return $this->sCpf;
    }

    public function getRg(): string {
        return $this->sRg;
    }

    public function getDataNascimento() {
        return $this->sDataNascimento;
    }

    public function getIdade(): int {
        $tDataAtual = new \DateTime();
        $tDataNascimento = new \DateTime($this->sDataNascimento);
        $tDiferenca = $tDataAtual->diff($tDataNascimento);
        $iIdade = $tDiferenca->y;
        $this->iIdade = $iIdade;
        return $this->iIdade;
    }

    public function getEmpresa(): string{
        return $this->sEmpresa;
    }

    public function getCargo(): string {
        return $this->sCargo;
    } 

    public function getSituacao(): string {
        return $this->sSituacao;
    }

    public function getTelefoneResidencial(): string {
        return $this->sTelefoneResidencial;
    }

    public function getTelefoneCelular(): string {
        return $this->sTelefoneCelular;
    }

    public function getDataUltimaAtualizacao(): string {
        return $this->sDataUltimaAtualizacao;
    }

}

/*

// Suponha que você tenha os dados do filiado
$sNome = "João da Silva";
$sCpf = "123.456.789-00";
$sRg = "98765432-1";
$sDataNascimento = "1990-01-15";
$sEmpresa = "Minha Empresa";
$sCargo = "Gerente";
$sSituacao = "Ativo";
$sTelefoneResidencial = "(12) 3456-7890";
$sTelefoneCelular = "(98) 7654-3210";
$sDataUltimaAtualizacao = "2023-10-03";
$bDependentes = true;

// Crie uma instância da classe Filiado
$filiado = new Filiado(
    $sNome,
    $sCpf,
    $sRg,
    $sDataNascimento,
    $sEmpresa,
    $sCargo,
    $sSituacao,
    $sTelefoneResidencial,
    $sTelefoneCelular,
    $sDataUltimaAtualizacao,
    $bDependentes
);

// Calcule a idade do filiado
echo $idade = $filiado->getIdade();

*/

?>