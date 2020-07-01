<?php

namespace Source\Models;

use Source\Core\Model;

class Comment extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getComments($product_id)
    {
        $stmt = "SELECT users.name,users.email, comments.*
            FROM users 
            INNER JOIN comments
            ON comments.product_id = {$product_id}
            AND users.id = comments.user_id
           ";

        $result = $this->db->query($stmt)->fetchAll($this->db::FETCH_ASSOC);
        $result = $this->getResponses($result);
        $result = $this->removeRepeatedQueries($result,$product_id);
    return $result;
    }

    private function removeRepeatedQueries($result, $product_id)
    {
        //removing repeated comments from main array
        $stmt = "SELECT users.name,users.email, comments.*
     FROM users 
     INNER JOIN comments
     ON comments.product_id = {$product_id}
     AND users.id = comments.user_id
    INNER JOIN responses
    ON responses.responded_comment_id = comments.id";
        $responses = $this->db->query($stmt)->fetchAll();
        $result = array_slice($result, 0, count($result) - count($responses));
        return $result;
    }

    private function getResponses($result)
    {
        $index = 0;
        foreach ($result as $comment) {
            $responded_comment_id = $comment['id'];
            $stmt = "SELECT * 
                    FROM responses  
                    WHERE responded_comment_id = {$responded_comment_id}";
            $responses = $this->db->query($stmt)->fetchAll();

            $comment['responses'] = array();
            if (count($responses) > 0) {
                foreach ($responses as $response) {
                    $responseId = $response['response_comment_id'];
                    $stmt = "SELECT users.name,users.email, comments.*
                            FROM users 
                            INNER JOIN comments 
                            ON comments.id = {$responseId}";
                    $comment['responses'][] = $this->db->query($stmt)->fetch($this->db::FETCH_ASSOC);
                }
                $result[$index]['responses'] = $comment['responses'];
            }
            $index++;
        }

        return $result;
    }

    public function postComment($postContent, $userId, $productId, $postDate, $responded_comment_id = null)
    {
        $stmt = "INSERT INTO comments (user_id,product_id,content,post_date)
                 VALUES ({$userId},{$productId},'{$postContent}','{$postDate}')";
        $this->db->query($stmt);
        if ($responded_comment_id) {
            $stmt = "INSERT INTO responses(responded_comment_id,response_comment_id)
                    VALUES ({$responded_comment_id},{$this->db->lastInsertId()})";
            $this->db->query($stmt);
        }
    }

    public function postResponse()
    {
    }
}
