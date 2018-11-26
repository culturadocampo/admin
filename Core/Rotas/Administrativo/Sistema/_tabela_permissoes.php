<?php
$o_permissao = new Permissao();
$arr_permissoes = $o_permissao->select_all_permissoes();
?>


<table class="table table-striped- table-bordered table-hover table-sm" id="permissoes_table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Tipo de usuários</th>
            <th>Data</th>

        </tr>
    </thead>
    <tbody>
        <?php if ($arr_permissoes) { ?>
            <?php foreach ($arr_permissoes as $value) { ?>
                <tr>
                    <td><?php echo $value['id_permissao']; ?></td>
                    <td><?php echo $value['descricao']; ?></td>
                    <td><?php echo $value['usuarios']; ?></td>
                    <td><?php echo $value['data']; ?></td>
                </tr>
            <?php } ?>

        <?php } ?>

    </tbody>
</table>


<script>
    $(document).ready(function () {
        $("#permissoes_table").DataTable();
    });
</script>