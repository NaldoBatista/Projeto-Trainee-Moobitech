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

        <h2>Cadastrar Novo Filiado</h2><br><br>

        <span class="notificacao"><?php echo $sNotificacao ?></span> <br><br>
        
        <form class="form-cadastrar-filiado"
        action="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/cadastrarFiliado" method="post">
     
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Dados Pessoais</a></li>
                    <li><a href="#tabs-2">Empresa</a></li>
                    <li><a href="#tabs-3">Contato</a></li>
                </ul>

                <div id="tabs-1">
                    <label for="">Nome:
                        <input type="text" name="nome">
                    </label><br>
                    
                    <label for="">CPF:
                        <input type="text" name="cpf" placeholder="">
                    </label><br>

                    <label for="">RG:
                        <input type="text" name="rg">
                    </label><br>

                    <label for="">Data Nascimento:
                        <input type="date" name="data_nascimento">
                    </label><br>
                </div>

                <div id="tabs-2">
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
                </div>
                
                <div id="tabs-3">
                    <label for="">Telefone Residencial:
                        <input type="text" name="telefone_residencial">
                    </label><br>

                    <label for="">Telefone Celular:
                        <input type="text" name="telefone_celular">
                    </label><br><br>
                </div>
            </div>
        
        
            <!-- <label for="">Nome:
                <input type="text" name="nome">
            </label><br>
            
            <label for="">CPF:
                <input type="text" name="cpf" placeholder="">
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
            </label><br><br> -->

            <br><br>
            <button class="botao" type="submit">cadastrar</button>


            <a href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/listar">
                <button class="botao-vermelho" type="button" >cancelar</button>
            </a>

        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/theme.min.css" integrity="sha512-hbs/7O+vqWZS49DulqH1n2lVtu63t3c3MTAn0oYMINS5aT8eIAbJGDXgLt6IxDHcWyzVTgf9XyzZ9iWyVQ7mCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script 
        src="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/src/view/javascript/validate.js">
    </script>

    <script 
        src="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/src/view/javascript/cadastrar_filiado.js">
    </script>

    

</body>

