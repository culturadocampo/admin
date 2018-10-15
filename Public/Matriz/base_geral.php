<!DOCTYPE html>

<html lang="en">

    <?php include 'Core/Views/Base/Includes/b_head.php'; ?>

    <body class="content-menu pace-done content-menu-close">
        <div id="app">
            <?php include 'Core/Views/Base/Includes/b_navbar.php'; ?>

            <div class="content-wrapper">


                <div class="content container">
                    <?php include $conteudo; ?>
                </div>
                <?php include 'Core/Views/Base/Includes/b_aside.php'; ?>

            </div>
        </div>
        <!-- END CONTENT WRAPPER -->

        <?php include 'Core/Views/Base/Includes/b_scripts.php'; ?>
    </body>
</html>
