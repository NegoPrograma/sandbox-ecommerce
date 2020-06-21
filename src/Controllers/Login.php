<?php

namespace Source\Controllers;
Use Source\Core\Controller;
Use Source\Models\User;


class Login extends Controller {

    

    
    public function index()
    {
        if(isset($_POST["email"]) && !empty($_POST["email"])) {
            $user = new User();
            $email = $_POST["email"];
            $pass = $_POST["password"];
            $responseId = $user->login($email, $pass);

            if ($responseId != null) {
                $_SESSION["login_data"] = $responseId;
                header("location: products");
            } else {
                $this->data["message"] = "Os dados preenchidos estão incorretos ou você ainda não confirmou o e-mail de registro.";
            }
        }

        $this->loadView("login", $this->data);
    }

    public function signup()
    {
        $user = new user();
        if (isset($_POST["name"]) && !empty($_POST["name"])) {
            $name = addslashes($_POST["name"]);
            $email = addslashes($_POST["email"]);
            $password = md5($_POST["password"]);

            $this->data['message'] = $user->signUp($name, $email, $password);
            if ($this->data['message'] == "Usuário cadastrado com sucesso") {
                header("location: ../home");
            }
        }

        $this->loadView("signup", $this->data);
    }
    
    
};