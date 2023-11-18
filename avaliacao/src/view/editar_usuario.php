<?php
/**
 * @var $aUsuario
 * @var $sNotificacao
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">

        <h1>Sindicato Dos Trainees</h1><br>

        <h2>Editar Usuario</h2><br>

        <span class="notificacao" ><?php echo $sNotificacao ?></span><br><br>
        
        <form action="http://localhost/programa_de_trainee/avaliacao/Usuario/atualizarUsuario" method="post">

            <input type="hidden" name="id" value="<?php echo $aUsuario['id'] ?>">

            <label for="">Login:
                <input type="text" name="login" value="<?php echo $aUsuario['uso_login'] ?>">
            </label><br>
            
            <label for="">Nova senha:
                <input type="password" name="senha" value="">
            </label><br>

            <label for="">Nivel de Acesso:
                <select name="nivel_acesso" >
                    <option value="padrao">padrão</option>
                    <option value="administrador">administrador</option>
                </select>
            </label>

            <br><br>
            <button class="botao" type="submit">atualizar</button>

            <a href="http://localhost/programa_de_trainee/avaliacao/Usuario/listar">
                <button class="botao-vermelho" type="button" >cancelar</button>
            </a>

        </form>
    </div>
</body>