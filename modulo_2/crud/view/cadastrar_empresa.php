<?php
/**
* @var array $aEmpresas
*
*/

/*

foreach ($aEmpresas as $aEmpresa) {
    $oEmpresa = new Empresa($aEmpresa['nome']);
    if ($oEmpresa->isAtiva()) {

    }
}


$aEmpresa = [
    new Empresa(),
    new Empresa(),
]

foreach ($aEmpresas as $oEmpresa) {
    if ($oEmpresa->isAtiva()) {

    }
}
*/

?>




<div>
    <h1>Cadastrar Empresa</h1>

    <form 
        action="http://localhost/programa_de_trainee/modulo_2/crud/Empresa/empresaSave" 
        method="post"
    >

        <label for="">Nome:</label>
        <input type="text" name="nome">
        <br>
        <label for="">Email:</label>
        <input type="email" name="email">
        <br>
        <label for="">CNPJ:</label>
        <input type="text" name="cnpj">
        <br>
        <label for="">CEP:</label>
        <input type="text" name="cep">
        <br>
        <label for="">Estado:</label>
        <input type="text" name="estado">
        <br>
        <label for="">Cidade:</label>
        <input type="text" name="cidade">
        <br>
        <label for="">Bairro:</label>
        <input type="text" name="bairro">
        <br>
        <label for="">Logradouro:</label>
        <input type="text" name="logradouro">
        <br>
        <label for="">Telefone:</label>
        <input type="text" name="telefone">
        <br>
        <button type="submit">cadastrar</button>

    </form>
</div>