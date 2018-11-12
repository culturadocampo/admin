<?php

$o_rota = new Rota();



$o_rota->setId($_POST['id_rota']);
$o_rota->alterar_status_rota();
