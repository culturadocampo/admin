
<?php
    $retorno = Produtor::verifica_cadastro_produtor();
    
    if( !$retorno ){
        header('Location: cadastrar-produtor'); 
    }

?>

<div class="">
   
</div>