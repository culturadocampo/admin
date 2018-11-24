
<style>
    .m-wrapper{
        padding: 8px!important;
    }
    .m-portlet{
        /*box-shadow: none!important;*/
    }
</style>



<div class="m-grid__item m-grid__item--fluid m-wrapper" > 
    <div class="m-subheader ">
        <div class="m-portlet m-portlet--last m-portlet--head-lg m-portlet--responsive-mobile" id="main_portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-progress">
                    <!-- here can place a progress bar-->
                </div>
                <div class="m-portlet__head-wrapper">
                    <div class="m-portlet__head-caption">

                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <span class="flaticon-add m--margin-right-20"></span> 
                                <span class="text-primary" style="font-weight: lighter; font-size: 1.8rem">Adicionar rota de acesso</span>
                            </h3>

                        </div>
                    </div>
                    <div class="m-portlet__head-tools">

                        <div class="btn-group">
                            <div class="m-portlet__head-tools">


                                <div class="btn-group">
                                    <button id="cadastrar_rota" type="button" class="btn btn-outline-info m-btn m-btn--icon m-btn--wide m-btn--md">
                                        <span>
                                            <i class="fa fa-check"></i>
                                            <span>Cadastrar rota</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Form Body -->
                <div id="form_adicionar_rota" class="m-portlet__body">

                </div>
            </div>
        </div>
    </div>
</div>




<script>
    
    $(document).ready(function () {
        load_form();
    });

    function load_form() {
        $("#form_adicionar_rota").load("form-adicionar-rota");
    }
    
</script>