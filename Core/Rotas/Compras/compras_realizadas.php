
<div class="col-md-12">
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
                        <i class="la la-gear"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Compras Realizadas
                    </h3>
                </div>
            </div>
        </div>
        <div id="tabela_compras">
            
        </div>
        
    </div>
</div>

<script>    
   function listar_compras(){  
        $("#tabela_compras").load("listar/compras", {}, function () {
            unblockPage();
        });
   }
    
    $(document).ready(function () { 
        listar_compras();
    });
</script>