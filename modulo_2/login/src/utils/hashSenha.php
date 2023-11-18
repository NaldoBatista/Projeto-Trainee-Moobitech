<?php 

function hashSenha($sSenha) {
    $sHash = md5($sSenha);
    return $sHash;
}

?>