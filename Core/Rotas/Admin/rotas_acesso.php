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

<!--<header class="page-header">
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
</header>-->

<section class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Cadastro de rotas de acesso</h5>
                <div class="card-body">
                    <form id="form_rotas">
                        <h3>Estrutura</h3>
                        <section>

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
                                        <select name="publico" class="form-control" id="">
                                            <option selected value="0">Privado</option>
                                            <option value="1" >Público</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Matriz *</label>
                                        <select name="matriz" class="form-control " id="">
                                            <option selected>Sem matriz (Ajax/Load)</option>

                                            <?php if ($arquivos_base) { ?>
                                                <?php foreach ($arquivos_base as $arquivo) { ?>
                                                    <option><?php echo $arquivo; ?></option>
                                                <?php } ?>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="confirm">Conteúdo</label>
                                        <select name="conteudo" class="form-control" id="">
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



                        </section>
                        <h3>Parâmetros</h3>
                        <section>





                            <div class="form-group">
                                <label for="name">Parâmetros</label>
                                <select class="form-control" id="parametros">
                                    <option value="1">Expressão regular</option>
                                    <option value="2">Palavra fixa</option>
                                </select>
                            </div>
                            <div id="expressao_regular">

                                <div class="form-group">
                                    <label for="surname">Expressão</label>
                                    <select class="form-control" id="expressao_select2">
                                        <option type="string" value="([a-zA-Z]+)">Somente letras</option>
                                        <option type="int" value="(\d+)">Somente números</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Nome</label>
                                    <div class="input-group mb-3">
                                        <input id="nome_parametro" type="text" class="form-control somente_letras" placeholder="Nome do parâmetro (e.g. id, nome, valor)">
                                    </div>
                                </div>
                            </div>
                            <div id="palavra_fixa" style="display: none">

                                <div class="form-group">
                                    <label for="address">Palavra</label>
                                    <div class="input-group mb-3">
                                        <input id="palavra_url" type="text" class="form-control somente_letras" placeholder="Nome do parâmetro (e.g. id, nome, valor)" value="">
                                    </div>
                                </div>
                            </div>

                        </section>
                        <h3>Permissões</h3>
                        <section>

                        </section>
                        <h3>Resumo</h3>
                        <section>

                        </section>
                    </form>
                </div>
            </div>
        </div>

</section>


<script>


    $(document).ready(function () {

        let parametros_array = [];


        var form = $("#form_rotas").show();
        form.steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            stepsOrientation: "vertical",
            onStepChanging: function (event, currentIndex, newIndex) {
                return true;
            },
            onStepChanged: function (event, currentIndex, priorIndex) {
                if (currentIndex === 2 && priorIndex === 3) {
                    form.steps("previous");
                }
            },
            onFinishing: function (event, currentIndex) {
                return true;
            },
            onFinished: function (event, currentIndex) {
                var formData = $("#form_rotas").serialize();
                $.ajax({
                    type: "post",
                    url: "executa-cadastro-rota",
                    data: formData,
                    success: function (response) {
                    alert(response);
                    },
                    error: function (error) {
                        swal({
                            type: 'error',
                            title: 'Resposta inesperada',
                            text: 'Entre em contato com o supoorte (COD: L001)'
                        });
                    }
                });
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


    });
</script>