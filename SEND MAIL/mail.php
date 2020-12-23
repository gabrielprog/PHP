<?php

$mail = $_POST['mail'];

$remetente = $_POST['remetente'];

$assunto = $_POST['assunto'];

$conteudo = "Conteudo de exemplo";


$headers = "Content-type: text/html; charset=iso-8859-1\r\n";

$headers .= "From: $remetente";

@mail($mail, $assunto, $conteudo, $headers);