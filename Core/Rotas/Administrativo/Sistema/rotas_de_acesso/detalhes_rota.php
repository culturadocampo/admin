<?php
$o_rota = new Rota();

$o_rota->set_id_rota($_GET['id_rota']);
$rota = $o_rota->select_rota_from_id();
$parametros_get = $o_rota->select_parametros();



$arquivos_base = $o_rota->get_arquivos_base();

$array_parametros = explode("/", $rota['expressao']);


foreach ($array_parametros as $key => $value) {
    $array['parametro'] = STRINGS::string_to_uri($value);
    $array['tipo'] = "Palavra fixa";
    if (!isset($array_parametros[$key])) {
        $array_parametros[$key] = array();
    }
    $array_parametros[$key] = $array;
}

foreach ($parametros_get as $value) {
    $index = $value['indice'];
    $array_parametros[$index]['parametro'] = $value['parametro'];
    $array_parametros[$index]['tipo'] = $value['tipo'];
}
array_pop($array_parametros); // json e adicionar na tabela usando json, nao php
$json_parametros = json_encode($array_parametros);
//ARRAYS::pre_print($array_parametros);
?>
<div class="m-grid__item m-grid__item--fluid m-wrapper" > 
    <div class="m-subheader ">
        <div class="m-portlet m-portlet--last m-portlet--head-lg m-portlet--responsive-mobile" id="main_portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-progress">
                    <!-- here can place a progress bar-->
                </div>
                <div class="m-portlet__head-wrapper">
                    <div class="m-portlet__head-caption">
                        <a href="<?php echo APP::get_origem_request(); ?>" class="btn btn-secondary m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                            <span>
                                <i class="la la-arrow-left"></i>
                                <span>Voltar</span>
                            </span>
                        </a>
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Detalhes da rota #<?php echo $rota['id_rota'] ?>
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">

                        <div class="btn-group">
                            <div class="m-portlet__head-tools">
                                                            <small class="text-danger m--margin-right-50">Em fase de testes ainda. Não em xinguem se der problema.</small>

                                <button class="btn btn-warning btn-outline-warning m-btn m-btn--icon m-btn--wide m-btn--md m--margin-right-10">
                                    <span>
                                        <i class="la la-trash"></i>
                                        <span>Excluir rota</span>
                                    </span>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-outline-success  m-btn m-btn--icon m-btn--wide m-btn--md">
                                        <span>
                                            <i class="la la-check"></i>
                                            <span>Salvar alterações</span>
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
                <div class="m-portlet__body">
                    <form id="form_rotas" class="m-form m-form--fit m-form--label-align-right">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group">
                                <div class="row m--padding-bottom-20">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Conteúdo</label>
                                            <div class="input-group mb-3">
                                                <input disabled="" type="text" class="form-control" value="<?php echo $rota['conteudo']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Matriz *</label>
                                            <select name="matriz" class="form-control selectpicker" id="select_matriz">
                                                <option selected value="0">Arquivo load/ajax</option>

                                                <?php if ($arquivos_base) { ?>
                                                    <?php foreach ($arquivos_base as $arquivo) { ?>
                                                        <option <?php echo $rota['matriz'] == $arquivo['arquivo'] ? 'selected' : '' ?> value="<?php echo $arquivo['arquivo']; ?>"><?php echo $arquivo['nome']; ?></option>
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
                                                <input name="url" id="input_url" type="text" class="form-control m-input" placeholder="Nome do caminho (Somente letras)" value="<?php echo $rota['url']; ?>">

                                            </div>
                                            <small class="form-text text-muted">URI identificador da página (ex: perfil, anuncios)</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Precisa estar logado? *</label>
                                            <select id="publico" name="publico" class="form-control selectpicker" id="">
                                                <option <?php echo!$rota['publico'] ? 'selected' : '' ?> value="0">Sim, precisa de uma sessão ativa</option>
                                                <option <?php echo $rota['publico'] ? 'selected' : '' ?> value="1" >Não importa, qualquer um pode acessar</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div id="div_parametros" class="m--margin-top-50">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Categoria</label>

                                                <select class="form-control selectpicker" id="parametros">
                                                    <option value="1">Expressão regular</option>
                                                    <option value="2">Palavra fixa</option>
                                                </select>
                                            </div>
                                            <div id="expressao_regular">

                                                <div class="form-group">
                                                    <label>Tipo regex</label>
                                                    <select class="form-control selectpicker" id="expressao_select">
                                                        <option value="STRING">Somente letras</option>
                                                        <option value="INT">Somente números</option>
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

                                        </div>
                                        <div class="col-md-1">
                                            <div class="text-center m--margin-top-50">
                                                <button type="button" id="add_parametro" class="btn btn-info btn-outline-info"><span class="la la-arrow-right"></span></button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="table-responsive">
                                                <table id="tabela_de_parametros" class="table table-bordered">
                                                    <thead>
                                                        <tr style="background: rgba(0,0,0,0.025)">
                                                            <th class="text-center">Parâmetro</th>
                                                            <th class="text-center">Tipo</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function () {
        var parametros_array = '<?php echo $json_parametros ?>';
        parametros_array = JSON.parse(parametros_array);
        add_on_table(parametros_array);


        $("#add_parametro").on("click", function () {
            var categoria = $("#parametros").val();
            var tipo_parametro = $("#expressao_select").val();
            var array_parametro = [];
            var nome_parametro = $("#nome_parametro").val();

            if ((nome_parametro.length > 0 || (tipo_parametro !== "STRING" && tipo_parametro !== "INT"))) {
                if (categoria === "1" && (tipo_parametro === "STRING" || tipo_parametro === "INT")) {
                    array_parametro = {parametro: nome_parametro, tipo: tipo_parametro};
                } else {
                    array_parametro = {parametro: $("#palavra_url").val(), tipo: "Palavra fixa"};
                }
                parametros_array.push(array_parametro);
                add_on_table(parametros_array);
            } else {
                swal("Informe o nome do parâmetro");
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
            if (value.tipo === "INT" || value.tipo === "STRING") {
                $("#tabela_de_parametros tbody").append("<tr><td class='text-center'>$_GET['" + value.parametro + "']</td> <td class='text-center'>" + value.tipo + "</td></tr>");
            } else {
                $("#tabela_de_parametros tbody").append("<tr><td class='text-center'>" + value.parametro + "</td><td class='text-center'>" + value.tipo + "</td></tr>");
            }
        });
    }
</script>