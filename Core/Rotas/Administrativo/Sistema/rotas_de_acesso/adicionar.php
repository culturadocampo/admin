<?php
$o_rota = new Rota();

$arquivos_base = $o_rota->get_arquivos_base();
$arquivos_conteudo = $o_rota->get_arquivos_conteudo();
if ($arquivos_conteudo) {
    foreach ($arquivos_conteudo as $key => $arquivo_conteudo) {
        $o_rota->set_conteudo($arquivo_conteudo);
        $has_conteudo = $o_rota->select_conteudo();
        if ($has_conteudo) {
            unset($arquivos_conteudo[$key]);
        }
    }
    $arquivos_conteudo = array_values($arquivos_conteudo);
}
?>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Nova rota</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon flaticon-add"></i>
                    </a>
                </li>
                <li class="m-nav__item">
                    <a class="m-nav__link">
                        <span class="m-nav__link-text">Sistema</span>
                    </a>
                </li>
                <li class="m-nav__separator">|</li>
                <li class="m-nav__item">
                    <a class="m-nav__link">
                        <span class="m-nav__link-text">Rotas de acesso</span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</div>
<div class="m-content">
    <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi" m-portlet="true">

        <!--begin::Form-->
        <form id="form_rotas" class="m-form m-form--fit m-form--label-align-right">
           
            <div class="m-portlet__body">
                <div class="form-group m-form__group m--margin-top-10">
                    <div class="alert m-alert m-alert--info alert-success font-weight-bold" role="alert">
                        Crie uma rota de acesso através de um arquivo vazio.Defina sua URI e configure o acesso.
                    </div>
                </div>

                <div class="form-group m-form__group">


                    <div class="row m--padding-bottom-20">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <?php if ($arquivos_conteudo) { ?>
                                    <label for="confirm">Conteúdo</label>
                                <?php } else { ?>
                                    <label class="text-danger" for="confirm">Conteúdo</label>

                                <?php } ?>

                                <select <?php echo $arquivos_conteudo ? "" : 'disabled' ?> <?php echo $arquivos_conteudo ? "" : 'disabled' ?> name="conteudo" class="form-control selectpicker" id="select_conteudo">
                                    <?php if ($arquivos_conteudo) { ?>
                                        <?php foreach ($arquivos_conteudo as $arquivo) { ?>
                                            <option><?php echo $arquivo; ?></option>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <option>Nenhum novo arquivo disponível</option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Matriz *</label>
                                <select <?php echo $arquivos_conteudo ? "" : 'disabled' ?> name="matriz" class="form-control selectpicker" id="select_matriz">
                                    <option selected value="0">Arquivo load/ajax</option>

                                    <?php if ($arquivos_base) { ?>
                                        <?php foreach ($arquivos_base as $arquivo) { ?>
                                            <option value="<?php echo $arquivo['arquivo']; ?>"><?php echo $arquivo['nome']; ?></option>
                                        <?php } ?>
                                    <?php } ?>

                                </select>

                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">URI*</label>
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-icon-addon1">.com.br/</span>
                                    </div>
                                    <input <?php echo $arquivos_conteudo ? "" : 'disabled' ?> name="url" id="input_url" type="text" class="form-control m-input" placeholder="Nome do caminho (Somente letras)">

                                </div>
                                <small class="form-text text-muted">URI identificador da página (ex: perfil, anuncios)</small>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Precisa estar logado? *</label>
                                <select <?php echo $arquivos_conteudo ? "" : 'disabled' ?> id="publico" name="publico" class="form-control selectpicker" id="">
                                    <option selected value="0">Sim, precisa de uma sessão ativa</option>
                                    <option value="1" >Não importa, qualquer um pode acessar</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div id="div_parametros" style="display: none" class="col-md-12 m-t-50">
                        <br>
                        <hr class="m--margin-bottom-20 m--margin-top-20">
                        <br>

                        <div class="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" id="parametros">
                                            <option value="1">Expressão regular</option>
                                            <option value="2">Palavra fixa</option>
                                        </select>
                                    </div>
                                    <div id="expressao_regular">

                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <select class="form-control selectpicker" id="expressao_select">
                                                <option type="string" value="([a-zA-Z\-]+)">Somente letras</option>
                                                <option type="int" value="(\d+)">Somente números</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Nome</label>
                                            <div class="input-group mb-3">
                                                <input id="nome_parametro" type="text" class="form-control somente_letras" placeholder="Nome do parâmetro (e.g. id, nome, valor)">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="palavra_fixa" style="display: none">

                                        <div class="form-group">
                                            <label>Palavra</label>
                                            <div class="input-group mb-3">
                                                <input id="palavra_url" type="text" class="form-control somente_letras" placeholder="Nome do parâmetro (e.g. id, nome, valor)" value="">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12 text-right">
                                        <button type="button" id="add_parametro" class="btn btn-success">Adicionar parâmetro</button>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="table-responsive">
                                        <table id="tabela_de_parametros" class="table table-bordered">
                                            <thead>
                                                <tr style="background: rgba(0,0,0,0.025)">
                                                    <th class="text-center">Parâmetro</th>
                                                    <th class="text-center">Valor</th>
                                                    <!--<th class="text-center"></th>-->

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr><td colspan="3" class="text-center">Nenhum parâmetro adicionado</td></tr>



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <div class="m-portlet__foot m-portlet__foot--fit text-right">
                <div class="m-form__actions ">
                    <button type="button" id="cadastrar_rota" class="btn btn-outline-success m-btn m-btn--icon">
                        <span>
                            <i class="la la-check"></i>
                            <span>Confirmar</span>
                        </span>
                    </button>
                </div>
            </div>
        </form>
        <!--end::Form-->	
    </div>
</div>




<script>


    $(document).ready(function () {

        var parametros_array = [];
        load_rotas();
        load_permissoes();


        $("#cadastrar_rota").on("click", function () {
            //var data = $("#form_rotas").serialize();
            var url = $("#input_url").val();
            var publico = $("#publico").val();
            var matriz = $("#select_matriz").val();
            var conteudo = $("#select_conteudo").val();
            $.post(
                    'sistema/rotas-de-acesso/cadastrar',
                    {url: url, publico: publico, matriz: matriz, conteudo: conteudo, params: parametros_array},
                    function (response) {
                        if (is_json(response)) {
                            response = JSON.parse(response);
                            swal(response.message);
                            if (response.result) {
                                load_rotas();
                            }
                        }
                    });

        });

        $("#add_parametro").on("click", function () {
            var tipo_parametro = $("#parametros").val();
            var array_parametro = [];

            if (tipo_parametro === "1") {
                array_parametro = {expressao: $("#expressao_select").val(), nome: $("#nome_parametro").val(), tipo: tipo_parametro};
            } else {
                array_parametro = {palavra: $("#palavra_url").val(), tipo: tipo_parametro};
            }
            parametros_array.push(array_parametro);
            add_on_table(parametros_array);
        });


        $(".remover_parametro").off("click");
        $(".remover_parametro").on("click", 'button', function () {
            var key = $(this).attr("id");
            alert(key);
        });


        $("#select_matriz").on("change", function () {
            if (this.value === "0") {
                $("#div_parametros").fadeOut();

            } else {
                $("#div_parametros").fadeIn();
            }

        });

        $("#parametros").on("change", function () {
            if (this.value === "1") {
                $("#expressao_regular").show();
                $("#palavra_fixa").hide();

            } else {
                $("#expressao_regular").hide();
                $("#palavra_fixa").show();
            }

        });


        $("#input_url").on("keydown", function (event) {
            // Allow controls such as backspace, tab etc.
            var arr = [8, 9, 16, 17, 20, 35, 36, 37, 38, 39, 40, 45, 46, 173, 109];

            // Allow varters
            for (var i = 65; i <= 90; i++) {
                arr.push(i);
            }

            // Prevent default if not in array
            if (jQuery.inArray(event.which, arr) === -1) {
                event.preventDefault();
            } else {
                $(".url").html($("#input_url").val());
            }
        });

        $("#input_url").on("input", function () {
            var regexp = /[^a-zA-Z-]/g;
            if ($(this).val().match(regexp)) {
                $(this).val($(this).val().replace(regexp, ''));
            } else {
                $(".url").html($("#input_url").val());

            }
        });

        $(".somente_letras").on("keydown", function (event) {
            // Allow controls such as backspace, tab etc.
            var arr = [8, 9, 16, 17, 20, 35, 36, 37, 38, 39, 40, 45, 46, 189];

            // Allow varters
            for (var i = 65; i <= 90; i++) {
                arr.push(i);
            }

            // Prevent default if not in array
            if (jQuery.inArray(event.which, arr) === -1 && (event.which === 189 && event.shiftKey === true)) {
                event.preventDefault();
            } else {
            }
        });

        $(".somente_letras").on("input", function () {
            var regexp = /[^a-zA-Z-_]/g;
            if ($(this).val().match(regexp)) {
                $(this).val($(this).val().replace(regexp, ''));
            } else {
            }
        });


    });


    function add_on_table(parametros_array) {
        $("#tabela_de_parametros tbody").html("");
        $.each(parametros_array, function (key, value) {
           // var button_remover_param = "<td class='text-center'><button type='button' id='" + key + "' class='remover_parametro btn btn-danger btn-sm'>Remover</button></td>";
            if (value.tipo === "1") {
                $("#tabela_de_parametros tbody").append("<tr><td class='text-center'>$_GET['" + value.nome + "']</td> <td class='text-center'>" + value.expressao + "</td></tr>");
            } else {
                $("#tabela_de_parametros tbody").append("<tr><td class='text-center'>-</td><td class='text-center'>/" + value.palavra + "</td></tr>");
            }
        });
    }

    function load_rotas() {
        $("#tabela_rotas").load("tabela-rotas");
    }

    function load_permissoes() {
        $("#tabela_permissoes").load("tabela-permissoes");
    }

</script>