<?php
   /* $o_produtor = New Produto;
    $o_produtor->dados();*/
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
                                    <img src="../../../../Public/Images/noimage.jpg" alt=""/>
                                </div>
                            </div>
                            
                            <div class="m-card-profile__details">
                                <span class="m-card-profile__name"><?php echo $_SESSION['nome']; ?></span>
                                <a href="" class="m-card-profile__email m-link">mark.andre@gmail.com</a>
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
                                            <span class="m-nav__link-text">My Profile</span>      
                                            <span class="m-nav__link-badge"><span class="m-badge m-badge--success">2</span></span>  
                                        </span>
                                    </span>
                                </a>
                            </li>
                            
                            <li class="m-nav__item">
                                <a href="?page=header/profile&amp;demo=default" class="m-nav__link">
                                <i class="m-nav__link-icon flaticon-share"></i>
                                    <span class="m-nav__link-text">Activity</span>
                                </a>
                            </li>
                            
                            <li class="m-nav__item">
                                <a href="?page=header/profile&amp;demo=default" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                    <span class="m-nav__link-text">Messages</span>
                                </a>
                            </li>
                            
                            <li class="m-nav__item">
                                <a href="?page=header/profile&amp;demo=default" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-graphic-2"></i>
                                    <span class="m-nav__link-text">Sales</span>
                                </a>
                            </li>
                            
                            <li class="m-nav__item">
                                <a href="?page=header/profile&amp;demo=default" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-time-3"></i>
                                    <span class="m-nav__link-text">Events</span>
                                </a>
                            </li>
                            
                            <li class="m-nav__item">
                                <a href="?page=header/profile&amp;demo=default" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                    <span class="m-nav__link-text">Support</span>
                                </a>
                            </li>
                        </ul>

                        <div class="m-portlet__body-separator"></div>

                        <div class="m-widget1 m-widget1--paddingless">
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">Member Profit</h3>
                                        <span class="m-widget1__desc">Awerage Weekly Profit</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-brand">+$17,800</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">Orders</h3>
                                        <span class="m-widget1__desc">Weekly Customer Orders</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-danger">+1,800</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">Issue Reports</h3>
                                        <span class="m-widget1__desc">System bugs and issues</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-success">-27,49%</span>
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
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item m-portlet__nav-item--last">
                                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                        <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                            <i class="la la-gear"></i>
                                        </a>
                                        
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav">
                                                            <li class="m-nav__section m-nav__section--first">
                                                                    <span class="m-nav__section-text">Quick Actions</span>
                                                            </li>
                                                            
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                                    <span class="m-nav__link-text">Create Post</span>
                                                                </a>
                                                            </li>
                                                            
                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                    <span class="m-nav__link-text">Send Messages</span>
                                                                </a>
                                                            </li>

                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-multimedia-2"></i>
                                                                    <span class="m-nav__link-text">Upload File</span>
                                                                </a>
                                                            </li>

                                                            <li class="m-nav__section">
                                                                <span class="m-nav__section-text">Useful Links</span>
                                                            </li>

                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                                    <span class="m-nav__link-text">FAQ</span>
                                                                </a>
                                                            </li>

                                                            <li class="m-nav__item">
                                                                <a href="" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                    <span class="m-nav__link-text">Support</span>
                                                                </a>
                                                            </li>

                                                            <li class="m-nav__separator m-nav__separator--fit m--hide"></li>
                                                            
                                                            <li class="m-nav__item m--hide">
                                                                <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>						
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="meus_dados">
                            <form class="m-form m-form--fit m-form--label-align-right">
                                <div class="m-portlet__body">

                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Nome</label>
                                            <div class="col-7">
                                                <input disabled="" class="form-control m-input" type="text" value="Mark Andre">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">E-mail</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="CTO">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">CPF</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="+456669067890">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">RG</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="+456669067890">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Cad. Pro</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="+456669067890">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Data Nascimento</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="+456669067890">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Sexo</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="+456669067890">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Cel. Principal</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="+456669067890">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Cel. Recado</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="+456669067890">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Estado</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="+456669067890">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Cidade</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="+456669067890">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Cep</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="+456669067890">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Bairro</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="+456669067890">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Rua</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="+456669067890">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Numero</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="+456669067890">
                                            </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Complemento</label>
                                            <div class="col-7">
                                                    <input class="form-control m-input" type="text" value="+456669067890">
                                            </div>
                                    </div>

                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2"></div>
                                            <div class="col-7">
                                                <button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;
                                                <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>
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
                                                <button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;
                                                <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>
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
