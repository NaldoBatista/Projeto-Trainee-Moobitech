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

        <h2>Login</h2><br>

        <span class="notificacao" ><?php echo $sNotificacao ?></span><br>
        
        <form action="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Login/autenticar" method="post">

            <label for="">Login:
            <input type="text" name="login">
            </label>
            <br>
            <label for="">Senha:
            <input type="password" name="senha">
            </label>
            <br><br>
            <button class="botao" type="submit">login</button>

        </form>
    </div>
</body>

