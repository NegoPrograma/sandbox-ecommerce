<?php

namespace Source\Controllers;
Use Source\Core\Controller;
use Source\Models\Product;

class Products extends Controller {

    

    
    public function index(){
        $page = 1;
        $productModel = new Product();
        $totalProductsPerPage = 10;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        $this->data['products'] = $productModel->getProducts($page,$totalProductsPerPage);
        $this->data['total_pages'] = $productModel->countTotalPages($totalProductsPerPage);
        $this->data['total_products_per_page'] = $totalProductsPerPage;
        $this->loadTemplate("home",$this->data);
    }

    
    
};