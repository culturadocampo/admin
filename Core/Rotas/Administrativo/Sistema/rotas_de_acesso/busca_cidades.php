<?php
        //Pego as cidades ref. ao estado selecionado

        $query = "SELECT 
                    id_municipio, 
                    nome
                 FROM
                    municipios
                 WHERE
                    uf = '{$_POST['uf']}' ";
        
        $res_cidades =  DATABASE::fetch_all($query);
        
        if($res_cidades){

            echo json_encode($res_cidades);
            die();
        } else {
            return false;
        }