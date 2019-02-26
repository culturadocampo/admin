

<button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item m-aside-left  m-aside-left--skin-light ">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">


            <li id="1" class="m-menu__section m-menu__section--first">
                <h4 class="m-menu__section-text">Controle</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <?php if (APP::has_permissao(8)) { ?>
                <li class="m-menu__item " aria-haspopup="true" menu="1">
                    <a href="visao-area" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-suitcase"></i>
                        <span class="m-menu__link-text">Visão geral</span>
                    </a>
                </li>
            <?php } ?>


            <li id="2" class="m-menu__section m-menu__section--first">
                <h4 class="m-menu__section-text">Usuários</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <?php if (APP::has_permissao(11)) { ?>
                <li class="m-menu__item " menu="2">
                    <a href="usuarios/cadastro/coordenador" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-suitcase"></i>
                        <span class="m-menu__link-text">Coordernador</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (APP::has_permissao(12)) { ?>
                <li class="m-menu__item " menu="2">
                    <a href="usuarios/cadastro/tecnico" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-suitcase"></i>
                        <span class="m-menu__link-text">Técnicos</span>
                    </a>
                </li>
            <?php } ?>



            <li id="3" class="m-menu__section m-menu__section--first">
                <h4 class="m-menu__section-text">Sistema</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <?php if (APP::has_permissao(1)) { ?>

                <li class="m-menu__item " menu="3">
                    <a href="sistema/rotas-de-acesso/adicionar" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-suitcase"></i>
                        <span class="m-menu__link-text">Rotas de acesso</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (APP::has_permissao(7)) { ?>

                <li class="m-menu__item " menu="3">
                    <a href="sistema/permissoes" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-suitcase"></i>
                        <span class="m-menu__link-text">Permissões de acesso</span>
                    </a>
                </li>
            <?php } ?>

        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>

<script>
    $(document).ready(function () {
        $(".m-menu__section").each(function () {
            var section = $(this);
            var menu = section.attr("id");
            var items = $("li[menu=" + menu + "]");
            if (items.length == 0) {
                section.hide();
            }
        });
    });
</script>

