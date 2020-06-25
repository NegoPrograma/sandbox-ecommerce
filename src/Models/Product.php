<?php

namespace Source\Models;
Use Source\Core\Model;

class Product extends Model {

    public function __construct(){
        parent::__construct();
    }

    //query("SELECT * FROM users LIMIT $initialId,$totalDataRowsByPage")
    public function getProducts($page,$totalProductsPerPage){
        $initialId = ($page-1)*$totalProductsPerPage+1;//1,10 //2,inicial = 11 => 20//3, 21 =>30
        $stmt = "SELECT * FROM products LIMIT {$initialId},{$totalProductsPerPage}";
        $result = $this->db->query($stmt)->fetchAll();
        return $result;
    }
    
    public function countTotalPages($totalProductsPerPage){
        $stmt = "SELECT * FROM products";
        $result = $this->db->query($stmt)->rowCount();
        return $result/$totalProductsPerPage;
    }

}