<?php

$o_rota = new Rota();

$o_rota->set_id_rota($_POST['id_rota']);
$o_rota->alterar_status_rota();
