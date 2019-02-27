<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="m-portlet m-portlet--full-height  ">
            <div class="m-portlet__body">
                <div class="m-card-profile">
                    <div class="m-card-profile__title m--hide">
                        Your Profile
                    </div>
                    <div class="m-card-profile__pic">
                        <div class="m-card-profile__pic-wrapper">	
                            <img src="Public/Images/Outros/avatar.png" alt="">
                        </div>
                    </div>
                    <div class="m-card-profile__details">
                        <span class="m-card-profile__name"><?php echo SESSION::get_nome_usuario(); ?></span>
                        <a href="" class="m-card-profile__email m-link"><?php echo SESSION::get_tipo_usuario(); ?></a>
                    </div>
                </div>	


                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                    <li class="m-nav__separator m-nav__separator--fit"></li>
                    <li class="m-nav__section m--hide">
                        <span class="m-nav__section-text">Section</span>
                    </li>
                    <li class="m-nav__item">
                        <a href="?page=header/profile&amp;demo=default" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-profile-1"></i>
                            <span class="m-nav__link-title">  
                                <span class="m-nav__link-wrap">      
                                    <span class="m-nav__link-text">Dados básicos</span>      
                                    <!--<span class="m-nav__link-badge"><span class="m-badge m-badge--success">2</span></span>-->  
                                </span>
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="?page=header/profile&amp;demo=default" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-lock"></i>
                            <span class="m-nav__link-text">Segurança</span>
                        </a>
                    </li>




                </ul><div class="m-portlet__body-separator"></div>


            </div>			
        </div>	
    </div>
    <div class="col-xl-9 col-lg-8">
        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">

            <div class="tab-content">
                <div class="tab-pane active show" id="m_user_profile_tab_1">
                    <div class="m-portlet__body">


                        <div class="form-group m-form__group row">
                            <div class="col-10 ml-auto">
                                <h3 class="m-form__section">1. Dados básicos</h3>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Nome completo</label>
                            <div class="col-7">
                                <input class="form-control m-input" type="text" value="<?php echo SESSION::get_nome_usuario(); ?>">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Função</label>
                            <div class="col-7">
                                <input class="form-control m-input" type="text" value="<?php echo SESSION::get_tipo_usuario(); ?>">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">CPF</label>
                            <div class="col-7">
                                <input disabled class="form-control m-input" type="text" value="CTO">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Endereço eletrônico</label>
                            <div class="col-7">
                                <input class="form-control m-input" type="text" value="<?php echo SESSION::get_email_usuario(); ?>">
                                <span class="m-form__help">Usado para recuperação da senha de acesso.</span>
                            </div>
                        </div>


                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>





                    </div>


                </div>

            </div>
        </div>
    </div>
</div>