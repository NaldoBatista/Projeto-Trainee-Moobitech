<?php
require 'src/Sessao.php';

Sessao::destruirSessao();
header('Location: login.php');
?>