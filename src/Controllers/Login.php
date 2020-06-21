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
            $response = $user->login($email, $pass);

            if ($response != null) {
                
                $_SESSION["login_data"] = $response;
                print_r($_SESSION);
                //header("location: http://local:8080/sandbox-ecommerce/products");
            } else {
                $this->data["message"] = "Os dados preenchidos estão incorretos ou você ainda não confirmou o e-mail de registro.";
            }
        }

        
    }

    public function signup()
    {
        $user = new User();
        
        if (isset($_POST["name"]) && !empty($_POST["name"])){
                $name = addslashes($_POST["name"]);
                $email = addslashes($_POST["email"]);
                $password = md5($_POST["password"]);
                $password_confirm = md5($_POST["password_confirm"]);
                $cpf = addslashes($_POST['cpf']);

                $this->data['message'] = $user->signUp($name, $email, $password,$password_confirm,$cpf);
                if($this->data['message'] == ""){
                    header("location: http://local:8080/sandbox-ecommerce/products");
                }
            }
        $this->loadView("signup", $this->data);
    }
    
    
};