<?php

        //Pego as cidades ref. ao estado selecionado
        $query = "SELECT 
                    id_municipio, 
                    nome
                 FROM
                    municipios
                 WHERE
                    uf = '{$_POST['uf']}' ";
        
//        $res_cidades =  DATABASE::fetch_all($query);
        
        if($res_cidades){ ?>
            <select class="form-control" name="cidade" id="cidade">
                <option value="" disabled="disabled" selected="selected">Selecione</option>
                <?php foreach($res_cidades as $cidades) { ?>
                    <option value="<?php echo $cidades['id_municipio']; ?>"><?php echo $cidades['nome']; ?> </option>
                <?php } ?>
            </select>
        <?php } ?>   