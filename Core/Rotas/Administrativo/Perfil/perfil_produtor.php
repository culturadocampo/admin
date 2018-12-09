<?php
    $o_produtor = New Produtor;
    $dados = $o_produtor->meus_dados();
?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
		<div class="m-portlet m-portlet--full-height   m-portlet--rounded">
                    <div class="m-portlet__body">
                        <div class="m-card-profile">
                            <div class="m-card-profile__title m--hide">
                                Seu Perfil
                            </div>
                            
                            <div class="m-card-profile__pic">
                                <div class="m-card-profile__pic-wrapper">	
                                    <img src="../../../../Public/Images/Outros/noimage.jpg" alt=""/>
                                </div>
                            </div>
                            
                            <div class="m-card-profile__details">
                                <span class="m-card-profile__name"><?php echo $_SESSION['nome']; ?></span>
                                <a href="" class="m-card-profile__email m-link"><?php echo $dados['email']; ?></a>
                            </div>
                        </div>	
                        
                        <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                            <li class="m-nav__separator m-nav__separator--fit"></li>
                            
                            <li class="m-nav__item">
                                <a href="?page=header/profile&amp;demo=default" class="m-nav__link">
                                <i class="m-nav__link-icon flaticon-share"></i>
                                    <span class="m-nav__link-text">Atividades</span>
                                </a>
                            </li>
                            
                            <li class="m-nav__item">
                                <a href="?page=header/profile&amp;demo=default" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                    <span class="m-nav__link-text">Mensagens</span>
                                </a>
                            </li>
                            
                            <li class="m-nav__item">
                                <a href="?page=header/profile&amp;demo=default" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-graphic-2"></i>
                                    <span class="m-nav__link-text">Vendas</span>
                                </a>
                            </li>
                            
                            <li class="m-nav__item">
                                <a href="?page=header/profile&amp;demo=default" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-time-3"></i>
                                    <span class="m-nav__link-text">Eventos</span>
                                </a>
                            </li>
                            
                            <li class="m-nav__item">
                                <a href="?page=header/profile&amp;demo=default" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                    <span class="m-nav__link-text">Suporte</span>
                                </a>
                            </li>
                        </ul>

                        <div class="m-portlet__body-separator"></div>

                        <div class="m-widget1 m-widget1--paddingless">
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">Vendas no mês</h3>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-brand">+$500,00</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">Taxas de uso sistema</h3>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-danger">-50,00</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">Total a receber</h3>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-success">+450,00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>			
		</div>	
            </div>
            <div class="col-xl-9 col-lg-8">
		<div class="m-portlet m-portlet--full-height m-portlet--tabs   m-portlet--rounded">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#meus_dados" role="tab">
                                        <i class="flaticon-share m--hide"></i>
                                        Meus Dados
                                    </a>
                                </li>
                                
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#alterar_senha" role="tab">
                                            Alterar Senha
                                    </a>
                                </li>
                                
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#meus_produtos" role="tab">
                                            Meu Plano
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="meus_dados">
                            <form id="form_alterar_dados" class="m-form m-form--fit m-form--label-align-right">
                                <div class="m-portlet__body">

                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Nome</label>
                                            <div class="col-7">
                                                <input disabled="disabled" class="form-control m-input" type="text" value="<?php echo $dados['nome']?>">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">E-mail</label>
                                            <div class="col-7">
                                                    <input disabled="disabled" class="form-control m-input" type="text" value="<?php echo $dados['email']?>">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">CPF</label>
                                            <div class="col-7">
                                                    <input disabled="disabled" class="form-control m-input" type="text" value="<?php echo $dados['cpf']?>">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">RG</label>
                                            <div class="col-7">
                                                    <input disabled="disabled" class="form-control m-input" type="text" value="<?php echo $dados['rg']?>">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Cad. Pro</label>
                                            <div class="col-7">
                                                    <input disabled="disabled" class="form-control m-input" type="text" value="<?php echo $dados['cadpro']?>">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Data Nascimento</label>
                                            <div class="col-7">
                                                    <input disabled="disabled" class="form-control m-input" type="text" value="<?php echo $dados['data_nascimento']?>">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Sexo</label>
                                            <div class="col-7">
                                                    <input disabled="disabled" class="form-control m-input" type="text" value="<?php echo $dados['sexo']?>">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Cel. Principal</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="<?php echo $dados['cel_principal']?>">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Cel. Recado</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="<?php echo $dados['cel_secundario']?>">
                                            </div>
                                    </div>
                                    
                                   <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Estado</label>
                                    <div class="col-md-2">
                                        <select class="form-control" name="estado" id="estado">
                                            <option value="" disabled="disabled" selected="selected">Selecione</option>
                                            <?php
                                            $endereco = new Endereco;
                                            $estados = $endereco->estados();
                                            foreach ($estados as $estado) {
                                                ?><option class="estado" value="<?php echo $estado['uf'] ?>"><?php echo $estado['uf'] ?></option> <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                    
                                    <!--NAO PODE SER FIXO PELO PHP ASSIM, PRECISA SER UM LOAD E CARREGAR PELO ESTADO SELECIONADO-->
                                <div class="form-group m-form__group row" id="cidade">
                                    <label for="example-text-input" class="col-2 col-form-label">Cidade</label>
                                    <div id="combo_cidades" class="col-md-2">
                                        <!--  Aqui vem o combo de cidades via javascript -->
                                    </div>
                                </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Cep</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="<?php echo $dados['cep']?>">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Bairro</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="<?php echo $dados['bairro']?>">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Rua</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="<?php echo $dados['rua']?>">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Numero</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="<?php echo $dados['numero']?>">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Complemento</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="<?php echo $dados['complemento']?>">
                                            </div>
                                    </div>

                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2"></div>
                                            <div class="col-7">
                                                <button id="submit_cadastro" type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">Salvar</button>&nbsp;&nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane " id="alterar_senha">
                            <form class="m-form m-form--fit m-form--label-align-right">
                                <div class="m-portlet__body">
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Senha antiga</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="Mark Andre">
                                            </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Nova senha</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="Mark Andre">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Confirme a nova senha</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="Mark Andre">
                                            </div>
                                    </div>
                                    

                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2"></div>
                                            <div class="col-7">
                                                <button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">Salvar</button>&nbsp;&nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="tab-pane " id="meus_produtos">
                            <div class="m-portlet m-portlet--full-height   m-portlet--rounded">
                                <div class="m-portlet__body">
                                    <div class="m-card-profile">
                                        <div class="m-card-profile__details">
                                           <span class="m-card-profile__name">O plano atual é gratuito !</span>
                                           <a href="#" class="m-card-profile__email m-link">Torne-se um produtor premium</a>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>			    
    </div>		
</div>

<script>
    
    function busca_cidades(){
        $("#estado").off("change");
        $("#estado").on("change", function () {
            let uf = $("#estado").val();
            $("#combo_cidades").load("buscar-cidades", {uf: uf});
        });
    }  
</script>

<script>
    $(document).ready(function () {
        busca_cidades();

        $('#submit_cadastro').on('click', function () {
            var formData = $("#form_alterar_dados").serialize();
            $.ajax({
                type: "post",
                url: "alterar-dados-produtor",
                data: formData,
                success: function (json) {
                    var response = JSON.parse(json);
                    if (response.result) {
                        swal({
                            type: 'success',
                            title: 'Sucesso',
                            text: response.message
                        });
                        window.location.href = "anunciar";
                    } else {
                        swal({
                            type: 'warning',
                            title: 'Alerta',
                            text: response.message
                        });
                    }
                },
                error: function (error) {
                    swal({
                        type: 'error',
                        title: 'Resposta inesperada',
                        text: 'Entre em contato com o supoorte (COD: L001)'
                    });
                }
            });
        });
    });

</script>