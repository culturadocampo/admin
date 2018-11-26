<?php 

?>
<style>
    .m-wrapper{
        padding: 8px!important;
    }
    .m-portlet{
        box-shadow: none!important;
    }
</style>



<div class="m-grid__item m-grid__item--fluid m-wrapper" > 
    <form id="form_permissao" class="m-form m-form--fit m-form--label-align-right animated fadeIn">

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
                                    <span class="text-primary" style="font-weight: lighter; font-size: 1.8rem">Permissões de acesso</span>
                                </h3>

                            </div>
                        </div>
                        <div class="m-portlet__head-tools">

                            <div class="btn-group">
                                <div class="m-portlet__head-tools">


                                    <div class="btn-group">
                                        <button id="cadastrar_permissao" type="button" class="btn btn-outline-info m-btn m-btn--icon m-btn--wide m-btn--md">
                                            <span>
                                                <i class="fa fa-check"></i>
                                                <span>Cadastrar permissão</span>
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

                    <div  class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>Descrição</label>
                                <input type="text" name="descricao" class="form-control m-input" placeholder="Permissão">
                            </div>
                            <div class="col-lg-6">
                                <label class="">Tipo de usuário:</label>
                                <select name="tipo_usuario[]" class="form-control m-input selectpicker" multiple>
                                    <option value="1">Administrador</option>
                                    <option value="2">Cliente</option>
                                    <option value="3">Produtor</option>

                                </select>
                                <span class="m-form__help">Selecione ao menos um tipo</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <div id="tabela_permissoes">
        
    </div>
</div>


<script>
    $(document).ready(function () {
        carregar_permissoes();
        $("#cadastrar_permissao").on("click", function () {
            var formData = $("#form_permissao").serialize();
            $.ajax({
                type: "post",
                url: "insert-permissao",
                data: formData,
                success: function (response) {
                    var json = JSON.parse(response);
                    if (is_json(json)) {
                        if (json.result) {
                            $("#form_permissao").trigger('reset');
                                    carregar_permissoes();

                            swal({
                                type: 'success',
                                title: 'Sucesso',
                                text: json.message
                            });
                        } else {
                            swal({
                                type: 'error',
                                title: 'Aviso',
                                text: json.message
                            });
                        }
                    } else {
                        swal({
                            type: 'error',
                            title: 'Resposta inesperadaaaa',
                            text: response
                        });
                    }
                },
                error: function (error) {
                    swal({
                        type: 'error',
                        title: 'Resposta inesperadasss',
                        text: 'Entre em contato com o supoorte (COD: L001)'
                    });
                }
            });
        });
    });
    
    
    function carregar_permissoes(){
        $("#tabela_permissoes").load("tabela-permissoes");
    }
</script>


