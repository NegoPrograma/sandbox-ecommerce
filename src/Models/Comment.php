<?php

namespace Source\Models;
Use Source\Core\Model;

class Comment extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function getComments($product_id){
    $stmt = "SELECT users.name,users.email, comments.* 
            FROM comments 
            INNER JOIN users 
            ON comments.product_id = {$product_id}
            AND users.id = comments.user_id";
   
   $result = $this->db->query($stmt)->fetchAll();
    return $result;
    }

    public function postComment($postContent,$userId,$productId,$postDate){
        $stmt = "INSERT INTO comments (user_id,product_id,content,post_date)
                 VALUES ({$userId},{$productId},'{$postContent}','{$postDate}')";
        $this->db->query($stmt);

    }

}