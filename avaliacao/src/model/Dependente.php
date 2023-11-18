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

    /**
     * Pega o nome do dependente
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string
     *
     * @since 1.0.0
     */
    public function getNome(): string {
        return $this->sNome;
    }

    /**
     * Pega a data de nascimento do dependente
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string 
     *
     * @since 1.0.0
     */
    public function getDataNascimento(): string {
        return $this->sDataNascimento;
    }

    /**
     * Pega a idade do dependente
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return int 
     *
     * @since 1.0.0
     */
    public function getIdade(): int {
        $tDataAtual = new \DateTime();
        $tDataNascimento = new \DateTime($this->sDataNascimento);
        $tDiferenca = $tDataAtual->diff($tDataNascimento);
        $iIdade = $tDiferenca->y;
        $this->iIdade = $iIdade;
        return $this->iIdade;
    }

    /**
     * Pega o grau de parentesco do dependente
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string 
     *
     * @since 1.0.0
     */
    public function getGrauParentesco(): string {
        return $this->sGrauParentesco;
    }


}

?>