
$(document).ready(function() {
    
})

$(".editar_filiado").click(function(e) {
    e.preventDefault();
    const idFiliado = $(e.currentTarget).data("id_filiado");

    $.ajax({
        'url': 'http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/editarModal',
        'method': "POST",
        'data': { id: idFiliado},
        'dataType': "html",
        'success': function (html) {
            $("#modal-editar-filiado").html(html).dialog({
                'width': 600,
                'height': 430,
                'title': "Editar filiado"
            }).dialog("open");
        }
    });
});

function atualizarModalEditarFiliado(iIdFiliado) {
    $("#modal-editar-filiado").dialog('close');

    $.ajax({
        'url': 'http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/editarModal',
        'method': "POST",
        'data': { 'id': iIdFiliado},
        'dataType': "html",
        'success': function (html) {
            $("#modal-editar-filiado").html(html).dialog({
                'width': 600,
                'height': 430,
                'title': "Editar filiado"
            }).dialog("open");
        }
    });
}

$(".atualizar-filiado").click(function(e) {
    e.preventDefault();
    
    let id = $('#id').val();
    let nome = $('#nome').val();
    let cpf = $('#cpf').val();
    let rg = $('#rg').val();
    let dataNascimento = $('#data_nascimento').val();
    let empresa = $('#empresa').val();
    let cargo = $('#cargo').val();
    let situacao = $('#situacao').val();
    let telefoneResidencial = $('#telefone_residencial').val();
    let telefoneCelular = $('#telefone_celular').val();

    $.ajax({
        'url': 'http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/atualizarFiliado',
        'method': 'POST',
        'data': {
            id: id,
            nome: nome,
            cpf: cpf,
            rg: rg, 
            data_nascimento: dataNascimento,
            empresa: empresa,
            cargo: cargo,
            situacao: situacao,
            telefone_residencial: telefoneResidencial,
            telefone_celular: telefoneCelular
        },
        'dataType': "html",
        'success': function(html) {
            $('#modal-editar-filiado').dialog('close');
            let $body = $('body');
            $body.html(html);
        }
    }) 
});

$('.cancelar-atualizacao-filiado').click(function(e) {
    e.preventDefault();

    $('#modal-editar-filiado').dialog('close');
})


$(".excluir_filiado").click(function(e) {
    e.preventDefault();

    let id_filiado = $(e.currentTarget).data("id_filiado");

    html = "<div><h3>Deseja realmente excluir esse filiado?</h3> <br>";
    html += `<button data-id_filiado="${id_filiado}" class='confirma_excluir botao'>SIM</button>  `;
    html += "<button class='cancelar_excluir botao-vermelho'>Não</button></div>";

    $('#modal-excluir-filiado').html(html).dialog({
        'width': 400,
        'height': 'auto',
        'title': "Excluir filiado"
    }).dialog("open");
})


$(document).on("click", ".confirma_excluir", function(e) {
    e.preventDefault();

    let id_filiado = $(e.currentTarget).data("id_filiado");

    $.ajax({
        'url': 'http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/deleteFiliado',
        'method': 'POST',
        'data': {id: id_filiado},
        'dataType': "html",
        'success': function(html) {
            $('#modal-excluir-filiado').dialog('close');
            let $body = $('body');
            $body.html(html);
        }
    });
});

$(document).on("click", ".cancelar_excluir", function(e) {
    e.preventDefault();

    $('#modal-excluir-filiado').dialog('close');
});


$('.cadastrar_dependente').click(function(e) {
    e.preventDefault();

    id_filiado = $(e.currentTarget).data("id_filiado");

    $.ajax({
        'url': 'http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Dependente/saveModal',
        'method': "POST",
        'data': { id: id_filiado},
        'dataType': "html",
        'success': function (html) {
            $("#modal-cadastrar-dependente").html(html).dialog({
                'width': 600,
                'height': 'auto',
                'title': "Cadastrar dependente"
            }).dialog("open");
        }
    });
})

