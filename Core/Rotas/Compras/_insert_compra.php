<?php
        $o_compra = new Compras();
        $o_pedido = new Pedidos();
        
    try {
        $db = DB::get_instance();
        $db->beginTransaction();
        
        if(!isset($_POST['fk_produtor']) || empty($_POST['fk_produtor'])){
            APP::return_response(false, "Por favor, selecione um agricultor");
        }

        if(!isset($_POST['status_compra']) || empty($_POST['status_compra'])){
            APP::return_response(false, "Por favor, selecione buscar o produto 'Sim' ou 'Não'");
        }

        if(!isset($_POST['dados']) || empty($_POST['dados'])){
           APP::return_response(false, "Por favor, adicione algum produto a sua compra");
        }else{
            $dados = $_POST['dados'];
        }

        if(!isset($_POST['valor_total']) || empty($_POST['valor_total'])){
            APP::return_response(false, "Ocorreu algum problema na compra, tente novamente");
        }
    
        
        /* 
        COMPRA
            Status
            0 - Compra feita (Aguardando confirmação de entrada em estoque)
            1 - Compra confirmada mas precisa buscar os produtos
            2 - Compra confirmada e transferida para o estoque 
         *  3 - Compra cancelada (Estornada)
        */
        $o_compra->set_valor_total($_POST['valor_total']);
        $o_compra->set_status_compra($_POST['status_compra']);
        $id_compra = $o_compra->insert_nova_compra($_POST['fk_produtor']);
        
        
        /*
        PEDIDOS
            0 - Pedido cancelado (Eornado)
            1 - Pedido ativo
        */
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