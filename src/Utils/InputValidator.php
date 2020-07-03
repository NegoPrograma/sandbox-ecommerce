<?php

namespace Source\Utils;

use Source\Models\User;


class InputValidator
{

    /**
     * 
     */

    public function formatCPF($cpf){
        if(strlen(utf8_decode($cpf)) == 11){
            $cpf = substr_replace($cpf,".",3,0);//111[.]11111111
            $cpf = substr_replace($cpf,".",7,0);//111.111[.]11111
            $cpf = substr_replace($cpf,"-",11,0);//111.111.111[-]11
        }
        return $cpf;
    }

    public function checkCPF($cpf)
    {

        // Verifica se um número foi informado
        if (empty($cpf)) {
            return false;
        }

        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if (
            $cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999'
        ) {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    return false;
                }
            }

            return true;
        }
    }

    public function checkDuplicateEmail($email)
    {
        $user = new User();
        $stmt = "SELECT * FROM users WHERE email  =  '{$email}'";
        $query = $user->db->query($stmt);
        if ($query->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function checkDuplicateCPF($cpf)
    {
        $user = new User();
        $stmt = "SELECT * FROM users WHERE cpf  =  '{$cpf}'";
        $query = $user->db->query($stmt);
        if ($query->rowCount() > 0) {
            return true;
        }
        return false;
    }

}
