<?php
/**
 * @var $sNotificacao
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">

        <h1>Sindicato Dos Trainees</h1><br>

        <h2>Cadastrar Novo Usuario</h2><br><br>


        <span class="notificacao"><?php echo $sNotificacao ?></span> <br><br>

        
        <form class="form-cadastrar-usuario"
        action="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Usuario/cadastrarUsuario" method="post">

            <label for="">Login:
                <input type="text" name="login">
            </label><br>
            
            <label for="">Senha:
                <input type="password" name="senha">
            </label><br>

            <label for="">Nivel de Acesso:
                <select name="nivel_acesso" >
                    <option value="">--SELECIONE--</option>
                    <option value="padrao">padrão</option>
                    <option value="administrador">administrador</option>
                </select>
            </label>

            <br><br>
            <button class="botao" type="submit">cadastrar</button>

            <a href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Usuario/listar">
                <button class="botao-vermelho" type="button" >cancelar</button>
            </a>

        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>

    <script 
    src="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/src/view/javascript/cadastrar_usuario.js">
    </script>

</body>