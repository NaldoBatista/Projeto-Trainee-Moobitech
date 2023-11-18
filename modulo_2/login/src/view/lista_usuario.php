<?php
/**
 * @var $oUsuarios
 */
?>

<div>
    <h1>Lista de Usuarios</h1>

    <a href="http://localhost/programa_de_trainee/modulo_2/login/Login/cadastrar">
        <button>cadastar usuario</button>
    </a>

    <a href="http://localhost/programa_de_trainee/modulo_2/login/Login/logout">
        <button>fazer loguot</button>
    </a>
    <br><br>
    
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Usuario</th>
                <th>Nivel de acesso</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aUsuarios as $aUsuario) { ?>
                <tr>
                    <th><?php echo $aUsuario['id']?></th>
                    <th><?php echo $aUsuario['usuario']?></th>
                    <th><?php echo $aUsuario['nivel_acesso']?></th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>