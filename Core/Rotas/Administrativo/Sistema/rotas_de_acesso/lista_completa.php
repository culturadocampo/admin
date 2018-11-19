<div class="m-grid__item m-grid__item--fluid m-wrapper" > 

<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Lista</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon flaticon-add"></i>
                    </a>
                </li>
                <li class="m-nav__item">
                    <a class="m-nav__link">
                        <span class="m-nav__link-text">Sistema</span>
                    </a>
                </li>
                <li class="m-nav__separator">|</li>
                <li class="m-nav__item">
                    <a class="m-nav__link">
                        <span class="m-nav__link-text">Rotas de acesso</span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</div>
<div class="m-content">
    <!--<div class="m-portlet m-portlet--first m-portlet--bordered-semi m--padding-top-15" m-portlet="true">-->
        <div  id="tabela_rotas">

        </div>
    <!--</div>-->
</div>
</div>





<script>
    $(document).ready(function () {
        load_rotas();
        function load_rotas() {
            $("#tabela_rotas").load("sistema/rotas-de-acesso/_tabela_rotas");
        }
    });
</script>