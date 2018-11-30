<?php
$o_produto = new Produto();

$array_produtos = $o_produto->select_produtos();


if ($array_produtos) {
    foreach ($array_produtos as $key => $value) {
        $value['produto_uri'] = STRINGS::string_to_uri($value['nome']);
        $array_produtos[$key] = $value;
    }
}
?>
<div class="m-grid__item m-grid__item--fluid m-wrapper" > 

<div class="m-portlet__body">
    <table class="table table-striped- table-bordered table-hover table-sm" id="produtos_table">
        <thead>
            <tr>
                <th>NCM</th>
                <th>Produto</th>
                <th>Categoria</th>
                <th class="text-center">Orgânico</th>
                <th class="text-center">Hidropônico</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($array_produtos) { ?>
                <?php foreach ($array_produtos as $value) { ?>
                    <tr class="href_row pointer" href="produtos/rastreabilidade/<?php echo $value['ncm_codigo']; ?>/<?php echo $value['produto_uri']; ?>">
                        <td><?php echo $value['ncm_codigo']; ?></td>
                        <td><?php echo $value['nome']; ?></td>
                        <td><?php echo $value['categoria']; ?></td>
                        <td class="text-center">
                            <?php if ($value['organico']) { ?>
                                <span class="la la-check text-success"></span>
                            <?php } else { ?>
                                <span class="la la-close text-danger"></span>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($value['hidroponico']) { ?>
                                <span class="la la-check text-success"></span>
                            <?php } else { ?>
                                <span class="la la-close text-danger"></span>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>

            <?php } ?>

        </tbody>
    </table>
</div>
</div>


<script>
    $(document).ready(function () {
        $("#produtos_table").DataTable({
            paging: true
        });
        $("#produtos_table tbody").on("click", "tr", function () {
            window.location = $(this).attr("href");
        });
    });
</script>