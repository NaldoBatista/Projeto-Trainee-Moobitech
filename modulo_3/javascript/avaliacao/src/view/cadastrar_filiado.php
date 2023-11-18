<?php
/**
 * @var $sNotificacao
 */
?>

<head>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/public/css/style.css">
</head>

<body>
    
    <div class="container">

        <h1>Sindicato Dos Trainees</h1><br>

        <h2>Cadastrar Novo Filiado</h2><br>
        
        <span class="notificacao"><?php echo $sNotificacao ?></span> <br><br>
        
        <form action="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Filiado/cadastrarFiliado" method="post">

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#dados-pessoais"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Dados Pessoais</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#empresa"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Empresa</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#contato"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contato</button>
                </div>
            </nav> <br>

            <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="dados-pessoais" role="tabpanel" aria-labelledby="nav-home-tab">
                
                <label for="">Nome:
                    <input type="text" name="nome" required
                    pattern="^[a-zA-Zà-úÀ-Ú -]$">
                </label><br>
                
                <label for="">CPF:
                    <input type="text" name="cpf" required
                    pattern="^[0-9]{3}.?[0-9]{3}.?[0-9]{3}-?[0-9]{2}$">
                </label><br>

                <label for="">RG:
                    <input type="text" name="rg"
                    required pattern="^[0-9.-]{5, 10}$">
                </label><br>

                <label for="">Data Nascimento:
                    <input type="date" name="data_nascimento" 
                    required>
                </label>
                <span name="idade"></span>
                <br>
            
            </div>
            
            <div class="tab-pane fade" id="empresa" role="tabpanel" aria-labelledby="nav-profile-tab">
                
                <label for="">Empresa:
                    <input type="text" name="empresa"
                    required
                    pattern="^[A-Za-z0-9_ ]{4,20}$">
                </label><br>
                
                <label for="">Cargo:
                    <input type="text" name="cargo"
                    required
                    pattern="^[A-Za-z0-9- ]{4,20}$">
                </label><br>

                <label for="">Situacao:
                    <select name="situacao" required>
                        <option value="">--SELECIONE--</option>
                        <option value="Ativo">Ativo</option>
                        <option value="Aposentado">Aposentado</option>
                        <option value="Licenciado">Licenciado</option>
                    </select>
                </label><br>

            </div>

            <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="nav-contact-tab">
                
                <label for="">Telefone Residencial:
                    <input type="tel" name="telefone_residencial"
                    required
                    pattern="[0-9]{2}-[0-9]{4,5}-[0-9]{4}"
                    placeholder="99-99999-9999">
                </label><br>

                <label for="">Telefone Celular:
                    <input type="tel" name="telefone_celular"
                    required
                    pattern="[0-9]{2}-[0-9]{4,5}-[0-9]{4}"
                    placeholder="99-99999-9999">
                </label><br><br>

            </div>

            </div>

            <br><br>
            <button class="botao" type="submit">cadastrar</button>

            <a href="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Filiado/listar">
                <button class="botao-vermelho" type="button" >cancelar</button>
            </a>

        </form>

    </div>

    <script type="text/javascript" 
    src="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/src/view/javascript/calcular_idade.js"></script>
    
</body>


