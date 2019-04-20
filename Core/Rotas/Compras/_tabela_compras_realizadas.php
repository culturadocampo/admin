<?php
    $o_compras = new Compras();
    $id_filiado = SESSION::get_id_filiado();
    $compras   = $o_compras->select_todas_compras_filiado($id_filiado);
    
    /* 
    COMPRA
        Status
        1 - Compra feita e confirmada
        2 - Compra confirmada mas precisa buscar os produtos
     *  0 - Compra cancelada (Estornada)
    */
?> 
<table class="table table-bordered table-hover table-bordered" id="table_compras_realizadas">
    <thead>
        <tr>
            <th class="text-center"> ID </th>
            <th class="text-center"> Detalhe </th>
            <th class="text-center"> Status </th>
            <th class="text-center"> Produtor </th>
            <th class="text-center"> Valor Total </th>
            <th class="text-center"> NF </th>
            <th class="text-center"> Ações </th>
        </tr>
    </thead>
    <tbody>
            <?php foreach($compras as $compra){ 
                $o_agricultor = new Agricultor();
                $nome_agricultor = $o_agricultor->select_agricultor_filial($compra['fk_produtor']);

            ?>
                <tr class="tr_compras_realizadas">
                    <td class="text-center">  
                        <?php echo $compra['id_compra']; ?>
                        <input type="hidden" name="id_compra_hidden" id="id_compra_hidden" value="<?php echo $compra['id_compra']; ?>" >
                    </td>
                    <td class="text-center">  
                        <button type="button" id_compra="<?php echo $compra['id_compra']; ?>" class="btn btn-primary btn-sm detalhe"> <span class="flaticon-medical btn-sm"> </span></button>
                    </td>
                    <td class="text-center">  
                        <?php 
                            if($compra['status'] == 1){
                               echo "Confirmada";
                            }else if($compra['status'] == 2){
                                echo "Aguardando chegada";
                            }else{
                                echo "Compra cancelada";
                            }
                        ?>
                    </td>
                    
                    <td class="text-center">  
                        <?php echo $nome_agricultor['nome']; ?>
                    </td>
                    
                    <td class="text-center">  
                        <?php echo "R$ " . MOEDA::moeda_mysql_para_br($compra['valor_total']); ?>
                    </td>
                    
                    <td class="text-center">  
                        <?php if(!$compra['nf']){ ?>
                            <button type="button" id="adicionar_produto" class="btn btn-primary btn-sm"> Gerar  </button>
                        <?php }else{ ?>
                            <button type="button" id="adicionar_produto" class="btn btn-primary btn-sm"> <span class="flaticon-technology btn-sm"> </span></button>
                            <button type="button" id="adicionar_produto" class="btn btn-danger btn-sm"> <span class="flaticon2-delete btn-sm"> </span></button>
                        <?php } ?>
                    </td>
                    
                    <td class="text-center">  
                        <?php if($compra['status'] == 2){ ?> 
                            <button type="button" id="efetivar_compra" class="btn btn-primary btn-sm" id_compra="<?php echo $compra['id_compra']; ?>"> Efetivar </button>
                        <?php } ?>
                        <?php if($compra['status'] != 0){ ?> 
                            <button type="button" class="btn btn-danger btn-sm"> Estornar </button>
                            <button type="button" class="btn btn-success btn-sm" id="imprimir_recibo"> Recibo </button>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<script>
     function efetivar_compra(){
        $("#efetivar_compra").off("click");
        $("#efetivar_compra").on("click", function () {
            var id_compra = $("#efetivar_compra").attr('id_compra');
            
            if(confirm("Deseja efetivar esta compra ?")) {
                $.ajax({
                    type: "post",
                    url: "efetivar/compra",
                    data: {id_compra: id_compra},
                    success: function (response) {
                       lerResposta(response, listar_compras);
                    }
                });
            }
        });
    }
    
    function abrir_compra_detalhada(){
        $(".detalhe").on("click", function () {
            var id_compra = $(this).attr('id_compra');
      
            window.open (
                'detalhe/compra/'+id_compra,
                'detalhe',
                "width=1024, height=624, top=250, left=250, scrollbars=ye,"
            );
        });
    }
    
    function imprimir_recibo(){
        $("#imprimir_recibo").on("click", function () {
            let id_compra = $("#id_compra_hidden").val();
            window.location.href="recibo/"+id_compra;
        });
    }
    
    $(document).ready(function () { 
        efetivar_compra();
        abrir_compra_detalhada();
        imprimir_recibo();
    });
</script>