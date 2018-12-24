<?php

if (LOGIN_RECAPTCHA == FALSE || $_POST['g-recaptcha-response']) {

    if (LOGIN_RECAPTCHA == TRUE) {
        $captcha_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . LOGIN_CAPTCHA_SECRET . '&response=' . $_POST['g-recaptcha-response']);
        $captcha_response = json_decode($captcha_response, true);
    }

    if (LOGIN_RECAPTCHA == FALSE || ($captcha_response['success'] && $captcha_response['score'] >= 0.7)) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $o_usuario = new Usuario();
        $o_cookie = new Cookie();
        $failed_attempts = $o_usuario->count_failed_login_attemps($ip);

        if ($failed_attempts['total'] >= LOGIN_NUMBER_ATTEMPS_DELAY) {
            $micro_seconds = (LOGIN_SLEEP_BASE_DELAY * $failed_attempts['total']) * 250000;
            usleep($micro_seconds);
        }

        if (isset($_POST['usuario']) && isset($_POST['senha'])) {
            $senha = SEGURANCA::executar_criptografia($_POST['senha']);
            $o_usuario->set_usuario($_POST['usuario']);
            $o_usuario->set_senha($senha);

            $usuario = $o_usuario->select_usuario_login();
            if ($usuario) {
                APP::gen_session($usuario['id_usuario']);
                $o_cookie->delete_cookies_from_user($usuario['id_usuario']);
                if (isset($_POST['remember_me'])) {
                    $token = APP::gen_token(24);
                    $o_cookie->insert_cookie($token, $usuario['id_usuario']);
                    setcookie("REMEMBER_ME", $token, time() + LOGIN_COOKIE_LIFETIME, "/");
                }
                APP::return_response(true, "Aguarde...");
            } else {
                $o_usuario->insert_failed_login_attempt($_POST['senha'], $ip);
                APP::return_response(false, "Credenciais inválidas");
            }
        } else {
            APP::return_response(false, "Credenciais inválidas");
        }
    } else {
        APP::return_response(false, "Captcha inválido");
    }
} else {
    APP::return_response(false, "Recaptcha não carregado");
}
