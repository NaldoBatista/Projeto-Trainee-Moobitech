<?php
/**
 * @var $aFiliado
 * @var $aDependentes
 * @var $sNotificacao
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">

        <h1>Sindicato Dos Trainees</h1><br>

        <h2>Editar Filiado</h2>

        <span class="notificacao"><?php echo $sNotificacao ?></span> <br><br>

        
        <form action="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Filiado/atualizarFiliado" method="post">

            <input type="hidden" name="id" value="<?php echo  $aFiliado['id'] ?>">

            <label for="">Nome:
                <input type="text" name="nome" value="<?php echo  $aFiliado['flo_nome'] ?>"
                required
                pattern="^[a-zA-Zà-úÀ-Ú -]+$">
            </label><br>
            
            <label for="">CPF:
                <input type="text" name="cpf" value="<?php echo  $aFiliado['flo_cpf'] ?>"
                required
                pattern="^[0-9]{3}.?[0-9]{3}.?[0-9]{3}-?[0-9]{2}$">
            </label><br>

            <label for="">RG:
                <input type="text" name="rg" value="<?php echo  $aFiliado['flo_rg'] ?>"
                required pattern="^[0-9.-]{5, 10}$">
            </label><br>

            <label for="">Data Nascimento:
                <input type="date" name="data_nascimento" value="<?php echo  $aFiliado['flo_data_nascimento'] ?>"
                required>
            </label>
            <span name="idade"></span>
            <br>

            <label for="">Empresa:
                <input type="text" name="empresa" value="<?php echo  $aFiliado['flo_empresa'] ?>"
                required
                pattern="^[A-Za-z0-9_ ]+{4,20}$">
            </label><br>
            
            <label for="">Cargo:
                <input type="text" name="cargo" value="<?php echo  $aFiliado['flo_cargo'] ?>"
                required
                pattern="^[A-Za-z0-9_ ]+{4,20}$">
            </label><br>

            <label for="">Situacao:
                <select name="situacao" required>
                    <option value="<?php echo  $aFiliado['flo_situacao'] ?>">
                        <?php echo  $aFiliado['flo_situacao'] ?>
                    </option>
                    <option value="Ativo">Ativo</option>
                    <option value="Aposentado">Aposentado</option>
                    <option value="Licenciado">Licenciado</option>
                </select>
            </label><br>

            <label for="">Telefone Residencial:
                <input type="text" name="telefone_residencial" value="<?php echo  $aFiliado['flo_telefone_residencial'] ?>"
                required
                pattern="^[0-9]{2} ([0-9]{8}|[0-9]{9})">
            </label><br>


            <label for="">Telefone Celular:
                <input type="text" name="telefone_celular" value="<?php echo  $aFiliado['flo_telefone_celular'] ?>"
                required
                pattern="^[0-9]{2} ([0-9]{8}|[0-9]{9})">
            </label><br><br>

            
            <h3>Lista de Dependentes</h3><br>

            <a href="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Dependente/save/<?php echo  $aFiliado['id'] ?>">
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
                                <a href="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Dependente/edit/<?php echo $aDependente['id']?>">
                                    <button class="botao-verde" type="button" >editar</button>
                                </a>
                            </th>
                            <th>
                                <a href="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Dependente/deleteDependente/<?php echo $aDependente['id']?>">
                                    <button class="botao-vermelho" type="button" >apagar</button>
                                </a>
                            </th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table> <br>

            <br>
            <button class="botao" type="submit">editar</button>


            <a href="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Filiado/listar">
                <button class="botao-vermelho" type="button" >cancelar</button>
            </a>

        </form>

    </div>

    <script type="text/javascript" 
    src="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/src/view/javascript/calcular_idade.js"></script>

</body>

