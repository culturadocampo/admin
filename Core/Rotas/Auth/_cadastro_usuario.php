<?php

if (Strings::is_nome_valido($_POST['nome'])) {
    if (Strings::is_email_valido($_POST['email'])) {
        if (Strings::is_usuario_valido($_POST['usuario'])) {
            if (strlen($_POST['usuario']) >= 5) {
                if (Strings::is_senha_valida($_POST['senha'])) {
                    if (strlen($_POST['senha']) >= 6) {

                        $o_usuario = new Usuario();

                        $o_usuario->set_nome($_POST['nome']);
                        $o_usuario->set_email($_POST['email']);
                        $o_usuario->set_usuario($_POST['usuario']);
                        $o_usuario->set_senha($_POST['senha']);

                        $o_usuario->insert_novo_usuario();

                        $response['result'] = true;
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






