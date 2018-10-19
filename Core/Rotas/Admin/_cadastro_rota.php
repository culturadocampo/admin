<?php

$o_rota = new Rota();

$o_rota->set_conteudo($_POST['conteudo']);
$o_rota->set_matriz($_POST['matriz']);
$o_rota->set_url($_POST['url']);
$o_rota->set_publico($_POST['publico']);

$o_rota->insert_rota();

$data = "rewriteRule ^{$o_rota->get_url()}/?$ ./index.php [NC]" . PHP_EOL;
$fp = fopen('.htaccess', 'a');
fwrite($fp, $data);
