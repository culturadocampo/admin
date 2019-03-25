<?php
$o_certificacao = new Certificacao();
$id_tipo_usuario = SESSION::get_id_tipo_usuario();
$a_certificacoes = $o_certificacao->select_todas_certificacoes();
?>

<?php if ($id_tipo_usuario <> 5 && $id_tipo_usuario <> 3) { ?>
    <div class="col-md-12">
        <div class="form-group m-form__group row">
            <div class="col-md-6">
                <label for="rg">Técnico responsável</label>

                <?php
                $o_tecnico = new Tecnico();
                $a_tecnicos = $o_tecnico->selectTecnicosAtivos();
                ?>
                <select data-live-search="" data-style="btn-outline-info" name="id_tecnico" class="form-control selectpicker">
                    <option value="">Nenhum técnico ficará responsável por este propriedade</option>
                    <?php if ($a_tecnicos) { ?>
                        <?php foreach ($a_tecnicos as $value) { ?>
                            <option  value="<?php echo $value['id_tecnico']; ?>"><?php echo $value['nome']; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6">
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

<?php include 'Core/Rotas/Endereco/include_maps_lat_lng.php'; ?>

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
        <div class="col-lg-6">
            <label for="id_certificacao">Certificação orgânica</label>
            <select name="id_certificacao" class="form-control selectpicker" data-live-search="true">
                <?php if ($a_certificacoes) { ?>

                    <?php foreach ($a_certificacoes as $value) { ?>
                        <option value="<?php echo $value['id_certificacao']; ?>"><?php echo $value['descricao']; ?></option>
                    <?php } ?>

                <?php } ?>
            </select>
        </div>
    </div>

    <script>

        $(document).ready(function () {
            $(".caepf").mask("000.000.000/000-00");
        });

    </script>