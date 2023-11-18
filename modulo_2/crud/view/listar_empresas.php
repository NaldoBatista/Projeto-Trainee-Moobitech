<?php
/**
 * @var $aEmpresas
 * @var $sNotificacao
 */
?>

<div>
    <span><?php echo $sNotificacao ?></span>

    <h1>Lista de Empresas Cadastradas</h1>

    <a href="http://localhost/programa_de_trainee/modulo_2/crud/Empresa/cadastrarEmpresa">
        <button>cadastrar nova empresa</button>
    </a>
    <br>
    <br>

    <table border = 1>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CNPJ</th>
                <th>CEP</th>
                <th>Estado</th>
                <th>Cidade</th>
                <th>Bairro</th>
                <th>Logradouro</th>
                <th>Telefone</th>
                <th colspan="2">Opcões</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aEmpresas as $aEmpresa) { ?>
                <tr>
                    <th><?php echo $aEmpresa['id'] ?></th> 
                    <th><?php echo $aEmpresa['nome'] ?></th>
                    <th><?php echo $aEmpresa['email'] ?></th>
                    <th><?php echo $aEmpresa['cnpj'] ?></th>
                    <th><?php echo $aEmpresa['cep'] ?></th>
                    <th><?php echo $aEmpresa['estado'] ?></th>
                    <th><?php echo $aEmpresa['cidade'] ?></th>
                    <th><?php echo $aEmpresa['bairro'] ?></th>
                    <th><?php echo $aEmpresa['logradouro'] ?></th>
                    <th><?php echo $aEmpresa['telefone'] ?></th>
                    <th>
                        <a href="http://localhost/programa_de_trainee/modulo_2/crud/Empresa/editarEmpresa/<?php echo $aEmpresa['id'] ?>">
                            <button>Editar</button>
                        </a>
                    </th>
                    <th><a href="http://localhost/programa_de_trainee/modulo_2/crud/Empresa/delete/<?php echo $aEmpresa['id'] ?>">
                            <button>Remover</button>
                        </a>
                    </th>
                </tr>
            <?php } ?>
        </tbody>
        
    </table>
</div>