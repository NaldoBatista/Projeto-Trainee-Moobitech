<?php
/**
 * @var $aUsuario
 * @var $sNotificacao
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">

        <h1>Sindicato Dos Trainees</h1><br>

        <h2>Editar Usuario</h2><br>

        <span class="notificacao" ><?php echo $sNotificacao ?></span><br><br>
        
        <form class="form-editar-usuario"
        action="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Usuario/atualizarUsuario" method="post">

            <input type="hidden" name="id" value="<?php echo $aUsuario['id'] ?>">

            <label for="">Login:
                <input id="login" type="text" name="login" value="<?php echo $aUsuario['uso_login'] ?>">
            </label><br>
            
            <label for="">Nova senha:
                <input id="senha" type="password" name="senha" value="">
            </label><br>

            <label for="">Nivel de Acesso:
                <select id="nivel_acesso" 
                name="nivel_acesso" >
                    <option value="padrao">padrão</option>
                    <option value="administrador">administrador</option>
                </select>
            </label>

            <br><br>
            <button data-id_usuario="<?php echo $aUsuario['id'] ?>" 
            class="btn_atualizar_usuario botao" type="submit">atualizar</button>

            <a href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Usuario/listar">
                <button class="btn_cancelar_atualizar_usuario botao-vermelho" type="button" >cancelar</button>
            </a>

        </form>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>

    <script>

    $(document).ready(function () {
        $.validator.addMethod("regex", function(value, element, regex) {
        if (value.match(regex)) {
            return true;
        }
        return false;
        }, " Formato invalido");

        $(function() {

            let form = $('.form-editar-usuario');

            if (form.length) {
                form.validate({
                    rules : {
                        login: {
                            required: true,
                            minlength: 3,
                            regex: /^[0-9a-zA-Zà-úÀ-Ú]+$/
                        },
                        senha: {
                            required: true,
                            maxlength: 6,
                            regex: /^[0-9a-zA-Zà-úÀ-Ú]+$/
                        },
                        nivel_acesso: {
                            required: true,
                        }
                    },
                    messages: {
                        login: {
                            required: "Informe o seu nome",
                            minlength: "O nome deve ter no mínimo 3 caracters"
                        },
                        senha: {
                            required: "Informe a data de nascimento"
                        },
                        nivel_acesso: {
                            required: "Informe o grau de parentesco"
                        }

                    }
                })
            }
        })
    });
    </script>


</body>