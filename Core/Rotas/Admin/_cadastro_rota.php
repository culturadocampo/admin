<?php

$o_rota = new Rota();

$o_rota->set_conteudo($_POST['conteudo']);
$o_rota->set_matriz($_POST['matriz']);
$o_rota->set_url($_POST['url']);
$o_rota->set_publico($_POST['publico']);

$o_rota->insert_rota();

$params = $_POST['params'];
$expressoes = "";
$query_string = "";
$query_index = 1;
foreach ($params as $param) {
    if ($param['tipo'] == "1") {
        $query_string = empty($query_string) ? "?" : "{$query_string}&";
        $expressoes .= "/{$param['expressao']}";
        $query_string .= $param['nome'] . '=$' . ($query_index);
        $query_index++;
    } else {
        $expressoes .= "/{$param['palavra']}";
    }
}

$data = "rewriteRule ^{$o_rota->get_url()}{$expressoes}/?$ ./index.php{$query_string} [NC]" . PHP_EOL;
$fp = fopen('.htaccess', 'a');
fwrite($fp, $data);
