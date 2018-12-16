<?php
$num_produtos = count($_POST['produtos']);
$num_espacos = 6 - $num_produtos;
?>

<?php $delay = 0.1; ?>
<?php if ($_POST["produtos"]) { ?>
    <table style="width: 100%">
        <?php foreach ($_POST["produtos"] as $key => $value) { ?>
            <?php $delay = $delay + 0.15; ?>
            <?php if ($key == 0 || $key == 3) { ?>
                <tr>
                <?php } ?>
                <td class="text-center">
                    <div >
                        <img class="animated lightSpeedIn fast" style="animation-delay: <?php echo $delay ?>s" src="<?php echo $value; ?>" width="64px" height="64px">
                    </div>
                </td>
                <?php if ($key == 2 || ($key == 5 && $num_produtos == 6)) { ?>
                </tr>
            <?php } ?>
        <?php } ?>

        <?php if ($num_produtos < 6) { ?>
            <?php for ($i = 0; $i < $num_espacos; $i++) { ?>
                <td class="text-center">
                    <div class="add">
                        <img src="Public/Images/add.png" width="48px" height="48px">
                    </div>
                </td>
            <?php } ?>
        </tr>
    <?php } ?>

    </table>


<?php } ?>


