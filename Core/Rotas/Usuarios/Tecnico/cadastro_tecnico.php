<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    Cadastro de técnico
                </h3>
            </div>
        </div>
    </div>
    <div id="cadastro_tecnico" class="m-portlet__body">	

    </div>
    <br>    
    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
        <div class="m-form__actions m-form__actions--solid">
            <div class="row">
                <div class="m--align-right col-md-12" style="position: initial;">
                    <button id="cadastrar" type="button" class="btn btn-success">Salvar usuário</button>
                    <button type="reset" class="btn btn-secondary">Limpar</button>
                </div>
            </div>
        </div>
    </div>
</div>



<script>

    $(document).ready(function () {
        blockPage();
        load_form();
        $("#cadastro_tecnico").on("change", "#uf", function () {
            var uf = $(this).val();
            blockPage();
            $("#select_municipios").load("select-municipios", {uf: uf}, function () {
                unblockPage();
            });
        });
        $("#cadastrar").on("click", function () {
            executar_cadastro();
        });
    });
    function load_form() {
        $("#cadastro_tecnico").load("usuario/form/tecnico", {}, function () {
            unblockPage();
        });
    }

    function executar_cadastro() {
        hideNotify();
        blockPage();
        var formData = $("#form_tecnico").serialize();
        $.ajax({
            type: "post",
            url: "usuario/insert_tecnico",
            data: formData,
            success: function (json) {
                if (is_json(json)) {
                    var response = JSON.parse(json);
                    if (response.result) {
                        load_form();
                        notify(response.message, 'alert-success');
                    } else {
                        unblockPage();
                        notify(response.message, 'alert-danger');
                    }
                } else {
                    unblockPage();
                    notify("Resposta inesperada do servidor", 'alert-danger');
                }

            },
            error: function (error) {
                notify("Erro: Entre em contato com o suporte", 'alert-danger');
            }
        });
    }
</script>