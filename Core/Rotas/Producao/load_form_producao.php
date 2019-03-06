<?php
$o_produto = new Produto();

$produtos = $o_produto->select_produtos();
$unidades = $o_produto->select_unidades_medida();
?>
<div class="col-md-12">
    <div class="form-group m-form__group row">
        <div class="col-md-12">
            <label for="id_produto">Nome completo</label>
            <select name='id_produto' data-live-search="true" class="form-control selectpicker">
                <option selected>[Selecione um produto]</option>
                <?php if ($produtos) { ?>
                    <?php foreach ($produtos as $value) { ?>
                        <option value='<?php echo $value['id_produto']; ?>'><?php echo $value['nome']; ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
            <span class="m-form__help">Selecione o produto</span>
        </div>
    </div>	 
    <div class="form-group m-form__group row">

        <div class="col-md-8">
            <label for="quantidade">Quantidade</label>
            <div class="m-input-icon m-input-icon--right">
                <input name="quantidade" type="text" class="form-control m-input" placeholder="Quantidade do produto escolhido">
                <!--<span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-bookmark-o"></i></span></span>-->
            </div>
            <span class="m-form__help text-info">Relacionado à medida ao lado</span>
        </div>
        <div class="col-md-4">
            <label for="usuario">Usuário de acesso</label>
            <div class="m-input-icon m-input-icon--right">
                <select name='id_unidade' data-live-search="true" class="form-control selectpicker">
                    <option selected>[Selecione a unidade]</option>
                    <?php if ($produtos) { ?>
                        <?php foreach ($unidades as $value) { ?>
                            <option value='<?php echo $value['id_unidade']; ?>'><?php echo $value['descricao']; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <!--<span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-user"></i></span></span>-->
            </div>
            <span class="m-form__help">Somente letras e números. Sem espaço.</span>
        </div>
    </div>
    <div class="form-group m-form__group row">

        <div class="col-md-6">
            <label for="periodo_inicial">Disponibilidade inicial</label>
            <div class="m-input-icon m-input-icon--right">
                <input name="periodo_inicial" type="text" class="form-control m-input data_mes_ano" placeholder="00/0000">
                <!--<span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-bookmark-o"></i></span></span>-->
            </div>
            <span class="m-form__help text-info">A partir de quando ficará disponível</span>
        </div>
        <div class="col-md-6">
            <label for="periodo_final">Disponibilidade final</label>
            <div class="m-input-icon m-input-icon--right">
                <input name="periodo_final" type="text" class="form-control m-input data_mes_ano" placeholder="00/0000">
                <!--<span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-bookmark-o"></i></span></span>-->
            </div>
            <span class="m-form__help text-info">Quando este produto não estará mais disponível</span>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('.selectpicker').selectpicker();
        $('.data_mes_ano').mask("00/0000");
    });
</script>
