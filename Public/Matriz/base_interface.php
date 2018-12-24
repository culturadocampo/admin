<!DOCTYPE html>
<html>
    <head>
        <?php if ($_SERVER['HTTP_HOST'] == "localhost") { ?>
            <base href="http://localhost/pro_campo/">
        <?php } else { ?>
            <base href="http://<?php echo $_SERVER['HTTP_HOST']; ?>">
        <?php } ?>

        <meta charset="utf-8" />
        <title><?php echo PROJECT_NAME; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

        <link rel="shortcut icon" href="Public/Images/Logo/logo_modern2.png" />
        <link href="Public/Vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="Public/Styles/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="Public/Styles/datatables.bundle.css" rel="stylesheet" type="text/css" />
        <link href="Public/Styles/custom.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.14/amcharts.js" rel="stylesheet" type="text/css" />

        <script src="Public/Vendors/base/vendors.bundle.js" type="text/javascript"></script>
        <script src="Public/Scripts/scripts.bundle.js" type="text/javascript"></script>
        <script src="Public/Scripts/datatables.bundle.js" type="text/javascript"></script>
        <script src="Public/Scripts/helper.js" type="text/javascript"></script>
        <script src="Public/Scripts/janimate.min.js" type="text/javascript"></script>
        <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
        <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    </head>
    <body class="m-page--fluid m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
        <div id="my-page" class="m-grid m-grid--hor m-grid--root m-page">
            <header id="m_header" class="m-grid__item m-header " m-minimize="minimize" m-minimize-mobile="minimize" m-minimize-offset="10" m-minimize-mobile-offset="10">
                <?php include 'Public/Matriz/Sistema/topo.php'; ?>
                <div class="m-header__bottom">
                    <div class="m-container m-container--fluid m-container--full-height m-page__container">
                        <div class="m-stack m-stack--ver m-stack--desktop">
                            <div class="m-stack__item m-stack__item--fluid m-header-menu-wrapper">
                                <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light" id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                                <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light">
                                    <?php include 'Public/Matriz/Sistema/menu.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <?php include $conteudo; ?>
                </div>
            </div>
            <?php include 'Public/Matriz/Sistema/footer.php'; ?>
        </div>
        <div id="m_scroll_top" class="m-scroll-top">
            <i class="la la-arrow-up"></i>
        </div>
    </body>
</html>
<script>
    WebFont.load({
        google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700", "Asap+Condensed:500"]},
        active: function () {
            sessionStorage.fonts = true;
        }
    });
</script>