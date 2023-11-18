<?php
namespace Moobi\Avaliacao\model\database;

use PDO;

class MoobiDatabaseHandler {
    private $pdo;
    private static $oInstancia = null;
    private static $aConfig;

    /**
     * Cria um conexão pdo com as configurações do ambiente
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param array $aConfig
     *
     * @since 1.0.0
     */
    public function __construct(array $aConfig) {
        $host = $aConfig['host']; 
        $porta = $aConfig['porta']; 
        $dbname = $aConfig['dbname']; 
        $usuario = $aConfig['usuario']; 
        $senha = $aConfig['senha'];
        self::$aConfig = $aConfig;

        $sConn = "mysql:host=$host;port=$porta;dbname=$dbname";
        $this->pdo = new \PDO($sConn, $usuario, $senha);

        if (empty($this->pdo)) {
            echo 'Bando não conectado';
        }
    }

    /**
     * Executa uma consulta no banco de dados
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param string $sql
     * @param array $aParametros
     *
     * @since 1.0.0
     */
    public function query(string $sql, array $aParametros = []) {
        try {
            $stmt = $this->pdo->prepare($sql);

            foreach($aParametros as $chave => $valor) {
                $tipo = is_int($valor)? \PDO::PARAM_INT : \PDO::PARAM_STR;
                $stmt->bindValue($chave, $valor, $tipo);
            }

            $stmt->execute();
            return $stmt;
        } catch (\PDOException $e) {
            echo 'ERRO: ' . $e->getMessage();
        }
    }

    /**
     * Executa um comando no banco de dados
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param string $sql
     * @param array $aParametros
     * @return int
     *
     * @since 1.0.0
     */
    public function execute(string $sql, array $aParametros = []): int {
        try {
            $stmt = $this->pdo->prepare($sql);

            foreach($aParametros as $chave => $valor) {
                $tipo = is_int($valor)? \PDO::PARAM_INT : \PDO::PARAM_STR;
                $stmt->bindValue($chave, $valor, $tipo);
            }

            $stmt->execute();
            return $stmt->rowCount();
        } catch (\PDOException $e){
            echo 'ERRO: '. $e->getMessage();
            return 0;
        }
    }

    /**
     * Pega a instancia da classe MoobiDatabaseHandler
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return MoobiDatabaseHandler
     *
     * @since 1.0.0
     */
    public function getInstance(): MoobiDatabaseHandler { 
        if (self::$oInstancia === null) {
            self::$oInstancia = new self(self::$aConfig);
        }
        return self::$oInstancia;
    }

    /**
     * Pega uma nova instancia da classe MoobiDatabaseHandler
     *
     * @author Naldo Batista naldobatista@moobitech.com.br 
     *
     * @since 1.0.0
     */
    public function getNewInstance() {
        return new self(self::$aConfig);
    }

    /**
     * Inicia uma transação
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @since 1.0.0
     */
    public function begin() {
        $this->pdo->beginTransaction();
    }

    /**
     * Faz roll back na transação
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @since 1.0.0
     */
    public function failTransaction() {
        $this->pdo->rollBack();
    }

    /**
     * Faz o commit da transação
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @since 1.0.0
     */
    public function commit() {
        $this->pdo->commit();
    }

    /**
     * Encerra a conexão pdo
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @since 1.0.0
     */
    public function close() {
        $this->pdo = null;
    }

    /**
     * Encerra todas as conexões pdo
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @since 1.0.0
     */
    public function closeAll() {
        $this->pdo = null;
        self::$oInstancia = null;
    }
}
?>