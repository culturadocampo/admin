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

                    <div class="form-group m-form__group m--margin-top-10">
                        <div class="text-info alert m-alert m-alert--default" role="alert">
                            Somente algumas informações podem ser alteradas.
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-2 col-form-label">Nome completo</label>
                        <div class="col-7">
                            <div class="input-group m-input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class='flaticon-user'></i></span></div>
                                <input type="text" class="form-control m-input" value='<?php echo STRINGS::proper_case($usuario['nome']); ?>'>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-2 col-form-label">E-mail</label>
                        <div class="col-7">
                            <div class="input-group m-input-group">
                                <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                                <input type="text" class="form-control m-input" value='<?php echo $usuario['email']; ?>'>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-2 col-form-label">Tipo</label>
                        <div class="col-7">
                            <div class="input-group m-input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class='flaticon-tabs'></i></span></div>
                                <input disabled="" type="text" class="form-control m-input" value='<?php echo $usuario['tipo_usuario']; ?>'>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-2 col-form-label">CPF</label>
                        <div class="col-7">
                            <div class="input-group m-input-group">
                                <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                                <input disabled="" type="text" class="form-control m-input" value='<?php echo $usuario['cpf']; ?>'>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-2 col-form-label">Cadastro</label>
                        <div class="col-7">
                            <div class="input-group m-input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class='flaticon-calendar'></i></span></div>
                                <input disabled="" type="text" class="form-control m-input" value='<?php echo DATE::mysql_to_date($usuario['data_cadastro']); ?>'>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-7">
                                <button type="reset" class="btn btn-success m-btn r m-btn--custom float-right">Salvar alterações</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>




        </div>

    </div>
</div>



