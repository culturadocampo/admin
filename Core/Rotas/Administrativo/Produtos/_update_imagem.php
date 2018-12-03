<?php

//ARRAYS::pre_print($_FILES);
$path = 'Public/Images/Produtos/'; // upload directory

$o_produto = new Produto();
$o_produto->set_id_produto($_POST['id_produto']);

$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

//$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_image = rand(1000, 1000000) . "_" . $img;


$path = $path . strtolower($final_image);
if (move_uploaded_file($tmp, $path)) {
    $o_produto->delete_all_imagens_produto();
    $o_produto->insert_imagem_produto($final_image);
    APP::return_response(true, $path);
} else {
    APP::return_response(false, "Ocorreu um erro");
}
