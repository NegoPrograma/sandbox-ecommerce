<?php

namespace Source\Utils;



class RequestValidator
{

    /**
     * Este método é utilizado para garantir que toda request post 
     * tenha o mesmo número de parâmetros pedidos por cada rota.
     * Também verifica se esses parâmetros são de fato dados e não parâmetros vazios.
     */
    public function hasAllPostRequestData($numberOfParams){
        if(count($_POST) == $numberOfParams){
            $numericIndexedPostArray = array_values($_POST);
            for($index = 0; $index < $numberOfParams; $index++){
                if(empty($numericIndexedPostArray[$index]))
                    return false;
            }
            return true;
        }
        return false;
    }
}
