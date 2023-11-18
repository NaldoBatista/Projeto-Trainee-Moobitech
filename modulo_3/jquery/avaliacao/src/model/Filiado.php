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

    /**
     * Pega o nome do filiado
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
     * Pega o cpf do filiado
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string
     *
     * @since 1.0.0
     */
    public function getCpf(): string {
        return $this->sCpf;
    }

    /**
     * Pega o RG do filiado
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string 
     *
     * @since 1.0.0
     */
    public function getRg(): string {
        return $this->sRg;
    }

    /**
     * Pega a data de nascimento do filiado
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
     * Pega a idade do filiado
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
     * Pega o nome da empresa do filiado
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string
     *
     * @since 1.0.0
     */
    public function getEmpresa(): string{
        return $this->sEmpresa;
    }

    /**
     * Pega o cargo do filiado
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param 
     * @return 
     *
     * @since 1.0.0
     */
    public function getCargo(): string {
        return $this->sCargo;
    } 

    /**
     * Pega a situacao atual do filiado
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string 
     *
     * @since 1.0.0
     */
    public function getSituacao(): string {
        return $this->sSituacao;
    }

    /**
     * Pega o número do telefone residencial do filiado
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string
     *
     * @since 1.0.0
     */
    public function getTelefoneResidencial(): string {
        return $this->sTelefoneResidencial;
    }

    /**
     * Pega o número do telefone celular do filiado
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string 
     *
     * @since 1.0.0
     */
    public function getTelefoneCelular(): string {
        return $this->sTelefoneCelular;
    }

    /**
     * Pega a data da última atualização do filiado
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return string
     *
     * @since 1.0.0
     */
    public function getDataUltimaAtualizacao(): string {
        return $this->sDataUltimaAtualizacao;
    }

}

?>