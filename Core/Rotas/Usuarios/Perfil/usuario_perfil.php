<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="m-portlet m-portlet--full-height  ">
            <div class="m-portlet__body">
                <div class="m-card-profile">
                    <div class="m-card-profile__pic">
                        <div class="m-card-profile__pic-wrapper">
                            <img src="<?php echo SESSION::get_gravatar(); ?>" alt="">
                        </div>
                    </div>
                    <div class="m-card-profile__details">
                        <span class="m-card-profile__name"><?php echo SESSION::get_nome_usuario(); ?></span>
                        <a href="" class="m-card-profile__email m-link"><?php echo SESSION::get_tipo_usuario(); ?></a>
                    </div>
                </div>


                <div class="m-portlet__body-separator"></div>
                <div class="m-widget1 m-widget1--paddingless">
                    <?php if (APP::has_permissao(38)) { ?>
                        <div id="dados_perfil" class="m-widget1__item pointer m-widget1--paddingless">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <i class=" flaticon-user text-success"></i>

                                        </div>
                                        <div class="col-md-10">

                                            <h3 class="m-widget1__title">Meu perfil</h3>
                                            <span class="m-widget1__desc">Informações do perfil</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (APP::has_permissao(39)) { ?>

                        <div id="seguranca" class="m-widget1__item pointer">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <i class=" flaticon-internet text-danger"></i>
                                        </div>
                                        <div class="col-md-10">
                                            <h3 class="m-widget1__title">Segurança</h3>
                                            <span class="m-widget1__desc">Acessos ao sistema</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>

                    <?php if (APP::has_permissao(42)) { ?>

                        <div id="suporte" class="m-widget1__item pointer">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <i class=" flaticon-chat-1  text-info"></i>
                                        </div>
                                        <div class="col-md-10">
                                            <h3 class="m-widget1__title">Suporte</h3>
                                            <span class="m-widget1__desc">Entre em contato conosco</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-8">
        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">

            <div class="tab-content">
                <div class="tab-pane active show" id="m_user_profile_tab_1">
                    <div id="config_container" class="m-portlet__body">





                    </div>


                </div>

            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        blockPage();
        $("#config_container").load("usuario/configuracoes/perfil", {}, unblockPage);


        $("#dados_perfil").off("click");
        $("#dados_perfil").on("click", function () {
            blockPage();
            $("#config_container").load("usuario/configuracoes/perfil", {}, unblockPage);
        });

        $("#seguranca").off("click");
        $("#seguranca").on("click", function () {
            blockPage();
            $("#config_container").load("usuario/configuracoes/seguranca", {}, unblockPage);
        });

        $("#suporte").off("click");
        $("#suporte").on("click", function () {
            blockPage();
            $("#config_container").load("usuario/configuracoes/suporte", {}, unblockPage);
        });
    });
</script>