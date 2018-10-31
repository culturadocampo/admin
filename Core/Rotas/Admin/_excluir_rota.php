<?php
$o_rota = new Rota();

$arquivos_base = $o_rota->get_arquivos_base();
$arquivos_conteudo = $o_rota->get_arquivos_conteudo();
if ($arquivos_conteudo) {
    foreach ($arquivos_conteudo as $key => $arquivo_conteudo) {
        $o_rota->set_conteudo($arquivo_conteudo);
        $has_conteudo = $o_rota->select_conteudo();
        if ($has_conteudo) {
            unset($arquivos_conteudo[$key]);
        }
    }
    $arquivos_conteudo = array_values($arquivos_conteudo);
}
?>
<section class="page-content animated ">
    <div class="col-md-12 ">
        <div class="card card-tabs">
            <div class="card-header">
                <div class="card-title">
                    Rotas/Permissões
                </div>
                <ul class="nav nav-tabs primary-tabs justify-content-end">
                    <li class="nav-item" role="presentation">
                        <a href="#rotas" class="nav-link active show" data-toggle="tab" aria-expanded="true">Rotas</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#permissoes" class="nav-link" data-toggle="tab" aria-expanded="true">Permissões</a>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fadeIn active" id="rotas">
                        <form id="form_rotas" action="#">

                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php if ($arquivos_conteudo) { ?>
                                                <label for="confirm">Conteúdo</label>
                                            <?php } else { ?>
                                                <label class="text-danger" for="confirm">Conteúdo</label>

                                            <?php } ?>

                                            <select <?php echo $arquivos_conteudo ? "" : 'disabled' ?> <?php echo $arquivos_conteudo ? "" : 'disabled' ?> name="conteudo" class="form-control" id="select_conteudo">
                                                <?php if ($arquivos_conteudo) { ?>
                                                    <?php foreach ($arquivos_conteudo as $arquivo) { ?>
                                                        <option><?php echo $arquivo; ?></option>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <option>Nenhum novo arquivo disponível</option>
                                                <?php } ?>

                                            </select>
                                            <small class="form-text text-muted">Arquivo .php com o conteúdo e/ou ação</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Matriz *</label>
                                            <select <?php echo $arquivos_conteudo ? "" : 'disabled' ?> name="matriz" class="form-control " id="select_matriz">
                                                <option selected value="0">Arquivo load/ajax</option>

                                                <?php if ($arquivos_base) { ?>
                                                    <?php foreach ($arquivos_base as $arquivo) { ?>
                                                        <option value="<?php echo $arquivo['arquivo']; ?>"><?php echo $arquivo['nome']; ?></option>
                                                    <?php } ?>
                                                <?php } ?>

                                            </select>
                                            <small class="form-text text-muted">HTML base de construção da página</small>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="profile-wrapper p-t-20">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">URI*</label>
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-icon-addon1">.com.br/</span>
                                                    </div>
                                                    <input <?php echo $arquivos_conteudo ? "" : 'disabled' ?> name="url" id="input_url" type="text" class="form-control" placeholder="Nome do caminho (Somente letras)">

                                                </div>
                                                <small class="form-text text-muted">URI identificador da página (ex: perfil, anuncios)</small>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Precisa estar logado? *</label>
                                                <select <?php echo $arquivos_conteudo ? "" : 'disabled' ?> id="publico" name="publico" class="form-control" id="">
                                                    <option selected value="0">Sim, precisa de uma sessão ativa</option>
                                                    <option value="1" >Não importa, qualquer um pode acessar</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div id="div_parametros" style="display: none" class="col-md-12 m-t-50">
                                    <h3>Parâmetros (Opcional)</h3>
                                    <hr>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select class="form-control" id="parametros">
                                                        <option value="1">Expressão regular</option>
                                                        <option value="2">Palavra fixa</option>
                                                    </select>
                                                </div>
                                                <div id="expressao_regular">

                                                    <div class="form-group">
                                                        <label>Tipo</label>
                                                        <select class="form-control" id="expressao_select">
                                                            <option type="string" value="([a-zA-Z\-]+)">Somente letras</option>
                                                            <option type="int" value="(\d+)">Somente números</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Nome</label>
                                                        <div class="input-group mb-3">
                                                            <input id="nome_parametro" type="text" class="form-control somente_letras" placeholder="Nome do parâmetro (e.g. id, nome, valor)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="palavra_fixa" style="display: none">

                                                    <div class="form-group">
                                                        <label>Palavra</label>
                                                        <div class="input-group mb-3">
                                                            <input id="palavra_url" type="text" class="form-control somente_letras" placeholder="Nome do parâmetro (e.g. id, nome, valor)" value="">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-12 text-right">
                                                    <button type="button" id="add_parametro" class="btn btn-success">Adicionar parâmetro</button>
                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                                <div class="table-responsive">
                                                    <table id="tabela_de_parametros" class="table table-bordered">
                                                        <thead>
                                                            <tr style="background: rgba(0,0,0,0.025)">
                                                                <th class="text-center">Parâmetro</th>
                                                                <th class="text-center">Valor</th>
                                                                <!--<th class="text-center"></th>-->

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr><td colspan="3" class="text-center">Nenhum parâmetro adicionado</td></tr>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div>

                                <div class="card-footer text-right">
                                    <button type="button" id="cadastrar_rota" class="btn btn-primary">Alterar rota</button>
                                </div>
                        </form>
                      
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</section>