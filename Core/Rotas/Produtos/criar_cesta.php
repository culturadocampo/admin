<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.12/jquery.transit.min.js"></script>

<style>
    .m-widget28 .m-widget28__pic{
        background: #fefefe;
    }

    .m-widget28 table {
        margin-top: 72px;
    }
    .m-widget28 td div {
        height: 100px;
        line-height: 100px;
        border: 1px dashed #a0a0a0;

    }

    .m-widget28 td .add {
        opacity: 0.5;

    }

    .m-widget28 td .add:hover {
        opacity: 1.0;
    }
    .m-widget28 input {
        border-radius: 0;
        border: 0;
        border-bottom: 1px solid #ebedf2;
        padding: 1rem 0;
        margin-top: 0.1rem;
    }

    #grid_produtos{
        text-align: center;
        padding: 64px;
        position: absolute;
        /*height: 80%!important;*/
        top: 0.3rem;
        left: 0;
        right: 0;
        bottom: 0;
        /*margin: 128px;*/
        z-index: 999;
        /*border-radius: 10px;*/
        display: none;
        overflow-y: auto;
        background: rgba(149,225,200, 0.25);
    }

    #grid_produtos input {
        background: rgba(255,255,255,0.5);
    }

    .produto{
        margin-bottom: 8px;
    }


    .produto .produto_container{
        /*padding: 16px;*/

    }
    .produto_container:hover{
        background: rgba(255,255,255,0.5);
        border-radius: 5%;
    }
    .produto div{
        /*border: 1px dashed black;*/
    }

    #grid_produtos .selected {
        background: rgba(255,255,255,0.75);
        border-radius: 5%;
        /*        filter: contrast(150%);
                transition: all .5s ease-in;*/

    }

    .greyscale{
        filter: grayscale(100%)!important;
        transition: all .2s ease-in;

    }

</style> 



<div id="grid_produtos" class="animated fadeIn">

</div>

<div  class="" id="cesta"> 

    <div class="row">


        <div class="col-md-4">
            <div class="m-portlet m-portlet--head-overlay m-portlet--full-height   m-portlet--rounded-force" style="border: 1px dashed #666666">
                <div class="m-portlet__head"> 
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Criar cesta
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="btn btn-sm btn-outline-success" id="gravar_cesta">
                                    Confirmar
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget28">
                        <div class="m-widget28__container" >	
                            <!-- begin::Nav pills -->			
                            <div id="nova_cesta_table">                            
                                <table style="width: 100%">
                                    <tr>
                                        <td class="text-center">
                                            <div class="add">
                                                <img src="Public/Images/Outros/add.png" width="48px" height="48px">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="add">
                                                <img src="Public/Images/Outros/add.png" width="48px" height="48px">
                                            </div>                                    </td>
                                        <td class="text-center">
                                            <div class="add">
                                                <img src="Public/Images/Outros/add.png" width="48px" height="48px">
                                            </div>                                    </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="add">
                                                <img src="Public/Images/Outros/add.png" width="48px" height="48px">
                                            </div>                                    </td>
                                        <td class="text-center">
                                            <div class="add">
                                                <img src="Public/Images/Outros/add.png" width="48px" height="48px">
                                            </div>                                    </td>
                                        <td class="text-center">
                                            <div class="add">
                                                <img src="Public/Images/Outros/add.png" width="48px" height="48px">
                                            </div>                                    </td>
                                    </tr>
                                </table>
                            </div>

                            <!-- end::Nav pills --> 

                            <!-- begin::Tab Content -->
                            <div class="m-widget28__tab tab-content">
                                <div id="menu11" class="m-widget28__tab-container tab-pane active">
                                    <div class="m-widget28__tab-items">
                                        <div class="m-widget28__tab-item">
                                            <span>Descrição</span>
                                            <input class="form-control m-input" type="text" placeholder="Dê um nome (ex: Cesta tropical)" name="username" autocomplete="off">
                                        </div>
                                        <div class="m-widget28__tab-item">
                                            <span>Valor</span>
                                            <input class="form-control m-input" type="text" placeholder="Informe o valor" name="username" autocomplete="off">
                                        </div>
                                        <div class="m-widget28__tab-item">
                                            <span>Peso</span>
                                            <input class="form-control m-input" type="text" placeholder="Escolha os itens" name="peso" readonly="" autocomplete="off">
                                        </div>
                                    </div>					      	 		      	
                                </div>


                            </div>
                            <!-- end::Tab Content --> 	
                        </div>	

                    </div>
                </div>
            </div>
            <!--end:: Widgets/Blog-->


        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        let arraySelected = [];
        let count = 0;


        $("#grid_produtos").on("click", ".produto", function () {
            let item = $(this).find("div");
            if (count < 6) {
                if (item.hasClass("selected")) {
                    item.removeClass("selected");
                    count--;
                } else {
                    item.addClass("selected");
                    count++;
                }
            }
            if (count === 6) {
                $(".produto").each(function (i, v) {
                    let div = $(this).find("div");
                    if (!div.hasClass("selected")) {
                        div.addClass("greyscale");
                    }
                });
            } else {
                $(".produto").each(function (i, v) {
                    let div = $(this).find("div");
                    if (!div.hasClass("selected")) {
                        div.removeClass("greyscale");
                    }
                });
            }

        });
        $("#grid_produtos").on("click", "#finalizar", function () {
            loadingBar(true);
            $("#grid_produtos").fadeOut();
            $("#nova_cesta_table").load("cesta/carregar-selecionados", {produtos: arraySelected}, function () {
                loadingBar(false);
            });
        });

        $("#grid_produtos").on("click", "#confirmar", function () {

            arraySelected = [];
            $(".produto").each(function (i, v) {
                let div = $(this).find("div");
                if (div.hasClass("selected")) {
                    let src = $(this).find("img").attr("src");
                    arraySelected.push(src);
                }
            });
            if (arraySelected.length >= 3) {
                loadingBar(true);

                $('.produto').jAnimateOnce(['fadeOut'], function (self, effect) {
                    $("#grid_produtos").html("");
                    $("#grid_produtos").show();

                    $("#grid_produtos").load("cesta/detalhar-produtos-selecionados", {produtos: arraySelected}, function () {
                        loadingBar(false);

                    });

                });

            } else {
                swal("Escolha pelo menos 3 items");
            }
        });


        $("#nova_cesta_table").on("click", ".add", function () {
            $("#grid_produtos").show();
            loadingBar(true);
            $("#grid_produtos").load("cesta/carregar-grid-produtos", {}, function () {
                loadingBar(false);

            });
        });

        $("#gravar_cesta").on("click", function () {
            swal("Calma parcero, não fiz essa parte ainda...");
        });

    });

    function loadingBar(boolean) {
        if (boolean) {
            $("#topo").addClass("animate_bar");
        } else {
            $("#topo").removeClass("animate_bar");
        }
    }
</script>
