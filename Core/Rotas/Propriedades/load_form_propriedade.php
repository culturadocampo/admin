<?php
$o_certificacao = new Certificacao();
$id_tipo_usuario = SESSION::get_id_tipo_usuario();
$a_certificacoes = $o_certificacao->select_todas_certificacoes();
?>

<?php if ($id_tipo_usuario <> 5 && $id_tipo_usuario <> 3) { ?>
    <div class="col-md-12">
        <div class="form-group m-form__group row">
           
            <div class="col-md-6">
                <label for="rg">Agricultor</label>

                <?php
                $o_filiado = new Filiado();
                $a_filiado = $o_filiado->select_todos_filiados_ativos();
                ?>
                <select data-live-search="" data-style="btn-outline-info" name="id_filiado" class="form-control selectpicker">

                  
                </select>
            </div>
            
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
        </div>
    </div>

<?php } ?>



<?php include 'Core/Rotas/Endereco/include_maps_lat_lng.php'; ?>


    <script>

        $(document).ready(function () {
            $(".caepf").mask("000.000.000/000-00");
        });

    </script>