<?php
$o_endereco = new Endereco();

$id_municipio = $o_endereco->get_id_from_nome_municipio($_POST['municipio']);
/**
 * Arquivo usado somente na geolocalização automática
 */
?>
<div class="col-md-12">

    <div class="form-group m-form__group row">
        <div class="col-md-6">
            <label>Estado localizado</label>
            <input disabled type="text" class="form-control m-input" value="<?php echo $_POST['estado_long']; ?>">
        </div>
        <div class="col-md-6">
            <label>Município localizado</label>
            <input disabled type="text" class="form-control m-input" value="<?php echo $_POST['municipio']; ?>">
        </div>
    </div>
</div>
<input style="display: none" readonly="" type="text" class="form-control" name="estado" value="<?php echo $_POST['estado_short']; ?>">
<input style="display: none" readonly="" type="text" class="form-control" name="id_municipio" value="<?php echo $id_municipio; ?>">
