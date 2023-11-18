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
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/public/css/modal.css">
</head>

<body>
    <div class="container">
        <form action="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/listar" method="post">

        <h1>Sindicato Dos Trainees</h1>

        <h3><a href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Menu/menu">Voltar para o menu principal</a></h3><br>
        
        <!-- div para modais -->
        <div id="modal-editar-filiado"></div>
        <div id="modal-excluir-filiado"></div>
        <div id="modal-cadastrar-dependente"></div>
        <div id="modal-editar-dependente"></div>
        <div id="modal-excluir-dependente"></div>

        <h2>Gerenciar Filiados</h2><br>

        <span class="notificacao" ><?php echo $sNotificacao?></span><br>

        
        <div class="filtro">
                <h3>Filtros: </h3>


                    <label for="">Nome:</label>
                    <input id="inp_filtro_nome" type="text" name="nome" value="<?php echo $sNomeFiltro ?>">
                    
                    <label for="">Mês de Nascimento:</label>
                    <select id="inp_filtro_mes" name="mes" value="<?php echo $sMesFiltro ?>">
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

                    <button class="btn_filtrar botao" type="submit">filtrar</button>

  
        </div><br>

        <a href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/save">
            <button type="button" class="botao">Cadastrar Novo Filiado</button>
        </a>

        <a href="">
            <button name="remover-selecionados" type="button" class="botao-vermelho">Remover selecionados</button>
        </a> <br><br>

        <table border=1 class="tabela">
            <input type="hidden" id="id_filiado_editar" value="322434">
            <thead>
                <tr>
                    <th><input name="selecionar-todos" class="botao" type="button" value="Selecionar&#10Todos" name="selecionar-todos"></th>
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
                <?php foreach ($aFiliados as $aFiliado) {?>
                    <tr>
                    <td><input class="id-filiado" type="checkbox" name="checkbox[]" value="<?php echo $aFiliado['id']?>"></td>
                        <td class='id-filiado'><?php echo $aFiliado['flo_nome']?></td>
                        <!-- <td><?php echo $aFiliado['flo_cpf']?></td> -->
                        <td><?php echo $aFiliado['flo_rg']?></td>
                        <td><?php echo $aFiliado['flo_data_nascimento']?></td>
                        <td><?php echo $aFiliado['flo_idade']?></td>
                        <td><?php echo $aFiliado['flo_empresa']?></td>
                        <td><?php echo $aFiliado['flo_cargo']?></td>
                        <td><?php echo $aFiliado['flo_situacao']?></td>
                        <td><?php echo $aFiliado['flo_telefone_residencial']?></td>
                        <td><?php echo $aFiliado['flo_telefone_celular']?></td>
                        <td><?php echo $aFiliado['flo_data_ultima_atualizacao']?></td>
                        <td>
                           <!-- <a href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/editar/<?php echo $aFiliado['id']?>">
                            <button type="button" class="botao-verde" >Editar</button>
                           </a>  -->
                           <button class="editar_filiado botao-verde"
                                data-id_filiado="<?php echo $aFiliado['id']?>">
                                Editar
                            </button>

                        </td>
                        <td>
                           <!-- <a href="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/deleteFiliado/<?php echo $aFiliado['id']?>">
                            <button type="button" class="botao-vermelho">Excluir</button>
                           </a>  -->

                           <button class="excluir_filiado botao-vermelho"
                                data-id_filiado="<?php echo $aFiliado['id']?>">
                                Excluir
                            </button>

                        </td>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/theme.min.css" integrity="sha512-hbs/7O+vqWZS49DulqH1n2lVtu63t3c3MTAn0oYMINS5aT8eIAbJGDXgLt6IxDHcWyzVTgf9XyzZ9iWyVQ7mCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>

    <script 
    src="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/src/view/javascript/cadastrar_filiado.js">
    </script>

    <script type="text/javascript" 
    src="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/src/view/javascript/listar_filiados.js"></script>

    <script type="text/javascript" 
    src="http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/src/view/javascript/modal.js"></script>

</body>

