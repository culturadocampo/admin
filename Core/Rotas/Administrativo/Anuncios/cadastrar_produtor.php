<?php
    $retorno = Produtor::verifica_cadastro_produtor();
    
    if($retorno ){
        header('Location: anunciar'); 
    }
?>

<!-- CONTENT WRAPPER -->

<section class="page-content animated fadeIn ">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <p id="demo">Clique no botão para receber sua localização em Latitude e Longitude:</p>
                <button onclick="getLocation()">Gerar</button>
                <form id="form_cadastro" class="form-horizontal">
                    <div class="form-body">
                        <div class="inputs">
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <input type="hidden" placeholder="" class="form-control" id="longitude" name="longitude" value="">
                                </div>
                            </div>
                
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <input type="hidden" placeholder="" class="form-control" id="latitude" name="latitude" value="">
                                </div>
                            </div>
                            
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
                                        <option value="" selected="selected">Selecione</option>
                                        <?php
                                        $produtor = new Produtor;
                                        $estados = $produtor->estados();
                                        foreach ($estados as $estado) {
                                            ?><option class="estado" value="<?php echo $estado['id_estado'] ?>"><?php echo $estado['uf'] ?></option> <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <!--NAO PODE SER FIXO PELO PHP ASSIM, PRECISA SER UM LOAD E CARREGAR PELO ESTADO SELECIONADO-->
                            <div class="form-group row" id="cidade">
                                <label class="control-label text-right col-md-3">Cidade</label>
                                <div class="col-md-5">
                                    <select class="form-control" name="cidade" id="cidade">
                                        <option value="" selected="selected">Selecione</option>
                                        <?php
                                        $o_produtor = new Produtor;
                                        $cidades = $o_produtor->cidades();
                                        foreach ($cidades as $cidade) {
                                            ?><option class="cidade" value="<?php echo $cidade['id_municipio'] ?>"><?php echo $cidade['nome'] ?></option> <?php
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
                                <label class="control-label text-right col-md-3">Rua</label>
                                <div class="col-md-5">
                                    <input type="text" placeholder="" class="form-control" id="logradouro" name="logradouro">
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
</section>

<script>
    function estados() {
        $("#cidade").hide();
        $('#estado').on('change', function () {
            var estado = $(this).val();
            if (estado !== "" && estado !== null) {
                $("#cidade").show();
            } else {
                $("#cidade").hide();
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
<script>
    let x=document.getElementById("demo");
    function getLocation(){
        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition);
        }else{
            x.innerHTML="O seu navegador não suporta Geolocalização.";
        }
    }
    function showPosition(position){
        x.innerHTML="Latitude: " + position.coords.latitude +
        "<br>Longitude: " + position.coords.longitude; 

        $("#latitude").val(position.coords.latitude);
        $("#longitude").val(position.coords.longitude);
    }
</script>

