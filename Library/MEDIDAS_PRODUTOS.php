<?php

class MEDIDAS_PRODUTOS {

    static function getMedidasProd($medida) {
        // Os tipos de medidas estão cadastradas na tabela produtos_medidas
         if($medida == 1){
            $medida = "Unidade";
        }else if($medida == 2){
            $medida = "KG";
        }
        return $medida;
    }
}
