<?php
    if (isset($_POST['categoria'])) {
        $o_produtos = new Produto();
        $produtos = $o_produtos->select_produtos_por_categoria($_POST['categoria']);
    } else {
        $produtos = false;
    }
?>

<?php if ($produtos) { ?>
    <select id="produto" name="produto" class="form-control m-input" data-live-search="true">
        <option selected="" disabled="">Produtos</option>
        <?php foreach ($produtos as $value) { ?>
            <option value="<?php echo $value['id_produto']; ?>"><?php echo $value['nome']; ?></option>
        <?php } ?>
    </select>
<?php } else { ?>
    <input disabled="" class="form-control m-input text-center" placeholder="Produtos">
<?php } ?>

