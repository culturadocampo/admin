<style>
    .table.dataTable {
        border-collapse: collapse!important;
    }
    .table.dataTable tbody tr:hover{
        background-color: #FFF9C4!important;
    }
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
        $rota['publico'] = "<span class='text-success font-weight-bold'>Público</span>";
    } else {
        $rota['publico'] = "<span class='text-info font-weight-bold'>Privado</span>";
    }

    if ($rota['ativo']) {
        $rota['ativo'] = "<abbr title='Clique para desativar'><input class='tgl tgl-light switcher' type='checkbox' checked=''></abbr>";
    } else {
        $rota['ativo'] = "<abbr title='Clique para ativar'><input class='tgl tgl-light switcher'  type='checkbox'></abbr>";
    }

    $rotas[$key] = $rota;
}
?>

<table id="rotas-table" class="table table-striped table-bordered">

    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="font-weight-bold">URI</th>
            <th class="font-weight-bold">Tipo</th>
            <th class="font-weight-bold">Conteúdo</th>
            <th class="text-center font-weight-bold">Acesso</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($rotas) { ?>

            <?php foreach ($rotas as $value) { ?>
                <tr id="<?php echo $value['id_rota']; ?>">
                    <td class="text-center"><?php echo $value['ativo']; ?></td>
                    <td class="text-truncate font-weight-bold" width="20%"><abbr title="<?php echo $value['expressao']; ?>"><?php echo $value['url']; ?></abbr></td>
                    <td class=""><?php echo $value['matriz']; ?></td>
                    <td class=""><?php echo $value['conteudo']; ?></td>
                    <td class="text-center"><?php echo $value['publico']; ?></td>
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
                delay: 1750,
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



    });
</script>