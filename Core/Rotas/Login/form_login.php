<?php
/**
 * Serve para redirecionar o pós-login para a página requisitada
 */
$request_anterior = isset($_SESSION['login_request']) ? $_SESSION['login_request'] : "./";
unset($_SESSION['login_request']);
?>

<style>
    div.g-recaptcha {
        margin: 0 auto!important;
        width: 304px!important;
    }
</style>
<div class="m-login__container animated fadeIn">
    <div class="m-login__logo">
        <a href="#">
            <img class="img-fluid" src="Public/Images/Logo/vertical_logo.png" style="width:350px; height: auto;">
        </a>
    </div>
    <div id="m_blockui_1_content" class="m-login__signin">
        <form id="form_login" class="m-login__form m-form" action="">
            <div class="form-group m-form__group">
                <input class="form-control m-input text-center" type="text" placeholder="Usuário ou e-mail" name="usuario">
            </div>
            <div class="form-group m-form__group">
                <input class="form-control m-input text-center" type="password" placeholder="Senha de acesso" name="senha">
            </div>
            <div class="row m-login__form-sub m--margin-top-20">
                <div class="col m--align-left m-login__form-left">
                    <label class="m-checkbox m-checkbox--focus">
                        <input type="checkbox" name="remember_me"> Lembrar por 24h
                        <span></span>
                    </label>
                </div>
                <div class="col m--align-right m-login__form-right">
                    <a href="login/esqueci" id="m_login_forget_password" class="m-link">Esqueceu sua senha?</a>
                </div>
            </div>
            <?php if ($_SERVER['HTTP_HOST'] != 'localhost') { ?>
                <div class="g-recaptcha col-md-12 text-center" data-sitekey="6Len6HYUAAAAAIQH0ddhVjEukzpa0qXmK3iPN4Ss"></div>
            <?php } ?>
            <div class="m-login__form-action">
                <button type="button" id="submit_login" class="btn m-btn m-btn--gradient-from-primary m-btn--gradient-to-success btn-block">Acessar plataforma</button>     
            </div>
            <div style="display: none;" id="alert_login_invalido" role="alert" class="animated fadeInDown fast m--margin-top-30 alert  alert-dismissible fade show   m-alert m-alert--air m-alert--outline m-alert--outline-2x">
            </div>
        </form>

    </div>

</div>


<script>
    $(document).ready(function () {

        $('#submit_login').on('click', function () {
            executeLogin();
        });
        $('input').on('keydown', function (e) {
            if (e.which == 13) {
                executeLogin();
            }
        });
    });
        
    function executeLogin() {
        blockPage();
        var formData = $("#form_login").serialize();
        $.ajax({
            type: "post",
            url: "login/_login",
            data: formData,
            //  dataType: "json",
            success: function (json) {
                var response = JSON.parse(json);
                if (response.result) {
                    $("#alert_login_invalido").removeClass("alert-danger");
                    $("#alert_login_invalido").addClass("alert-success");
                    $("#alert_login_invalido").html(response.message);
                    $("#alert_login_invalido").show();
                    window.location = '<?php echo $request_anterior; ?>';

                } else {
                    $("#alert_login_invalido").addClass("alert-danger");
                    $("#alert_login_invalido").html(response.message);
                    $("#alert_login_invalido").show();
                }
                unblockPage();
            },
            error: function (error) {
                alert("Erro: Entre em contato com o suporte (COD: L001)");
            }
        });
    }

    //        $("#google-login-button").on('click', function () {
//            // API call for Google login
//            gapi.auth2.getAuthInstance().signIn().then(
//                    function (success) {
//                        gapi.client.request({path: 'https://www.googleapis.com/plus/v1/people/me'}).then(
//                                function (success) {
//                                    var user_info = JSON.parse(success.body);
//                                    $.ajax({
//                                        type: "post",
//                                        url: "login/_google",
//                                        data: user_info,
//                                        success: function (json) {
//                                            window.location = '<?php echo $request_anterior; ?>';
//                                        },
//                                        error: function (error) {
//                                            alert("Erro: Entre em contato com o suporte (COD: L001)");
//                                        }
//                                    });
//                                },
//                                function (error) {
//                                    // Error occurred
//                                    // console.log(error) to find the reason
//                                }
//                        );
//                    },
//                    function (error) {
//                        // Error occurred
//                        // console.log(error) to find the reason
//                    }
//            );
//        });
//    function HandleGoogleApiLibrary() {
//        // Load "client" & "auth2" libraries
//        gapi.load('client:auth2', {
//            callback: function () {
//                // Initialize client & auth libraries
//                gapi.client.init({
//                    apiKey: 'AIzaSyCQdmcxa4EMNfimZW1j5RY6KUe7jS0DpwY',
//                    clientId: '264167034553-n8d6bsjrbsgsgitfv81uklvuohptq848.apps.googleusercontent.com',
//                    scope: 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me'
//                }).then(
//                        function (success) {
//                            // Libraries are initialized successfully
//                            // You can now make API calls
//                        },
//                        function (error) {
//                            // Error occurred
//                            // console.log(error) to find the reason
//                        }
//                );
//            },
//            onerror: function () {
//                // Failed to load libraries
//            }
//        });
//    }

</script>

