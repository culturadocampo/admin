<?php
echo "<pre>";
print_r($_POST);
    try {
        $db = DB::get_instance();
        $db->beginTransaction();
        
        $o_compra = new Compras();
        $o_compra->efetivar_compra($id_compra);
        
        $db->commit();
        APP::return_response(true, "Vinculo realizado com sucesso");
    } catch (Exception $exc) {
        $db->rollback();
        //gravar o erro no banco com o handling
    }