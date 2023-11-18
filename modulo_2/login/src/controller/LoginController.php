<?php
//namespace Moobi\controller;
use Moobi\model\Usuario;
//require_once '/var/www/html/programa_de_trainee/modulo_2/login/src/model/Usuario.php';
require_once '/var/www/html/programa_de_trainee/modulo_2/login/src/model/UsuarioDao.php';
require_once '/var/www/html/programa_de_trainee/modulo_2/login/src/utils/Sessao.php';
require_once '/var/www/html/programa_de_trainee/modulo_2/login/src/utils/hashSenha.php';
require_once '/var/www/html/programa_de_trainee/modulo_2/login/src/utils/horaAtual.php';

class LoginController {

    public function login($aDados): void {
        echo \Sessao::getNotificacao() . '<br>';
        horaAtual();
        include '/var/www/html/programa_de_trainee/modulo_2/login/src/view/login.php';
    }

    public function autenticar($aDados) {
        $sUsuario = $aDados['usuario'];
        $sSenha = $aDados['senha'];

        $oUsuarioDao = new \UsuarioDao();
        $aUsuario = $oUsuarioDao->find($sUsuario, hashSenha($sSenha));

        \Sessao::login($aUsuario);
        
        if (!empty($aUsuario)) {
            header('Location: http://localhost/programa_de_trainee/modulo_2/login/Login/listar');
        
        } else {
            \Sessao::setNotificacao('LOGIN OU SENHA INCORRETA!');
            header('Location: http://localhost/programa_de_trainee/modulo_2/login/Login/login');
        }
    }

    public function listar($aDados) {
        $sLogado = \Sessao::getUsuario();
        
        if (!empty($sLogado)) {
            echo 'Usuario Logado: ' . \Sessao::getUsuario() . '<br>';
            horaAtual();
            echo \Sessao::getNotificacao();
            $oUsuarioDao = new \UsuarioDao();
            $aUsuarios = $oUsuarioDao->findAll();

            include '/var/www/html/programa_de_trainee/modulo_2/login/src/view/lista_usuario.php';
        }
    }

    public function cadastrar($aDados) {
        $sNivelAcesso = \Sessao::getNivelAcesso();

        if ($sNivelAcesso == '1') {
            echo 'Usuario Logado: ' . \Sessao::getUsuario() . '<br>';
            horaAtual();
            include '/var/www/html/programa_de_trainee/modulo_2/login/src/view/cadastro_usuario.php';
        } else {
            \Sessao::setNotificacao('O USUARIO NÃO PERMISSÃO A ESSA FUNCIONALIDADE');
            header('Location: http://localhost/programa_de_trainee/modulo_2/login/Login/listar');
        }
    }

    public function cadastrarUsuario($aDados) {
        $sNivelAcesso = \Sessao::getNivelAcesso();

        if ($sNivelAcesso == '1') {
            $sUsuario = $aDados['usuario'];
            $sSenha = $aDados['senha'];
            $iNivelAcesso = $aDados['nivel_acesso'];

            $oUsuario = New Usuario($sUsuario, $sSenha, $iNivelAcesso);
            $oUsuarioDao = new \UsuarioDao();
            $iResultado = $oUsuarioDao->save($oUsuario);

            if ($iResultado > 0) {
                \Sessao::setNotificacao('USUARIO CADASTRADO COM SUCESSO!');
                header('Location: http://localhost/programa_de_trainee/modulo_2/login/Login/listar');
            } else {
                \Sessao::setNotificacao('FALHA AO CADASTRAR USUARIO!');
                header('Location: http://localhost/programa_de_trainee/modulo_2/login/Login/listar');
            }
        }
    }

    public function logout() {
        \Sessao::destruirSessao();

        header('Location: http://localhost/programa_de_trainee/modulo_2/login/Login/login');
    }
} 



?>