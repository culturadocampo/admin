<?php
$o_produto = new Produto();
$o_produto->set_ncm_codigo($_GET['ncm']);
$produto = $o_produto->select_um_produto();
$produto_uri = STRINGS::string_to_uri($produto['nome']);
$base_url = APP::get_base_url();

if ($produto) {
    if ($produto_uri !== $_GET['produto']) {
        header("Location: {$base_url}/produtos/rastreabilidade/{$produto['ncm_codigo']}/{$produto_uri}", true, 301);
    }
} else {
     header("Location: {$base_url}/produtos/rastreabilidade/", true, 301);
}
?>
<style>
    .m-portlet.m-portlet--bordered-semi .m-portlet__body{
        padding-top: 0;
    }
</style>
<div class="row">
    <div class="col-md-4">
        <!--begin:: Widgets/Blog-->
        <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded m-portlet--rounded-force">

            <div class="m-portlet__body">
                <div class="m-widget19">
                    <div class="m-widget19__pic m-portlet-fit--sides">							 
                        <img src="Public/Images/noimage.jpg" alt=""> 

                    </div>
                    <div class="m-portlet__body m--padding-0">
                        <div class="m-widget28">
                            <div class="m-widget28__container">	

                                <div class="m-widget28__tab tab-content">
                                    <div id="menu11" class="m-widget28__tab-container tab-pane active">
                                        <div class="m-widget28__tab-items">
                                            <div class="m-widget28__tab-item">
                                                <span>Produto</span>
                                                <span><?php echo $produto['nome']; ?></span>
                                            </div>
                                            <div class="m-widget28__tab-item">
                                                <span>NCM</span>
                                                <span><?php echo $produto['ncm_codigo']; ?></span>
                                            </div>
                                            <div class="m-widget28__tab-item">
                                                <span>Categoria</span>
                                                <span><?php echo $produto['categoria']; ?></span>
                                            </div>

                                        </div>					      	 		      	
                                    </div>

                                </div>
                                <!-- end::Tab Content --> 	
                            </div>				 	 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end:: Widgets/Blog-->	</div>
    <div class="col-md-8">
        <div class="m-portlet m-portlet--bordered m-portlet--rounded m-portlet--unair">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Rastreabilidade<small>Boas práticas</small>
                        </h3>
                    </div>			
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="#" class="btn btn-outline-danger m-btn m-btn--icon m-btn--outline">
                                <span>
                                    <i class="fa flaticon-plus"></i>
                                    <span>Adicionar entrada</span>
                                </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <table class="table table-hover table-bordered" id="boas_praticas_table">
                    <thead>
                        <tr>
                            <th class="text-center">Data</th>
                            <th>Atividade</th>
                            <th>Descrição</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">08/11/18</td>
                            <td class="m--font-bolder">Plantio</td>
                            <td>Plantio de 100 mudas</td>
                        </tr>
                        <tr>
                            <td class="text-center">01/12/18</td>
                            <td class="m--font-bolder">Manejo</td>
                            <td>Limpeza do mato e primeira adubação</td>
                        </tr>
                        <tr>
                            <td class="text-center">20/12/18</td>
                            <td class="m--font-bolder">Manejo</td>
                            <td>Limpeza de pagras</td>
                        </tr>
                        <tr>
                            <td class="text-center">21/12/18</td>
                            <td class="m--font-bolder">Pulverização</td>
                            <td>Pulverizado contra insetos</td>
                        </tr>
                        <tr>
                            <td class="text-center">29/12/18</td>
                            <td class="m--font-bolder">Colheita</td>
                            <td>Realizado a colheita em 5 caixas</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>




<!--adicionar entrar-->

<script>
    $(document).ready(function () {
        $("#boas_praticas_table").DataTable({
            paging: false
        });
    });
</script>