<?PHP 
namespace Moobi\Avaliacao\utils;

class SessionHandler {

    public static function setNotificacao(string $sNotificacao): void {
        session_start();
        $_SESSION['notificacao'] = $sNotificacao;
    } 

    public static function getNotificacao(): string {
        session_start();
        if(!empty($_SESSION['notificacao'])) {
            $sNotificacao = $_SESSION['notificacao'];
            $_SESSION['notificacao'] = null;
            return $sNotificacao;
        }
        return '';
    }

    public static function login(array $aUsuario): void {
        session_start();
        $aUsuario = [
            'login' => $aUsuario['uso_login'],
            'nivel_acesso' => $aUsuario['uso_nivel_acesso']
        ];
        $_SESSION['usuario'] = $aUsuario;
    }

    public static function getUsuario(): array {
        session_start();
        if (!empty($_SESSION['usuario'])) {
            return $_SESSION['usuario'];
        }
        return [];
    }

    public static function destruirSessao(): void {
        session_start();
        $_SESSION = null;
        session_destroy();
    }

    public static function getNivelAcesso(): string {
        session_start();
        return $_SESSION['usuario']['nivel_acesso'];
    }

    
}

?>