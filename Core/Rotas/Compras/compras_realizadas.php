<?php
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    
    $o_compras = new Compras();
    $compras   = $o_compras->select_todas_compras_filiado();
?>

<div class="col-md-12">
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
                        <i class="la la-gear"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Compras Realizadas
                    </h3>
                </div>
            </div>
        </div>
    
        <table class="table table-bordered table-hover table-bordered">
            <thead>
                <tr>
                    <th class="text-center"> ID </th>
                    <th class="text-center"> Status </th>
                    <th class="text-center"> Produtor </th>
                    <th class="text-center"> Valor Total </th>
                    <th class="text-center"> NF </th>
                    <th class="text-center"> Ações </th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach($compras as $compra){ ?>
                        <tr>
                            <td class="text-center">  
                                <?php echo $compra['id_compra']; ?>
                            </td>
                            <td class="text-center">  
                                <?php echo $compra['status']; ?>
                            </td>
                            <td class="text-center">  
                                <?php echo $compra['fk_produtor']; ?>
                            </td>
                            <td class="text-center">  
                                <?php echo $compra['valor_total']; ?>
                            </td>
                            <td class="text-center">  
                                <?php if(!$compra['nf']){ ?>
                                    <button type="button" id="adicionar_produto" class="btn btn-primary"> Gerar  </button>
                                    <button type="button" id="adicionar_produto" class="btn btn-danger"> <span class="flaticon2-delete"> </span></button>
                                <?php }else{ ?>
                                    <button type="button" id="adicionar_produto" class="btn btn-primary"> <span class="flaticon-technology"> </span></button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
</div>