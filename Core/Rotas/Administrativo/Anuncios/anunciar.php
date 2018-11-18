
<?php
    $retorno = Produtor::verifica_cadastro_produtor();
    
    if( !$retorno ){
        header('Location: cadastrar-produtor'); 
    }

?>

<div class="m-grid__item m-grid__item--fluid m-wrapper">
   
</div>