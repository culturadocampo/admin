<?php


if($_SERVER['HTTP_HOST'] != 'localhost'){
    $captcha = $_POST['g-recaptcha-response'];
    if (!$captcha) {
        $response['result'] = false;
        $response['message'] = "Por favor, confirme o CAPTCHA.";
        echo json_encode($response);
        exit;
    }
    $resposta_captcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Len6HYUAAAAAEar0mmQJgA0mSkGpzQPU21Iu484&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
    $resposta_captcha = json_decode($resposta_captcha, true);
    $resultado_chave = $resposta_captcha['success'];
}else{
    $resultado_chave = TRUE;
}

if (STRINGS::is_nome_valido($_POST['nome'])) {
    if (STRINGS::is_email_valido($_POST['email'])) {
        if (STRINGS::is_usuario_valido($_POST['usuario'])) {
            if (strlen($_POST['usuario']) >= 5) {
                if (STRINGS::is_senha_valida($_POST['senha'])) {
                    if (strlen($_POST['senha']) >= 6) {
                        if($_POST['senha'] == $_POST['senha_conf']){
                            if(isset($_POST['conf_termos']) || true){ //prescisa corrigir esta regra.
                                if($resultado_chave){
                                    $o_usuario = new Usuario();

                                    $o_usuario->set_nome($_POST['nome']);
                                    $o_usuario->set_email($_POST['email']);
                                    $o_usuario->set_usuario($_POST['usuario']);                                   
                                    $senha = Seguranca::executar_criptografia($_POST['senha']);                       
                                    $o_usuario->set_senha($senha);

                                    $o_usuario->insert_novo_usuario();
                                    $response['message'] = "Cadastro feito com sucesso, por favor digite seu login e senha no sistema";
                                    $response['result'] = true;
                                }else{
                                    $response['result'] = false;
                                    $response['message'] = "A chave captcha esta incorreta";
                                }
                            }else{
                                
                                $response['result'] = false;
                                $response['message'] = "Termo de uso não aceito.";
                            }
                        }else{
                            $response['result'] = false;
                            $response['message'] = "A confirmação da senha esta incorreta";
                        }
                    } else {
                        $response['result'] = false;
                        $response['message'] = "A SENHA deve conter ao menos 6 caracteres";
                    }
                } else {
                    $response['result'] = false;
                    $response['message'] = "A SENHA não pode conter espaços";
                }
            } else {
                $response['result'] = false;
                $response['message'] = "O USUÁRIO deve conter ao menos 5 caracteres";
            }
        } else {
            $response['result'] = false;
            $response['message'] = "Favor informar um USUÁRIO válido";
        }
    } else {
        $response['result'] = false;
        $response['message'] = "Favor informar um E-MAIL válido";
    }
} else {
    $response['result'] = false;
    $response['message'] = "Favor informar um NOME válido";
}

echo json_encode($response);






