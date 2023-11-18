<?php
namespace Moobi\Avaliacao\model;
require_once __DIR__ . '/../../vendor/autoload.php';
use Moobi\Avaliacao\model\database\AbstractDAO;
use Moobi\Avaliacao\model\Dependente;

class DependenteDao extends AbstractDAO {

    /**
     * Salva um novo dependente no banco de dados
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param Dependente $oDependente
     * @param int $iIdFiliado
     * @return int
     *
     * @since 1.0.0
     */
    public function save(Dependente $oDependente, int $iIdFiliado): int {
        $sql = "INSERT INTO dpe_dependente(
            dpe_nome,
            dpe_data_nascimento,
            dpe_idade,
            dpe_grau_parentesco,
            flo_id
        ) VALUES(
            :nome,
            :data_nascimento,
            :idade,
            :grau_parentesco,
            :id_filiado
        )";

        $aParametros = [
            'nome' => $oDependente->getNome(),
            'data_nascimento' => $oDependente->getDataNascimento(),
            'idade' => $oDependente->getIdade(),
            'grau_parentesco' => $oDependente->getGrauParentesco(),
            'id_filiado' => $iIdFiliado
        ];

        $oHandler = parent::getHandler();
        $iResultado = $oHandler->execute($sql, $aParametros);

        return $iResultado;
    }

    /**
     * Busca todos os dependentes de um filiado no banco de dados
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param int $iIdFiliado
     * @return array
     *
     * @since 1.0.0
     */
    public function findAll(int $iIdFiliado): array {
        $sql = "SELECT * FROM dpe_dependente WHERE flo_id = :id_filiado";

        $aParametros = ['id_filiado' => $iIdFiliado];

        $oHandler = parent::getHandler();
        $stmt = $oHandler->query($sql, $aParametros);

        $aResultado = [];

        foreach($stmt->fetchAll(\PDO::FETCH_ASSOC) as $linha) {
            $aResultado[] = $linha;
        }

        return $aResultado;
    }

    /**
     * Busca um dependente pelo id
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param int $iIdDependente
     * @return array
     * 
     * @since 1.0.0
     */
    public function findById(int $iIdDependente): array {
        $sql = "SELECT * FROM dpe_dependente WHERE id = :id";
        $aParametros = ['id' => $iIdDependente];

        $oHandler = parent::getHandler();
        $stmt = $oHandler->query($sql, $aParametros);

        $aResultado = array();

        $aResultado = $stmt->fetch(\PDO::FETCH_ASSOC);
       
        return $aResultado;
    }

    /**
     * Remove um dependente pelo id
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param int $iIdDependente
     * @return int
     *
     * @since 1.0.0
     */
    public function delete(int $iIdDependente): int {
        $sql = "DELETE FROM dpe_dependente WHERE id = :id";

        $aParametros = ['id' => $iIdDependente];

        $oHandler = parent::getHandler();
        $iResultado = $oHandler->execute($sql, $aParametros);
        
        return $iResultado;
    }

    /**
     * Atualiza os dados do dependente
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param Dependente $oDependente
     * @param int $iIdDependente
     * @return int
     *
     * @since 1.0.0
     */
    public function replace(Dependente $oDependente, $iIdDependente): int {
        $sql = "UPDATE dpe_dependente
                SET dpe_nome = :nome,
                    dpe_data_nascimento = :data_nascimento,
                    dpe_idade = :idade,
                    dpe_grau_parentesco = :grau_parentesco
                WHERE id = :id";

        $aParametros = [
            'nome' => $oDependente->getNome(),
            'data_nascimento' => $oDependente->getDataNascimento(),
            'idade' => $oDependente->getIdade(),
            'grau_parentesco' => $oDependente->getGrauParentesco(),
            'id' => $iIdDependente
        ];

        $oHandler = parent::getHandler();
        $iResultado = $oHandler->execute($sql, $aParametros);
        
        return $iResultado;
    }
}
?>