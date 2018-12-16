<?php
//sleep(2);
$o_produto = new Produto();
$arr_produtos = $o_produto->select_produtos_com_imagens();
$anim_delay = 0.01;
?> 

<button id="confirmar">confirmar</button>
<div class="row">
    <?php if ($arr_produtos) { ?>
        <?php foreach ($arr_produtos as $key => $produto) { ?>
            <?php $anim_delay = $anim_delay + 0.016; ?>
            <div style="animation-delay: <?php echo $anim_delay; ?>s" class="produto col-md-2 animated fadeIn" >
                <div class="produto_container m--padding-15">
                    <img src="Public/Images/Produtos/<?php echo $produto['imagem']; ?>" style="height: 12em; width: 12em;">
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>