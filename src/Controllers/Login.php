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
            print_r($response);
            if ($response != null) {
                $_SESSION["login_data"] = $response;
            } else {
                $this->data["message"] = "Os dados preenchidos estão incorretos ou você ainda não confirmou o e-mail de registro.";
            }
            header("location: products");
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
    
    public function logout(){
        unset($_SESSION['login_data']);
        header("location: http://local:8080/sandbox-ecommerce/products");
    }
};