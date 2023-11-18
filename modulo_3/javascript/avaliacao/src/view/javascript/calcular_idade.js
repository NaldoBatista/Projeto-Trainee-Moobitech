
const dataNascimentoInput = document.getElementsByName('data_nascimento')[0];

const idadeSpan = document.getElementsByName('idade')[0];

dataNascimentoInput.addEventListener('input', calcularIdade);

function calcularIdade() {
    const dataNascimento = new Date(dataNascimentoInput.value);
    const dataAtual = new Date();

    const diff = dataAtual - dataNascimento;
    const idade = Math.floor(diff / (1000 * 60 * 60 * 24 * 365.25)); 

    idadeSpan.textContent = `Idade: ${idade} anos`;
}
