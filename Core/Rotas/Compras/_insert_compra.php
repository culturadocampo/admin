<?php
    $o_compra       = new Compras();
    $o_pedido       = new Pedidos();
    $o_pagamento    = new PagamentoAgricultor();
    $o_estoque      = new Estoque();
    $o_produto      = new Produto();
    
    try {
        $db = DB::get_instance();
        $db->beginTransaction();
        
        if(!isset($_POST['fk_produtor']) || empty($_POST['fk_produtor'])){
            APP::return_response(false, "Por favor, selecione um agricultor");
        }

        if(!isset($_POST['buscar_prod']) || empty($_POST['buscar_prod'])){
            APP::return_response(false, "Por favor, selecione buscar produto 'Sim' ou 'Não'");
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
        1 - Compra feita e confirmada
        2 - Compra confirmada mas precisa buscar os produtos
        3 - Compra cancelada (Estornada)
        */
        $o_compra->set_valor_total($_POST['valor_total']);
        $o_compra->set_status_compra($_POST['buscar_prod']);
        $id_compra = $o_compra->insert_nova_compra($_POST['fk_produtor']);
        
        
        /*
        PEDIDOS
            0 - Pedido cancelado (Eornado)
            1 - Pedido ativo
        */
        foreach($dados as $value){
            $value['valor'] = MOEDA::moeda_br_para_mysql($value['valor']);
            $o_pedido->set_fk_compra($id_compra);
            $o_pedido->set_fk_categoria($value['categoria']);
            $o_pedido->set_fk_produto($value['produto']);
            $o_pedido->set_produto_medida($value['medida']);
            $o_pedido->set_qtd($value['qtd']);
            $o_pedido->set_valor($value['valor']);
            $o_pedido->insert_novo_pedido($id_compra);
            
            
            // Verifico se o produto existe no estoque antes de colocar para não duplicar e se é do mesmo tipo de unidade KG ou unidade
            $fk_filiado = SESSION::get_id_filiado();
            $prod_estoque = $o_estoque->verifica_existe_prod_estoque($value['produto'], $fk_filiado);
            
            if($prod_estoque){
                if($prod_estoque['fk_medida'] == $value['medida']){
                    // Verifico se existe o prod. no estoque e realizo a soma da qtd
                    $qtd_atualizado = $prod_estoque['quantidade'] + $value['qtd'];
                    $o_estoque->update_compra_estoque($prod_estoque['id_estoque_filiado'], $qtd_atualizado);
                }else{
                    $nome_prod = $o_produto->select_produto($value['produto']);
                    $medida_prod = MEDIDAS_PRODUTOS::getMedidasProd($prod_estoque['fk_medida']);
                    APP::return_response(false, "O produto {$nome_prod['nome']} deve ser do tipo $medida_prod pois o produto já existe no estoque");
                }
            }else{
                $o_estoque->insert_compra_estoque($fk_filiado, $value['produto'], $value['medida'], $value['qtd'], $value['valor']);
            }
        }
        
        /* 
        PAGAMENTOS AGRICULTORES
        */
        $o_pagamento->set_data_pagamento($_POST['data_pagamento']);
        $o_pagamento->set_obs_pagamento($_POST['obs']);
        $o_pagamento->insert_pagamento_agricultor($id_compra, $_POST['valor_total']);
        
        $db->commit();
        APP::return_response(true, "Compra realizada com sucesso");
    } catch (Exception $exc) {
        $db->rollback();
        //gravar o erro no banco com o handling
    }
    
?>