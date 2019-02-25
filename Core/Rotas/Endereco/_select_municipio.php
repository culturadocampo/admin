<?php
$o_municipio = new Municipio();
$municipios = array();
if (isset($_POST['uf'])) {
    $municipios = $o_municipio->select_todos_municipios_uf($_POST['uf']);
}
?>


<label for="município">Município</label>
<?php if ($municipios) { ?>
    <select name="codigo_municipio" class="form-control m-input selectpicker" data-live-search="true">
        <?php foreach ($municipios as $value) { ?>
            <option value="<?php echo $value['codigo']; ?>"><?php echo $value['nome']; ?></option>
        <?php } ?>
    <?php } else { ?>
        <input disabled="" class="form-control m-input" placeholder="Favor escolher o município de atuação">
    </select>
<?php } ?>
<span class="m-form__help">Escolha o município de atuação</span>
<script>
    $(document).ready(function () {
        $(".selectpicker").selectpicker();
    });
</script>
