<?php
function logPhpError($message) {
    $logFile = '/var/www/html/error/php_errors.log';
    $logMessage = date('[Y-m-d H:i:s]') . ' ' . $message . PHP_EOL;
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

// Uso da função
$logMessage = "Erro personalizado ocorreu.";
logPhpError($logMessage);

?>