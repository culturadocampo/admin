<?php
$retorno = Produtor::verifica_cadastro_produtor();

if ($retorno) {
    header('Location: anunciar');
}
?>

<!-- CONTENT WRAPPER -->
<div class="m-grid__item m-grid__item--fluid m-wrapper" > 

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
                                    <label class="control-label text-right col-md-3">Data Nascimento</label>
                                    <div class="col-md-5">
                                        <input type="date" placeholder="" class="form-control" id="data_nascimento" name="data_nascimento">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Sexo</label>
                                    <div>
                                        <input type="radio" name="sexo" id="masculino" value="M">
                                        <label>Masculino</label>

                                        <input type="radio" name="sexo" id="femenino" value="F">
                                        <label>Femenino</label>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">CAD PRO</label>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="" class="form-control" id="cad_pro" name="cad_pro">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Cel. Principal</label>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="" class="form-control" id="complemento" name="cel_principal">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Cel. Secundario</label>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="" class="form-control" name="cel_secundario">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Tel. Fixo</label>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="" class="form-control" name="tel_fixo">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Estado</label>
                                    <div class="col-md-5">
                                        <select class="form-control" name="estado" id="estado">
                                            <option value="" disabled="disabled" selected="selected">Selecione</option>
                                            <?php
                                            $produtor = new Produtor;
                                            $estados = $produtor->estados();
                                            foreach ($estados as $estado) {
                                                ?><option class="estado" value="<?php echo $estado['uf'] ?>"><?php echo $estado['uf'] ?></option> <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <!--NAO PODE SER FIXO PELO PHP ASSIM, PRECISA SER UM LOAD E CARREGAR PELO ESTADO SELECIONADO-->
                                <div class="form-group row" id="cidade">
                                    <label class="control-label text-right col-md-3">Cidade</label>
                                    <div id="combo_cidades" class="col-md-5">
                                        <!--  Aqui vem o combo de cidades via javascript -->
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                    <label class="control-label text-right col-md-3">CEP</label>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="" class="form-control" id="cep" name="cep">
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
    
    let x = document.getElementById("demo");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "O seu navegador não suporta Geolocalização.";
        }
    }
    function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude;

        $("#latitude").val(position.coords.latitude);
        $("#longitude").val(position.coords.longitude);
    }
</script>

