<?php
namespace Moobi\Avaliacao\model;

class Dependente {
    private $sNome;
    private $sDataNascimento;
    private $iIdade;
    private $sGrauParentesco;

    public function __construct(string $sNome, string $sDataNascimento, string $sGrauParentesco) {
        $this->sNome = $sNome;
        $this->sDataNascimento = $sDataNascimento;
        $this->sGrauParentesco = $sGrauParentesco;
    }

    public function getNome(): string {
        return $this->sNome;
    }

    public function getDataNascimento(): string {
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

    public function getGrauParentesco(): string {
        return $this->sGrauParentesco;
    }


}

?>