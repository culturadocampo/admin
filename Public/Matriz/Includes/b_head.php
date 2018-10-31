
<head>
    <?php if ($_SERVER['HTTP_HOST'] == "localhost") { ?>
        <base href="http://localhost/pro_campo/">
    <?php } else { ?>
        <base href="http://<?php echo $_SERVER['HTTP_HOST']; ?>">
    <?php } ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cultura do Campo</title>
    <!-- ================== GOOGLE FONTS ==================-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,800" rel="stylesheet">
    <link rel="stylesheet" href="Public/Styles/sign_in_buttons.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
    <!-- ======================= PAGE LEVEL VENDOR STYLES ========================-->
    <link rel="stylesheet" href="UIKit/dist/assets/vendor/rateYo/jquery.rateyo.min.css">
    <!-- ======================= GLOBAL COMMON STYLES ============================-->
    <link rel="stylesheet" href="UIKit/dist/assets/css/common/main.bundle.css">
    <!-- ======================= LAYOUT TYPE ===========================-->
    <link rel="stylesheet" href="UIKit/dist/assets/css/layouts/vertical/core/main.css">
    <!-- ======================= MENU TYPE ===========================================-->
    <link rel="stylesheet" href="UIKit/dist/assets/css/layouts/vertical/menu-type/overlay.css">
    <!-- ======================= THEME COLOR STYLES ===========================-->
    <link rel="stylesheet" href="UIKit/dist/assets/css/layouts/vertical/themes/theme-j.css">
    <link rel="stylesheet" href="UIKit/dist/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>