<aside class="sidebar sidebar-left">
    <div class="sidebar-content">
        <nav class="main-menu">
            <ul class="nav metismenu">
                <li class="sidebar-header"><span>RELATÓRIOS</span></li>
                <li class="menu-item">
                    <a href="/" aria-expanded="false"><i class="la la-area-chart"></i><span>Painel de controle</span></a>
                </li>

                <li class="menu-item">
                    <a href="#" aria-expanded="false"><i class="la la-users"></i><span>Usuários cadastrados</span></a>
                </li>

                <li class="sidebar-header"><span>SISTEMA</span></li>
                <li class="menu-item">
                    <a href="rotas-acesso" aria-expanded="false"><i class="la la-map-signs"></i><span>Rotas/Permissão</span></a>
                </li>
                <li class="menu-item">
                    <a href="#" aria-expanded="false"><i class="la la-eye"></i><span>Permissões padrão</span></a>
                </li>
            </ul>
    </div>
</aside>

<script>
    $(document).ready(function () {
        var pathname = get_pathname();
        var collection = $(".nav .menu-item");
        collection.each(function () {
            var href = $(this).find("a").attr("href");
            if (href === pathname) {
                $(this).addClass('active');
            }
        });
    });
</script>
