<?php
/**
 * @var $aDependente
 * @var $sNotificacao
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">

        <h1>Sindicato Dos Trainees</h1><br>

        <h2>Editar Dependente</h2><br><br>


        <span class="notificacao"><?php echo $sNotificacao ?></span> <br><br>

        
        <form action="http://localhost/programa_de_trainee/avaliacao/Dependente/atualizarDependente" method="post">

            <input type="hidden" name="id" value="<?php echo $aDependente['id']?>">
            <input type="hidden" name="id_filiado" value="<?php echo $aDependente['flo_id']?>">

            <label for="">Nome:
                <input type="text" name="nome" value="<?php echo $aDependente['dpe_nome']?>">
            </label><br>
            
            <label for="">Data de Nascimento:
                <input type="date" name="data_nascimento" value="<?php echo $aDependente['dpe_data_nascimento']?>">
            </label><br>

            <label for="">Grau de Parentesco:
                <input type="text" name="grau_parentesco" value="<?php echo $aDependente['dpe_grau_parentesco']?>">
            </label>

            <br><br>

            <button class="botao" type="submit">Editar</button>

            <a href="http://localhost/programa_de_trainee/avaliacao/Filiado/editar/<?php echo $aDependente['flo_id'] ?>">
                <button class="botao-vermelho" type="button" >cancelar</button>
            </a>

        </form>

    </div>
</body>