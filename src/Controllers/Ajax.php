<?php

namespace Source\Controllers;
Use Source\Core\Controller;
use Source\Models\Comment;

class Ajax extends Controller {

   public function postComment(){
       if($_POST['comment'] && !empty($_POST['comment'])){
           $commentModel = new Comment();
           $postContent = $_POST['comment'];
           $userId = $_POST['user_id'];
           $productId = $_POST['product_id'];
           $postDate = date('d:m:Y H:i');
           $isResponse = $_POST['is_response'];
           $commentModel->postComment($postContent,$userId,$productId,$postDate,$isResponse);
       }
   }
};