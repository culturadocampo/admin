<!--tipo, nome, cpf, email, usuario, senha-->
<div class="m-subheader ">
    <div class="m-portlet m-portlet--last m-portlet--head-lg m-portlet--responsive-mobile" id="main_portlet">
        <div class="m-portlet__head portlet_round">
            <div class="m-portlet__head-wrapper" >
                <div class="m-portlet__head-caption">

                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            <!--<span class="fa fa-user-secret m--margin-right-20 text-primary"></span>--> 
                            <span class="text-dark" style="font-weight: lighter;">Cadastro de administrador</span>
                        </h3>

                    </div>
                </div>
                <div class="m-portlet__head-tools">

                    <div class="btn-group">
                        <div class="m-portlet__head-tools">


                            <div class="btn-group">
                                <button id="cadastrar_rota" type="button" class="btn btn-primary m-btn m-btn--icon m-btn--wide m-btn--md">
                                    <span>
                                        <i class="fa fa-check"></i>
                                        <span>Confirmar</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="form_cadastro_usuario" class="m-portlet__body" >



        </div>
    </div>
</div>


<script>

    $(document).ready(function () {
        blockPage();
        load_form();
    });

    function load_form() {
//        $("#form_adicionar_rota").load("form-adicionar-rota", {}, function () {
////            mApp.unblock("#form_adicionar_rota");
        unblockPage();
//
//        });
    }

</script>