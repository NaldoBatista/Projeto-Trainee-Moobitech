<?php
$sCaminhoImagem = '/home/moobi/Downloads/imagen.webp';

$tipoMime = mime_content_type($sCaminhoImagem);

header("Content-Type: $tipoMime");

readfile($sCaminhoImagem);
?>