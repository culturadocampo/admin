
<div class="col-md-12">
    <div class="form-group m-form__group row">
        <div class="col-md-6">
            <label for="rg">Agricultor</label>

            <?php
            $o_agricultor = new Agricultor();
            $a_agricultor = $o_agricultor->select_agricultores_ativos();
            ?>
            <select data-live-search="true" data-style="btn-outline-info" name="id_filiado" class="form-control selectpicker">
                <option value="">[Escolha um agricultor]</option>

                <?php if ($a_agricultor) { ?>
                    <?php foreach ($a_agricultor as $value) { ?>
                        <option  value="<?php echo $value['id_agricultor']; ?>"><?php echo $value['nome']; ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>
        <?php if (SESSION::get_id_tipo_usuario() <> 3) { ?>

            <div class="col-md-6">
                <label for="rg">Filiado</label>

                <?php
                $o_filiado = new Filiado();
                $a_filiado = $o_filiado->select_todos_filiados_ativos();
                ?>
                <select data-live-search="true" data-style="btn-outline-info" name="id_filiado" class="form-control selectpicker">
                    <option value="">[Escolha um grupo/associação]</option>

                    <?php if ($a_filiado) { ?>
                        <?php foreach ($a_filiado as $value) { ?>
                            <option  value="<?php echo $value['id_filiado']; ?>"><?php echo $value['nome_fantasia']; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
        <?php } ?>

    </div>
</div>

<div class="col-md-12">
    <div class="form-group m-form__group row">
        <div class="col-md-12">
            <label for="cargo">Cargo</label>
            <input name="cargo" type="text" class="form-control m-input" placeholder="Título do cargo">
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-md-6">
            <label for="data_inicio">Data de início do cargo</label>
            <input  name="data_inicio" type="text" class="form-control m-input data" placeholder="dd/mm/yyyy">
        </div>
        <div class="col-md-6">
            <label for="data_fim">Data de término do cargo</label>
            <input name="data_fim" type="text" class="form-control m-input data" placeholder="dd/mm/yyyy">
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-md-12">
            <label for="usuario">Observações/Advertências</label>
            <textarea class="form-control" placeholder="" style="resize: none" rows="10"></textarea>
            <span class="m-form__help">Informações relevantes relacionadas ao exercício do cargo</span>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".data").mask("99/99/9999");
        $(".selectpicker").selectpicker();
    });
</script>