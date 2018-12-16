<?php
//sleep(1);

$arr_produtos = $_POST['produtos'];
$anim_delay = 0.01;
$col_size = get_col_size($arr_produtos);

function get_col_size($arr) {
    switch (count($arr)) {
        case 1: return 12;
        case 2: return 6;
        case 3: return 4;
        case 4: return 6;
        case 5: return 4;
        case 6: return 4;
        default: return 3;
    }
}
?>

<?php if ($arr_produtos) { ?>
    <button id="finalizar">Finalizar</button>

    <div class="row">
        <?php foreach ($arr_produtos as $value) { ?>
        <?php $anim_delay = $anim_delay + 0.15; ?>
            <div style="animation-delay: <?php echo $anim_delay; ?>s" class="col-md-<?php echo $col_size; ?> animated lightSpeedIn fast m--margin-bottom-20">
                <img style="width: 20em; height: 20em" src="<?php echo $value; ?>">
                <br>
                <input type="text" placeholder="Quantidade" class="form-control">

            </div>
    <?php } ?>
    </div>
<?php } ?>