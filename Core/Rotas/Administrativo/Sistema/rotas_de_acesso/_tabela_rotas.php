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



    $rota['expressao'] = str_replace("^", "", $rota['expressao']);
    $rota['expressao'] = str_replace("\/", "/", $rota['expressao']);
    $rota['expressao'] = str_replace("?$", "", $rota['expressao']);
    $rota['expressao'] = str_replace("(\d+)", "{int}", $rota['expressao']);
    $rota['expressao'] = str_replace("([a-zA-Z\-]+)", "{string}", $rota['expressao']);

//
//    if ($rota['publico']) {
//        $rota['publico'] = "<span class='badge badge-light font-size-14'>Público</span>";
//    } else {
//        $rota['publico'] = "<span class='badge badge-dark font-size-14'>Privado</span>";
//    }
//
//    if ($rota['ativo']) {
//        $rota['ativo'] = "<abbr title='Clique para desativar'><input class='tgl tgl-light switcher' type='checkbox' checked=''></abbr>";
//    } else {
//        $rota['ativo'] = "<abbr title='Clique para ativar'><input class='tgl tgl-light switcher'  type='checkbox'></abbr>";
//    }

    $rotas[$key] = $rota;
}
?>




<div class="m-portlet__body">

    <!--begin: Datatable -->
    <table class="table table- table-bordered table-hover table-checkable table-" id="rotas_table">
        <thead>
            <tr>
         <!--<th class="text-center"></th>-->
                <th class="text-center ">ID</th>

                <th class="">URI</th>
                <th class="text-center">Tipo</th>
                <th class="">Conteúdo</th>
 
            </tr>
        </thead>
        <tbody>
            <?php if ($rotas) { ?>

                <?php foreach ($rotas as $value) { ?>
                    <tr href="sistema/rotas-de-acesso/<?php echo $value['id_rota'];?>/informacoes/" class="pointer" id="<?php echo $value['id_rota']; ?>">
                        <td class="text-center"><?php echo $value['id_rota']; ?></td>
                        <td class="text-truncate font-weight-bold" width="20%"><?php echo $value['expressao']; ?></td>
                        <td class="text-center"><?php echo $value['matriz']; ?></td>
                        <td class=""><?php echo $value['conteudo']; ?></td>

                    </tr>
                <?php } ?>

            <?php } ?>

        </tbody>
    </table>
</div>


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


        $('#rotas_table').DataTable({
            "order": [],
            "paging": true
        });
        
         $("#rotas_table tbody").on("click", "tr", function () {
            window.location = $(this).attr("href");
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