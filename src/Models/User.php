<?php

namespace Source\Models;
Use Source\Core\Model;

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
            if ($result) {
                $result = $result["id"];
            }
        }
        return $result;
    }

    public function signUp($name, $email, $pass)
    {
        $message = "";
        if (!empty($email) && !empty($pass)){

            if ($this->checkDuplicateEmail($email)) {
                $message = "Esse e-mail já foi usado!";
            } else {
                $stmt = "INSERT INTO users (name, email, password) VALUES ('{$name}', '{$email}', '{$pass}')";
                $this->db->query($stmt);
                $message = "Seja bem vindo ao twiiter!";
            }

        } else {
            $message = "Por favor, preencha todos os dados!";
        }
        return $message;
    }

    public function checkDuplicateEmail($email)
    {
        $stmt = "SELECT * FROM users WHERE email  =  '{$email}'";
        $query = $this->db->query($stmt);
        if ($query->rowCount() > 0) {
            return true;
        }
        return false;
    }

}