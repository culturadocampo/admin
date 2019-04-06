<?php
    $o_categorias = new CategoriaProdutos();
    $categorias = $o_categorias->select_todas_categorias();
?>

<div class="col-md-12">
    <div class="form-group m-form__group row">
        <div class="col-lg-4">
            <select data-live-search="true" data-style="btn-outline-info" id="categoria" name="categoria" class="form-control selectpicker">
                    <option selected="" disabled=""> Categoria </option>
                    <?php foreach($categorias as $categoria){ ?>
                    <option value="<?php echo $categoria['id_categoria']; ?>"> <?php echo $categoria['nome']; ?> </option>
                    <?php } ?>
            </select>
        </div>
        <div class="col-md-4" id="produtos">
            
        </div>
        <div class="col-md-4">
            <input name="valor" id="valor" type="text" class="form-control m-input text-center valor_pro" placeholder="Valor">
        </div>
    </div>
</div>


<script>
   function buscar_produtos(){
        $("#produtos").load("load/select/produtos", {}, function () {
            unblockPage();
        });
        
        $("#categoria").off("change");
        $("#categoria").on("change", function () {
            let categoria = $("#categoria").val();
            
            $("#produtos").load("load/select/produtos", {categoria: categoria}, function () {
                unblockPage();
            });
        });
    }
    
    $(document).ready(function () {  
         $(".selectpicker").selectpicker();
         buscar_produtos();
         $('.valor_pro').maskMoney({decimal: ',', thousands: '.'});
    });
</script>