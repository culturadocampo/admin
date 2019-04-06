<?php
   if(isset($_GET['id']) && !empty($_GET['id'])){
       $id_compra = $_GET['id'];
       
       $o_compra = new Compras();
       $compra   = $o_compra->select_compra_especificada($id_compra);
       
        if(!$compra){ ?>
           <div class="alert alert-danger" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">Número de tratamento não encontrato !</div>
        </div>
       <?php }
   }else{ ?>
        <div class="alert alert-danger" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">Número de tratamento não encontrato !</div>
        </div>
<?php  } ?>
   
<div class="col-md-12">
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
                        <i class="la la-gear"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Detallhe da compra <?php echo $id_compra; ?>
                    </h3>
                </div>
            </div>
        </div>
        <div id="tabela_detalhe_compra">
            
        </div>
        
    </div>
</div>

<script>    
   function listar_compras(){  
        $("#tabela_detalhe_compra").load("tabela/detalhe/compra", {}, function () {
            unblockPage();
        });
   }
    
    $(document).ready(function () { 
        listar_compras();
    });
</script>