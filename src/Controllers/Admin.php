<?php

namespace Source\Controllers;
Use Source\Core\Controller;
use Source\Models\Product;
Use Source\Models\Seller;

class Admin extends Controller {

    public function __construct()
    {
        parent::__construct();
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
        if(isset($_POST['name']) && $this->requestValidator->hasAllPostRequestData(4)){
            $productModel = new Product();
            $this->data['result'] = $productModel->addNewProduct($_POST['name'],$_POST['category'],$_POST['price'],$_POST['in_storage'],$_FILES['product_image']);
        }
        $this->loadView("addproduct", $this->data);
    }

}