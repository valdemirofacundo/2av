<?php

if (isset($_POST['submit'])) {
    
    $nome = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
    $assunto = htmlspecialchars($assunto, ENT_QUOTES, 'UTF-8');
    $mensagem = htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8');

    if (empty($nome) || empty($assunto) || empty($mensagem)) {
        die("Solicitação incompleta.");
    } else {

    }
}

//$mensagem = html_entity_decode($mensagem, ENT_QUOTES, 'UTF-8');
