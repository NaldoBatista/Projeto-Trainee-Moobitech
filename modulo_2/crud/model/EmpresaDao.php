<?php
require_once '/var/www/html/programa_de_trainee/modulo_2/crud/model/AbstractDAO.php';

class EmpresaDao extends AbstractDAO{

    public function save($oEmpresa) {

        $sql = "INSERT INTO empresa(nome, email, cnpj, cep, estado, cidade, bairro, logradouro, telefone) 
        VALUES(:nome, :email, :cnpj, :cep, :estado, :cidade, :bairro, :logradouro, :telefone)";
        
        $aParametros = [
            'nome' => $oEmpresa->getNome(),
            'email' => $oEmpresa->getEmail(),
            'cnpj' => $oEmpresa->getCnpj(),
            'cep' => $oEmpresa->getCep(),
            'estado' => $oEmpresa->getEstado(),
            'cidade' => $oEmpresa->getCidade(),
            'bairro' => $oEmpresa->getBairro(),
            'logradouro' => $oEmpresa->getLogradouro(),
            'telefone' => $oEmpresa->getTelefone()
        ];

        $oHandler = parent::getHandler();
        $resultado = $oHandler->execute($sql, $aParametros);
        return $resultado;
        //echo "-------------{$res}";
        //var_dump($sql);
        //var_dump($aParametros);
    }

    public function find($iId) {
        $sql = "SELECT * FROM empresa WHERE id = :id";
        $aParametros = ['id' => $iId];

        $oHandler = parent::getHandler();
        $stmt = $oHandler->query($sql, $aParametros);

        $aResultado = $stmt->fetch(PDO::FETCH_ASSOC);
       
        return $aResultado;

    }

    public function findAll() {
        $sql = "SELECT * FROM empresa";

        $oHandler = parent::getHandler();
        $stmt = $oHandler->query($sql);

        $aResultado = [];
        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $linha) {
            $aResultado[] = $linha;
        }

        return $aResultado;
    }

    public function replace($aEmpresa) {
        $sql = "UPDATE empresa 
        SET nome = :nome, 
        email = :email, 
        cnpj = :cnpj,
        cep = :cep, 
        estado = :estado,
        cidade = :cidade,
        bairro = :bairro,
        logradouro = :logradouro, 
        telefone = :telefone
        WHERE id = :id";

        $aParametros = [
            'nome' => $aEmpresa['nome'],
            'email' => $aEmpresa['email'],
            'cnpj' => $aEmpresa['cnpj'],
            'cep' => $aEmpresa['cep'],
            'estado' => $aEmpresa['estado'],
            'cidade' => $aEmpresa['cidade'],
            'bairro' => $aEmpresa['bairro'],
            'logradouro' => $aEmpresa['logradouro'],
            'telefone' => $aEmpresa['telefone'],
            'id' => $aEmpresa['id']
        ];

        $oHandler = parent::getHandler();
        $resultado = $oHandler->execute($sql, $aParametros);
        return $resultado;
    }

    public function delete($aEmpresa) {
        $sql = "DELETE FROM empresa WHERE id = :id";

        $aParametros = ['id' => $aEmpresa['id']];

        $oHandler = parent::getHandler();
        $resultado = $oHandler->execute($sql, $aParametros);
        return $resultado;
    }


}

?>