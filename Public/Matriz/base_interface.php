<!DOCTYPE html>
<html>
    <head>
        <?php if ($_SERVER['HTTP_HOST'] == "localhost") { ?>
            <base href="http://localhost/pro_campo/">
        <?php } else { ?>
            <base href="http://<?php echo $_SERVER['HTTP_HOST']; ?>">
        <?php } ?>
        <meta charset="utf-8" />
        <title>Agribox | Cultura do Campo</title>
        <meta name="description" content="Blank inner page examples">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700", "Asap+Condensed:500"]},
                active: function () {
                    sessionStorage.fonts = true;
                }
            });
        </script>

        <link href="Metronic/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="Metronic/assets/demo/demo10/base/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="Metronic/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet" type="text/css" />
        <link href="Public/Styles/custom.css" rel="stylesheet" type="text/css" />

        <link rel="shortcut icon" href="Public/Images/new_logo.png" />
        <script src="Metronic/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
        <script src="Metronic/assets/demo/demo10/base/scripts.bundle.js" type="text/javascript"></script>
        <script src="Metronic/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
        <script src="Public/Scripts/helper.js" type="text/javascript"></script>
        <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
        <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.js'></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.14/amcharts.js" rel="stylesheet" type="text/css" />

    </head>

    <body class="m-page--fluid m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <header id="m_header" class="m-grid__item m-header " m-minimize="minimize" m-minimize-mobile="minimize" m-minimize-offset="10" m-minimize-mobile-offset="10">
                <?php include 'Public/Matriz/Sistema/topo.php'; ?>
                <?php include 'Public/Matriz/Sistema/menu.php'; ?>
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