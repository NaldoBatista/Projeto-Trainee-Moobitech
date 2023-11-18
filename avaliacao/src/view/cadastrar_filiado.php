<?php
/**
 * @var $sNotificacao
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">

        <h1>Sindicato Dos Trainees</h1><br>

        <h2>Cadastrar Novo Filiado</h2><br><br>

        <span class="notificacao"><?php echo $sNotificacao ?></span> <br><br>

        
        <form action="http://localhost/programa_de_trainee/avaliacao/Filiado/cadastrarFiliado" method="post">

            <label for="">Nome:
                <input type="text" name="nome">
            </label><br>
            
            <label for="">CPF:
                <input type="text" name="cpf">
            </label><br>

            <label for="">RG:
                <input type="text" name="rg">
            </label><br>

            <label for="">Data Nascimento:
                <input type="date" name="data_nascimento">
            </label><br>

            <label for="">Empresa:
                <input type="text" name="empresa">
            </label><br>
            
            <label for="">Cargo:
                <input type="text" name="cargo">
            </label><br>

            <label for="">Situacao:
                <select name="situacao">
                    <option value="">--SELECIONE--</option>
                    <option value="Ativo">Ativo</option>
                    <option value="Aposentado">Aposentado</option>
                    <option value="Licenciado">Licenciado</option>
                </select>
            </label><br>

            <label for="">Telefone Residencial:
                <input type="text" name="telefone_residencial">
            </label><br>


            <label for="">Telefone Celular:
                <input type="text" name="telefone_celular">
            </label><br><br>

            <br><br>
            <button class="botao" type="submit">cadastrar</button>


            <a href="http://localhost/programa_de_trainee/avaliacao/Filiado/listar">
                <button class="botao-vermelho" type="button" >cancelar</button>
            </a>

        </form>

    </div>
</body>

