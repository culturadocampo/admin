<div class="header-top">
    <!-- START MOBILE MENU TRIGGER -->
    <ul class="mobile-only navbar-nav nav-left">
        <li class="nav-item">
            <a href="javascript:void(0)" data-toggle-state="aside-left-open">
                <i class="icon dripicons-align-left"></i>
            </a>
        </li>
    </ul>
    <!-- END MOBILE MENU TRIGGER -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <ul class="site-logo">
                    <li>
                        <!-- START LOGO -->
                        <a href="index.html">
                            <div class="logo">
                                <a href="./"> <img src="Public/Images/logo_cc2.png" class="animated bounceIn m-r-15" style="width: auto; height: 60px;"></a>

                            </div>
                            <h1 class="brand-text m-l-30">Cultura do Campo</h1>
                        </a>
                        <!-- END LOGO -->
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <!-- START TOP TOOLBAR WRAPPER -->
                <div class="top-toolbar-wrapper">
                    <nav class="top-toolbar navbar flex-nowrap">
                        <ul class="navbar-nav nav-right">



                            <?php if (APP::is_logged()) { ?>
                                <li class="nav-item nav-text dropdown dropdown-menu-md">
                                    <a href="javascript:void(0)" data-toggle="dropdown" role="button" aria-haspopup="true">
                                        <span>
                                            <?php echo STRINGS::proper_case($_SESSION['nome']); ?>
                                        </span>
                                        <i class="la la-angle-down menu-arrow-down"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-accout">
                                        <a class="dropdown-item" href="cadastrar-vendedor"><i class="la la-truck m-r-10"></i> Sou um produtor</a>
                                        <a class="dropdown-item" href="#"><i class="la la-user m-r-10"></i> Perfil</a>
                                        <a class="dropdown-item" href="#"><i class="la la-cog m-r-10"></i> Configurações</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="executa-logout"><i class="la la-lock m-r-10"></i> Sair</a>
                                    </div>
                                </li>
                            <?php } else { ?>

                                <li class="nav-item nav-text m-t-5 m-r-10">
                                    <a href="novo-usuario">
                                        <span class="text-white">
                                            Crie sua conta 
                                        </span>
                                    </a>

                                </li>
                                <li class="nav-item nav-text m-t-5 m-r-10" style="padding: 0px;">
                                    <a>
                                        <span class="text-white">
                                            |
                                        </span>
                                    </a>

                                </li>
                                <li class="nav-item nav-text m-t-5 m-r-10">
                                    <a href="login">
                                        <span class="text-white">
                                            Acessar conta 
                                        </span>
                                    </a>

                                </li>
                            <?php } ?>



                            <li class="nav-item">
                                <a href="javascript:void(0)" id="button-search" class="button button--search">
                                    <i class="icon dripicons-search"></i>
                                </a>
                            </li>

                            <li class="nav-item dropdown dropdown-notifications dropdown-menu-lg">
                                <a href="javascript:void(0)" data-toggle="dropdown" role="button" aria-haspopup="true">
                                    <i class="icon dripicons-bell"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="card card-notification">
                                        <div class="card-header">
                                            <h5 class="card-title">Notifications</h5>
                                            <ul class="actions top-right">
                                                <li>
                                                    <a href="javascript:void(0);" data-q-action="open-notifi-config">
                                                        <i class="icon dripicons-gear"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-container-wrapper">
                                                <div class="card-container">
                                                    <div class="timeline timeline-border">
                                                        <div class="timeline-list">
                                                            <div class="timeline-info">
                                                                <div>Prep for bi-weekly meeting with <a href="javascript:void(0)"><strong>Steven Weinberg</strong></a> </div>
                                                                <small class="text-muted">07/05/18, 2:00 PM</small>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-list timeline-border timeline-primary">
                                                            <div class="timeline-info">
                                                                <div>Skype call with development team</div>
                                                                <small class="text-muted">07/07/18, 1:00 PM</small>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-list  timeline-border timeline-accent">
                                                            <div class="timeline-info">
                                                                <div>Programming control system</div>
                                                                <small class="text-muted">07/09/18, 10:00 AM - 6:00 PM</small>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-list  timeline-border timeline-success">
                                                            <div class="timeline-info">
                                                                <div>Lunch with Peter Higgs</div>
                                                                <small class="text-muted">07/10/18, 12:00 PM</small>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-list  timeline-border timeline-warning">
                                                            <div class="timeline-info">
                                                                <div><a href="#"><strong>Approve Request</strong></a> for new training material by</div>
                                                                <small class="text-muted">07/11/18, 9:00 AM</small>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-list  timeline-border timeline-info">
                                                            <div class="timeline-info">
                                                                <div><a href="#"><strong>RSVP</strong></a> for this year's hackathon.</div>
                                                                <small class="text-muted">07/11/18, 1:30 PM</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-container">
                                                    <h6 class="p-0 m-0">
                                                        Show notifications from:
                                                    </h6>
                                                    <div class="row m-b-20 m-t-30">
                                                        <div class="col-10"><span class="title"><i class="icon dripicons-calendar"></i>Calendar</span></div>
                                                        <div class="col-2"><input type="checkbox" class="js-switch" checked /></div>
                                                    </div>
                                                    <div class="row m-b-20">
                                                        <div class="col-10"><span class="title"><i class="icon dripicons-mail"></i>Email</span></div>
                                                        <div class="col-2"><input type="checkbox" class="js-switch" checked/></div>
                                                    </div>
                                                    <div class="row m-b-20">
                                                        <div class="col-10"><span class="title"><i class="icon dripicons-message"></i>Messages</span></div>
                                                        <div class="col-2"><input type="checkbox" class="js-switch" /></div>
                                                    </div>
                                                    <div class="row m-b-20">
                                                        <div class="col-10"><span class="title"><i class="icon dripicons-stack"></i>Projects</span></div>
                                                        <div class="col-2"><input type="checkbox" class="js-switch" checked/></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <li class="nav-item">
                                <a href="javascript:void(0)" data-toggle-state="aside-right-open">
                                    <i class="icon dripicons-align-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- END TOP TOOLBAR WRAPPER -->
            </div>
        </div>
    </div>
    <!-- START MOBILE TOOLBAR TRIGGER -->
    <ul class="mobile-only navbar-nav nav-right">
        <li class="nav-item">
            <a href="javascript:void(0)" data-toggle-state="mobile-topbar-toggle">
                <i class="icon dripicons-dots-3 rotate-90"></i>
            </a>
        </li>
    </ul>
    <!-- END MOBILE TOOLBAR TRIGGER -->
</div>