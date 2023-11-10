<?php
class category
{
    var $id = null;
    var $name = null;

    public function getAllCategory()
    {
        $db = new connect();
        $select = "select * from categories";
        $result = $db->pdo_query($select);
        return $result;
    }
    public function getByIdCategory($id){
        $db = new connect ();
        $query = "select * from categories where id= '{$id}' ";
        $result = $db->pdo_query_one($query);
        return $result;
    }
    public function addCategory($name)
    {
        $db = new connect();
        $insert = "insert into categories(name) values('$name')";
        $db->pdo_execute($insert);
    }
    public function editCategory($id, $name)
    {
        $db = new connect();
        $update = "UPDATE categories SET name = '$name' WHERE id = '$id'";
        $db->pdo_execute($update,$name);
    }
    public function deleteCategory($id)
    {
        $db = new connect();
        $delete = "delete from categories WHERE id = '{$id}'";
        $db->pdo_execute($delete);
    }
    
    
    public function getAllProducts()
{
    $db = new connect();
    $select = "SELECT products.*, categories.name AS category_name FROM products INNER JOIN categories ON products.category_id = categories.id";
    $result = $db->pdo_query($select);
    return $result;
} // bảng thống kê 
 
}
