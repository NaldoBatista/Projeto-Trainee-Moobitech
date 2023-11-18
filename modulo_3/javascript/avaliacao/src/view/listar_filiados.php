<?php
/**
 * @var $aFiliados
 * @var $sNotificacao
 * @var $iNumeroPaginas
 * @var $iPaginaAtual
 * @var $sNomeFiltro
 * @var $sMesFiltro
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/public/css/style.css">
</head>

<body>
    <div class="container">
        <form action="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Filiado/listar" method="post">

        <h1>Sindicato Dos Trainees</h1>

        <h3><a href="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Menu/menu">Voltar para o menu principal</a></h3><br>

        <h2>Gerenciar Filiados</h2><br>

        <span class="notificacao" ><?php echo $sNotificacao?></span><br>

        
        <div class="filtro">
                <h3>Filtros: </h3>


                    <label for="">Nome:</label>
                    <input type="text" name="nome" value="<?php echo $sNomeFiltro ?>">
                    
                    <label for="">Mês de Nascimento:</label>
                    <select name="mes" value="<?php echo $sMesFiltro ?>">
                        <option value="">--SELECIONE--</option>
                        <option value="01">Janeiro</option>
                        <option value="02">Fevereiro</option>
                        <option value="03">Março</option>
                        <option value="04">Abril</option>
                        <option value="05">Maio</option>
                        <option value="06">Junho</option>
                        <option value="07">Julho</option>
                        <option value="08">Agosto</option>
                        <option value="09">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </select>

                    <button class="botao" type="submit">filtrar</button>

  
        </div>  <br>


        <a href="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Filiado/save">
            <button type="button" class="botao">Cadastrar novo Filiado</button>
        </a>

        <button class="botao-vermelho" name="remover-selecionados"> Remover Selecionados</button>

        <br><br>

        <table border=1 class="tabela">
            <thead>
                <tr>
                    <th><button class="botao" type="button" name="selecionar_todos">Todos</button></th>
                    <th>Nome</th>
                    <!-- <th>CPF</th> -->
                    <th>RG</th>
                    <th>Data de Nascimento</th>
                    <th>Idade</th>
                    <th>Empresa</th>
                    <th>Cargo</th>
                    <th>Situacao</th>
                    <th>Telefone Residencial</th>
                    <th>Telefone Celular</th>
                    <th>Data da Ultima Atualização</th>
                    <th colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aFiliados as $aFiliado) { ?>
                    <tr>
                        <th><input class="id-filiado" type="checkbox" name="checkbox[]" value="<?php echo $aFiliado['id']?>"></th>
                        <th><?php echo $aFiliado['flo_nome']?></th>
                        <!-- <th><?php echo $aFiliado['flo_cpf']?></th> -->
                        <th><?php echo $aFiliado['flo_rg']?></th>
                        <th><?php echo $aFiliado['flo_data_nascimento']?></th>
                        <th><?php echo $aFiliado['flo_idade']?></th>
                        <th><?php echo $aFiliado['flo_empresa']?></th>
                        <th><?php echo $aFiliado['flo_cargo']?></th>
                        <th><?php echo $aFiliado['flo_situacao']?></th>
                        <th><?php echo $aFiliado['flo_telefone_residencial']?></th>
                        <th><?php echo $aFiliado['flo_telefone_celular']?></th>
                        <th><?php echo $aFiliado['flo_data_ultima_atualizacao']?></th>
                        <th>

                           <a href="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Filiado/editar/<?php echo $aFiliado['id']?>">
                            <button type="button" class="botao-verde" >Editar</button>
                           </a> 
                        </th>
                        <th>
                           <a href="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Filiado/deleteFiliado/<?php echo $aFiliado['id']?>">
                            <button type="button" class="botao-vermelho">Excluir</button>
                           </a> 
                        </th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


        <div class="paginacao">
            
            <button type="submit" class="pagina" name="pagina" value="1">Primeira</button>

            <?php if ($iPaginaAtual > 1) { ?>
                <button type="submit" class="pagina" name="pagina" value="<?php echo $iPaginaAtual - 1?>"><<</button>
            <?php } ?>

            <p class="pagina" ><?php echo $iPaginaAtual?></p>

                <?php if ($iPaginaAtual < $iNumeroPaginas) { ?>
                    <button type="submit" class="pagina" name="pagina" value="<?php echo $iPaginaAtual + 1?>">>></button>
            <?php } ?>    
            
            <button type="submit" class="pagina" name="pagina" value="<?php echo $iNumeroPaginas?>">Ultima</button>

        </div>
        
    </form>

    </div>

    <script type="text/javascript" 
    src="http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/src/view/javascript/listar_filiados.js"></script>

</body>

