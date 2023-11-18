<?php
require_once '/var/www/html/programa_de_trainee/modulo_2/crud/model/MoobiDatabaseHandler.php';

abstract class AbstractDAO {

    private $aConfig = [
        "host" => "localhost",
        "porta" => "3306",
        "dbname" => "crud",
        "usuario" => "root",
        "senha" =>"Tech@2023"
    ];

    static $oHandler;

    protected function getHandler() {
        if (empty(self::$oHandler)) {
            self::$oHandler = new MoobiDatabaseHandler($this->aConfig);
        }
        return self::$oHandler;
    }
}