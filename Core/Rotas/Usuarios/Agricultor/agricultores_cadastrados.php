<?php
$o_agriculor = new Agricultor();
$a_agricultores = $o_agriculor->select_agricultores_ativos();
?>


<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    Agricultores cadastrados
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">	
        <table class="table datatable table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome completo</td>
                    <td>Cidade</td>
                    <td>Produção</td>
                </tr>
            </thead>
            <tbody>
                <?php if ($a_agricultores) { ?>
                    <?php foreach ($a_agricultores as $value) { ?>
                        <tr>
                            <td><?php echo $value['id_usuario']; ?></td>
                            <td><?php echo $value['nome']; ?></td>
                            <td><?php echo $value['fk_municipio']; ?></td>
                            <td><a href="agricultor/<?php echo $value['id_usuario']; ?>/cadastrar/producao" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>


<script>
    $(document).ready(function () {
        $(".datatable").DataTable();
    });
</script>