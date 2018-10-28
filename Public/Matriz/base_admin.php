<!DOCTYPE html>
<html>
    <?php include 'Public/Matriz/Includes/b_admin_head.php'; ?>
    <body class="content-menu">
        <div id="app">
            <?php include 'Public/Matriz/Includes/b_admin_navbar.php'; ?>
            <div class="content-wrapper">
                <?php include 'Public/Matriz/Includes/b_admin_menu.php'; ?>
                <div class="content">
                    <?php include $conteudo; ?>
                </div>
                <?php include 'Public/Matriz/Includes/b_admin_themes.php'; ?>
            </div>
            <?php include 'Public/Matriz/Includes/b_admin_scripts.php'; ?>
    </body>
</html>