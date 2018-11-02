<form id="form_login" class="sign-in-form ">
    <div class="card">
        <div class="card-body">
            <!--<h5 class="sign-in-heading text-center m-b-20" style="font-size: 24px;">Cultura do campo</h5>-->

            <a href="index.html" class="brand text-center d-block m-b-20">
                <img src="Public/Images/logo_cc2.png" width="125" height="125" class="animated bounceIn"/>
            </a>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Usuário ou e-mail</label>
                <input type="email" name="usuario" class="form-control" placeholder="Usuário ou endereço de e-mail" required="">
            </div>

            <div class="form-group">
                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" name="senha" class="form-control" placeholder="Senha de acesso" required="">
            </div>
            <div class="checkbox m-b-10 m-t-20">
                <div class="custom-control custom-checkbox checkbox-primary form-check">
                    <input type="checkbox" class="custom-control-input " id="stateCheck1" checked="">
                    <label class="custom-control-label" for="stateCheck1">Manter conectado</label>
                </div>
            </div>
            <?php if($_SERVER['HTTP_HOST'] != 'localhost'){ ?>
                <div class="checkbox m-b-10 m-t-20 ">
                    <div class="g-recaptcha col-md-12" data-sitekey="6Len6HYUAAAAAIQH0ddhVjEukzpa0qXmK3iPN4Ss"></div>
                </div>   
            <?php } ?>
            <button id="submit_login" class="btn btn-primary btn-block" type="button">Acessar plataforma</button>

            <p class="text-muted m-t-25 m-b-0 p-0">Ainda não possui uma conta?<a href="novo-usuario"> Crie uma agora!</a></p>
        </div>
        <div class="card-footer">
            <a>
                <span class="btn-google m-b-10 col-md-12" id="google-login-button">
                    <img src="Public/Images/icon-google.png" alt="GOOGLE">
                    Google
                </span>
            </a>
            <?php if (false) { ?> 
                <a href="#">
                    <span href="#" class="btn-face m-b-10 col-md-12">
                        <i class="fa fa-facebook-official"></i>
                        Facebook
                    </span>
                </a>
            <?php } ?>
            <div class="col-md-12 text-center">
                <p class="text-muted m-t-25 m-b-0 p-0"><a href="#">Esqueceu sua senha?</a></p>
            </div>
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

        $('#submit_login').on('click', function () {
            var formData = $("#form_login").serialize();
            $.ajax({
                type: "post",
                url: "executa-login",
                data: formData,
                //  dataType: "json",
                success: function (json) {
                    var response = JSON.parse(json);
                    if (response.result) {
                        window.location = "./"; // vazio = pagina-inicial
                    } else {
                        swal({
                            type: 'error',
                            title: response.message,
                            text: 'Verifique e tente novamente'
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