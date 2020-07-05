<?php

namespace Source\Core;

use Source\Models\Product;
use Source\Utils\RequestValidator;
use Source\Utils\InputValidator;

class Controller{

    protected $requestValidator;
    protected $inputValidator;

    public function __construct()
    {
        $this->requestValidator = new RequestValidator();
        $this->inputValidator = new InputValidator();
    }
    protected $data;
    public function loadView($viewName,$viewData = array()){
        require_once 'src/Views/'.$viewName.'.php';
    }

    public function loadTemplate($viewName,$viewData = array()){
        $productModel = new Product();
        $viewData['categories'] = $productModel->getCategories();
        require_once "src/Views/template.php";
    }

  
}