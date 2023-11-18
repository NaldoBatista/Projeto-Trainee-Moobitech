<?php
/**
 * @var $aUsuario
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">
        <span>Usuario logado: <?php echo $aUsuario['login']?></span><br><br>

        <h1>Sindicato Dos Trainees</h1><br>

        <h2>Menu</h2><br>
        
        <ul>
            <a href="http://localhost/programa_de_trainee/avaliacao/Usuario/listar">
                <li>Gerenciar Usuarios</li>
            </a>

            <a href="http://localhost/programa_de_trainee/avaliacao/Filiado/listar">
                <li>Gerenciar Filiados</li>
            </a>
        </ul>

    </div>
</body>

