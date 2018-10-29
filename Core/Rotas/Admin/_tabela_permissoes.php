<?php
$o_permissao = new Permissao();
$permissoes = $o_permissao->select_all_permissoes();
?>

<table id="rotas-table" class="table table-striped table-bordered table-light">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="font-weight-bold">Descrição</th>
            <th class="font-weight-bold">Data</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($permissoes) { ?>
            <?php foreach ($permissoes as $value) { ?>
                <tr>
                    <td><?php echo $value['id_permissao']; ?></td>
                    <td><?php echo $value['descricao']; ?></td>
                    <td><?php echo $value['data']; ?></td>
                </tr>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>