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
    });
</script>