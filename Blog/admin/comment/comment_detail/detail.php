<?php
class commentDetail
{
    var $id = null;
    var $product_id = null;
    var $user_id = null;
    var $create_at = null;
    var $content = null;

    public function getAllCommentDetails()
    {
        $db = new connect();
        $select = "select * from detail_comment";
        $result = $db->pdo_query($select);
        return $result;
    }

    public function getAllCommentDetailsByKind($product_id)
    {
        $db = new connect();
        $select = "select * from detail_comment WHERE product_id = '$product_id' ORDER BY create_at DESC";
        $result = $db->pdo_query($select);
        return $result;
    }
  
    public function getCommentDetailById($id)
    {
        $db = new connect();
        $select = "select * from detail_comment WHERE id = $id";
        $commentDetail = $db->pdo_query_one($select, $id);
        return $commentDetail;
    }
    public function addCommentDetail($product_id, $user_id, $content, $create_at)
    {
        $db = new connect();
        $insert = "insert into detail_comment(product_id, user_id, content, create_at) values('$product_id', '$user_id', '$content' , '$create_at')";
        $db->pdo_execute($insert);
    }
    public function deleteCommentDetail($id)
    {
        $db = new connect();
        $delete = "delete from detail_comment WHERE id = '{$id}'";
        $result = $db->pdo_execute($delete, $id);
        return $result;
    }
    public function editCommentDetail($id, $content)
    {
        $db = new connect();
        $update = "update detail_comment SET content = '$content' WHERE id = '$id'";
        $result = $db->pdo_execute($update, $content);
        return $result;
    }
    public function getCommentCountByProduct($product_id)
    {
        $db = new connect();
        $select = "select count(*) as comment_count from detail_comment WHERE product_id = $product_id";
        $result = $db->pdo_query_one($select, $product_id);
        return $result['comment_count'];
    }
    
}
