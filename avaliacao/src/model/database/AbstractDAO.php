<?php
namespace Moobi\Avaliacao\model\database;
require_once __DIR__ . '/../../../vendor/autoload.php';

use Moobi\Avaliacao\model\database\MoobiDatabaseHandler;
use Moobi\Avaliacao\utils\JSONConfig;

abstract class AbstractDAO {
    private $aConfig; 
    static $oHandler;

    /**
     * Pega as configurações do arquivo config.json
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return void
     *
     * @since 1.0.0
     */
    private function getConfig(): void {
        $oJSONConfig = new JSONConfig('/var/www/html/programa_de_trainee/avaliacao/config.json');
        $this->aConfig = $oJSONConfig->getConfig();
    }

    /**
     * Pega o instancia da classe MoobiDatabaseHandler
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return MoobiDatabaseHandler
     *
     * @since 1.0.0
     */
    protected function getHandler(): MoobiDatabaseHandler {
        if (empty(self::$oHandler)) {
            self::getConfig();
            self::$oHandler = new MoobiDatabaseHandler($this->aConfig);
        }
        return self::$oHandler;
    }
}