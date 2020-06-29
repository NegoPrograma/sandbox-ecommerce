<?php

namespace Source\Controllers;
Use Source\Core\Controller;
use Source\Models\Comment;

class Comments extends Controller {

   public function postComment(){
       if($_POST['comment'] && !empty($_POST['comment'])){
           //getting product_id by URL
            $productURL = explode("/",$_SESSION['previous_URL']);
            $productId = $productURL[5];
            $commentModel = new Comment();
            $postContent = addslashes($_POST['comment']);
            $userId = $_SESSION['login_data']['id'];
            $postDate = date('Y:m:d H:i:s');
            $commentModel->postComment($postContent,$userId,$productId,$postDate);
       }
       header("location: ".$_SESSION['previous_URL']);
   }
};