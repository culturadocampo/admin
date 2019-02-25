<?php
$o_estado = new Estado();

$estados = $o_estado->select_todos_estados();
?>

<label for="estado">Estado</label>
<select id="uf" name="estado" class="form-control m-input selectpicker" data-live-search="true">
    <?php if ($estados) { ?>

        <?php foreach ($estados as $value) { ?>
            <option value="<?php echo $value['uf']; ?>"><?php echo $value['nome']; ?></option>
        <?php } ?>

    <?php } ?>
</select>
<span class="m-form__help">Escolha o estado de atuação</span>

<script>
    $(document).ready(function () {
        $(".selectpicker").selectpicker();

     
    });
</script>