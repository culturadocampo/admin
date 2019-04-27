<?php
require 'Library/Nfephp/vendor/autoload.php';

$id_compra = $_GET['id_compra'];

$o_compra     = new Compras();
$o_endereco   = new Endereco();
$o_filiado    = new Filiado();
$o_agricultor = new Agricultor();

/**
 * Dados da compra
 */
$compra     = $o_compra->select_compra_especificada($id_compra);
/**
 * Dados da cooperativa (filiado que comprou)
 */
$filiado    = $o_filiado->select_informacoes_filiado_especificado($compra['fk_filiado']);
/**
 * Endereço do filiado
 */
$end_filiado = $o_endereco->select_endereco($filiado['fk_endereco']);
/**
 * Dados do agricultor (quem vendeu)
 */
$agricultor = $o_filiado->select_informacoes_filiado_especificado($compra['fk_produtor']);


print_r($compra);




$nfe = new NFePHP\NFe\Make();

$std           = new stdClass();
$std->cUF      = 41;
$std->cNF      = '80070008';
$std->natOp    = 'VENDA';
$std->indPag   = 0;
$std->mod      = 55;
$std->serie    = 1;
$std->nNF      = 2;
$std->dhEmi    = '2018-02-06T20:48:00-02:00';
$std->dhSaiEnt = '2018-02-06T20:48:00-02:00';
$std->tpNF     = 0;
$std->idDest   = 1;
$std->cMunFG   = 3518800;
$std->tpImp    = 1;
$std->tpEmis   = 1;
$std->cDV      = 2;
$std->tpAmb    = 2; // Se deixar o tpAmb como 2 você emitirá a nota em ambiente de homologação(teste) e as notas fiscais aqui não tem valor fiscal
$std->finNFe   = 1;
$std->indFinal = 0;
$std->indPres  = 0;
$std->procEmi  = '3.10.31';
$std->verProc  = 1;
$nfe->tagide($std);
