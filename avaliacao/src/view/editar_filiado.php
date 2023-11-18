<?php
/**
 * @var $aFiliado
 * @var $aDependentes
 * @var $sNotificacao
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">

        <h1>Sindicato Dos Trainees</h1><br>

        <h2>Editar Filiado</h2>

        <span class="notificacao"><?php echo $sNotificacao ?></span> <br><br>

        
        <form action="http://localhost/programa_de_trainee/avaliacao/Filiado/atualizarFiliado" method="post">

            <input type="hidden" name="id" value="<?php echo  $aFiliado['id'] ?>">

            <label for="">Nome:
                <input type="text" name="nome" value="<?php echo  $aFiliado['flo_nome'] ?>">
            </label><br>
            
            <label for="">CPF:
                <input type="text" name="cpf" value="<?php echo  $aFiliado['flo_cpf'] ?>">
            </label><br>

            <label for="">RG:
                <input type="text" name="rg" value="<?php echo  $aFiliado['flo_rg'] ?>">
            </label><br>

            <label for="">Data Nascimento:
                <input type="date" name="data_nascimento" value="<?php echo  $aFiliado['flo_data_nascimento'] ?>">
            </label><br>

            <label for="">Empresa:
                <input type="text" name="empresa" value="<?php echo  $aFiliado['flo_empresa'] ?>">
            </label><br>
            
            <label for="">Cargo:
                <input type="text" name="cargo" value="<?php echo  $aFiliado['flo_cargo'] ?>">
            </label><br>

            <label for="">Situacao:
                <select name="situacao">
                    <option value="<?php echo  $aFiliado['flo_situacao'] ?>">
                        <?php echo  $aFiliado['flo_situacao'] ?>
                    </option>
                    <option value="Ativo">Ativo</option>
                    <option value="Aposentado">Aposentado</option>
                    <option value="Licenciado">Licenciado</option>
                </select>
            </label><br>

            <label for="">Telefone Residencial:
                <input type="text" name="telefone_residencial" value="<?php echo  $aFiliado['flo_telefone_residencial'] ?>">
            </label><br>


            <label for="">Telefone Celular:
                <input type="text" name="telefone_celular" value="<?php echo  $aFiliado['flo_telefone_celular'] ?>">
            </label><br><br>

            
            <h3>Lista de Dependentes</h3><br>

            <a href="http://localhost/programa_de_trainee/avaliacao/Dependente/save/<?php echo  $aFiliado['id'] ?>">
                <button class="botao" type="button">Cadastrar novo dependente</button>
            </a><br><br>

            <table border="1">
                <thead>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Parentesco</th>
                    <th colspan="2">Opções</th>
                </thead>
                <tbody>
                    <?php foreach ($aDependentes as $aDependente) { ?>
                        <tr>
                            <th><?php echo $aDependente['dpe_nome'] ?></th>
                            <th><?php echo $aDependente['dpe_idade'] ?></th>
                            <th><?php echo $aDependente['dpe_grau_parentesco'] ?></th>
                            <th>
                                <a href="http://localhost/programa_de_trainee/avaliacao/Dependente/edit/<?php echo $aDependente['id']?>">
                                    <button class="botao-verde" type="button" >editar</button>
                                </a>
                            </th>
                            <th>
                                <a href="http://localhost/programa_de_trainee/avaliacao/Dependente/deleteDependente/<?php echo $aDependente['id']?>">
                                    <button class="botao-vermelho" type="button" >apagar</button>
                                </a>
                            </th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table> <br>

            <br>
            <button class="botao" type="submit">editar</button>


            <a href="http://localhost/programa_de_trainee/avaliacao/Filiado/listar">
                <button class="botao-vermelho" type="button" >cancelar</button>
            </a>

        </form>

    </div>
</body>

