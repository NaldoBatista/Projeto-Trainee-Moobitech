<?php
/**
 *  @var $aEmpresa
 */
?>

<div>
    <h1>Editar Empresa</h1>
    <form 
        action="http://localhost/programa_de_trainee/modulo_2/crud/Empresa/replaceEmpresa"
        method="post"
    >
        <input type="hidden" name="id" value="<?php echo $aEmpresa['id'] ?>">

        <label for="">Nome:</label>
        <input type="text" name="nome" value="<?php echo $aEmpresa['nome'] ?>" >
        <br>
        <label for="">Email:</label>
        <input type="email" name="email" value="<?php echo $aEmpresa['email'] ?>">
        <br>
        <label for="">CNPJ:</label>
        <input type="text" name="cnpj" value="<?php echo $aEmpresa['cnpj'] ?>">
        <br>
        <label for="">CEP:</label>
        <input type="text" name="cep" value="<?php echo $aEmpresa['cep'] ?>">
        <br>
        <label for="">Estado:</label>
        <input type="text" name="estado" value="<?php echo $aEmpresa['estado'] ?>">
        <br>
        <label for="">Cidade:</label>
        <input type="text" name="cidade" value="<?php echo $aEmpresa['cidade'] ?>">
        <br>
        <label for="">Bairro:</label>
        <input type="text" name="bairro" value="<?php echo $aEmpresa['bairro'] ?>">
        <br>
        <label for="">Logradouro:</label>
        <input type="text" name="logradouro" value="<?php echo $aEmpresa['logradouro'] ?>">
        <br>
        <label for="">Telefone:</label>
        <input type="text" name="telefone" value="<?php echo $aEmpresa['telefone'] ?>">
        <br>
        <button type="submit">Editar</button>

    </form>
</div>