<?php
$sCaminhoImagem = '/home/moobi/Downloads/imagen.webp';
$mNomeArquivo = basename($sCaminhoImagem);

header("Content-Disposition: attachment; filename=\"$mNomeArquivo\"");
header("Content-Type: application/octet-stream");
header("Content-Length: " . filesize($sCaminhoImagem));

?>