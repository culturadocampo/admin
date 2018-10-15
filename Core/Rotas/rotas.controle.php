<?php
$o_rota = new Rota();

$all_rotas = $o_rota->select_all_permissoes();

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
            <div class="card">
                <h5 class="card-header">Data Tables</h5>
                <div class="card-body">
                    <table id="rotas_table" class="table table-borderless table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descrição</th>
                                <th>Qtde. Rotas</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_rotas as $rota) { ?>
                                <tr>
                                    <td><?php echo $rota['id_permissao']; ?></td>
                                    <td><?php echo $rota['descricao']; ?></td>
                                    <td><?php echo $rota['qtde_rotas']; ?></td>


                                </tr>
                            <?php } ?>


                            </tfoot>
                    </table>


                </div>
            </div>
        </div>
    </div>
</section>
<header class="page-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h1 class="separator">Cadastro de rotas de acesso</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="icon dripicons-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Criar rotas</li>
                </ol>
            </nav>
        </div>
    </div>
</header>
<section class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">
                    Definições

                </h5>
                <div class="card-body">
                    <form class="form-horizontal">
                        <div class="form-body">

                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">AJAX/LOAD</label>

                                <div class="col-sm-7">
                                    <input id="switch_ajax" class="switch-accent" type="checkbox">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Base</label>
                                <div class="col-md-7">
                                    <select class="form-control" id="base_select2">
                                        <?php if ($arquivos_base) { ?>
                                            <?php foreach ($arquivos_base as $arquivo) { ?>
                                                <option><?php echo $arquivo; ?></option>
                                            <?php } ?>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Conteúdo</label>
                                <div class="col-md-7">
                                    <select class="form-control" id="conteudo_select2">
                                        <?php if ($arquivos_conteudo) { ?>
                                            <?php foreach ($arquivos_conteudo as $arquivo) { ?>
                                                <option></option>
                                                <option><?php echo $arquivo; ?></option>
                                            <?php } ?>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">URL</label>
                                <div class="col-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-icon-addon1">.com.br/</span>
                                        </div>
                                        <input id="input_url" type="text" class="form-control" placeholder="Nome do caminho">
                                    </div>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="control-label text-right col-md-3 text-danger">Acesso restrito</label>

                                <div class="col-sm-7">
                                    <input id="switch_permissao" class="switch-danger" type="checkbox">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>



            </div>
            <div class="card">
                <h5 class="card-header">Parâmetros</h5>
                <div class="card-body">
                    <div class="form-body form-horizontal">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Parâmetro</label>
                            <div class="col-md-7">
                                <select class="form-control" id="parametro_select2">
                                    <option value="1">Expressão regular</option>
                                    <option value="2">Palavra fixa</option>
                                </select>
                            </div>
                        </div>
                        <div id="expressao_regular">

                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Expressão</label>
                                <div class="col-md-7">
                                    <select class="form-control" id="expressao_select2">
                                        <option type="string" value="([a-zA-Z]+)">Somente letras</option>
                                        <option type="int" value="(\d+)">Somente números</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Nome</label>
                                <div class="col-7">
                                    <div class="input-group mb-3">
                                        <input id="nome_parametro" type="text" class="form-control somente_letras" placeholder="Nome do parâmetro (e.g. id, nome, valor)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="palavra_fixa" style="display: none">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Palavra</label>
                                <div class="col-7">
                                    <div class="input-group mb-3">
                                        <input id="palavra_url" type="text" class="form-control somente_letras" placeholder="Nome do parâmetro (e.g. id, nome, valor)" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-footer bg-light">
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button id="add_parametro" class="btn btn-primary">Adicionar parâmetro</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header">Borderless table</h5>
                <div class="card-body">
                    <p>Add <code class="highlighter-rouge">.table-borderless</code> for a table without borders.</p>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Population</th>
                                    <th>Yearly Change</th>
                                    <th>Net Change</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>China</td>
                                    <td>1,415,045,928</td>
                                    <td>0.39 %</td>
                                    <td>5,528,531</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="card">
        <h5 class="card-header">Resultado</h5>
        <div class="card-body">
            <div class="form-body">

                <div class="form-group row">
                    <label class="control-label text-right col-md-3">Exemplo URL</label>
                    <div class="col-7">
                        <span class="badge badge-light">.com.br/<span class="url"></span></span>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label text-right col-md-3">Expressão</label>
                    <div class="col-7">
                        <span class="badge badge-light"><span class="url"></span>/</span>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label text-right col-md-3">Parâmetros</label>
                    <div id="lista_parametros" class="col-7">

                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer bg-light">
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-dark">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function () {

        $('#rotas_table').DataTable();


        let parametros_array = [];

        $("#base_select2").select2({
            placeholder: "Escolha a base"
        });
        $("#conteudo_select2").select2({
            placeholder: "Escolha o conteúdo"
        });
        $("#parametro_select2").select2({
            placeholder: "Escolha o tipo de parâmetro"
        });

        $("#expressao_select2").select2();


        var switchAjax = document.querySelector('#switch_ajax');
        Switchery(switchAjax, {color: QuantumPro.APP_COLORS.success, secondaryColor: QuantumPro.APP_COLORS.grey200});
        $('#switch_ajax').on('change', function (a) {
            if (this.checked) {
                $("#base_select2").prop("disabled", true);
            } else {
                $("#base_select2").prop("disabled", false);
            }
        });

        $("#parametro_select2").on("change", function () {
            if (this.value === "1") {
                $("#expressao_regular").show();
                $("#palavra_fixa").hide();

            } else {
                $("#expressao_regular").hide();
                $("#palavra_fixa").show();
            }

        });

        var switchPermissao = document.querySelector('#switch_permissao');
        Switchery(switchPermissao, {color: QuantumPro.APP_COLORS.danger, secondaryColor: QuantumPro.APP_COLORS.grey200});

        $("#input_url").on("keydown", function (event) {
            // Allow controls such as backspace, tab etc.
            var arr = [8, 9, 16, 17, 20, 35, 36, 37, 38, 39, 40, 45, 46, 173, 109];

            // Allow letters
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

            // Allow letters
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

        $("#add_parametro").on("click", function () {
            var palavra = $("#nome_parametro").val();
            var get = "<code class='row text-muted'>$_GET['" + palavra + "']</code>";
            var parametros_atuais = $("#lista_parametros").html();

            parametros_array.push(get);
            $.each(parametros_array, function (key, value) {
                $("#lista_parametros").html(parametros_atuais + value);
            });
        });
    });
</script>