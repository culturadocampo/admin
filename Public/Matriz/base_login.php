<!DOCTYPE html>
<html lang="en">

    <!-- begin::Head -->
    <head>
        <?php if ($_SERVER['HTTP_HOST'] == "localhost") { ?>
            <base href="http://localhost/pro_campo/">
        <?php } else { ?>
            <base href="http://<?php echo $_SERVER['HTTP_HOST']; ?>">
        <?php } ?>
        <meta charset="utf-8" />
        <title>CdC | Acessar</title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="Public/Images/new_logo.png" />

        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>

        <script>
            WebFont.load({
                google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
                active: function () {
                    sessionStorage.fonts = true;
                }
            });
        </script>

        <link href="Metronic/assets/demo/demo10/base/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet" type="text/css" />


        <link rel="shortcut icon" href="Public/Images/new_logo.png" />
        <script src="Metronic/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
        <script src="Metronic/assets/demo/demo10/base/scripts.bundle.js" type="text/javascript"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src='Public/Scripts/helper.js'></script>

    </head>

    <!-- end::Head -->

    <!-- begin::Body -->
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(Metronic/assets/app/media/img//bg/bg-3.jpg);">
                <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
                    <?php include $conteudo; ?>
                </div>
            </div>
        </div>

    </body>

    <script async defer src="https://apis.google.com/js/api.js" onload="this.onload = function () {};HandleGoogleApiLibrary()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>

</html>
