<?php

namespace Source\Core;

use Source\Models\Product;

class Controller{

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