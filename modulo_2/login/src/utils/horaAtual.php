<?php
function horaAtual() {
    $dateTime = new DateTimeImmutable();
    echo $dateTime->format('H:i:s') . '<br>';
}

?>