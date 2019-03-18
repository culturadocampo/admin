

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
                            <?php if (APP::has_permissao(22)) { ?>
                                <li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-dark" m-dropdown-toggle="click">
                                    <a href="sistema/sessao" target="_blank" class="m-nav__link">
                                        <span class="m-topbar__userpic">
                                            VER SESSÃO
                                        </span>
                                    
                                    </a>
                                </li>
                            <?php } ?>
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
<!--                            <li class="m-nav__item m-topbar__quick-actions m-dropdown m-dropdown--skin-light m-dropdown--large m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width" m-dropdown-toggle="click" aria-expanded="true">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-nav__link-icon">
                                        <span class="m-nav__link-icon-wrapper"><i class="flaticon-share"></i></span>
                                        <span class="m-nav__link-badge m-badge m-badge--brand">5</span>
                                    </span>	
                                </a>
                                <div class="m-dropdown__wrapper" style="z-index: 101;">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 40.5px;"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center">
                                            <span class="m-dropdown__header-title">Quick Actions</span>
                                            <span class="m-dropdown__header-subtitle">Shortcuts</span>
                                        </div>
                                        <div class="m-dropdown__body m-dropdown__body--paddingless">
                                            <div class="m-dropdown__content">
                                                <div class="m-scrollable" data-scrollable="false" data-height="380" data-mobile-height="200">
                                                    <div class="m-nav-grid m-nav-grid--skin-light">
                                                        <div class="m-nav-grid__row">
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-file"></i>
                                                                <span class="m-nav-grid__text">Generate Report</span>
                                                            </a>
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-time"></i>
                                                                <span class="m-nav-grid__text">Add New Event</span>
                                                            </a>
                                                        </div>
                                                        <div class="m-nav-grid__row">
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-folder"></i>
                                                                <span class="m-nav-grid__text">Create New Task</span>
                                                            </a>
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-clipboard"></i>
                                                                <span class="m-nav-grid__text">Completed Tasks</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>-->

                            <li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-dark" m-dropdown-toggle="click">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-topbar__userpic">
                                        <?php echo strtoupper(SESSION::get_nome_usuario()); ?>
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

