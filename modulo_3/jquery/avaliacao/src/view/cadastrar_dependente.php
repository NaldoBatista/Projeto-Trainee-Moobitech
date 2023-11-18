<?php
/**
 * @var $iIdFiliado
 * @var $sNotificacao
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">

        <h1>Sindicato Dos Trainees</h1><br>

        <h2>Cadastrar Dependente</h2><br><br>


        <span class="notificacao"><?php echo $sNotificacao ?></span> <br><br>

        
        <form class="form-cadastrar-dependente"
        action="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Dependente/cadastrarDependente" method="post">

            <input type="hidden" name='id' value="<?php echo  $iIdFiliado ?>">

            <label for="">Nome:
                <input type="text" name="nome" placeholder="Nome do Dependente">
            </label><br>
            
            <label for="">Data de Nascimento:
                <input type="date" name="data_nascimento">
            </label><br>

            <label for="">Grau de Parentesco:
                <input type="text" name="grau_parentesco" placeholder="Ex: filho">
            </label>

            <br><br>
            <button class="botao" type="submit">cadastrar</button>

            <a href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/editar/<?php echo $iIdFiliado?>">
                <button class="botao-vermelho" type="button" >cancelar</button>
            </a>

        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>

    <script 
    src="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/src/view/javascript/cadastrar_dependente.js">
    </script>

</body>