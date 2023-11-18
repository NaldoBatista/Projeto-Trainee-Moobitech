<?php
/**
 * @var $iIdFiliado
 * @var $sNotificacao
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">

        <h1>Sindicato Dos Trainees</h1><br>

        <h2>Cadastrar Dependente</h2><br><br>


        <span class="notificacao"><?php echo $sNotificacao ?></span> <br><br>

        
        <form class="form-cadastrar-dependente"
        action="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Dependente/cadastrarDependente" method="post">

            <input type="hidden" id="id_filiado_dependente" name='id' value="<?php echo  $iIdFiliado ?>">

            <label for="">Nome:
                <input type="text" id="nome_dependente" name="nome" placeholder="Nome do Dependente">
            </label><br>
            
            <label for="">Data de Nascimento:
                <input id="data_nascimento_dependente" type="date" name="data_nascimento">
            </label><br>

            <label for="">Grau de Parentesco:
                <input id="grau_parentesco_dependente" type="text" name="grau_parentesco" placeholder="Ex: filho">
            </label>

            <br><br>
            <button class="salvar_dependente botao" type="button">Cadastrar</button>


            <!-- <a href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/editar/<?php echo $iIdFiliado?>">
                <button class="botao-vermelho" type="button" >cancelar</button>
            </a> -->

        </form>

    </div>

    <script type="text/javascript" 
    src="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/src/view/javascript/modal.js"></script>
    
    <script 
        src="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/src/view/javascript/validate.js">
    </script>                

    <script>
        $(document).ready(function() {
            let form = $('.form-cadastrar-filiado');

            if (form.length) {
                
                $.validator.addMethod("regex", function(value, element, regex) {
                    if (value.match(regex)) {
                        return true;
                    }
                    return false;
                }, " Formato invalido");

                $(function() {

                    let form = $('.form-cadastrar-dependente');

                    if (form.length) {
                        form.validate({
                            rules : {
                                nome: {
                                    required: true,
                                    minlength: 3,
                                    regex: /^[a-zA-Zà-úÀ-Ú\s]+$/
                                },
                                data_nascimento: {
                                    required: true,
                                    data: true
                                },
                                grau_parentesco: {
                                    required: true,
                                    regex: /^[a-zA-Zà-úÀ-Ú\s]+$/
                                }
                            },
                            messages: {
                                nome: {
                                    required: "Informe o seu nome",
                                    minlength: "O nome deve ter no mínimo 3 caracters"
                                },
                                data_nascimento: {
                                    required: "Informe a data de nascimento"
                                },
                                grau_parentesco: {
                                    required: "Informe o grau de parentesco"
                                }

                            }
                        })
                    }
                })
            }
        });
    </script>

</body>