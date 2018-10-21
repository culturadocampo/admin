<?php
$o_rota = new Rota();

//$all_rotas = $o_rota->select_all_permissoes();

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

<section class="page-content">

    <div class="row">
        <div class="col-md-12">
            <div class="card card-tabs">
                <div class="card-header p-0 no-border">
                    <ul class="nav nav-tabs primary-tabs p-l-30 m-0">
                        <li class="nav-item" role="presentation"><a href="#table-rotas" class="nav-link active show" data-toggle="tab" aria-expanded="true">Cadastro de rotas</a></li>
                        <li class="nav-item" role="presentation"><a href="#cadastro-rotas" class="nav-link" data-toggle="tab" aria-expanded="true">Rotas disponíveis</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fadeIn active" id="table-rotas">
                            <form id="form_rotas" action="#">

                                <div class="profile-wrapper p-t-20">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">URL *</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-icon-addon1">.com.br/</span>
                                                        </div>
                                                        <input name="url" id="input_url" type="text" class="form-control" placeholder="Nome do caminho">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Acesso *</label>
                                                    <select id="publico" name="publico" class="form-control" id="">
                                                        <option selected value="0">Privado</option>
                                                        <option value="1" >Público</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Matriz *</label>
                                                    <select name="matriz" class="form-control " id="select_matriz">
                                                        <option selected value="0">Sem matriz (Ajax/Load)</option>

                                                        <?php if ($arquivos_base) { ?>
                                                            <?php foreach ($arquivos_base as $arquivo) { ?>
                                                                <option value="<?php echo $arquivo; ?>"><?php echo $arquivo; ?></option>
                                                            <?php } ?>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="confirm">Conteúdo</label>
                                                    <select name="conteudo" class="form-control" id="select_conteudo">
                                                        <?php if ($arquivos_conteudo) { ?>
                                                            <?php foreach ($arquivos_conteudo as $arquivo) { ?>
                                                                <option><?php echo $arquivo; ?></option>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <option>Nenhum novo conteúdo disponível</option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div id="div_parametros" style="display: none" class="col-md-12 m-t-50">
                                        <h3>Parâmetros</h3>
                                        <hr>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select class="form-control" id="parametros">
                                                            <option value="1">Expressão regular</option>
                                                            <option value="2">Palavra fixa</option>
                                                        </select>
                                                    </div>
                                                    <div id="expressao_regular">

                                                        <div class="form-group">
                                                            <label>Tipo</label>
                                                            <select class="form-control" id="expressao_select">
                                                                <option type="string" value="([a-zA-Z]+)">Somente letras</option>
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
                                                                <tr>
                                                                    <th class="text-right">Parâmetro</th>
                                                                    <th class="text-left">Valor</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr><td colspan="2" class="text-center">Nenhum parâmetro adicionado</td></tr>



                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <button type="button" id="cadastrar_rota" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </form>

                        </div>
                        <div class="tab-pane fadeIn" id="cadastro-rotas">
                            <div class="profile-wrapper p-t-20">
                                <h5 class="card-title">Nada aqui, por enquanto</h5>

                            </div>
                            <div class="profile-wrapper">
                               
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


</section>


<script>


    $(document).ready(function () {

        var parametros_array = [];



        $("#cadastrar_rota").on("click", function () {
            //var data = $("#form_rotas").serialize();
            var url = $("#input_url").val();
            var publico = $("#publico").val();
            var matriz = $("#select_matriz").val();
            var conteudo = $("#select_conteudo").val();
            $.post('executa-cadastro-rota', {url: url, publico: publico, matriz: matriz, conteudo: conteudo, params: parametros_array}, function (response) {
                alert(response);
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

            $("#tabela_de_parametros tbody").html("");

            $.each(parametros_array, function (key, value) {
                if (value.tipo === "1") {
                    $("#tabela_de_parametros tbody").append("<tr><td class='text-center'>$_GET['" + value.nome + "']</td><td class='text-center'>" + value.expressao + "</td></tr>");
                } else {
                    $("#tabela_de_parametros tbody").append("<tr><td class='text-center'>-</td><td class='text-center'>/" + value.palavra + "</td></tr>");
                }
            });

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
            if (jQuery.inArray(event.which, arr) === -1) {
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
</script>