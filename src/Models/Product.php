<?php

namespace Source\Models;
Use Source\Core\Model;

class Product extends Model {

    private $categories = ["eletrodomestico","movel","eletronicos","utensílios","smartphone","notebooks"];
    public function __construct(){
        parent::__construct();
    }

    public function addNewProduct($name,$category,$price,$quantity_avaiable,$image_path){
        $stmt = "INSERT INTO products(name,category,price,in_storage,image_path)
                VALUES ('{$name}','{$category}',{$price},{$quantity_avaiable},'{$image_path}')";
        $this->db->query($stmt);

    }
    public function getCategories(){
        return $this->categories;
    }

    public function getProducts($page,$totalProductsPerPage){
        $initialId = ($page-1)*$totalProductsPerPage+1;
        $stmt = "SELECT * FROM products LIMIT {$initialId},{$totalProductsPerPage}";
        $result = $this->db->query($stmt)->fetchAll();
        return $result;
    }
    
    public function getProduct($id){
        $stmt= "SELECT * FROM products WHERE id = {$id}";
        $result = $this->db->query($stmt)->fetch();
        return $result;
    }

    public function countTotalPages($totalProductsPerPage){
        $stmt = "SELECT * FROM products";
        $result = $this->db->query($stmt)->rowCount();
        return $result/$totalProductsPerPage;
    }

    private function validateCategory($category){
        if(in_array($category,$this->categories))
            return true;
        return false;
    }

    public function setCategories(){
        $stmt = "SELECT * FROM products";
        $result = $this->db->query($stmt)->fetchAll();

        foreach($result as $product){
            $id = $product['id'];
            $randomNumber = rand(0,count($this->categories)-1);
            $randomCategory = $this->categories[$randomNumber];
            $stmt = "UPDATE products SET category = '{$randomCategory}' WHERE id = {$id}";
            $this->db->query($stmt);
        }
    }

    public function queryProductsByCategory($category){
        if($this->validateCategory($category)){
            $stmt = "SELECT * FROM products WHERE category = '{$category}'";
            $result = $this->db->query($stmt)->fetchAll();
            return $result;
        }
        return null;
        
    }
    public function queryProductsByName($queryString){
        $stmt = "SELECT * FROM products";
        $allProducts = $this->db->query($stmt)->fetchAll();
        $result = array();
        foreach($allProducts as $product){
            if(strpos($product['name'],$queryString) !== false || $product['name'] == $queryString){
                $result[] = $product;
            }
        }
        return $result;
    }


}