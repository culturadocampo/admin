<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>QuantumPro | UI Elements - Forms - Basic Inputs</title>
        <!-- ================== GOOGLE FONTS ==================-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">
        <!-- ======================= GLOBAL VENDOR STYLES ========================-->
        <link rel="stylesheet" href="UIKit/dist/assets/css/vendor/bootstrap.css">
        <link rel="stylesheet" href="UIKit/dist/assets/vendor/metismenu/dist/metisMenu.css">
        <link rel="stylesheet" href="UIKit/dist/assets/vendor/switchery-npm/index.css">
        <link rel="stylesheet" href="UIKit/dist/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
        <!-- ======================= LINE AWESOME ICONS ===========================-->
        <link rel="stylesheet" href="UIKit/dist/assets/css/icons/line-awesome.min.css">
        <!-- ======================= DRIP ICONS ===================================-->
        <link rel="stylesheet" href="UIKit/dist/assets/css/icons/dripicons.min.css">
        <!-- ======================= MATERIAL DESIGN ICONIC FONTS =================-->
        <link rel="stylesheet" href="UIKit/dist/assets/css/icons/material-design-iconic-font.min.css">
        <!-- ======================= GLOBAL COMMON STYLES ============================-->
        <link rel="stylesheet" href="UIKit/dist/assets/css/common/main.bundle.css">
        <!-- ======================= LAYOUT TYPE ===========================-->
        <link rel="stylesheet" href="UIKit/dist/assets/css/layouts/vertical/core/main.css">
        <!-- ======================= MENU TYPE ===========================================-->
        <link rel="stylesheet" href="UIKit/dist/assets/css/layouts/vertical/menu-type/content.css">
        <!-- ======================= THEME COLOR STYLES ===========================-->
        <link rel="stylesheet" href="UIKit/dist/assets/css/layouts/vertical/themes/theme-i.css">
    </head>
    <body class="content-menu">
        <!-- CONTENT WRAPPER -->
        <div id="app">
            <!-- TOP TOOLBAR WRAPPER -->
            <nav class="top-toolbar navbar navbar-mobile navbar-tablet">
                <ul class="navbar-nav nav-left">
                    <li class="nav-item">
                        <a href="javascript:void(0)" data-toggle-state="aside-left-open">
                            <i class="icon dripicons-align-left"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav nav-center site-logo">
                    <li>
                        <a href="index.html">
                            <div class="logo_mobile">
                                <svg id="logo_mobile" width="30" height="30" viewBox="0 0 54.03 56.55">
                                <defs>
                                <linearGradient id="logo_background_mobile_color">
                                <stop class="stop1" offset="0%"/>
                                <stop class="stop2" offset="50%"/>
                                <stop class="stop3" offset="100%"/>
                                </linearGradient>
                                </defs>
                                <path id="logo_path_mobile" class="cls-2" d="M90.32,0c14.2-.28,22.78,7.91,26.56,18.24a39.17,39.17,0,0,1,1,4.17l.13,1.5A15.25,15.25,0,0,1,118.1,29v.72l-.51,3.13a30.47,30.47,0,0,1-3.33,8,15.29,15.29,0,0,1-2.5,3.52l.06.07c.57.88,1.43,1.58,2,2.41,1.1,1.49,2.36,2.81,3.46,4.3.41.55,1,1,1.41,1.56.68.92,1.16,1.89.32,3.06-.08.12-.08.24-.19.33a2.39,2.39,0,0,1-2.62.07,4.09,4.09,0,0,1-.7-.91c-.63-.85-1.41-1.61-2-2.48-1-1.42-2.33-2.67-3.39-4.1a16.77,16.77,0,0,1-1.15-1.37c-.11,0-.06,0-.13.07-.41.14-.65.55-1,.78-.72.54-1.49,1.08-2.24,1.56A29.5,29.5,0,0,1,97.81,53c-.83.24-1.6.18-2.5.39a16.68,16.68,0,0,1-3.65.26H90.58L88,53.36A36.87,36.87,0,0,1,82.71,52a27.15,27.15,0,0,1-15.1-14.66c-.47-1.1-.7-2.17-1.09-3.39-1-3-1.45-8.86-.51-12.38a29,29,0,0,1,2.56-7.36c3.56-6,7.41-9.77,14.08-12.57a34.92,34.92,0,0,1,4.8-1.3Zm.13,4.1c-.45.27-1.66.11-2.24.26a32.65,32.65,0,0,0-4.74,1.37A23,23,0,0,0,71,18.7,24,24,0,0,0,71.13,35c2.78,6.66,7.2,11.06,14.21,13.42,1.16.39,2.52.59,3.84.91l1.47.07a7.08,7.08,0,0,0,2.43,0H94c.89-.21,1.9-.28,2.75-.46V48.8A7.6,7.6,0,0,1,95.19,47c-.78-1-1.83-1.92-2.62-3s-1.86-1.84-2.62-2.87c-2-2.7-4.45-5.1-6.66-7.62-.57-.66-1.14-1.32-1.66-2-.22-.29-.59-.51-.77-.85a2.26,2.26,0,0,1,.58-2.61,2.39,2.39,0,0,1,2.24-.2,4.7,4.7,0,0,1,1.22,1.3l.51.46c.5.68,1,1.32,1.6,2,2.07,2.37,4.38,4.62,6.27,7.17.94,1.26,2.19,2.3,3.14,3.58l1,1c.82,1.1,1.8,2,2.62,3.13.26.35.65.6.9,1A23.06,23.06,0,0,0,105,45c.37-.27,1-.51,1.15-1h-.06c-.18-.51-.73-.83-1-1.24-.74-1-1.64-1.88-2.37-2.87-1.8-2.44-3.89-4.6-5.7-7-.61-.82-1.44-1.52-2-2.34-.85-1.16-3.82-3.73-1.54-5.41a2.27,2.27,0,0,1,1.86-.26c.9.37,2.33,2.43,2.94,3.26s1.27,1.31,1.79,2c1.44,1.95,3.11,3.66,4.54,5.6.41.55,1,1,1.41,1.56.66.89,1.46,1.66,2.11,2.54.29.39.61,1.06,1.09,1.24.54-1,1.34-1.84,1.92-2.8a25.69,25.69,0,0,0,2.5-6.32c1.27-4.51.32-10.37-1.15-13.81A22.48,22.48,0,0,0,100.75,5.94a35.12,35.12,0,0,0-6.08-1.69A20.59,20.59,0,0,0,90.45,4.11Z" transform="translate(-65.5)" fill="url(#logo_background_mobile_color)"/>
                                </svg>
                            </div>
                            <h1 class="brand-text">QuantumPro</h1>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav nav-right">
                    <li class="nav-item">
                        <a href="javascript:void(0)" data-toggle-state="mobile-topbar-toggle">
                            <i class="icon dripicons-dots-3 rotate-90"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <nav class="top-toolbar navbar navbar-desktop flex-nowrap">
                <ul class="navbar-nav nav-left">
                    <li class="nav-item">
                        <a href="javascript:void(0)" data-toggle-state="content-menu-close">
                            <i class="icon dripicons-align-left"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-text dropdown dropdown-menu-md">
                        <a href="javascript:void(0)" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span>
                                Dropdown
                            </span>
                            <i class="la la-angle-down menu-arrow-down"></i>
                        </a>
                        <div class="dropdown-menu menu-icons dropdown-menu-left">
                            <div class="form-group form-filter">
                                <input type="text" placeholder="Filter location..." class="form-control filter-input" data-search-trigger="open">
                                <i data-q-action="clear-filter" class="icon dripicons-cross clear-filter"></i>
                                <ul class="list-reset filter-list" data-scroll="minimal-dark">
                                    <li><a class="dropdown-item" href="#">New York, N.Y.</a></li>
                                    <li><a class="dropdown-item" href="#">Los Angeles, Calif.</a></li>
                                    <li> <a class="dropdown-item" href="#">Chicago, Ill.</a></li>
                                    <li> <a class="dropdown-item" href="#">Houston, Tex.</a></li>
                                    <li> <a class="dropdown-item" href="#"> Philadelphia, Pa.</a></li>
                                    <li> <a class="dropdown-item" href="#">	Phoenix, Ariz. </a></li>
                                    <li> <a class="dropdown-item" href="#"> San Antonio, Tex.</a></li>
                                    <li> <a class="dropdown-item" href="#">San Diego, Calif. </a></li>
                                    <li> <a class="dropdown-item" href="#"> Dallas, Tex.</a></li>
                                    <li> <a class="dropdown-item" href="#">San Jose, Calif. </a></li>
                                    <li> <a class="dropdown-item" href="#"> Austin, Tex.</a></li>
                                    <li> <a class="dropdown-item" href="#"> Jacksonville, Fla.</a></li>
                                    <li> <a class="dropdown-item" href="#">San Francisco, Calif. </a></li>
                                    <li> <a class="dropdown-item" href="#">Indianapolis, Ind. </a></li>
                                    <li> <a class="dropdown-item" href="#"> Columbus, Ohio</a></li>
                                    <li> <a class="dropdown-item" href="#">Fort Worth, Tex. </a></li>
                                    <li> <a class="dropdown-item" href="#"> Charlotte, N.C.</a></li>
                                    <li> <a class="dropdown-item" href="#"> Detroit, Mich.</a></li>
                                    <li> <a class="dropdown-item" href="#">El Paso, Tex. </a></li>
                                    <li> <a class="dropdown-item" href="#">Seattle, Wash.</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                 
                </ul>
                <ul class="site-logo">
                    <li>
                        <!-- START LOGO -->
                        <a href="index.html">
                            <div class="logo">
                                <svg id="logo" width="25" height="25" viewBox="0 0 54.03 56.55">
                                <defs>
                                <linearGradient id="logo_background_color">
                                <stop class="stop1" offset="30%"/>
                                <stop class="stop2" offset="80%"/>
                                <stop class="stop3" offset="100%"/>
                                </linearGradient>
                                </defs>
                                <path id="logo_path" class="cls-2" d="M90.32,0c14.2-.28,22.78,7.91,26.56,18.24a39.17,39.17,0,0,1,1,4.17l.13,1.5A15.25,15.25,0,0,1,118.1,29v.72l-.51,3.13a30.47,30.47,0,0,1-3.33,8,15.29,15.29,0,0,1-2.5,3.52l.06.07c.57.88,1.43,1.58,2,2.41,1.1,1.49,2.36,2.81,3.46,4.3.41.55,1,1,1.41,1.56.68.92,1.16,1.89.32,3.06-.08.12-.08.24-.19.33a2.39,2.39,0,0,1-2.62.07,4.09,4.09,0,0,1-.7-.91c-.63-.85-1.41-1.61-2-2.48-1-1.42-2.33-2.67-3.39-4.1a16.77,16.77,0,0,1-1.15-1.37c-.11,0-.06,0-.13.07-.41.14-.65.55-1,.78-.72.54-1.49,1.08-2.24,1.56A29.5,29.5,0,0,1,97.81,53c-.83.24-1.6.18-2.5.39a16.68,16.68,0,0,1-3.65.26H90.58L88,53.36A36.87,36.87,0,0,1,82.71,52a27.15,27.15,0,0,1-15.1-14.66c-.47-1.1-.7-2.17-1.09-3.39-1-3-1.45-8.86-.51-12.38a29,29,0,0,1,2.56-7.36c3.56-6,7.41-9.77,14.08-12.57a34.92,34.92,0,0,1,4.8-1.3Zm.13,4.1c-.45.27-1.66.11-2.24.26a32.65,32.65,0,0,0-4.74,1.37A23,23,0,0,0,71,18.7,24,24,0,0,0,71.13,35c2.78,6.66,7.2,11.06,14.21,13.42,1.16.39,2.52.59,3.84.91l1.47.07a7.08,7.08,0,0,0,2.43,0H94c.89-.21,1.9-.28,2.75-.46V48.8A7.6,7.6,0,0,1,95.19,47c-.78-1-1.83-1.92-2.62-3s-1.86-1.84-2.62-2.87c-2-2.7-4.45-5.1-6.66-7.62-.57-.66-1.14-1.32-1.66-2-.22-.29-.59-.51-.77-.85a2.26,2.26,0,0,1,.58-2.61,2.39,2.39,0,0,1,2.24-.2,4.7,4.7,0,0,1,1.22,1.3l.51.46c.5.68,1,1.32,1.6,2,2.07,2.37,4.38,4.62,6.27,7.17.94,1.26,2.19,2.3,3.14,3.58l1,1c.82,1.1,1.8,2,2.62,3.13.26.35.65.6.9,1A23.06,23.06,0,0,0,105,45c.37-.27,1-.51,1.15-1h-.06c-.18-.51-.73-.83-1-1.24-.74-1-1.64-1.88-2.37-2.87-1.8-2.44-3.89-4.6-5.7-7-.61-.82-1.44-1.52-2-2.34-.85-1.16-3.82-3.73-1.54-5.41a2.27,2.27,0,0,1,1.86-.26c.9.37,2.33,2.43,2.94,3.26s1.27,1.31,1.79,2c1.44,1.95,3.11,3.66,4.54,5.6.41.55,1,1,1.41,1.56.66.89,1.46,1.66,2.11,2.54.29.39.61,1.06,1.09,1.24.54-1,1.34-1.84,1.92-2.8a25.69,25.69,0,0,0,2.5-6.32c1.27-4.51.32-10.37-1.15-13.81A22.48,22.48,0,0,0,100.75,5.94a35.12,35.12,0,0,0-6.08-1.69A20.59,20.59,0,0,0,90.45,4.11Z" transform="translate(-65.5)" fill="url(#logo_background_color)"/>
                                </svg>
                            </div>
                            <h1 class="brand-text">Cultura do Campo</h1>
                        </a>
                        <!-- END LOGO -->
                    </li>
                </ul>
                <ul class="navbar-nav nav-right">
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="open-search-button" data-q-action="open-site-search">
                            <i class="icon dripicons-search"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-menu-lg">
                        <a href="javascript:void(0)" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="icon dripicons-view-apps"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right p-0">
                            <div class="dropdown-menu-grid">
                                <div class="menu-grid-row">
                                    <div><a class="dropdown-item  border-bottom border-right" href="apps.mail.html"><i class="icon dripicons-mail"></i><span>Mail</span></a></div>
                                    <div><a class="dropdown-item  border-bottom" href="apps.messages.html"><i class="icon dripicons-message"></i><span>Messages</span></a></div>
                                </div>
                                <div class="menu-grid-row">
                                    <div><a class="dropdown-item  border-right" href="apps.contacts.html"><i class="icon dripicons-archive"></i><span>Contacts</span></a></div>
                                    <div> <a class="dropdown-item" href="apps.calendar.html"><i class="icon dripicons-calendar"></i><span>Calendar</span></a></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-notifications dropdown-menu-lg">
                        <a href="javascript:void(0)" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="UIKit/dist/assets/img/avatars/1.jpg" class="w-35 rounded-circle" alt="Albert Einstein">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-accout">
                            <div class="dropdown-header pb-3">
                                <div class="media d-user">
                                    <img class="align-self-center mr-3 w-40 rounded-circle" src="UIKit/dist/assets/img/avatars/1.jpg" alt="Albert Einstein">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-0">Albert Einstein</h5>
                                        <span>support@authenticgoods.co</span>
                                    </div>
                                </div>
                            </div>
                            <a class="dropdown-item" href="apps.messages.html"><i class="icon dripicons-mail"></i> Message <span class="badge badge-accent rounded-circle w-15 h-15 p-0 font-size-10">4</span></a>
                            <a class="dropdown-item" href="pages.profile.html"><i class="icon dripicons-user"></i> Profile</a>
                            <a class="dropdown-item" href="pages.my-account.html"><i class="icon dripicons-gear"></i> Account Settings </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="icon dripicons-lock"></i> Lock Account</a>
                            <a class="dropdown-item" href="auth.sign-in.html"><i class="icon dripicons-lock-open"></i> Sign Out</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" data-toggle-state="aside-right-open">
                            <i class="icon dripicons-align-right"></i>
                        </a>
                    </li>
                </ul>
                <form role="search" action="pages.search.html" class="navbar-form">
                    <div class="form-group">
                        <input type="text" placeholder="Search and press enter..." class="form-control navbar-search" autocomplete="off">
                        <i data-q-action="close-site-search" class="icon dripicons-cross close-search"></i>
                    </div>
                    <button type="submit" class="d-none">Submit</button>
                </form>
            </nav>
            <!-- END TOP TOOLBAR WRAPPER -->
            <div class="content-wrapper">
                <!-- MENU SIDEBAR WRAPPER -->
                <aside class="sidebar sidebar-left">
                    <div class="sidebar-content">
                        <nav class="main-menu">
                            <ul class="nav metismenu">
                                <li class="sidebar-header"><span>NAVIGATION</span></li>
                                <li class="nav-dropdown">
                                    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon dripicons-meter"></i><span>Dashboard</span></a>
                                    <ul class="collapse nav-sub" aria-expanded="true">
                                        <li><a href="index.html"><span>Default</span></a></li>
                                        <li><a href="dashboard.analytics.html"><span>Analytics</span></a></li>
                                        <li><a href="dashboard.financials.html"><span>Financials</span></a></li>
                                        <li><a href="dashboard.ecommerce.html"><span>Ecommerce</span></a></li>
                                    </ul>
                                </li>
                                <li class="nav-dropdown active">
                                    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon dripicons-article"></i><span>Page Layouts</span></a>
                                    <ul class="collapse in nav-sub" aria-expanded="false">
                                        <li class="active"><a href="layout.blank.html"><span>Blank Page</span></a></li>
                                        <li><a href="layout.1-column-wide.html"><span>1 Column Wide</span></a></li>
                                        <li><a href="layout.1-column-boxed.html"><span>1 Column Boxed</span></a></li>
                                        <li><a href="layout.tabbed-header.html"><span>Tabbed Header</span></a></li>
                                        <li><a href="layout.left-sidebar.html"><span>Left Sidebar</span></a></li>
                                        <li><a href="layout.right-sidebar.html"><span>Right Sidebar</span></a></li>
                                        <li><a href="layout.left-right-sidebars.html"><span>Left &amp; Right Sidebars</span></a></li>
                                    </ul>
                                </li>
                                <li class="nav-dropdown">
                                    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon dripicons-browser"></i><span>Custom Pages</span></a>
                                    <ul class="collapse nav-sub" aria-expanded="false">
                                        <li><a href="pages.profile.html"><span>Profile</span></a></li>
                                        <li><a href="pages.help-center.html"><span>Help Center</span></a></li>
                                        <li><a href="pages.search.html"><span>Search</span></a></li>
                                        <li><a href="pages.pricing-tables.html"><span>Pricing Tables</span></a></li>
                                        <li><a href="pages.my-account.html"><span>My Account</span></a></li><li><a href="pages.invoice-template.html"><span>Invoice Template</span></a></li>
                                    </ul>
                                </li>
                                <li class="nav-dropdown">
                                    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon dripicons-view-thumb"></i><span>Cards</span></a>
                                    <ul class="collapse nav-sub">
                                        <li><a href="cards.basic-content-types.html"><span>Content Types</span></a></li>
                                        <li><a href="cards.basic-layouts.html"><span>Layouts</span></a></li>
                                        <li><a href="cards.basic-navigation.html"><span>Navigation</span></a></li>
                                        <li><a href="cards.basic-actions.html"><span>Actions</span></a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-header"><span>UI ELEMENTS</span></li>
                                <li class="nav-dropdown">
                                    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon dripicons-jewel"></i><span>UI Kit</span></a>
                                    <ul class="collapse nav-sub" aria-expanded="false">
                                        <li><a href="ui.alerts.html"><span>Alerts</span></a></li>
                                        <li><a href="ui.badges.html"><span>Badges</span></a></li>
                                        <li><a href="ui.buttons.html"><span>Buttons</span></a></li>
                                        <li><a href="ui.colors.html"><span>Colors</span></a></li>
                                        <li><a href="ui.icons.html"><span>Icons</span></a></li>
                                        <li><a href="ui.list-groups.html"><span>List Groups</span></a></li>
                                        <li><a href="ui.progress-bars.html"><span>Progress Bars</span></a></li>
                                        <li><a href="ui.preloaders.html"><span>Preloaders</span></a></li>
                                        <li><a href="ui.typography.html"><span>Typography</span></a></li>
                                    </ul>
                                </li>
                                <li class="nav-dropdown">
                                    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon dripicons-stack"></i><span>Components</span></a>
                                    <ul class="collapse nav-sub" aria-expanded="false">

                                        <li><a href="components.carousels.html"><span>Carousels</span></a></li>
                                        <li><a href="components.tabs-pills.html"><span>Tabs &amp; Pills</span></a></li>
                                        <li><a href="components.dropdowns.html"><span>Dropdowns</span></a></li>
                                        <li><a href="components.modals.html"><span>Modals</span></a></li>
                                        <li><a href="components.sweetalert2.html"><span>SweetAlert2</span></a></li>
                                        <li><a href="components.scrollable.html"><span>Scrollable</span></a></li>
                                        <li><a href="components.tooltips-popovers.html"><span>Tooltips &amp; Popovers</span></a></li>
                                        <li><a href="components.ui-blocking.html"><span>UI Blocking</span></a></li>
                                    </ul>
                                </li>
                                <li class="nav-dropdown">
                                    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon dripicons-graph-bar"></i><span>Charts</span></a>
                                    <ul class="collapse nav-sub" aria-expanded="false">
                                        <li><a href="charts.chartjs.html"><span>Chart.js</span></a></li>
                                        <li><a href="charts.c3charts.html"><span>C3 Charts</span></a></li>
                                        <li><a href="charts.morrisjs.html"><span>Morris.js</span></a></li>
                                        <li><a href="charts.chartist.html"><span>Chartist</span></a></li>
                                    </ul>
                                </li>
                                <li class="nav-dropdown">
                                    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon dripicons-to-do"></i><span>Forms</span></a>
                                    <ul class="collapse nav-sub">
                                        <li class="nav-dropdown">
                                            <a class="has-arrow" href="#">Basic Elements</a>
                                            <ul class="collapse nav-sub">
                                                <li><a href="forms.basic-inputs.html"><span>Basic Inputs</span></a></li>
                                                <li><a href="forms.checkbox-radio.html"><span>Checkbox &amp; Radio</span></a></li>
                                                <li><a href="forms.input-groups.html"><span>Input Groups</span></a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-dropdown">
                                            <a class="has-arrow" href="#">Form Layouts</a>
                                            <ul class="collapse nav-sub">
                                                <li><a href="forms.form-groups.html"><span>Form Groups</span></a></li>
                                                <li><a href="forms.form-grid.html"><span>Form Grid</span></a></li>

                                            </ul>
                                        </li>
                                        <li class="nav-dropdown">
                                            <a class="has-arrow" href="#">Advanced Elements</a>
                                            <ul class="collapse nav-sub">
                                                <li><a href="forms.input-mask.html"><span>Input Mask</span></a></li>
                                                <li><a href="forms.select2.html"><span>Select2</span></a></li>
                                                <li><a href="forms.range-sliders.html"><span>Range Sliders</span></a></li>
                                                <li><a href="forms.switches.html"><span>Switches</span></a></li>
                                                <li><a href="forms.date-pickers.html"><span>Date Pickers</span></a></li>
                                                <li><a href="forms.dropzone.html"><span>Dropzone</span></a></li> <li><a href="forms.wysiwyg.html"><span>WYSIWYG</span></a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-dropdown">
                                            <a class="has-arrow" href="#">Form Validation</a>
                                            <ul class="collapse nav-sub">
                                                <li><a href="forms.basic-validation.html"><span>Basic Validation</span></a></li>
                                                <li><a href="forms.jquery-validation.html"><span>jQuery Validation</span></a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-dropdown">
                                            <a class="has-arrow" href="#">Form Wizards</a>
                                            <ul class="collapse nav-sub">
                                                <li><a href="forms.vertical-wizard.html"><span>Vertical Wizard</span></a></li>
                                                <li><a href="forms.horizontal-wizard.html"><span>Horizontal Wizard</span></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-dropdown">
                                    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon dripicons-blog"></i><span>Tables</span></a>
                                    <ul class="collapse nav-sub" aria-expanded="false">
                                        <li><a href="tables.basic.html"><span>Basic Tables</span></a></li>
                                        <li><a href="tables.data.html"><span>Data Tables</span></a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-header"><span>APP VIEWS</span></li>
                                <li><a href="apps.mail.html"><i class="icon dripicons-mail"></i><span>Mail</span></a></li>
                                <li><a href="apps.messages.html"><i class="icon dripicons-message"></i><span>Messages</span></a></li>
                                <li><a href="apps.contacts.html"><i class="icon dripicons-archive"></i><span>Contacts</span></a></li>
                                <li><a href="apps.calendar.html"><i class="icon dripicons-calendar"></i><span>Calendar</span></a></li>
                                <li class="sidebar-header"><span>EXTRAS</span></li>
                                <li class="nav-dropdown">
                                    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon dripicons-lock"></i><span>Authentication</span></a>
                                    <ul class="collapse nav-sub" aria-expanded="false">
                                        <li><a href="auth.sign-in.html"><span>Sign In</span></a></li>
                                        <li><a href="auth.register.html"><span>Register</span></a></li>
                                        <li><a href="auth.forgot-password.html"><span>Forgot Password</span></a></li>
                                    </ul>
                                </li>
                                <li class="nav-dropdown">
                                    <a class="has-arrow" href="#" aria-expanded="false">
                                        <i class="icon dripicons-folder"></i><span>Menu Levels</span></a>
                                    <ul class="collapse nav-sub" aria-expanded="false">
                                        <li>
                                            <a href="javascript:;">
                                                Level 1.1
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                Level 1.2
                                            </a>
                                        </li>
                                        <li class="nav-dropdown">
                                            <a class="has-arrow" href="#" aria-expanded="false">
                                                Level 1.3
                                            </a>
                                            <ul class="collapse nav-sub" aria-expanded="false">
                                                <li>
                                                    <a href="javascript:;">
                                                        Level 2.1
                                                    </a>
                                                </li>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            </li>
                            <li><a href="helper-classes.html"><i class="icon dripicons-help"></i><span>Helper Classes</span></a></li>
                            </ul>
                    </div>
                </aside>
                <!-- END MENU SIDEBAR WRAPPER -->

                <div class="content container-fluid">
                   <?php include $content;?>
                </div>
                <!-- SIDEBAR QUICK PANNEL WRAPPER -->
                <aside class="sidebar sidebar-right">
                    <div class="sidebar-content">
                        <div class="tab-panel m-b-30" id="sidebar-tabs">
                            <ul class="nav nav-tabs primary-tabs">
                                <li class="nav-item" role="presentation"><a href="#sidebar-settings" class="nav-link active show" data-toggle="tab" aria-expanded="true">Settings</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fadeIn active" id="sidebar-settings">
                                    <div class="sidebar-settings-wrapper">
                                        <h5 class="m-t-30 m-b-20">Colors with dark sidebar</h5>
                                        <div class="row m-0">
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-a.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-a.css">
                                                        <input type="radio" name="setting-theme" checked="checked">
                                                        <span class="icon-check dark"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-dark"></span>
                                                            <span class="color bg-theme-a"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-b.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-b.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-dark"></span>
                                                            <span class="color bg-theme-b"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-c.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-c.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-dark"></span>
                                                            <span class="color bg-theme-c"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-d.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-d.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-dark"></span>
                                                            <span class="color bg-theme-d"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-e.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-e.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-dark"></span>
                                                            <span class="color bg-theme-e"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-f.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-f.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-dark"></span>
                                                            <span class="color bg-theme-f"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-g.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-g.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-dark"></span>
                                                            <span class="color bg-theme-g"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-h.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-h.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-dark"></span>
                                                            <span class="color bg-theme-h"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="m-t-30 m-b-20">Colors with light sidebar</h5>
                                        <div class="row m-0">
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-i.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-i.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-light"></span>
                                                            <span class="color bg-menu-dark"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-j.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-j.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-light"></span>
                                                            <span class="color bg-theme-j"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-k.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-k.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-light"></span>
                                                            <span class="color bg-theme-k"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-l.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-l.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-light"></span>
                                                            <span class="color bg-theme-l"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-m.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-m.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-light"></span>
                                                            <span class="color bg-theme-m"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-n.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-n.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-light"></span>
                                                            <span class="color bg-theme-n"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-o.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-o.css">
                                                        <input type="radio" name="setting-theme">
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-light"></span>
                                                            <span class="color bg-theme-o"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-5 m-b-10">
                                                <div class="color-option-check">
                                                    <h6 class="title text-center">theme-p.css</h6><label data-load-css="UIKit/dist/assets/css/layouts/vertical/themes/theme-p.css">
                                                        <input type="radio" name="setting-theme" />
                                                        <span class="icon-check"></span>
                                                        <span class="split">
                                                            <span class="color bg-menu-light"></span>
                                                            <span class="color bg-theme-p"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="m-t-30 m-b-20">Layouts</h5>
                                        <ul class="list-reset">
                                            <li>
                                                <div class="custom-control custom-radio radio-primary form-check">
                                                    <input type="radio" id="layoutStatic" name="layoutMode" class="custom-control-input" checked="checked" value="">
                                                    <label class="custom-control-label" for="layoutStatic">Static Layout</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio radio-primary form-check">
                                                    <input type="radio" id="layoutFixed" name="layoutMode" class="custom-control-input" value="layout-fixed">
                                                    <label class="custom-control-label" for="layoutFixed">Fixed Layout</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                      
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- END SIDEBAR QUICK PANNEL WRAPPER -->
            </div>
        </div>
        <!-- END CONTENT WRAPPER -->
        <!-- ================== GLOBAL VENDOR SCRIPTS ==================-->
        <script src="UIKit/dist/assets/vendor/modernizr/modernizr.custom.js"></script>
        <script src="UIKit/dist/assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="UIKit/dist/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="UIKit/dist/assets/vendor/js-storage/js.storage.js"></script>
        <script src="UIKit/dist/assets/vendor/js-cookie/src/js.cookie.js"></script>
        <script src="UIKit/dist/assets/vendor/pace/pace.js"></script>
        <script src="UIKit/dist/assets/vendor/metismenu/dist/metisMenu.js"></script>
        <script src="UIKit/dist/assets/vendor/switchery-npm/index.js"></script>
        <script src="UIKit/dist/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- ================== GLOBAL APP SCRIPTS ==================-->
        <script src="UIKit/dist/assets/js/global/app.js"></script>
    </body>
</html>