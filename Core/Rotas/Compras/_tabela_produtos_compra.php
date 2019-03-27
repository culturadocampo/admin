<?php
    if(isset($_POST['array_produtos'])){
        $dados = $_POST['array_produtos'];
    }else{
        $dados  = false;
    }
?>

    <!--begin: Datatable -->
    <?php if ($dados) { ?>
        <table class="table table-bordered table-hover table-bordered" id="rotas_table">
            <thead>
                <tr>
                    <th class="text-center">Categoria</th>
                    <th class="text-center">Produto</th>
                    <th class="text-center">QTD</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Valor</th>
                    <th class="text-center"> </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dados as $value){ 
                    $o_nomeCategoria = new CategoriaProdutos();
                    $nomeCat = $o_nomeCategoria->select_categoria($value['categoria']);
                    
                    $o_nomeProduto = new Produto();
                    $nomeProd = $o_nomeProduto->select_produto($value['produto']);
                ?>
                    <tr>
                        <td class="text-center">  
                            <p> <?php echo $nomeCat['nome']; ?> </p>
                        </td>
                        <td class="text-center">  
                           <p> <?php echo $nomeProd['nome']; ?> </p>
                        </td>
                        <td class="text-center">  
                           <p> <?php echo $value['qtd']; ?> </p>
                        </td>
                        <td class="text-center">  
                          <p> <?php echo Produto::seta_medida_produto($value['medida']); ?> </p>
                        </td>
                        <td class="text-center">  
                           <p> <?php echo $value['valor']; ?> </p>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-sm" type="button"><span class="flaticon-delete" id="excluir_compra"></span></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="alert alert-primary" role="alert">
            Nenhum produto foi adicionado até o momento !
        </div>
    <?php } ?>
