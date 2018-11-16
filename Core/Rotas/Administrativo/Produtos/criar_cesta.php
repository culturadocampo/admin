<?php
$o_produto = new Produto();

$array_produtos = $o_produto->select_produtos_com_imagens();
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<style>
    .draggable {
        z-index: 5;
        margin: 1rem;
    }

    .draggable img {
        width:128px; 
        height: auto;
    }

    .dropped {
        text-align: center;
        /*z-index: 999;*/
    }

    .dropped img {
        width:250px;
        height: auto;

    }

    ul {
        list-style-type: none;
    }
    .droppable{
        height: 250px;
        vertical-align: central;
    }

    .hint{
        line-height: 250px;
        text-align: center;
        color: rgba(255,255,255,0.6);
        font-size: 32px;
        font-weight: bold;
    }

    #cardboardbox .space {
        background: #cd9f61;
        border-style: dashed;
        border-width: 0.05rem;
        border-color: #ad8762;
    }

</style>
<div id="m_aside_left" class="m-grid__item m-aside-left " style="overflow: auto; height: 100px;">	

    <?php if ($array_produtos) { ?>

        <?php foreach ($array_produtos as $value) { ?>
            <div class="draggable text-center">
                <img class="img-fluid " id="<?php echo $value['ncm_codigo'] ?>" src="Public/Images/Produtos/<?php echo $value['imagem'] ?>" >
            </div>
        <?php } ?>

    <?php } ?>

</div>

<!--adicionar esta div em todas as rotas-->
<div class="m-grid__item m-grid__item--fluid m-wrapper" > 
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Criar cesta</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon flaticon-add"></i>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a class="m-nav__link">
                            <span class="m-nav__link-text">Produtos</span>
                        </a>
                    </li>


                </ul>
            </div>

        </div>
    </div>
    <div class="row m--margin-top-30" id="cardboardbox">
        <div class="col-md-8 offset--2" style="background: #fff;">
            <div class="row">
                <div class="col-md-4 space" style="">
                    <div class="droppable m--margin-15">
                        <div class="hint">
                            1

                        </div>
                    </div>
                </div>

                <div class="col-md-4 space" style="">
                    <div class=" droppable m--margin-15">
                        <div class="hint">
                            2
                        </div>
                    </div>
                </div>
                <div class="col-md-4 space" style="">
                    <div class=" droppable m--margin-15">
                        <div class="hint">
                            3
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 space" style="">
                    <div class=" droppable m--margin-15">
                        <div class="hint">
                            4
                        </div>
                    </div>
                </div>
                <div class="col-md-4 space" style="">
                    <div class=" droppable m--margin-15">
                        <div class="hint">
                            5
                        </div>
                    </div>
                </div>
                <div class="col-md-4 space" style="">
                    <div class=" droppable m--margin-15">
                        <div class="hint">
                            6
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m--margin-top-50">
        Quantidade de itens: 0
        <br>
        Preço sugerido: R$ 0,00
    </div>
</div>
<script>
    $(document).ready(function () {
        init();
        var main_height = $(".m-wrapper").height();
        $("#m_aside_left").css("height", main_height+60);


        if ($(".draggable").length > 0) {
            $(".droppable").droppable({
                drop: function (event, ui) {
                    var item = ui.draggable.clone();
                    item.removeClass('draggable');
                    item.addClass('dropped animated bounceIn');
                    $(this).addClass('').html(item);
                    init();
                }
            });
        }

        $(".draggable").dblclick(function () {
            var item = $(this).clone();


            $(".droppable").each(function (key, html) {

                var item_count = $(html).children(".dropped").length;
                if (item_count === 0) {
                    item.addClass('dropped animated bounceIn');
                    $(html).html(item);
                    return false;
                }
            });

        });



        function init() {
            if ($(".draggable").length > 0) {
                $(".draggable").draggable({
                    // snap: ".droppable",
                    // snapMode: "inner",
                    helper: "clone", // create "copy" with original properties, but not a true clone
                    cursor: "move",

                    revert: function (event, ui) {
                        $(this).data("ui-draggable").originalPosition = {
                            top: 0,
                            left: 0
                        };
                        return !event;
                    }
                });
            }

        }

    });
</script>