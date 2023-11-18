<?php
/**
 * @var $aFiliado
 * @var $aDependentes
 * @var $sNotificacao
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">

        <h1>Sindicato Dos Trainees</h1><br>

        <h2>Editar Filiado</h2>

        <h2>Modal</h2>

        <span class="notificacao"><?php echo $sNotificacao ?></span> <br><br>

        
        <form class="form-cadastrar-filiado" 
        action="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/atualizarFiliado" method="post">

            <input id="id" type="hidden" name="id" value="<?php echo  $aFiliado['id'] ?>">

            <label for="">Nome:
                <input id="nome" type="text" name="nome" value="<?php echo  $aFiliado['flo_nome'] ?>">
            </label><br>
            
            <label for="">CPF:
                <input id="cpf" type="text" name="cpf" value="<?php echo  $aFiliado['flo_cpf'] ?>">
            </label><br>

            <label for="">RG:
                <input id="rg" type="text" name="rg" value="<?php echo  $aFiliado['flo_rg'] ?>">
            </label><br>

            <label for="">Data Nascimento:
                <input id="data_nascimento" type="date" name="data_nascimento" value="<?php echo  $aFiliado['flo_data_nascimento'] ?>">
            </label><br>

            <label for="">Empresa:
                <input id="empresa" type="text" name="empresa" value="<?php echo  $aFiliado['flo_empresa'] ?>">
            </label><br>
            
            <label for="">Cargo:
                <input id="cargo" type="text" name="cargo" value="<?php echo  $aFiliado['flo_cargo'] ?>">
            </label><br>

            <label for="">Situacao:
                <select id="situacao" name="situacao">
                    <option value="<?php echo  $aFiliado['flo_situacao'] ?>">
                        <?php echo  $aFiliado['flo_situacao'] ?>
                    </option>
                    <option value="Ativo">Ativo</option>
                    <option value="Aposentado">Aposentado</option>
                    <option value="Licenciado">Licenciado</option>
                </select>
            </label><br>

            <label for="">Telefone Residencial:
                <input id="telefone_residencial" type="text" name="telefone_residencial" value="<?php echo  $aFiliado['flo_telefone_residencial'] ?>">
            </label><br>


            <label for="">Telefone Celular:
                <input id="telefone_celular" type="text" name="telefone_celular" value="<?php echo  $aFiliado['flo_telefone_celular'] ?>">
            </label><br><br>

            
            <h3>Lista de Dependentes</h3><br>

            <button class="cadastrar_dependente botao" type=""
                data-id_filiado="<?php echo $aFiliado['id']?>">
                Cadastrar novo dependente
            </button>


            <br><br>

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
                                <!-- <a href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Dependente/edit/<?php echo $aDependente['id']?>">
                                    <button class="botao-verde" type="button" >editar</button>
                                </a> -->
                                <button class="editar_dependente botao-verde" type="button"
                                data-id_dependente="<?php echo $aDependente['id']?>">
                                Editar
                                </button>

                            </th>
                            <th>
                                <!-- <a href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Dependente/deleteDependente/<?php echo $aDependente['id']?>">
                                    <button class="botao-vermelho" type="button" >apagar</button>
                                </a> -->

                                <button class="remover_dependente botao-vermelho" type="button"
                                data-id_filiado="<?php echo $aFiliado['id']?>"
                                data-id_dependente="<?php echo $aDependente['id']?>">
                                Excluir
                                </button>
                            </th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table> <br>

            <br>
            <button class="atualizar-filiado botao" type="button">Atualizar</button>

            <button class="cancelar-atualizacao-filiado botao-vermelho" type="button" >Cancelar</button>
        

        </form>

    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> -->

    <script type="text/javascript" 
    src="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/src/view/javascript/modal.js"></script>

    <script 
        src="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/src/view/javascript/validate.js">
    </script>                

    <script>
        $(document).ready(function() {
            let form = $('.form-cadastrar-filiado');

            if (form.length) {
                form.validate({
                    rules : {
                        nome: {
                            required: true,
                            minlength: 3,
                            regex: /^[a-zA-Zà-úÀ-Ú\s]+$/
                        },
                        cpf: {
                            required: true,
                            cpf: true
                        },
                        rg: {
                            required: true,
                            minlength: 5,
                            digits: true
                        },
                        data_nascimento: {
                            required: true,
                            date: true
                        },
                        empresa: {
                            required: true,
                            minlength: 3,
                            regex: /^[0-9a-zA-Zà-úÀ-Ú\s]+$/
                        },
                        cargo: {
                            required: true,
                            minlength: 3
                        },
                        situacao: {
                            required: true,
                        },
                        telefone_residencial: {
                            required: true,
                            digits: true,
                            minlength: 10,
                            maxlength: 11
                        },
                        telefone_celular: {
                            required: true,
                            digits: true,
                            minlength: 10,
                            maxlength: 11
                        }

                    },
                    messages: {
                        nome: {
                            required: "Informe o seu nome",
                            minlength: "O nome deve ter no mínimo 3 caracters"
                        },
                        cpf: {
                            required: "Informe seu CPF",
                            digits: "O CPF deve conter apenas números"
                        },
                        rg: {
                            required: "Informe seu RG",
                            digits: "O RG deve conter apenas números"
                        },
                        data_nascimento: {
                            required: "Informe sua data de nascimento"
                        },
                        empresa: {
                            required: "Informe o nome da sua empresa",
                            minlength: "O nome deve ter no mínimo 3 caracters"
                        },
                        cargo: {
                            required: "Informe seu cargo",
                            minlength: "O cargo deve ter no mínimo 3 caracters"
                        },
                        situacao: {
                            required: "Informe sua situação"
                        },
                        telefone_residencial: {
                            required: "Informe seu número de telefone residencial",
                            digits: "O número deve conter apenas digitos",
                            minlength: "Numero inválido",
                            maxlength: "Numero inválido"
                        },
                        telefone_celular: {
                            required: "Informe seu número de telefone residencial",
                            digits: "O número deve conter apenas digitos",
                            minlength: "Numero inválido",
                            maxlength: "Numero inválido"
                        }
                    }
                });
            }
        });
    </script>

</body>

