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
                        <li class="m-nav__item">
                            <a class="m-nav__link">
                                <span class="m-nav__link-text text-primary">U<?php echo SESSION::get_id_usuario(); ?>-R<?php echo $rota['id_rota']; ?>-T<?php echo SESSION::get_id_tipo_usuario(); ?></span>
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
