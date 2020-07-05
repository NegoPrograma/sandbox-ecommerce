<?php

namespace Source\Models;
Use Source\Models\User;

class Seller extends User {

    public function __construct(){
        parent::__construct();
    }

    public function login($email, $pass)
    {
        $result = null;
        $email = addslashes($email);
        $pass = md5($pass);
        if (!empty($email) && !empty($pass)) {
            $stmt = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$pass}' AND is_seller = 1";
            $sql = $this->db->query($stmt);
            $result = $sql->fetch();
        }
        return $result;
    }

}