<?php
$o_certificacao = new Certificacao();
$id_tipo_usuario = SESSION::get_id_tipo_usuario();
$a_certificacoes = $o_certificacao->select_todas_certificacoes();
?>

<form id="form_agricultor" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">

    <div class="m-portlet m-portlet--blue m-portlet--head-solid-bg m-portlet--head-sm" >
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
                        <i class="la la-gear"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        1. Dados básicos do agricultor
                    </h3>
                </div>
            </div>
        </div>
        <div  class="m-portlet__body">	
            <?php if ($id_tipo_usuario <> 5 && $id_tipo_usuario <> 3) { ?>
                <div class="col-md-12">
                    <div class="form-group m-form__group row">
                        <div class="col-md-12">
                            <label for="rg">Associar à cooperativa/associação</label>

                            <?php
                            $o_filiado = new Filiado();
                            $a_filiado = $o_filiado->select_todos_filiados_ativos();
                            ?>
                            <select data-live-search="" data-style="btn-outline-info" name="id_filiado" class="form-control selectpicker">
                                <option value="">Não associar a nenhuma cooperativa/associação</option>

                                <?php if ($a_filiado) { ?>
                                    <?php foreach ($a_filiado as $value) { ?>
                                        <option  value="<?php echo $value['id_filiado']; ?>"><?php echo $value['nome_fantasia']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

            <?php } ?>


            <?php include 'Core/Rotas/Usuarios/include_form_usuario.php'; ?>
            <?php include 'Core/Rotas/Usuarios/include_form_telefone.php'; ?>



            <div class="col-md-12">



                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label for="rg">RG</label>
                        <input name="rg" type="text" class="form-control m-input" placeholder="RG do usuário">
                        <span class="m-form__help">Somente números</span>
                    </div>
                    <div class="col-lg-6">

                        <label for="caepf">CAEPF</label>
                        <input name="caepf" type="text" class="form-control m-input caepf" placeholder="Cadastro de Atividade Econômica da Pessoa Física">
                        <span class="m-form__help">Somente números</span>

                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label for="integrantes_upf">Número de integrantes da UPF</label>
                        <input pattern="\d+" name="integrantes_upf" type="text" class="form-control m-input" placeholder="Informe a quantidade">
                    </div>

                </div>
            </div>
        </div>
        <br>
    </div>

    <div class="m-portlet m-portlet--blue m-portlet--head-solid-bg m-portlet--head-sm" >
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
                        <i class="la la-gear"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        2. Cadastro de propriedade
                    </h3>
                </div>
            </div>
        </div>
        <div  class="m-portlet__body">
            <div class="col-md-12">
                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label for="id_certificacao">Certificação orgânica</label>
                        <select data-style="btn-outline-info"  name="id_certificacao" class="form-control selectpicker" data-live-search="true">
                            <?php if ($a_certificacoes) { ?>
                                <?php foreach ($a_certificacoes as $value) { ?>
                                    <option value="<?php echo $value['id_certificacao']; ?>"><?php echo $value['descricao']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <?php require 'Core/Rotas/Endereco/include_maps_lat_lng.php'; ?>
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



</form>


<script>

    $(document).ready(function () {
        $("#cadastrar").on("click", function () {
            executar_cadastro();
        });
        $(".caepf").mask("000.000.000/000-00");
    });

    function executar_cadastro() {
        hideNotify();
        blockPage();
        var formData = $("#form_agricultor").serialize();
        $.ajax({
            type: "post",
            url: "usuario/insert/agricultor",
            data: formData,
            success: function (response) {
                lerResposta(response, load_form);
            }
        });
    }

</script>