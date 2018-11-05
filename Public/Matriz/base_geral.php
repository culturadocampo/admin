<!DOCTYPE html>

<html>
    <?php include 'Public/Matriz/Includes/b_head.php'; ?>
    <body class="overlay-menu animated fadeIn layout-fixed">
        <div id="app">
            <div class="content-wrapper">
                <?php include 'Public/Matriz/Includes/b_admin_navbar.php'; ?>
                <div class="m-t-30">
                <?php include $conteudo; ?>
                </div>
                <?php include 'Public/Matriz/Includes/b_aside.php'; ?>
            </div>
        </div>
        <?php include 'Public/Matriz/Includes/b_scripts.php'; ?>
    </body>

</html>
