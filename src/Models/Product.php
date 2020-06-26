<?php

namespace Source\Models;
Use Source\Core\Model;

class Product extends Model {

    public function __construct(){
        parent::__construct();
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

    public function queryProductsByName($totalProductsPerPage = 0,$page = 0,$queryString){
        $stmt = "SELECT * FROM products";
        $allProducts = $this->db->query($stmt)->fetchAll();
        $result = array();
        foreach($allProducts as $product){
            if(strpos($product['name'],$queryString) || $product['name']== $queryString){
                $result[] = $product;
            }
        }
        return $result;
    }

}