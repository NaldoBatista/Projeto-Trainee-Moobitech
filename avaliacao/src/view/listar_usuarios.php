<?php
/**
 * @var $aUsuarios
 * @var $sNotificacao
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">

        <h1>Sindicato Dos Trainees</h1>

        <h3><a href="http://localhost/programa_de_trainee/avaliacao/Menu/menu">Voltar para o menu principal</a></h3><br>

        <h2>Gerenciar Usuarios</h2><br>

        <span class="notificacao" ><?php echo $sNotificacao?></span><br><br>

        <a href="http://localhost/programa_de_trainee/avaliacao/Usuario/save">
            <button class="botao">Cadastrar novo usuario</button>
        </a> <br><br>

        <table border=1>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Login</th>
                    <th>Nível de Acesso</th>
                    <th colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aUsuarios as $aUsuario) { ?>
                    <tr>
                        <th><?php echo $aUsuario['id']?></th>
                        <th><?php echo $aUsuario['uso_login']?></th>
                        <th><?php echo $aUsuario['uso_nivel_acesso']?></th>
                        <th>
                           <a href="http://localhost/programa_de_trainee/avaliacao/Usuario/editar/<?php echo $aUsuario['id']?>">
                            <button class="botao-verde" >Editar</button>
                           </a> 
                        </th>
                        <th>
                           <a href="http://localhost/programa_de_trainee/avaliacao/Usuario/deletarUsuario/<?php echo $aUsuario['id']?>">
                            <button class="botao-vermelho">Excluir</button>
                           </a> 
                        </th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
    </div>
</body>

