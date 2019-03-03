<?php
$o_municipio = new Municipio();
$municipios = array();
if (isset($_POST['uf'])) {
    $municipios = $o_municipio->select_todos_municipios_uf($_POST['uf']);
}
?>


<label for="município">Município</label>
<?php if ($municipios) { ?>
    <select id="municipio" name="codigo_municipio" class="form-control m-input selectpicker" data-live-search="true">
        <option selected value="">Escolha um município</option>

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
        $("#municipio").on("change", function () {
//            blockPage();
            var codigo = $(this).val();
            if (typeof geocoding === "function") {
                var siglaEstado = $("#uf").val();
                var municipio = $("#municipio option[value='" + codigo + "']").text();
                geocoding("Brasil, " + siglaEstado + ", " + municipio, 12);
            }
        });
    });
</script>
