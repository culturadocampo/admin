<style>
    .table.dataTable {
        border-collapse: collapse!important;
    }
    .table.dataTable tbody tr:hover{
        background-color: #e6f4e5;
    }
    .btn-permissoes i 
</style>

<?php
$o_rota = new Rota();

$rotas = $o_rota->select_all_rotas();

foreach ($rotas as $key => $rota) {
    if ($rota['matriz'] == "base_admin.php") {
        $rota['matriz'] = "Administração";
    } else if ($rota['matriz'] == "base_geral.php") {
        $rota['matriz'] = "Geral";
    } else if ($rota['matriz'] == "base_login.php") {
        $rota['matriz'] = "Base login";
    } else {
        $rota['matriz'] = "Ajax/Load";
    }

    if ($rota['publico']) {
        $rota['publico'] = "<span class='badge badge-light font-size-14'>Público</span>";
    } else {
        $rota['publico'] = "<span class='badge badge-dark font-size-14'>Privado</span>";
    }

    if ($rota['ativo']) {
        $rota['ativo'] = "<abbr title='Clique para desativar'><input class='tgl tgl-light switcher' type='checkbox' checked=''></abbr>";
    } else {
        $rota['ativo'] = "<abbr title='Clique para ativar'><input class='tgl tgl-light switcher'  type='checkbox'></abbr>";
    }

    $rotas[$key] = $rota;
}
?>
<!--<button class="btn btn-accent" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tooltip on bottom">Tooltip on bottom</button>-->
<table id="rotas-table" class="table table-striped table-bordered table-light block-el ">

    <thead>
        <tr>
            <th class="text-center"></th>
            <th class="text-center font-weight-bold">Acesso</th>

            <th class="font-weight-bold">URI</th>
            <th class="font-weight-bold">Tipo</th>
            <th class="font-weight-bold">Conteúdo</th>
            <th class="text-center font-weight-bold">Permissões</th>
            <th class="text-center"></th>
            <th class="text-center"></th>


        </tr>
    </thead>
    <tbody>
        <?php if ($rotas) { ?>

            <?php foreach ($rotas as $value) { ?>
                <tr id="<?php echo $value['id_rota']; ?>">
                    <td class="text-center"><?php echo $value['ativo']; ?></td>
                    <td class="text-center"><?php echo $value['publico']; ?></td>
                    <td class="text-truncate" width="20%"><abbr title="<?php echo $value['expressao']; ?>"><?php echo $value['url']; ?></abbr></td>
                    <td class=""><?php echo $value['matriz']; ?></td>
                    <td class=""><?php echo $value['conteudo']; ?></td>
                    <td class="text-center"><span class="badge badge-light badge-pill font-size-14">0</span></td>
                    <td class="text-center"><button title="Vincular permissão" data-qt-block=".block-el" class="vincular_permissao btn btn-sm btn-outline btn-primary la la-plus font-size-18"></button></td>
                    <td class="text-center"><a title="Excluir rota" class="excluir_rota btn btn-sm btn-outline btn-accent la la-remove font-size-18 text-accent"></a></td>

                </tr>
            <?php } ?>

        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {


        function showAlert() {
            new PNotify({
                text: 'Status alterado!',
                delay: 1500,
                type: 'success',
                addclass: "stack-bottomright",
                animate: {
                    animate: true,
                    in_class: 'bounceInUp',
                    out_class: 'bounceOutRight'
                }
            });
        }


        $('#rotas-table').DataTable({
            "order": [],
            "paging": false
        });


        if ($('.switcher').length > 0) {
            var elems = Array.prototype.slice.call($('.switcher'));
            elems.forEach(function (html) {
                var switchery = new Switchery(html, {
                    color: QuantumPro.APP_COLORS.success,
                    secondaryColor: QuantumPro.APP_COLORS.grey200,
                    className: "switchery switchery-small"

                });
            });
        }

        $('.switcher').on('change', function () {
            var id = $(this).closest('tr').attr('id');
            $.post('alterar-status-rota', {id_rota: id}, function (response) {
                showAlert();
            });
        });

        $(".vincular_permissao").off("click");
        $(".vincular_permissao").on("click", function () {
            $(".nav-tabs li:nth-child(1) a").removeClass('active');
            $(".nav-tabs li:nth-child(1) a").removeClass('show');
            $(".nav-tabs li:nth-child(2) a").addClass('active');
            $(".nav-tabs li:nth-child(2) a").addClass('show');
            $(".tab-content #rotas").removeClass('active');
            $(".tab-content #permissoes").addClass('active');
        });

        $(".excluir_rota").off("click");
        $(".excluir_rota").on("click", function () {
            var id = $(this).closest('tr').attr('id');
            $.post("excluir-rota", {id_rota: id}, function (response) {
                alert(response);
            });
        });

    });
</script>