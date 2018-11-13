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

<div class="m-portlet__body">
    <table class="table table-striped- table-bordered table-hover table-checkable" id="produtos_table">
        <thead>
            <tr>
                <th>NCM</th>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Orgânico</th>
                <th>Hidropônico</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($array_produtos) { ?>
                <?php foreach ($array_produtos as $value) { ?>
                    <tr class="href_row pointer" href="produtos/rastreabilidade/<?php echo $value['ncm_codigo']; ?>/<?php echo $value['produto_uri']; ?>">
                        <td><?php echo $value['ncm_codigo']; ?></td>
                        <td><?php echo $value['nome']; ?></td>
                        <td><?php echo $value['categoria']; ?></td>
                        <td><?php echo $value['organico']; ?></td>
                        <td><?php echo $value['hidroponico']; ?></td>
                    </tr>
                <?php } ?>

            <?php } ?>

        </tbody>
    </table>
</div>


<script>
    $(document).ready(function () {
        $("#produtos_table").DataTable({
            paging: false
        });
        $("#produtos_table tbody").on("click", "tr", function () {
            window.location = $(this).attr("href");
        });
    });
</script>