<!DOCTYPE html>
<html>
    <?php include 'Public/Matriz/Includes/b_head_admin.php'; ?>
    <body class="layout-horizontal menu-auto-hide">
        <div id="app">
            <div class="header-wrapper">
                <?php include 'Public/Matriz/Includes/b_navbar.php'; ?>
                <?php include 'Public/Matriz/Includes/b_menu.php'; ?>
            </div>
            <div class="content-wrapper">
                <div class="content container">
                    <?php include $conteudo; ?>
                </div>
                <?php include 'Public/Matriz/Includes/b_themes_list.php'; ?>
            </div>
        </div>
        <?php include 'Public/Matriz/Includes/b_search.php'; ?>
        <?php include 'Public/Matriz/Includes/b_scripts_admin.php'; ?>
    </body>
</html>
