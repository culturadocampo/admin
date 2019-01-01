<div class="m-subheader ">
    <div class="m-portlet m-portlet--last m-portlet--head-lg m-portlet--responsive-mobile" id="main_portlet">
        <div class="m-portlet__head portlet_round">
            <div class="m-portlet__head-wrapper" >
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            <span class="text-dark" style="font-weight: lighter;">Novo coordenador</span>
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <div class="btn-group">
                        <div class="m-portlet__head-tools">
                            <div class="btn-group">
                                <button id="cadastrar" type="button" class="btn btn-info m-btn m-btn--icon m-btn--wide m-btn--md">
                                    <span>
                                        <span class="">Confirmar</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="cadastro_coordenador" class="m-portlet__body" >

        </div>
    </div>
</div>


<script>

    $(document).ready(function () {
        blockPage();
        load_form();
    });

    function load_form() {
        $("#cadastro_coordenador").load("usuario/form/coordenador", {}, function () {
            mApp.unblock("#cadastro_coordenador");
            unblockPage();
        });
    }

    $("#cadastrar").on("click", function () {
        executar_cadastro();
    });

    function executar_cadastro() {
        hideNotify();
        blockPage();
        var formData = $("#form_coordenador").serialize();
        $.ajax({
            type: "post",
            url: "usuario/insert_coordenador",
            data: formData,
            success: function (json) {
                var response = JSON.parse(json);
                if (response.result) {
                    load_form();
                    notify(response.message, 'alert-success');
                } else {
                    unblockPage();
                    notify(response.message, 'alert-danger');
                }
            },
            error: function (error) {
                notify("Erro: Entre em contato com o suporte", 'alert-danger');
            }
        });
    }

</script>