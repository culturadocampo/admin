<div class="m-subheader ">
    <div class="m-portlet m-portlet--last m-portlet--head-lg m-portlet--responsive-mobile" id="main_portlet">
        <div class="m-portlet__head portlet_round">
            <div class="m-portlet__head-wrapper" >
                <div class="m-portlet__head-caption">

                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            <!--<span class="flaticon-add m--margin-right-20"></span>--> 
                            <span class="text-dark" style="font-weight: lighter;">Nova rota</span>
                        </h3>

                    </div>
                </div>
                <div class="m-portlet__head-tools">

                    <div class="btn-group">
                        <div class="m-portlet__head-tools">


                            <div class="btn-group">
                                <button id="cadastrar_rota" type="button" class="btn btn-info m-btn m-btn--icon m-btn--wide m-btn--md">
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
        <div id="form_adicionar_rota" class="m-portlet__body" >
            <!--begin: Form Body -->

        </div>
    </div>
</div>




<script>

    $(document).ready(function () {
        load_form();
        blockPage();
    });

    function load_form() {
        $("#form_adicionar_rota").load("sistema/rotas/form/adicionar", {}, function () {
//            mApp.unblock("#form_adicionar_rota");
            unblockPage();

        });
    }

</script>