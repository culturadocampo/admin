<pre>
<?php print_r($_POST); ?>
</pre>
<?php
    if($_POST['cpf'] == "" || strlen($_POST['cpf']) != 11 || is_numeric($_POST['cpf']) == false){
        $response['result'] = false;
        $response['message'] = "Por favor, preencha o campo CPF corretamente";
    }
    
    if($_POST['rg'] == "" || is_numeric($_POST['rg']) == false){
        $response['result'] = false;
        $response['message'] = "Por favor, preencha o campo RG corretamente";
    }
    
    if($_POST['cad_pro'] == ""){
        $response['result'] = false;
        $response['message'] = "Por favor, preencha o campo Cad Pro corretamente";
    }
    
    if($_POST['data_nascimento'] == ""){
        $response['result'] = false;
        $response['message'] = "Por favor, preencha o campo Data de Nascimento corretamente";
    }
    
    if($_POST['estado'] == "" || $_POST['estado'] == null){
        $response['result'] = false;
        $response['message'] = "Por favor, preencha o campo Estado corretamente";
    }
    
    if($_POST['cidade'] == "" || $_POST['cidade'] == null){
        $response['result'] = false;
        $response['message'] = "Por favor, preencha o campo Cidade corretamente";
    }
    
    if($_POST['bairro'] == ""){
        $response['result'] = false;
        $response['message'] = "Por favor, preencha o campo Bairro corretamente";
    }
    
    if($_POST['rua'] == ""){
        $response['result'] = false;
        $response['message'] = "Por favor, preencha o campo Logradouro corretamente";
    }
    
    if($_POST['numero'] == "" || is_numeric($_POST['numero']) == false){
        $response['result'] = false;
        $response['message'] = "Por favor, preencha o campo Nº corretamente";
    }
    
    if($_POST['complemento'] == ""){
        $response['result'] = false;
        $response['message'] = "Por favor, preencha o campo Complemento corretamente";
    }
    
        $o_produtor = new Produtor();
        
        $o_produtor->set_cpf($_POST['cpf']);
        $o_produtor->set_rg($_POST['rg']);
        $o_produtor->set_cad_pro($_POST['cad_pro']);
        $o_produtor->set_data_nascimento($_POST['data_nascimento']);
        $o_produtor->set_cidade( $_POST['cidade']);
        $o_produtor->set_bairro($_POST['bairro']);
        $o_produtor->set_rua( $_POST['rua']);
        $o_produtor->set_numero($_POST['numero']);
        $o_produtor->set_complemento($_POST['complemento']);
        
        $o_produtor->insert_usuario_produtor();
        
        $response['result'] = true;
        
        echo json_encode($response);
