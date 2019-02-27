
<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
    <?php include 'Core/Rotas/Usuarios/include_form_usuario.php'; ?>
    <div class="form-group m-form__group row">
        <div class="col-lg-6">
            <?php include 'Core/Rotas/Endereco/_select_estado.php'; ?>
        </div>
        <div id="select_municipios" class="col-lg-6">

            <?php include 'Core/Rotas/Endereco/_select_municipio.php'; ?>

        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-6">
            <label for="rg">RG</label>
            <input pattern="\d+" name="rg" type="text" class="form-control m-input" placeholder="RG do usuário">
            <span class="m-form__help">Somente números</span>
        </div>
        <div class="col-lg-6">

            <label for="formacao">Formação</label>
            <input name="formacao" type="text" class="form-control m-input" placeholder="Formação do técnico">
            <span class="m-form__help">Informe a formação do técnico</span>

        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-6">
            <label for="area_atuacao">Área de atuação</label>
            <input name="area_atuacao" type="text" class="form-control m-input" placeholder="Qual a área de atuação do técnico?">
            <span class="m-form__help">Área de atuação do técnico</span>
        </div>
        <div class="col-lg-6">
            <label for="entidade">Entidade</label>
            <input name="entidade" type="text" class="form-control m-input" placeholder="Entidade a qual ele pertence">
            <span class="m-form__help">Informe a entidade a qual ele pertence</span>
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-6">
            <label for="telefone">Telefone fixo (Opcional)</label>
            <input name="telefone" type="text" class="form-control m-input" placeholder="(99) 9999 9999">
            <span class="m-form__help">DDD + Número do telefone</span>
        </div>
        <div class="col-lg-6">
            <label for="celular">Celular/WhatsApp</label>
            <input name="celular" type="text" class="form-control m-input" placeholder="(99) 99999 9999">
            <span class="m-form__help">Informe o número do celular</span>
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-12">
            <label for="observacao">Observações: (Opcional)</label>
            <textarea style="resize: none;" name="observacao" type="text" class="form-control m-input" placeholder="Qualquer observação, opcional." rows="5"></textarea>
            <span class="m-form__help">Qualquer comentário necessário para este técnico</span>
        </div>
    </div>
</form>


