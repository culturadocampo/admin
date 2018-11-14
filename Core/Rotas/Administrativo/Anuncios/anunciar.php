<?php
    $retorno = Produtor::verifica_cadastro_produtor();
    
    if( !$retorno ){
        header('Location: cadastrar-produtor'); 
    }

    die("Você já é Produtor pode anunciar !!!");