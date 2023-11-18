<?php
namespace Moobi\BancoDeDados\model;

class MoobiDatabaseHandler {

    private $pdo;
    private static $oInstancia = null;
    private static $rConfig;

    public function __construct($rConfig) {
        $host = $rConfig->getHost();
        $porta = $rConfig->getPorta();
        $dbname = $rConfig->getDbname();
        $usuario = $rConfig->getUsuario();
        $senha = $rConfig->getSenha();
        self::$rConfig = $rConfig;

        $sConn = "mysql:host=$host;port=$porta;dbname=$dbname";
        $this->pdo = new \PDO($sConn, $usuario, $senha);
        if (!$this->pdo) {
            echo 'Bando não conectado';
        }
    }

    public function query(string $sql, array $parametros = []) {
        $stmt = $this->pdo->prepare($sql);
        foreach($parametros as $chave => $valor) {
            $tipo = is_int($valor)? \PDO::PARAM_INT : \PDO::PARAM_STR;
            $stmt->bindValue($chave, $valor, $tipo);
        }
        $stmt->execute();
        return $stmt;
    }

    public function execute(string $sql, array $parametros = []) {
        $stmt = $this->pdo->prepare($sql);
        foreach($parametros as $chave => $valor) {
            $tipo = is_int($valor)? \PDO::PARAM_INT : \PDO::PARAM_STR;
            $stmt->bindValue($chave, $valor, $tipo);
        }
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getInstance(): MoobiDatabaseHandler { 
        if (self::$oInstancia === null) {
            self::$oInstancia = new self(self::$rConfig);
        }
        return self::$oInstancia;
    }

    public function getNewInstance() {
        return new self(self::$rConfig);
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