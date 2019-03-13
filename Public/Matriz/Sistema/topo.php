

<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">


    <div class="m-container m-container--fluid m-container--full-height">
        <div class="m-stack m-stack--ver m-stack--desktop">		
            <!-- BEGIN: Brand -->
            <div class="m-stack__item m-brand  m-brand--skin-dark ">
                <div class="m-stack m-stack--ver m-stack--general m-stack--fluid">
                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
                        <a href="visao-aerea" class="m-brand__logo-wrapper">
                            <img alt="" src="Public/Images/Logo/horizontal_logo.png" style="width: auto; height: 48px;">

                        </a>  
                    </div>
                    <div class="m-stack__item m-stack__item--middle m-brand__tools">
                        <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>

                    </div>
                </div>

            </div>
            <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                <!-- BEGIN: Topbar -->
                <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">


                    <div class="m-stack__item m-topbar__nav-wrapper">
                        <ul class="m-topbar__nav m-nav m-nav--inline">

                         
                               <li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-dark" m-dropdown-toggle="click">
                                <a class="m-nav__link m-dropdown__toggle">
                                    <span class="m-topbar__userpic">
                                        U<?php echo SESSION::get_id_usuario(); ?>T<?php echo SESSION::get_id_tipo_usuario(); ?>R<?php echo $rota['id_rota']; ?>
                                    </span>
                                    <span class="m-nav__link-icon m-topbar__usericon  m--hide">
                                        <span class="m-nav__link-icon-wrapper"><i class="flaticon-user-ok"></i></span>
                                    </span>
                                    <span class="m-topbar__username m--hide">Nick</span>					
                                </a>
                               </li>

                            <li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-dark" m-dropdown-toggle="click">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-topbar__userpic">
                                        <?php echo mb_strtoupper(SESSION::get_nome_usuario()); ?>
                                    </span>
                                    <span class="m-nav__link-icon m-topbar__usericon  m--hide">
                                        <span class="m-nav__link-icon-wrapper"><i class="flaticon-user-ok"></i></span>
                                    </span>
                                    <span class="m-topbar__username m--hide">Nick</span>					
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center">
                                            <div class="m-card-user m-card-user--skin-dark">
                                                <div class="m-card-user__pic">
                                                    <img src="Public/Images/Outros/avatar.png" class="m--img-rounded m--marginless" alt="">
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name m--font-weight-500"><?php echo SESSION::get_nome_usuario(); ?></span>
                                                    <a href="" class="m-card-user__email m--font-weight-300 m-link"><?php echo SESSION::get_tipo_usuario(); ?> #<?php echo SESSION::get_id_usuario(); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav m-nav--skin-dark">
                                                    <li class="m-nav__section m--hide">
                                                        <span class="m-nav__section-text">Section</span>
                                                    </li>
                                                    <?php if (APP::has_permissao(6)) { ?>
                                                        <li class="m-nav__item">
                                                            <a href="usuario/perfil" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                <span class="m-nav__link-title">  
                                                                    <span class="m-nav__link-wrap">      
                                                                        <span class="m-nav__link-text">Meu perfil</span>      
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                    <li class="m-nav__item">
                                                        <a href="logout" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-logout"></i>
                                                            <span class="m-nav__link-title">  
                                                                <span class="m-nav__link-wrap">      
                                                                    <span class="m-nav__link-text">Sair do sistema</span>      
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                </div>
                <!-- END: Topbar -->			</div>

        </div>
    </div>
</header>

