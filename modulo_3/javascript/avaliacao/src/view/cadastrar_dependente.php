<?php
/**
 * @var $iIdFiliado
 * @var $sNotificacao
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">

        <h1>Sindicato Dos Trainees</h1><br>

        <h2>Cadastrar Dependente</h2><br><br>


        <span class="notificacao"><?php echo $sNotificacao ?></span> <br><br>

        
        <form action="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Dependente/cadastrarDependente" method="post">

            <input type="hidden" name='id' value="<?php echo  $iIdFiliado ?>">

            <label for="">Nome:
                <input type="text" name="nome"
                required
                pattern="^[a-zA-Zà-úÀ-Ú -]$">
            </label><br>
            
            <label for="">Data de Nascimento:
                <input type="date" name="data_nascimento"
                required>
            </label>
            <span name="idade"></span>
            <br>

            <label for="">Grau de Parentesco:
                <input type="text" name="grau_parentesco"
                required
                pattern="^[A-Za-z ]{2,20}$">
            </label>

            <br><br>
            <button class="botao" type="submit">cadastrar</button>

            <a href="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Filiado/editar/<?php echo $iIdFiliado?>">
                <button class="botao-vermelho" type="button" >cancelar</button>
            </a>

        </form>

    </div>

    <script type="text/javascript" 
    src="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/src/view/javascript/calcular_idade.js"></script>

</body>