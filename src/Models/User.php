<?php

namespace Source\Models;
Use Source\Core\Model;
Use Source\Utils\InputValidator;

class User extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function login($email, $pass)
    {
        $result = null;
        $email = addslashes($email);
        $pass = md5($pass);
        if (!empty($email) && !empty($pass)) {
            $stmt = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$pass}'";
            $sql = $this->db->query($stmt);
            $result = $sql->fetch();
           
        }
        return $result;
    }

    public function signUp($name, $email, $pass,$pass_confirm,$cpf)
    {
        $message = "";
        $util = new InputValidator();
        if (!empty($email) && !empty($pass) && !empty($cpf)){
            if($pass != $pass_confirm){
                $message .= "Suas senhas estão diferentes!<br>";
            }
            if($util->checkDuplicateEmail($email)) 
                $message .= "Esse e-mail já foi usado!<br>";
            if(!$util->checkCPF($cpf)){
                $message .= "CPF inválido!\n";
            }else if($util->checkDuplicateCPF($cpf)){
                $message .= "CPF já cadastrado!<br>";
            } 
            
            
            
            if($message == ""){
                $cpf = $util->formatCPF($cpf);
                $stmt = "INSERT INTO users (name, email, password,cpf) VALUES ('{$name}', '{$email}', '{$pass}','{$cpf}')";
                $this->db->query($stmt);
                //logando o usuário automaticamente após registro.
                $stmt = "SELECT * FROM users WHERE id = {$this->db->lastInsertId()}";
                $_SESSION['login_data'] = $this->db->query($stmt)->fetch();
            }

        } else {
            $message .= "Por favor, preencha todos os dados!<br>";
        }
        return $message;
    }

    

}