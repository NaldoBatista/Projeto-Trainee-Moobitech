<?php
/**
 * @var $aUsuarios
 * @var $sNotificacao
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">

        <h1>Sindicato Dos Trainees</h1>

        <h3><a href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Menu/menu">Voltar para o menu principal</a></h3><br>

        <h2>Gerenciar Usuarios</h2><br>

        <span class="notificacao" ><?php echo $sNotificacao?></span><br><br>

        <a href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Usuario/save">
            <button class="botao">Cadastrar novo usuario</button>
        </a> <br><br>

        <div id="modal-excluir-usuario"></div>
        <div id="modal-editar-usuario"></div>

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
                           <a href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Usuario/editar/<?php echo $aUsuario['id']?>">
                            <button data-id_usuario="<?php echo $aUsuario['id']?>"
                            class="btn_editar_usuario botao-verde" >Editar</button>
                           </a> 
                        </th>
                        <th>
                           <a href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Usuario/deletarUsuario/<?php echo $aUsuario['id']?>">
                            <button data-id_usuario="<?php echo $aUsuario['id']?>"
                            class="btn_excluir_usuario botao-vermelho">Excluir</button>
                           </a>
                        </th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/theme.min.css" integrity="sha512-hbs/7O+vqWZS49DulqH1n2lVtu63t3c3MTAn0oYMINS5aT8eIAbJGDXgLt6IxDHcWyzVTgf9XyzZ9iWyVQ7mCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script type="text/javascript" 
    src="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/src/view/javascript/listar_usuarios.js"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    
    <script 
    src="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/src/view/javascript/cadastrar_usuario.js">
    </script>

</body>

