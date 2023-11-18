<?php
namespace Moobi\Avaliacao\model;

require_once __DIR__ . '/../../vendor/autoload.php';
use Moobi\Avaliacao\model\Filiado;
use Moobi\Avaliacao\model\database\AbstractDAO;

class FiliadoDao extends AbstractDAO {

    public function save(Filiado $oFiliado): int {
        $sql = "INSERT INTO flo_filiado (
            flo_nome, 
            flo_cpf, 
            flo_rg,
            flo_data_nascimento,
            flo_idade, 
            flo_empresa, 
            flo_cargo, 
            flo_situacao, 
            flo_telefone_residencial, 
            flo_telefone_celular, 
            flo_data_ultima_atualizacao) 
        VALUES (
            :nome, 
            :cpf, 
            :rg, 
            :data_nascimento, 
            :idade, 
            :empresa, 
            :cargo, 
            :situacao, 
            :telefone_residencial, 
            :telefone_celular, 
            :data_ultima_atualizacao)";

        $aParametros = [
            'nome' => $oFiliado->getNome(),
            'cpf' => $oFiliado->getCpf(),
            'rg' => $oFiliado->getRg(),
            'data_nascimento' => $oFiliado->getDataNascimento(),
            'idade' => $oFiliado->getIdade(),
            'empresa' => $oFiliado->getEmpresa(),
            'cargo' => $oFiliado->getCargo(),
            'situacao' => $oFiliado->getSituacao(),
            'telefone_residencial' => $oFiliado->getTelefoneResidencial(),
            'telefone_celular' => $oFiliado->getTelefoneCelular(),
            'data_ultima_atualizacao' => $oFiliado->getDataUltimaAtualizacao()
        ];

        $oHandler = parent::getHandler();
        $iResultado = $oHandler->execute($sql, $aParametros);
        return $iResultado;
    }

    public function findAll(array $aDados, int $iPagina, int $iLimite): array {
        // Paginação
        $iInicio = ($iPagina * $iLimite) - $iLimite;

        // Filtros
        $sNome = $aDados['nome'];
        $sMes = $aDados['mes'];

        $aParametros = array();

        $sql = "SELECT * FROM flo_filiado WHERE 1=1";

        if (!empty($sNome)) {
            $sql .= " AND flo_nome like :nome";
            $aParametros['nome'] = '%' . $sNome . '%';
        };

        if (!empty($sMes)) {
            $sql .= " AND MONTH(flo_data_nascimento) = :mes";
            $aParametros['mes'] = $sMes;
        };

        //$sql .= " ORDER BY flo_nome";

        $sql .= " LIMIT :inicio, :limite";
        $aParametros['inicio'] = $iInicio;
        $aParametros['limite'] = $iLimite;
        
        $oHandler = parent::getHandler();
        $stmt = $oHandler->query($sql, $aParametros);

        $aResultado = array();

        foreach($stmt->fetchAll(\PDO::FETCH_ASSOC) as $linha) {
            $aResultado[] = $linha;
        }

        return $aResultado;
    }

    public function findById(int $iId): array {
        $sql = "SELECT * FROM flo_filiado WHERE id = :id";
        $aParametros = ['id' => $iId];

        $oHandler = parent::getHandler();
        $stmt = $oHandler->query($sql, $aParametros);

        $aResultado = $stmt->fetch(\PDO::FETCH_ASSOC);
       
        return $aResultado !== false ? $aResultado: array();
    }
    
    public function replace($oFiliado, $iId): int {
        $sql = "UPDATE flo_filiado SET
            flo_nome = :nome,
            flo_cpf = :cpf,
            flo_rg = :rg,
            flo_data_nascimento = :data_nascimento,
            flo_idade = :idade,
            flo_empresa = :empresa,
            flo_cargo = :cargo,
            flo_situacao = :situacao,
            flo_telefone_residencial = :telefone_residencial,
            flo_telefone_celular = :telefone_celular,
            flo_data_ultima_atualizacao = :data_ultima_atualizacao
        WHERE id = :id";

        $aParametros = [
            'nome' => $oFiliado->getNome(),
            'cpf' => $oFiliado->getCpf(),
            'rg' => $oFiliado->getRg(),
            'data_nascimento' => $oFiliado->getDataNascimento(),
            'idade' => $oFiliado->getIdade(),
            'empresa' => $oFiliado->getEmpresa(),
            'cargo' => $oFiliado->getCargo(),
            'situacao' => $oFiliado->getSituacao(),
            'telefone_residencial' => $oFiliado->getTelefoneResidencial(),
            'telefone_celular' => $oFiliado->getTelefoneCelular(),
            'data_ultima_atualizacao' => $oFiliado->getDataUltimaAtualizacao(),
            'id' => $iId
        ];

        $oHandler = parent::getHandler();
        $iResultado = $oHandler->execute($sql, $aParametros);
        return $iResultado;
    }

    public function delete(int $iIdFiliado): int {
        $sql = "DELETE FROM flo_filiado WHERE id= :id";
        
        $aParametros = ['id' => $iIdFiliado];

        $oHandler = parent::getHandler();
        $iResultado = $oHandler->execute($sql, $aParametros);
        return $iResultado;
    }

    public function numeroRegistros(array $aDados): int {
        // Filtros
        $sNome = $aDados['nome'];
        $sMes = $aDados['mes'];

        $aParametros = array();

        $sql = "SELECT flo_nome FROM flo_filiado WHERE 1=1";

        if (!empty($sNome)) {
            $sql .= " AND flo_nome like :nome";
            $aParametros['nome'] = '%' . $sNome . '%';
        };

        if (!empty($sMes)) {
            $sql .= " AND MONTH(flo_data_nascimento) = :mes";
            $aParametros['mes'] = $sMes;
        };

        $oHandler = parent::getHandler();
        $stmt = $oHandler->query($sql, $aParametros);
        $iResultado = $stmt->rowCount();

        return $iResultado;
    }
}

?>