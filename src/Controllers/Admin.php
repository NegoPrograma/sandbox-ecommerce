<?php

namespace Source\Controllers;
Use Source\Core\Controller;
Use Source\Models\Seller;

class Admin extends Controller {

    public function __construct()
    {
        
    }

    

    
    public function index()
    {
        if(isset($_POST["email"]) && !empty($_POST["email"])) {
            $sellerModel = new Seller();
            $email = $_POST["email"];
            $pass = $_POST["password"];
            $response = $sellerModel->login($email, $pass);
            if ($response != null) {
                $_SESSION["login_data"] = $response;
            } else {
                $this->data["message"] = "Os dados preenchidos estão incorretos ou você ainda não confirmou o e-mail de registro.";
            }
        }
        $this->loadView("seller",$this->data);
    }

    public function admin(){

        $this->loadView("seller",$this->data);
    }

    public function addproduct(){
        
    }

}