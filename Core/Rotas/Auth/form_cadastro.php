<form id="form_cadastro" class="sign-in-form  animated jackInTheBox">
    <div class="card">
        <div class="card-body">
            <a href="index.html" class="brand text-center d-block m-b-20">
                <img src="UIKit/dist/assets/img/qt-logo@2x.png" alt="QuantumPro Logo" />
            </a>
            <h5 class="sign-in-heading text-center m-b-20" style="font-weight: bold!important; font-size: 24px;">Criar uma conta</h5>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Seu nome</label>
                <input name="nome" type="text" id="inputName" class="form-control" placeholder="Nome completo" required="">
            </div>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="E-mail" required="">
            </div>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Usuário</label>
                <input name="usuario" type="text" id="inputEmail" class="form-control" placeholder="Crie um usuário" required="">
            </div>
            <div class="form-group">
                <input name="senha" type="password" class="form-control" id="exampleInputHelp3" placeholder="Crie uma senha">
                <small class="form-text text-muted text-center">Ao menos 6 caracteres, sem espaços.</small>

            </div>
            <div class="form-group">
                <input name="senha_conf" type="password" id="inputConfirmPassword" class="form-control" placeholder="Confirme sua senha" required="">
            </div>
            <div class="checkbox m-b-10 m-t-15">
                <div class="custom-control custom-checkbox checkbox-primary form-check">
                    <input nome="conf_termos" type="checkbox" class="custom-control-input" id="stateCheck1" value="on" checked="">
                    <label class="custom-control-label" for="stateCheck1">Eu aceito os <a href="#">termos e condições</a></label>
                </div>
            </div>
            <?php if($_SERVER['HTTP_HOST'] != 'localhost'){ ?>
                <div class="checkbox m-b-10 m-t-20 ">
                    <div class="g-recaptcha col-md-12" data-sitekey="6Len6HYUAAAAAIQH0ddhVjEukzpa0qXmK3iPN4Ss"></div>
                </div>   
            <?php } ?>
            <div class="form-group">
                <button id="submit_cadastro" class="btn btn-primary btn-block" type="button">Criar minha conta</button>
            </div>
             <div class="form-group">
                 <small class="form-text text-muted text-center">  ou </small>
            </div>
             <div class="form-group">
               <a>
                    <span class="btn-google m-b-10 col-md-12" id="google-login-button">
                        <img src="Public/Images/icon-google.png" alt="GOOGLE">
                        Google
                    </span>
                </a>
            </div>

            <p class="text-muted m-t-25 m-b-0 p-0 text-center">Já possui uma conta?<a href="login"> Entre agora</a></p>
        </div>
    </div>
</form>


<script>
     function HandleGoogleApiLibrary() {
        // Load "client" & "auth2" libraries
        gapi.load('client:auth2', {
            callback: function () {
                // Initialize client & auth libraries
                gapi.client.init({
                    apiKey: 'AIzaSyCQdmcxa4EMNfimZW1j5RY6KUe7jS0DpwY',
                    clientId: '264167034553-n8d6bsjrbsgsgitfv81uklvuohptq848.apps.googleusercontent.com',
                    scope: 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me'
                }).then(
                        function (success) {
                            // Libraries are initialized successfully
                            // You can now make API calls
                        },
                        function (error) {
                            // Error occurred
                            // console.log(error) to find the reason
                        }
                );
            },
            onerror: function () {
                // Failed to load libraries
            }
        });
    }
    $(document).ready(function () {
        $('#submit_cadastro').on('click', function () {
            var formData = $("#form_cadastro").serialize();
            $.ajax({
                type: "post",
                url: "executa-cadastro-usuario",
                data: formData,
                success: function (json) {
                    var response = JSON.parse(json);
                    if (response.result) {
                        swal({
                            type: 'success',
                            title: 'Alerta',
                            text: response.message
                        }).then((value) => {
                             window.location = "./login"; // vazio = pagina-inicial
                        });
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
        $("#google-login-button").on('click', function () {
            // API call for Google login
            gapi.auth2.getAuthInstance().signIn().then(
                    function (success) {
                        gapi.client.request({path: 'https://www.googleapis.com/plus/v1/people/me'}).then(
                                function (success) {
                                    var user_info = JSON.parse(success.body);
                                    $.ajax({
                                        type: "post",
                                        url: "executa-cadastro-google",
                                        data: user_info,
                                        success: function (json) {
                                            window.location = "./"; // vazio = pagina-inicial
                                        },
                                        error: function (error) {
                                            swal({
                                                type: 'error',
                                                title: 'Resposta inesperada',
                                                text: 'Entre em contato com o supoorte (COD: L001)'
                                            });
                                        }
                                    });
                                },
                                function (error) {
                                    // Error occurred
                                    // console.log(error) to find the reason
                                }
                        );
                    },
                    function (error) {
                        // Error occurred
                        // console.log(error) to find the reason
                    }
            );
        });
    });
</script>