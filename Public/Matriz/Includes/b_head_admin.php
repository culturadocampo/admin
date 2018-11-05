<head>

    <?php if ($_SERVER['HTTP_HOST'] == "localhost") { ?>
        <base href="http://localhost/pro_campo/">
    <?php } else { ?>
        <base href="http://<?php echo $_SERVER['HTTP_HOST']; ?>">
    <?php } ?>

    <link rel="shortcut icon" type="image/png" href="Public/Images/logo_cc2.png"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cultura do Campo</title>

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
    <!-- ======================= LAYOUT STYLES ===========================-->
    <link rel="stylesheet" href="UIKit/dist/assets/css/layouts/horizontal/core/main.css">
    <!-- ======================= MENU TYPE ===========================-->
    <link rel="stylesheet" href="UIKit/dist/assets/css/layouts/horizontal/menu-type/auto-hide.css">
    <!-- ======================= THEME COLOR STYLES ===========================-->
    <link rel="stylesheet" href="UIKit/dist/assets/css/layouts/horizontal/themes/theme-n.css">
    <link rel="stylesheet" href="UIKit/dist/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.brighttheme.css">
    <link rel="stylesheet" href="Public/Styles/custom.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.css' rel='stylesheet' />

</head>