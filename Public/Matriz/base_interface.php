<!DOCTYPE html>
<html>
    <head>
        <?php if ($_SERVER['HTTP_HOST'] == "localhost") { ?>
            <base href="http://localhost/admin/">
        <?php } else { ?>
            <base href="http://<?php echo $_SERVER['HTTP_HOST']; ?>">
        <?php } ?>

        <meta charset="utf-8" />
        <title><?php echo CONFIG::$PROJECT_NAME; ?></title>
        <meta name="description" content="Layout builder"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

        <!--begin::Web font -->
        <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/api2/v1550471573786/recaptcha__en.js"></script><script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto:300,400,500,600,700" media="all"><script>
            WebFont.load({
                google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
                active: function () {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <!--end::Web font -->
        <link rel="shortcut icon" href="Public/Images/Logo/logo_modern2.png" />

        <link href="Public/Vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css">
        <link href="Public/Styles/style.bundle.min.css" rel="stylesheet" type="text/css">
        <link href="Public/Styles/datatables.bundle.css" rel="stylesheet" type="text/css" />
        <link href="Public/Styles/custom.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.14/amcharts.js" rel="stylesheet" type="text/css" />
        <script src="Public/Vendors/base/vendors.bundle.js" type="text/javascript"></script>
        <script src="Public/Scripts/scripts.bundle.min.js" type="text/javascript"></script>
        <script src="Public/Scripts/datatables.bundle.js" type="text/javascript"></script>
        <script src="Public/Scripts/helper.js" type="text/javascript"></script>
        <script src="Public/Scripts/janimate.min.js" type="text/javascript"></script>
        <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
        <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>




        <!-- begin::Body -->
    <body class="m-content--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside--offcanvas-default">

        <div id="my-page" class="m-grid m-grid--hor m-grid--root m-page">

            <?php include 'Public/Matriz/Sistema/topo.php'; ?>

            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

                <?php include 'Public/Matriz/Sistema/leftbar.php'; ?>

                <div class="m-grid__item m-grid__item--fluid m-wrapper">

                    <div class="m-content">
                        <?php include $conteudo; ?>

                    </div>
                </div>


            </div>
            <!-- end:: Body -->


            <?php include 'Public/Matriz/Sistema/footer.php'; ?>



        </div>
        <!-- end:: Page -->

        <!-- begin::Scroll Top -->
        <div id="m_scroll_top" class="m-scroll-top">
            <i class="la la-arrow-up"></i>
        </div>
        <div id="system_alert" role="alert" class="text-center animated fadeInDown fast m--margin-top-30 alert alert-dismissible fade show m-alert m-alert--air m-alert--outline m-alert--outline-2x">
        </div>
    </body><!-- end::Body -->
</html>