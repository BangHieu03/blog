<?php
class comment
{
    var $id = null;
    var $total_comments = null;
    var $views = null;
    var $create_at = null;
    var $product_id = null;


    public function getAllComments()
    {
        $db = new connect();
        $select = "select * from comments";
        $result = $db->pdo_query($select);
        return $result;
    }
    public function getCommentById($id)
    {
        $db = new connect();
        $select = "select * from comments WHERE id = $id";
        $comment = $db->pdo_query_one($select, $id);
        return $comment;
    }
    public function addComment($id, $product_id, $create_at, $total_comments)
    {
        $db = new connect();
        $commentDetail = new commentDetail();
        $total_comments = $commentDetail->getCommentCountByProduct($product_id);
        $create_at = date('Y-m-d H:i:s');
        $insert = "insert into comments(id, total_comments, create_at, product_id) values( '$id','$total_comments','$create_at', '$product_id')";
        $db->pdo_execute($insert);
    }
    public function deleteComment($id)
    {
        $db = new connect();
        $delete = "delete from comments WHERE id = '{$id}'";
        $result = $db->pdo_execute($delete, $id);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function editComment($id, $total_comments, $update_at)
    {
        $db = new connect();
        $update = "update comments SET total_comments = '$total_comments', update_at = '$update_at' WHERE id = '$id'";
        $db->pdo_execute($update, $total_comments);
    }
    public function updateTotalComments($product_id)
    {
        $db = new connect();
        $commentDetail = new commentDetail();
        $total_comments = $commentDetail->getCommentCountByProduct($product_id);
        $update = "UPDATE comments SET total_comments = '$total_comments' WHERE product_id = '$product_id'";
        $db->pdo_execute($update);
    }

    public function getProductIdsByUser($user_id)
    {
        $db = new connect();
        $select = "SELECT product_id FROM detail_comment WHERE user_id = $user_id";
        $result = $db->pdo_query($select, $user_id);
        return $result;
    }
    public function increaseViewCount($id)
    {
        $db = new connect();
        $update = "UPDATE comments SET views = views + 1 WHERE id = '$id'";
        $db->pdo_execute($update);
    }
}
