
btnSelecionarTodos = $("[name='selecionar-todos']");
inputCheckboxLista = $('.id-filiado');
btnRemoverSelecionados = $("[name='remover-selecionados']");

btnSelecionarTodos.click(function() {
   inputCheckboxLista.each((i, checkbox) => {
        checkbox.checked = true;
   });
});

btnRemoverSelecionados.click(function(e) {
   e.preventDefault();
   
   const FiliadosLista = inputCheckboxLista.filter(":checked").get();
   IdLista = FiliadosLista.map(checkbox => checkbox.value);
   
   $.ajax({
      'url': 'http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/deleteFiliados',
      'method': 'POST',
      'data': {'id-lista': IdLista},
      'dataType': "json",
      'success': function(json) {
         debugger;
         if (json.sucesso) {
            location.reload();
            console.log(json.mensagem);
         }
      }
   })
})

$('.btn_filtrar').click(function(e) {
   e.preventDefault();

   let nome = $('#inp_filtro_nome').val();
   let mes = $('#inp_filtro_mes').val();

   $.ajax({
      'url': 'http://localhost/programa_de_trainee/modulo_3/jquery/avaliacao/Filiado/listar',
      'method': 'POST',
      'data': {'nome': nome, 'mes': mes},
      'dataType': 'html',
      'success': function(html) {
         let $body = $('body');
         $body.html(html);
      }
   });
});







