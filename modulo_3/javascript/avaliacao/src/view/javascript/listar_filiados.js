const checkboxes = document.querySelectorAll('input[type="checkbox"]');

const btnSelecinarTodos = document.getElementsByName('selecionar_todos')[0];

btnSelecinarTodos.addEventListener('click', selecionarTodos);

function selecionarTodos() {
    checkboxes.forEach(checkbox => {
        checkbox.checked = !checkbox.checked; 
    });
}

const btnRemoverSelecionados = document.getElementsByName('remover-selecionados')[0];

btnRemoverSelecionados.addEventListener('click', removerSelecionados);

function removerSelecionados(event) {
    event.preventDefault();

    const filiadoId = Array.from(document.getElementsByClassName('id-filiado')).filter(input => input.checked).map(input => input.value)

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Filiado/deleteFiliados", true);    
    xhr.setRequestHeader("Content-Type", "application/json");
    
    xhr.onreadystatechange = (e) => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            window.location.href = 'http://localhost/programa_de_trainee/modulo_3/javascript/avaliacao/Filiado/listar';
        }
    };
    
    xhr.send(JSON.stringify({ ids: filiadoId }));
}