<?php

require_once '/var/www/html/programa_de_trainee/modulo_2/crud/model/Empresa.php';
require_once '/var/www/html/programa_de_trainee/modulo_2/crud/model/EmpresaDao.php';
require_once '/var/www/html/programa_de_trainee/modulo_2/crud/Notificacao.php';

class EmpresaController {

    public function cadastrarEmpresa(array $aDados) {
        include '/var/www/html/programa_de_trainee/modulo_2/crud/view/cadastrar_empresa.php';
    }

    public function empresaSave(array $aDados) {
        $nome = $aDados['nome'];
        $email = $aDados['email'];
        $cnpj = $aDados['cnpj'];
        $cep = $aDados['cep'];
        $estado = $aDados['estado'];
        $cidade = $aDados['cidade'];
        $bairro = $aDados['bairro'];
        $logradouro = $aDados['logradouro'];
        $telefone = $aDados['telefone'];

        $oEmpresa = new Empresa(
            $nome, 
            $email,
            $cnpj,
            $cep,
            $estado,
            $cidade,
            $bairro,
            $logradouro,
            $telefone
        );

        $oEmpresa->save();
        
        Notificacao::setNotificacao('EMPRESA CADASTRADA COM SUCESSO');

        header('Location: http://localhost/programa_de_trainee/modulo_2/crud/Empresa/listarEmpresas');

    }

    public function listarEmpresas($aDados) {
        $oEmpresaDao = new EmpresaDao();
        $aEmpresas = $oEmpresaDao->findAll();

        $sNotificacao = Notificacao::getNotificacao();

        include '/var/www/html/programa_de_trainee/modulo_2/crud/view/listar_empresas.php';
    }

    public function editarEmpresa($aDados) {
        $oEmpresaDao = new EmpresaDao();
        $aEmpresa = $oEmpresaDao->find($aDados['id']);

        include '/var/www/html/programa_de_trainee/modulo_2/crud/view/editar_empresa.php';
    }

    public function replaceEmpresa($aDados) {
        $oEmpresaDao = new EmpresaDao();
        $res = $oEmpresaDao->replace($aDados);

        Notificacao::setNotificacao('EMPRESA ATUALIZADA COM SUCESSO');
        header('Location: http://localhost/programa_de_trainee/modulo_2/crud/Empresa/listarEmpresas');
    }

    public function delete($aDados) {
        $oEmpresaDao = new EmpresaDao();
        $res = $oEmpresaDao->delete($aDados);

        Notificacao::setNotificacao('EMPRESA DELETADA COM SUCESSO');
        header('Location: http://localhost/programa_de_trainee/modulo_2/crud/Empresa/listarEmpresas');
        
    }
}

?>