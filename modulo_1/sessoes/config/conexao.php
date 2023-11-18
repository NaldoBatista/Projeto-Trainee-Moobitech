<?php

function conexao() {
    $mysqli = new mysqli('localhost', 'root', 'Tech@2023', 'sessoes');
    $mysqli->set_charset('utf8');

    if (!$mysqli) {
        echo 'Banco não conectado';
    }
    
    return $mysqli;
}

?>