<div class="m-subheader ">
    <div class="m-portlet m-portlet--last m-portlet--head-lg m-portlet--responsive-mobile" id="main_portlet">
        <div class="m-portlet__head portlet_round">
            <div class="m-portlet__head-wrapper" >
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            <span class="text-dark" style="font-weight: lighter;">Novo técnico</span>
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
        <div id="cadastro_tecnico" class="m-portlet__body" >

        </div>
    </div>
</div>


<script>

    $(document).ready(function () {
        blockPage();
        load_form();
    });

    function load_form() {
        $("#cadastro_tecnico").load("usuario/form/tecnico", {}, function () {
            unblockPage();
        });
    }
</script>