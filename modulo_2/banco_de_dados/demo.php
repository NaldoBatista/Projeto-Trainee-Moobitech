<?php
require 'vendor/autoload.php';
use Moobi\BancoDeDados\model\MoobiDatabaseHandler;
use Moobi\BancoDeDados\config\JSONConfig;

$rConfig = new JSONConfig('.config.json');
var_dump($rConfig);

$rDatabaseHandler = new MoobiDatabaseHandler($rConfig);


$rConnection = $rDatabaseHandler->getInstance(); // método retorna uma única conexão

var_dump($rConnection);


$rOtherConnection = $rDatabaseHandler->getNewInstance(); // método sempre retorna uma nova conexão

var_dump($rOtherConnection);

$rConnection->begin();

$rConnection->execute("INSERT INTO pessoas(nome, idade) VALUES('Pedro', 27)");
$rConnection->execute("INSERT INTO pessoas(nome, idade) VALUES('Bruno', 28)");
$rConnection->execute("INSERT INTO pessoas(nome, idade) VALUES('Marcel', 29)");

$aPessoas = $rOtherConnection->query("SELECT nome FROM pessoas");
echo 'Var_dump $oPessoas\n';
var_dump($aPessoas);

$rConnection->commit();

$aPessoas = $rOtherConnection->query("SELECT nome FROM pessoas");

$rConnection->close();

$rDatabaseHandler->closeAll();

/*

$oEmpresa = new Empresa();
$oEmpresa->salvar();


class Empresa {
    // $iNome;
    // $sCNPJ;

    public function salvar() {
        $oDAO = EmpresaDAO::getInstance();
        $oDAO->cadastrar($this);
    }
}



class EmpresaDAO {

    private static function getInstance(MoobiDatabaseHandler $oHandler): EmpresaDAO {
        if (empty(self::$oDAO)) {
            self::$oDAO = new EmpresaDAO($oHandler);
        }
        return $oDAO;
    }


    public function __construct(MoobiDatabaseHandler $oHandler) {
        $this->oHandler = $oHandler;
    }

    public function cadastrar(Empresa $oEmpresa) {
        $sSQL = "INSERT INT empresa(ema_nome, ema_cnpj) VALUE ($oEmpresa->getNome(), $oEmpresa->getCNPJ())";
        $this->oHandler->execute($sSQL);
    }
}

*/
echo '///////////////////';
?>




