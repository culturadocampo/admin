<footer class="m-grid__item m-footer ">
    <div class="m-container m-container--fluid m-container--full-height m-page__container">
        <div class="m-footer__wrapper">
            <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                    <span class="m-footer__copyright">
                        <?php echo date("Y"); ?> &copy; <span class="text-dark">Cultura do Campo </span> 
                        <span class="text-primary">[<?php echo SESSION::get_tipo_usuario(); ?>]</span>
                    </span>
                </div>
                <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
                    <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
                        <?php if (APP::has_permissao(37)) { ?>
                            <li class="m-nav__item">
                                <a href="http://culturadocampo.com.br/metronic/theme/classic/demos/default/" target="_blank" class="m-nav__link">
                                    <span class="m-nav__link-text">
                                        <u>Abrir tema</u>
                                    </span>
                                </a>
                            </li>
                        <?php } ?>

                        <li class="m-nav__item">
                            <a class="m-nav__link">
                                <span class="m-nav__link-text text-dark">
                                    <?php
                                    if (SESSION::get_id_tipo_usuario() == 3) {
                                        echo $_SESSION['nome_fantasia'];
                                    }
                                    ?>
                                </span>
                            </a>
                        </li>
                        <?php if (APP::has_permissao(33)) { ?>
                            <li class="m-nav__item">
                                <a class="m-nav__link">
                                    <span class="m-nav__link-text text-primary">
                                        <?php echo $rota['conteudo']; ?>
                                    </span>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="m-nav__item">
                            <a class="m-nav__link">
                                <span class="m-nav__link-text text-primary">
                                    U<?php echo SESSION::get_id_usuario(); ?>-T<?php echo SESSION::get_id_tipo_usuario(); ?>-R<?php echo $rota['id_rota']; ?>
                                </span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="javascript:alert('Suporte em desenvolvimento');" class="m-nav__link" data-toggle="m-tooltip" title="Suporte" data-placement="left">
                                <i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
