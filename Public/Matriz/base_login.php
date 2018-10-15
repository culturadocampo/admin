<!DOCTYPE html>
<html lang="en">
    <?php include 'Public/Matriz/Includes/b_head.php'; ?>
    <body class="content-menu pace-done content-menu-close">
        <div id="app">
            <div class="content-wrapper">
                <div class="content container">
                    <?php include $conteudo; ?>
                </div>
            </div>
        </div>
        <?php include 'Public/Matriz/Includes/b_scripts.php'; ?>
        <script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};HandleGoogleApiLibrary()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>

    </body>
</html>
