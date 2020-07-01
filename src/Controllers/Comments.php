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
            //getting comment id in case of response comment.
            
            $commentModel = new Comment();
            $postContent = addslashes($_POST['comment']);
            $userId = $_SESSION['login_data']['id'];
            $postDate = date('Y:m:d H:i:s');
            if(isset($_POST['comment_id']))
                $commentModel->postComment($postContent,$userId,$productId,$postDate,$_POST['comment_id']);
            else
                $commentModel->postComment($postContent,$userId,$productId,$postDate);
       }
       header("location: ".$_SESSION['previous_URL']);
   }

   public function respondComment(){

   }
};