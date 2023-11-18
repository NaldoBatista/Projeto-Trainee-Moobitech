<?php
/**
 * @var $aDependente
 * @var $sNotificacao
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">

        <h1>Sindicato Dos Trainees</h1><br>

        <h2>Editar Dependente</h2><br><br>

        <h2>Editar Dependente Modal</h2><br><br>

        <span class="notificacao"><?php echo $sNotificacao ?></span> <br><br>

        
        <form class="form-cadastrar-dependente"
        action="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Dependente/atualizarDependente" method="post">

            <input type="hidden" name="id" value="<?php echo $aDependente['id']?>">
            <input type="hidden" name="id_filiado" value="<?php echo $aDependente['flo_id']?>">

            <label for="">Nome:
                <input id="nome_dependente"
                type="text" name="nome" value="<?php echo $aDependente['dpe_nome']?>">
            </label><br>
            
            <label for="">Data de Nascimento:
                <input id="data_nascimento"
                type="date" name="data_nascimento" value="<?php echo $aDependente['dpe_data_nascimento']?>">
            </label><br>

            <label for="">Grau de Parentesco:
                <input id="grau_parentesco"
                type="text" name="grau_parentesco" value="<?php echo $aDependente['dpe_grau_parentesco']?>">
            </label>

            <br><br>

            <button data-id_dependente="<?php echo $aDependente['id']?>"
            data-id_filiado="<?php echo $aDependente['flo_id']?>"
            class="atualizar_dependente botao" type="button">Atualizar</button>

            <!-- <a href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/editar/<?php echo $aDependente['flo_id'] ?>">
                <button class="botao-vermelho" type="button" >cancelar</button>
            </a> -->

        </form>

    </div>

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