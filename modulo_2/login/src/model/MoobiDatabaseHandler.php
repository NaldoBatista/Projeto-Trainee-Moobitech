<?php

class MoobiDatabaseHandler {

    private $pdo;
    private static $oInstancia = null;
    private static $aConfig;

    public function __construct($aConfig) {
        $host = $aConfig['host']; 
        $porta = $aConfig['porta']; 
        $dbname = $aConfig['dbname']; 
        $usuario = $aConfig['usuario']; 
        $senha = $aConfig['senha'];
        self::$aConfig = $aConfig;

        $sConn = "mysql:host=$host;port=$porta;dbname=$dbname";
        $this->pdo = new \PDO($sConn, $usuario, $senha);
        if (!$this->pdo) {
            echo 'Bando não conectado';
        }
    }

    public function query(string $sql, array $parametros = []) {
        try {

            $stmt = $this->pdo->prepare($sql);
            foreach($parametros as $chave => $valor) {
                $tipo = is_int($valor)? \PDO::PARAM_INT : \PDO::PARAM_STR;
                $stmt->bindValue($chave, $valor, $tipo);
            }
            $stmt->execute();
            return $stmt;

        } catch (PDOException $e) {
            echo 'ERRO: ' . $e->getMessage();
        }
    }

    public function execute(string $sql, array $parametros = []) {
        try {

            $stmt = $this->pdo->prepare($sql);
            foreach($parametros as $chave => $valor) {
                $tipo = is_int($valor)? \PDO::PARAM_INT : \PDO::PARAM_STR;
                $stmt->bindValue($chave, $valor, $tipo);
            }
            $stmt->execute();
            return $stmt->rowCount();
            
        } catch (PDOException $e){
            echo 'ERRO: '. $e->getMessage();
        }
    }

    public function getInstance(): MoobiDatabaseHandler { 
        if (self::$oInstancia === null) {
            self::$oInstancia = new self(self::$aConfig);
        }
        return self::$oInstancia;
    }

    public function getNewInstance() {
        return new self(self::$aConfig);
    }

    public function begin() {
        $this->pdo->beginTransaction();
    }

    public function failTransaction() {
        $this->pdo->rollBack();
    }

    public function commit() {
        $this->pdo->commit();
    }

    public function close() {
        $this->pdo = null;
    }

    public function closeAll() {
        $this->pdo = null;
        self::$oInstancia = null;
    }
}
?>