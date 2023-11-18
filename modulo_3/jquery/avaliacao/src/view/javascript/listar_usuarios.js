$(document).ready(function() {
        
    $('.btn_excluir_usuario').click(function(e) {
        e.preventDefault();

        let id_usuario = $(e.currentTarget).data('id_usuario');

        html = "<div><h3>Deseja realmente excluir esse usuario?</h3> <br>";
        html += `<button data-id_usuario='${id_usuario}' class='btn_confirma_excluir_usuario botao'>SIM</button> `;
        html += "<button class='btn_cancelar_excluir_usuario botao-vermelho'>Não</button></div>";

        $('#modal-excluir-usuario').html(html).dialog({
            'width': 400,
            'height': 'auto',
            'title': "Excluir dependente"
        }).dialog("open");
    });

    $(document).on('click', '.btn_cancelar_excluir_usuario', function(e) {
        e.preventDefault();

        $('#modal-excluir-usuario').dialog("close");
    });

    $(document).on('click', '.btn_confirma_excluir_usuario', function(e) {
        e.preventDefault();

        const id_usuario = $(e.currentTarget).data('id_usuario');

        $.ajax({
            'url': 'http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Usuario/deletarUsuario',
            'method': 'POST',
            'data': {'id': id_usuario},
            'dataType': 'html',
            'success': function(html) {
                let $body = $('body');
                $body.html(html);
            }
        })
    });

    $('.btn_editar_usuario').click(function(e) {
        e.preventDefault();

        const id_usuario = $(e.currentTarget).data('id_usuario');

        $.ajax({
            'url': 'http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Usuario/editarModal',
            'method': 'POST',
            'data': {'id': id_usuario},
            'dataType': 'html',
            'success': function(html) {
                $("#modal-editar-usuario").html(html).dialog({
                    'width': 600,
                    'height': 'auto',
                    'title': "Cadastrar dependente"
                }).dialog("open");
            }
        });
    });

    $(document).on('click', '.btn_atualizar_usuario', function (e) {
        e.preventDefault();

        const id_usuario = $(e.currentTarget).data('id_usuario');
        const sLogin = $('#login').val();
        const sSenha = $('#senha').val();
        const sNivelAcesso = $('#nivel_acesso').val();

        $.ajax({
            'url': 'http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Usuario/atualizarUsuario',
            'method': 'POST',
            'data': {
                'id': id_usuario,
                'login': sLogin,
                'senha': sSenha,
                'nivel_acesso': sNivelAcesso
            },
            'dataType': 'html',
            'success': function(html) {
                let $body = $('body');
                $body.html(html);
            }
        });
    })

    $(document).on('click', '.btn_cancelar_atualizar_usuario', function(e) {
        e.preventDefault();

        $('#modal-editar-usuario').dialog("close");
    })
});