var salvarDependente = false;
$(document).ready(function() {
    $(document).on('click', '.salvar_dependente', function(e) {
        e.preventDefault();

        let id_filiado = $('#id_filiado_dependente').val();
        let nome = $('#nome_dependente').val();
        let dataNascimento = $('#data_nascimento_dependente').val();
        let grauParentesco =  $('#grau_parentesco_dependente').val();

        if (!salvarDependente) {
            $.ajax({
                'url': 'http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Dependente/cadastrarDependente',
                'method': 'POST',
                'data': {
                    id: id_filiado,
                    nome: nome,
                    data_nascimento: dataNascimento,
                    grau_parentesco: grauParentesco
                },
                'dataType': "html",
                'success': function(html) {
                    $('#modal-cadastrar-dependente').dialog('close');
                    atualizarModalEditarFiliado(id_filiado);
                    //location.reload();
                    // let $body = $('body');
                    // $body.html(html);
                }
            })
            salvarDependente = true;
        }    
    })
})


$('.editar_dependente').click(function(e) {
    e.preventDefault();

    let = id_dependente= $(e.currentTarget).data("id_dependente");
    console.log(id_dependente);

    $.ajax({
        'url': 'http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Dependente/editModal',
        'method': "POST",
        'data': { id: id_dependente},
        'dataType': "html",
        'success': function (html) {
            $("#modal-editar-dependente").html(html).dialog({
                'width': 600,
                'height': 'auto',
                'title': "Cadastrar dependente"
            }).dialog("open");
        }
    });
})

var atualizarDependente = false;
$(document).on("click", ".atualizar_dependente", function(e) {
    e.preventDefault();
    
    let id_dependente = $(e.currentTarget).data("id_dependente");
    let id_filiado = $(e.currentTarget).data("id_filiado");
    let nomeDependente = $('#nome_dependente').val();
    let dataNascimento = $('#data_nascimento').val();
    let grauParentesco = $('#grau_parentesco').val();

    if (!atualizarDependente) {
        $.ajax({
            'url': 'http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Dependente/atualizarDependente',
            'method': 'POST',
            'data': {
                id: id_dependente,
                id_filiado: id_filiado,
                nome: nomeDependente,
                data_nascimento: dataNascimento,
                grau_parentesco: grauParentesco
            },
            'dataType': "html",
            'success': function() {
                $('#modal-editar-dependente').dialog('close');
                atualizarModalEditarFiliado(id_filiado);
                //location.reload();
                //console.log('sucesso');
            }
        })
        atualizarDependente = true;
    }
});

$(document).on('click', '.remover_dependente', function(e) {
    e.preventDefault();

    let id_dependente = $(e.currentTarget).data("id_dependente");
    let id_filiado = $(e.currentTarget).data("id_filiado");

    html = "<div><h3>Deseja realmente excluir esse dependente?</h3> <br>";
    html += `<button data-id_filiado='${id_filiado}' data-id_dependente='${id_dependente}' class='confirma_excluir_dpe botao'>SIM</button>      `;
    html += "<button class='cancelar_excluir_dpe botao-vermelho'>Não</button></div>";

    $('#modal-excluir-dependente').html(html).dialog({
        'width': 400,
        'height': 'auto',
        'title': "Excluir dependente"
    }).dialog("open");
})

$(document).on('click', '.confirma_excluir_dpe', function(e) {
    e.preventDefault();

    id_dependente = $(e.currentTarget).data("id_dependente");
    id_filiado = $(e.currentTarget).data("id_filiado");

    $.ajax({
        'url': 'http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/dependente/deleteDependente',
        'method': 'POST',
        'data': {id: id_dependente},
        'dataType': "html",
        'success': function() {
            $('#modal-excluir-dependente').dialog('close');
            atualizarModalEditarFiliado(id_filiado);
        }
    });
});

$(document).on('click', '.cancelar_excluir_dpe', function(e) {
    e.preventDefault();
    
    $('#modal-excluir-dependente').dialog('close');
})



