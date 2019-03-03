
<?php include 'Core/Rotas/Usuarios/include_form_usuario.php'; ?>
<?php include 'Core/Rotas/Usuarios/include_form_telefone.php'; ?>
<?php include 'Core/Rotas/Endereco/include_select_estado.php'; ?>

<style>
    #map {
        height: 500px;
        width: 100%;
        border: 1px solid rgba(0,0,0,0.45);
        border-radius: 5px;
    }

    #map-report div.gmnoprint,
    #map-report div.gmnoscreen,
    .gmnoprint, .gm-style-cc{
        display: none;      
    }

</style>
<div class="form-group m-form__group row">
    <div class="col-md-12">
        <div class="col-md-12">
            <label>Comunidade</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="flaticon-pin"></i>
                    </span>
                </div>

                <input type="text" class="form-control" placeholder="Informe a comunidade (Clique em localizar ou aperte [ENTER]" name="comunidade">
                <div class="input-group-append">
                    <button id="localizar_comunidade" class="btn btn-info btn-" type="button">Localizar</button>
                </div>
            </div>
            <span class="m-form__help">Informe a comunidade/localidade</span>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group m-form__group row">

        <div class="col-md-12">

            <div id="map"></div>
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        Latitude
                    </span>
                </div>

                <input readonly="" type="text" class="form-control" name="lat" value="0.0000">

            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        Longitude
                    </span>
                </div>

                <input readonly="" type="text" class="form-control" name="lng" value="0.0000">

            </div>
        </div>
    </div>

    <!--<div class="col-md-12">-->


    <div class="form-group m-form__group row">
        <div class="col-lg-6">
            <label for="rg">RG</label>
            <input name="rg" type="text" class="form-control m-input" placeholder="RG do usuário">
            <span class="m-form__help">Somente números</span>
        </div>
        <div class="col-lg-6">

            <label for="caepf">CAEPF</label>
            <input name="caepf" type="text" class="form-control m-input caepf" placeholder="Cadastro de Atividade Econômica da Pessoa Física">
            <span class="m-form__help">Somente números</span>

        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-lg-6">
            <label for="integrantes_upf">Número de integrantes da UPF</label>
            <input pattern="\d+" name="integrantes_upf" type="text" class="form-control m-input" placeholder="Informe a quantidade">
            <!--<span class="m-form__help">Quantidade de integrantes</span>-->
        </div>
        <div class="col-lg-6">
            <label for="coletivo">Coletivo a que pertence</label>
            <select name="coletivo" class="form-control selectpicker">
                <option value="1">Associação</option>
                <option value="2">Cooperativa</option>
                <option value="3">Grupo informal</option>
                <option value="4">Agricultor osilado</option>
            </select>
            <!--<span class="m-form__help">Informe o coletivo</span>-->
        </div>
    </div>
    <!--</div>-->

    <script>
        var mapObject;
        var marker;
        var image = 'Public/Images/Outros/marker.png';

        $(document).ready(function () {
            initMap();
            $(".caepf").mask("000.000.000/000-00");

            $("#localizar_comunidade").off("click");
            $("#localizar_comunidade").on("click", function () {
                var codigo = $(this).val();
                var siglaEstado = $("#uf").val();
                var municipio = $("#municipio option[value='" + codigo + "']").text();
                var comunidade = $("input[name=comunidade]").val();
                geocoding("Brasil, " + siglaEstado + ", " + municipio + ", " + comunidade, 15);
            });


            $("input[name=comunidade]").on("keyup", function (event) {
                if (event.keyCode === 13) {
                    var codigo = $(this).val();
                    var siglaEstado = $("#uf").val();
                    var municipio = $("#municipio option[value='" + codigo + "']").text();
                    var comunidade = $("input[name=comunidade]").val();
                    geocoding("Brasil, " + siglaEstado + ", " + municipio + ", " + comunidade, 15);
                }
            });

        });

        function initMap() {
            mapObject = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -15.4861792, lng: -51.7487035},
                zoom: 4,
                disableDefaultUI: true
            });

            google.maps.event.addListener(mapObject, "click", function (e) {
                if (typeof marker == "object") {
                    marker.setMap(null);
                }
                var lat = e.latLng.lat();
                var lng = e.latLng.lng();
                $("input[name=lat]").val(lat);
                $("input[name=lng]").val(lng);

                marker = new google.maps.Marker({
                    position: e.latLng,
                    map: mapObject,
                    animation: google.maps.Animation.DROP,
                    icon: image
                });
            });

        }

        function geocoding(address, zoom) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({'address': address}, function (results, status) {
                if (status === 'OK') {
                    mapObject.setZoom(zoom);
                    mapObject.panTo(results[0].geometry.location);
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }

        //    function localizarComunidade() {
        //        var codigo = $(this).val();
        //        var siglaEstado = $("#uf").val();
        //        var municipio = $("#municipio option[value='" + codigo + "']").text();
        //        var comunidade = $("input[name=comunidade]").val();
        //        geocoding("Brasil, " + siglaEstado + ", " + municipio + ", " + comunidade, 15);
        //    }

    </script>