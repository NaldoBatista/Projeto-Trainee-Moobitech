<?php
/**
 * @var $sNotificacao
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">

        <h1>Sindicato Dos Trainees</h1><br>

        <h2>Login</h2><br>

        <span class="notificacao" ><?php echo $sNotificacao ?></span><br>
        
        <form action="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Login/autenticar" method="post">

            <label for="">Login:
            <input type="text" name="login" required="" pattern="^[A-Za-z0-9_]{4,29}$">
            </label>
            <br>
            <label for="">Senha:
            <input type="password" name="senha" required="" pattern=".{6,}">
            </label>
            <br><br>
            <button class="botao" type="submit">login</button>

        </form>
    </div>
</body>

