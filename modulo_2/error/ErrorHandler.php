<?php
class ErrorHandler {
    public static function register() {
        set_error_handler([__CLASS__, 'handleError']);
        set_exception_handler([__CLASS__, 'handleException']);
    }

    public static function handleError($errno, $errstr, $errfile, $errline) {
        logPhpError("Erro $errno: $errstr em $errfile na linha $errline");
    }

    public static function handleException($exception) {
        logPhpError("Exceção: " . $exception->getMessage() . " em " . $exception->getFile() . " na linha " . $exception->getLine());
    }
}

// Para usar a classe de tratamento de erros, registre-a no início do seu script:
ErrorHandler::register();


//Essa classe ErrorHandler define métodos para manipular erros e exceções. 
//A função register() é chamada no início do seu script para configurar o 
//tratamento de erros e exceções. Você pode personalizar esses métodos para 
//atender às suas necessidades específicas, como registrar os erros em um 
//arquivo de log personalizado. Certifique-se de chamar logPhpError() ou 
//fazer qualquer outra ação desejada dentro desses métodos.

//Lembre-se de que este é um exemplo simples e você pode expandir a classe 
//ErrorHandler de acordo com suas necessidades específicas.



?>