<?php 
/**
 * Serve para redirecionar o pós-login para a página requisitada
 */
$request_anterior = isset($_SESSION['login_request']) ? $_SESSION['login_request'] : "./"; 
unset($_SESSION['login_request']);
?>
<div class="m-login__container animated fadeIn">
    <div class="m-login__logo">
        <a href="#">
            <img src="Public/Images/Logo/vertical_logo.png" style="width:400px; height: auto;">
        </a>
    </div>
    <div class="m-login__signin">
<!--        <div class="m-login__head">
            <h3 class="m-login__title"><small>CULTURA DO CAMPO</small></h3>
        </div>-->
        <div class="alert alert-danger m--margin-top-30 bounceIn " id="alert_login_invalido" role="alert" style="display: none">

        </div>
        <form id="form_login" class="m-login__form m-form" action="">
            <div class="form-group m-form__group">
                <input class="form-control m-input text-center font-weight-bold text-dark" type="text" placeholder="Usuário ou e-mail" name="usuario">
            </div>
            <div class="form-group m-form__group">
                <input class="form-control m-input text-center font-weight-bold text-dark" type="password" placeholder="Senha de acesso" name="senha">
            </div>
            <div class="row m-login__form-sub m--margin-top-20">
                <div class="col m--align-left m-login__form-left">
                    <label class="m-checkbox  m-checkbox--focus">
                        <input type="checkbox" name="remember"> Lembrar
                        <span></span>
                    </label>
                </div>
                <div class="col m--align-right m-login__form-right">
                    <a href="javascript:;" id="m_login_forget_password" class="m-link">Esqueceu sua senha?</a>
                </div>
            </div>
            <?php if ($_SERVER['HTTP_HOST'] != 'localhost') { ?>
                <div class="text-center">
                    <span>
                        <div class="g-recaptcha col-md-12 text-center" data-sitekey="6Len6HYUAAAAAIQH0ddhVjEukzpa0qXmK3iPN4Ss"></div>
                    </span>
                </div>   
            <?php } ?>
            <div class="m-login__form-action">
                <button type="button" id="submit_login" class="btn m-btn m-btn--gradient-from-success m-btn--gradient-to-success btn-block">Acessar plataforma</button>     
                <button type="button" id="google-login-button" class="btn btn-default m-btn btn-block  m-btn  m-btn m-btn--icon">
                    <span>
                        <img width="20px" height="20px" src="Public/Images/Outros/icon-google.png" style="margin-right: 16px">
                        <span>Acessar com Google</span>
                    </span>
                </button>
            </div>
        </form>

    </div>




    <div class="m-login__account">
        <span class="m-login__account-msg">
            Ainda não possui uma conta ?
        </span>&nbsp;&nbsp;
        <a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">Crie uma agora</a>
    </div>


</div>


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
                                        url: "login/_google",
                                        data: user_info,
                                        success: function (json) {
                                            window.location = '<?php echo $request_anterior; ?>';
                                        },
                                        error: function (error) {
                                            alert("Erro: Entre em contato com o suporte (COD: L001)");
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
                url: "login/_login",
                data: formData,
                //  dataType: "json",
                success: function (json) {
                    var response = JSON.parse(json);
                    if (response.result) {
                        window.location = '<?php echo $request_anterior; ?>';
                    } else {
                        $("#alert_login_invalido").html(response.message);
                        $("#alert_login_invalido").show();
                    }
                },
                error: function (error) {
                    alert("Erro: Entre em contato com o suporte (COD: L001)");

                }
            });
        });
    });
</script>