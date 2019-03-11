

<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li id="1" class="m-menu__section m-menu__section--first">
                <h4 class="m-menu__section-text ">Controle</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <?php if (APP::has_permissao(8)) { ?>
                <li class="m-menu__item " menu="1">
                    <a href="inicio" class="m-menu__link ">
                        <i class=" m-menu__link-icon  flaticon-presentation-1  "></i>
                        <span class="m-menu__link-text ">Início</span>
                    </a>
                </li>
            <?php } ?>
            <li class="m-menu__item " menu="1">
                <a href="producao/cadastro" class="m-menu__link ">
                    <i class=" m-menu__link-icon   flaticon-open-box   "></i>
                    <span class="m-menu__link-text ">Produção</span>
                </a>
            </li>

            <li id="2" class="m-menu__section m-menu__section--first">
                <h4 class="m-menu__section-text ">Usuários</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item " menu="2">
                <a href="usuarios/cadastro/coordenador" class="m-menu__link ">
                    <i class=" m-menu__link-icon flaticon-search-1  "></i>
                    <span class="m-menu__link-text "><s>Localizar usuário</s></span>
                </a>
            </li>
            <?php if (APP::has_permissao(11)) { ?>
                <li class="m-menu__item " menu="2">
                    <a href="usuarios/cadastro/coordenador" class="m-menu__link ">
                        <i class=" m-menu__link-icon flaticon-user-settings "></i>
                        <span class="m-menu__link-text ">Coordernadores</span>
                    </a>
                </li>
            <?php } ?>


            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon  flaticon-users "></i>
                    <span class="m-menu__link-text ">Técnicos</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu " style="display: none; overflow: hidden;"
                     m-hidden-height="80"><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <?php if (APP::has_permissao(12)) { ?>
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="usuarios/cadastro/tecnico" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span>
                                    </i><span class="m-menu__link-text">Novo técnico</span>
                                </a>
                            </li>
                        <?php } ?>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="usuarios/lista/tecnicos" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span>
                                </i><span class="m-menu__link-text">Técnicos disponíveis</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon  flaticon-avatar  "></i>
                    <span class="m-menu__link-text ">Agricultores</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu " style="display: none; overflow: hidden;"
                     m-hidden-height="80"><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <?php // if (APP::has_permissao(1)) { ?>
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="usuarios/cadastro/agricultor" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span>
                                    </i><span class="m-menu__link-text">Novo agricultor</span>
                                </a>
                            </li>
                        <?php // } ?>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="usuarios/lista/agricultores" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span>
                                </i><span class="m-menu__link-text">Lista de cadastrados</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="m-menu__item " menu="2">
                <a href="javascript:alert('Ainda não está pronto');" class="m-menu__link ">
                    <i class=" m-menu__link-icon flaticon-profile-1 "></i>
                    <span class="m-menu__link-text "><s>Empresas</s></span>
                </a>
            </li>
            <li class="m-menu__item " menu="2">
                <a href="javascript:alert('Ainda não está pronto');" class="m-menu__link ">
                    <i class=" m-menu__link-icon flaticon-buildings  "></i>
                    <span class="m-menu__link-text "><s>Filiados</s></span>
                </a>
            </li>

            <li id="3" class="m-menu__section m-menu__section--first">
                <h4 class="m-menu__section-text ">Sistema</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>



            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon  flaticon-paper-plane  "></i>
                    <span class="m-menu__link-text ">Rotas de acesso</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu " style="display: none; overflow: hidden;"
                     m-hidden-height="80"><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <?php if (APP::has_permissao(1)) { ?>
                            <li class="m-menu__item " aria-haspopup="true">
                                <a href="sistema/rotas-de-acesso/adicionar" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span>
                                    </i><span class="m-menu__link-text">Nova rota</span>
                                </a>
                            </li>
                        <?php } ?>

                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="sistema/rotas-de-acesso/lista" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span>
                                </i><span class="m-menu__link-text">Mostrar todas</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <?php if (APP::has_permissao(7)) { ?>

                <li class="m-menu__item " menu="3">
                    <a href="sistema/permissoes" class="m-menu__link ">
                        <i class=" m-menu__link-icon  flaticon-signs-2 "></i>
                        <span class="m-menu__link-text ">Permissões de acesso</span>
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
            if (items.length === 0) {
                section.hide();
            }
        });
    });
</script>

