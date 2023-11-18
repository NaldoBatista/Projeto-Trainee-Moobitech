<?php
namespace Moobi\Avaliacao\model;

require_once __DIR__ . '/../../vendor/autoload.php';
use Moobi\Avaliacao\model\Usuario;
use Moobi\Avaliacao\model\database\AbstractDAO;

class UsuarioDao extends AbstractDAO {

    /**
     * Salva um novo usuario no banco de dados
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return int 
     *
     * @since 1.0.0
     */
    public function save(Usuario $oUsuario): int {
        $sql = "INSERT INTO uso_usuario(uso_login, uso_senha, uso_nivel_acesso)
        VALUES (:login, :senha, :nivel_acesso)";

        $aParametros = [
            'login' => $oUsuario->getLogin(),
            'senha' => $oUsuario->getHashSenha(),
            'nivel_acesso' => $oUsuario->getNivelAcesso()
        ];

        $oHandler = parent::getHandler();
        $resultado = $oHandler->execute($sql, $aParametros);
        return $resultado;
    }

    /**
     * Busca um usuário como mesmo login e senha no banco de dados
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param string $sLogin
     * @param string $sSenha
     * @return array
     *
     * @since 1.0.0
     */
    public function find(string $sLogin, string $sSenha): array {
        $sql = "SELECT * FROM uso_usuario WHERE uso_login = :login AND uso_senha = :senha";
        $aParametros = ['login' => $sLogin, 'senha' => $sSenha];

        $oHandler = parent::getHandler();
        $stmt = $oHandler->query($sql, $aParametros);

        $aResultado = $stmt->fetch(\PDO::FETCH_ASSOC);
       
        return $aResultado;
    }

    /**
     * Busca um usuário pelo id
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param int $iId
     * @return array
     *
     * @since 1.0.0
     */
    public function findById(int $iId): array {
        $sql = "SELECT * FROM uso_usuario WHERE id = :id";
        $aParametros = ['id' => $iId];

        $oHandler = parent::getHandler();
        $stmt = $oHandler->query($sql, $aParametros);

        $aResultado = array();

        $aResultado = $stmt->fetch(\PDO::FETCH_ASSOC);
       
        return $aResultado;
    }

    /**
     * Busca a lista de todos os usuários
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @return array 
     *
     * @since 1.0.0
     */
    public function findAll(): array {
        $sql = "SELECT * FROM uso_usuario";

        $oHandler = parent::getHandler();
        $stmt = $oHandler->query($sql);

        $oHandler = parent::getHandler();
        $stmt = $oHandler->query($sql);

        $aResultado = [];

        foreach($stmt->fetchAll(\PDO::FETCH_ASSOC) as $linha) {
            $aResultado[] = $linha;
        }

        return $aResultado;
    }

    /**
     * Remove um usuário pelo id
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param int $iId
     * @return int
     *
     * @since 1.0.0
     */
    public function delete(int $iId): int {
        $sql = "DELETE FROM uso_usuario WHERE id = :id";

        $aParametros = ['id' => $iId];

        $oHandler = parent::getHandler();
        $resultado = $oHandler->execute($sql, $aParametros);

        return $resultado;
    }

    /**
     * Atualiza os dados de um usuario no banco de dados
     *
     * @author Naldo Batista naldobatista@moobitech.com.br
     *
     * @param array $aUsuario
     * @return int
     *
     * @since 1.0.0
     */
    public function replace(array $aUsuario): int {
        $sql = "UPDATE uso_usuario 
        SET uso_login = :login, uso_senha = :senha, uso_nivel_acesso = :nivel_acesso
        WHERE id = :id";

        $aParametros = [
            'login' => $aUsuario['login'], 
            'senha' => $aUsuario['senha'],
            'nivel_acesso' => $aUsuario['nivel_acesso'],
            'id' => $aUsuario['id']
        ];

        $oHandler = parent::getHandler();
        $resultado = $oHandler->execute($sql, $aParametros);

        return $resultado;
    }
}
?>