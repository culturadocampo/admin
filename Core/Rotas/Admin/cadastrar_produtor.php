<!-- CONTENT WRAPPER -->
<div id="app">
    <div class="content-wrapper">
        <div class="content">
            <header class="page-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h1 class="separator">Cadastro de Produtor</h1>
                        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./"><i class="icon dripicons-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="./">Home</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </header>
            <section class="page-content container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form id="form_cadastro" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="inputs">
                                            
                                            <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">CPF</label>
                                                    <div class="col-md-5">
                                                            <input type="text" placeholder="" class="form-control" id="cpf" name="cpf">
                                                    </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">RG</label>
                                                    <div class="col-md-5">
                                                        <input type="text" placeholder="" class="form-control rg" id="rg" name="rg">
                                                    </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">CAD PRO</label>
                                                    <div class="col-md-5">
                                                        <input type="text" placeholder="" class="form-control" id="cad_pro" name="cad_pro">
                                                    </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Data Nascimento</label>
                                                    <div class="col-md-5">
                                                        <input type="date" placeholder="" class="form-control" id="data_nascimento" name="data_nascimento">
                                                    </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Estado</label>
                                                <div class="col-md-5">
                                                    <select class="form-control" name="estado" id="estado">
                                                        <option value="0" disabled="" selected="selected">Selecione</option>
                                                        <?php
                                                            $produtor = new Produtor;
                                                            $estados    = $produtor->estados();        
                                                            foreach($estados as $estado){
                                                                ?><option class="estado" value="<?php echo $estado['uf']?>"><?php echo $estado['uf']?></option> <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row" id="cidade">
                                                <label class="control-label text-right col-md-3">Cidade</label>
                                                <div class="col-md-5">
                                                    <select class="form-control" name="cidade" id="cidade">
                                                        <option value="" disabled="" selected="selected">Selecione</option>
                                                        <?php
                                                            $o_produtor = new Produtor;
                                                            $cidades    = $o_produtor->cidades();        
                                                            foreach($cidades as $cidade){
                                                                ?><option class="cidade" value="<?php echo $cidade['id_municipio']?>"><?php echo $cidade['nome']?></option> <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Bairro</label>
                                                    <div class="col-md-5">
                                                        <input type="text" placeholder="" class="form-control" id="bairro" name="bairro">
                                                    </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Logradouro</label>
                                                    <div class="col-md-5">
                                                        <input type="text" placeholder="" class="form-control" id="rua" name="rua">
                                                    </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Nº</label>
                                                    <div class="col-md-1">
                                                        <input type="text" placeholder="" class="form-control" id="numero" name="numero">
                                                    </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Complemento</label>
                                                    <div class="col-md-5">
                                                        <input type="text" placeholder="" class="form-control" id="complemento" name="complemento">
                                                    </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer bg-light">
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="offset-sm-3 col-md-5">
                                                    <button id="submit_cadastro" class="btn btn-primary btn-rounded">Salvar</button>
                                                    <button class="btn btn-light btn-rounded btn-outline">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    function estados(){
        $("#cidade").attr("disabled", "disabled");
        $("#cidade").hide();
        
        $('.estado').on('click', function () {
            $estado = $("#estado").val();
             
            if($estado != "" && $estado != null){
                $("#cidade").removeAttr("disabled");
                $("#cidade").show();
            }
        });
    }
</script>

<script>
    $(document).ready(function () {
       estados();
       
        $('#submit_cadastro').on('click', function () {
            var formData = $("#form_cadastro").serialize();
            $.ajax({
                type: "post",
                url: "salvar-produtor",
                data: formData,
                success: function (json) {
                    var response = JSON.parse(json);
                    if (response.result) {

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