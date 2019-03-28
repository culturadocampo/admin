<?php
    $o_compra = new Compras();
    $o_pedido = new Pedidos();
    
    $dados = $_POST['dados'];
    
    if(!isset($_POST['fk_produtor'])){
        $_POST['fk_produtor'] = false;
    }
    
    if(!isset($_POST['valor_total'])){
        $_POST['valor_total'] = false;
    }
    
    
    try {
        $db = DB::get_instance();
        $db->beginTransaction();
        
        //Compra
        $o_compra->set_fk_operador();
        $o_compra->set_fk_produtor($_POST['fk_produtor']);
        $o_compra->set_valor_total($_POST['valor_total']);
        $id_compra = $o_compra->insert_nova_compra();
        
        
        //Pedido
        foreach($dados as $value){
            $o_pedido->set_fk_compra($id_compra);
            $o_pedido->set_fk_categoria($value['categoria']);
            $o_pedido->set_fk_produto($value['produto']);
            $o_pedido->set_produto_medida($value['medida']);
            $o_pedido->set_qtd($value['qtd']);
            $o_pedido->set_valor($value['valor']);
            $o_pedido->insert_novo_pedido();
        }
        
        $db->commit();
        APP::return_response(true, "Compra realizada com sucesso");
    } catch (Exception $exc) {
        $db->rollback();
        //gravar o erro no banco com o handling
    }
    
?>