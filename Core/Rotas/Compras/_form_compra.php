<?php
    $trabalhadorRural = new TrabalhadorRural();
    $produtores = $trabalhadorRural->select_todos_trabalhadores_rurais($_SESSION['id_filiado']);
    
    $categoriasProd = new CategoriaProdutos();
    $categorias = $categoriasProd->select_todas_categorias();
?>
                       
<div class="col-md-12">
    <div class="form-group m-form__group row">
        <div class="col-lg-6">
            <select data-live-search="true" data-style="btn-outline-info" name="id_agricultor" class="form-control selectpicker">
                <?php if ($produtores) { ?>
                    <option selected="" disabled=""> Agricultores </option>
                    <?php foreach ($produtores as $value) { ?>
                        <option  value="<?php echo $value['fk_usuario']; ?>"> <?php echo $value['nome'] . ' ' . $value['cpf']; ?> </option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>     
    </div>	 
</div>

<div class="m-portlet__head">
    <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
            <span class="m-portlet__head-icon m--hide">
                <i class="la la-gear"></i>
            </span>
            <h3 class="m-portlet__head-text">
                Produtos
            </h3>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group m-form__group row">
        <div class="col-md-2">
            <select name="categoria" id="categoria" class="form-control m-input selectpicker text-center">
                <?php if ($categorias) { ?>
                    <option selected="" name="categoria" disabled=""> Categorias </option>
                    <?php foreach ($categorias as $value) { ?>
                        <option value="<?php echo $value['id_categoria']; ?>"> <?php echo $value['nome']; ?> </option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-2" id="produtos">
            
        </div>
        
        <div class="col-md-2">
            <input name="qtd" id="qtd" type="text" class="form-control m-input text-center" placeholder="Quantidade">
        </div>
        
        <div class="col-md-2">
            <select name="medida" id="medida" class="form-control m-input selectpicker text-center">
                <option selected="true" disabled="true" value="">Medida </option>
                <option value="1"> Unidade </option>
                <option value="2"> KG </option>
            </select>
        </div>
        
        <div class="col-md-2">
            <input name="valor" id="valor" type="text" class="form-control m-input text-center valor_pro" placeholder="Valor">
        </div>
        
        <button type="button" id="adicionar_prod" class="btn btn-primary"> <i class="la la-plus"></i> Adicionar </button>
    </div>
    <div id="compra_tabela">


    </div>
</div>


<script>
    function load_tabela() {
        $("#compra_tabela").load("compra/tabela", {}, function () {
            unblockPage();
        });
        
        $("#adicionar_prod").off("click");
        $("#adicionar_prod").on("click", function () {
            
            let categoria = $("#categoria").val();
            let produto = $("#produto").val();
            let qtd = $("#qtd").val();
            let medida = $("#medida").val();
            let valor = $("#valor").val();
            
            array_produtos.push({categoria: categoria, produto: produto, qtd: qtd, medida: medida, valor: valor});
            
            $("#compra_tabela").load("compra/tabela", {array_produtos: array_produtos}, function () {
                unblockPage();
            });
        });
    }
    
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
        array_produtos = [];
        load_tabela();
        buscar_produtos();
        
        $(".selectpicker").selectpicker();
        $('.cpf').mask("000.000.000-00");
        $('.valor_pro').maskMoney({decimal: '.', thousands: ''});
    });
</script>
