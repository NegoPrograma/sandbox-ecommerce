<?php

namespace Source\Controllers;
Use Source\Core\Controller;
use Source\Models\Comment;
use Source\Models\Product;

class Products extends Controller {

    public $totalProductsPerPage;
    public function __construct()
    {
        $this->totalProductsPerPage = 10;
    }

    
    public function index(){
        $page = 1;
        $productModel = new Product();
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        $this->data['products'] = $productModel->getProducts($page,$this->totalProductsPerPage);
        $this->data['total_pages'] = $productModel->countTotalPages($this->totalProductsPerPage);
        $this->data['total_products_per_page'] = $this->totalProductsPerPage;
        $this->loadTemplate("products",$this->data);
    }

    public function buy($id){
        $productModel = new Product();
        $commentModel = new Comment();
        $this->data['product'] = $productModel->getProduct($id);
        $this->data['comments'] = $commentModel->getComments($id);

        $this->loadTemplate("single-product",$this->data);

    }

    public function cart(){
        if(isset($_POST['id']) && isset($_POST['quantity'])){
            $_SESSION['cart'][] = ["id"=> $_POST['id'], "quantity"=>$_POST['quantity']];
            echo "Produto adicionado ao carrinho com sucesso.";
        }
    }

    public function search($category = ""){
        $productModel = new Product();
        if($category != ""){
            $this->data['result'] = $productModel->queryProductsByCategory($category);
            if($this->data['result'] != null){
                $this->loadTemplate("products",$this->data);
            }else {
                echo "categoria inválida.";
                header("location: ".$_SESSION['previous_URL']);
                exit();
            }
        }else{
            if(!empty($_POST['query_string'])){
                $queryString = addslashes($_POST['query_string']);
                $this->data['result'] = $productModel->queryProductsByName($queryString);
                $this->loadTemplate("products",$this->data);
            }else{
                header("location: ".$_SESSION['previous_URL']);
            }
        }
    }

    
    
};