<?php
$o_usuario = new Usuario();
$id_usuario = SESSION::get_id_usuario();
$usuario = $o_usuario->select_usuario_from_id($id_usuario);
?>






<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">

    <div class="tab-content">
        <div class="tab-pane active show" id="m_user_profile_tab_1">
            <form class="m-form m-form--fit m-form--label-align-right">

                <div  class="m-portlet__body">


                    <div class="m-widget4" style="padding: 32px">
                        <div class="m-widget4__item" style="width:100%">
                            <div class="m-widget4__ext ">
                                <span class="m-widget4__icon m--font-brand">
                                    <i class="flaticon-more-v5 text-success"></i>
                                </span>
                            </div>
                            <div class="m-widget4__info" style="width: 50%;">
                                <span class="m-widget4__text">
                                    Nome completo
                                </span>
                            </div>
                            <div class="m-widget4__ext text-right" style="width: 50%;">
                                <span class="m-widget4__number m--font-info ">
                                    <?php echo SESSION::get_nome_usuario(); ?>
                                </span>
                            </div>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__ext">
                                <span class="m-widget4__icon m--font-brand">
                                    <i class="flaticon-more-v5 text-success"></i>
                                </span>
                            </div>
                            <div class="m-widget4__info">
                                <span class="m-widget4__text">
                                    E-mail
                                </span>
                            </div>
                            <div class="m-widget4__ext text-right" style="width: 50%;">
                                <span class="m-widget4__number m--font-info ">
                                    <?php echo $usuario['email']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__ext">
                                <span class="m-widget4__icon m--font-brand">
                                    <i class="flaticon-more-v5 text-success"></i>
                                </span>
                            </div>
                            <div class="m-widget4__info">
                                <span class="m-widget4__text">
                                    CPF
                                </span>
                            </div>
                            <div class="m-widget4__ext text-right">
                                <span class="m-widget4__number m--font-info">
                                    <?php echo $usuario['cpf']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__ext">
                                <span class="m-widget4__icon m--font-brand">
                                    <i class="flaticon-more-v5 text-success"></i>
                                </span>
                            </div>
                            <div class="m-widget4__info">
                                <span class="m-widget4__text">
                                    Cadastro
                                </span>
                            </div>
                            <div class="m-widget4__ext text-right">
                                <span class="m-widget4__number m--font-info">
                                    <?php echo DATE::mysql_to_date($usuario['data_cadastro']); ?>
                                </span>
                            </div>
                        </div>

                    </div>

                </div>
<!--                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <button type="reset" class="btn btn-success m-btn r m-btn--custom float-right">Salvar alterações</button>
                            </div>
                        </div>
                    </div>
                </div>-->
            </form>




        </div>

    </div>
</div>



