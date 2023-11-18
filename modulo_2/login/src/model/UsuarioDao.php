<?php
require_once '/var/www/html/programa_de_trainee/modulo_2/login/src/model/Usuario.php';
require_once '/var/www/html/programa_de_trainee/modulo_2/login/src/model/AbstractDAO.php';

class UsuarioDao extends AbstractDAO {

    public function save($oUsuario) {
        
        $sql = "INSERT INTO usuario (usuario, senha, nivel_acesso) VALUES (:usuario, :senha, :nivel_acesso)";

        $aParametros = [
            'usuario' => $oUsuario->getUsuario(),
            'senha' => $oUsuario->getSenha(),
            'nivel_acesso' => $oUsuario->getNivelAcesso()
        ];

        $oHandler = parent::getHandler();
        $resultado = $oHandler->execute($sql, $aParametros);
        return $resultado;
    }

    public function find($sUsuario, $sSenha) {

        $sql = "SELECT * FROM usuario WHERE usuario = :usuario AND senha = :senha";
        $aParametros = ['usuario' => $sUsuario, 'senha' => $sSenha];

        $oHandler = parent::getHandler();
        $stmt = $oHandler->query($sql, $aParametros);

        $aResultado = $stmt->fetch(PDO::FETCH_ASSOC);
       
        return $aResultado;
    }

    public function findAll() {

        $sql = "SELECT * FROM usuario";

        $oHandler = parent::getHandler();
        $stmt = $oHandler->query($sql);

        $aResultado = [];
        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $linha) {
            $aResultado[] = $linha;
        }

        return $aResultado;

    }
}

?>