<?php
class products
{
    var $id = null;
    var $name = null;
    var $price = null;
    var $description = null;
    var $img = null;
    var $category_id = null;
    var $author = null;
    var $publishing = null;
    var $pages = null;
    var $infor = null;
    var $date = null;



    public function getAllProducts()
    {
        $db = new connect();
        $select = "select * from products";
        $result = $db->pdo_query($select);
        return $result;
    }

    public function getByIdProducts($id)
    {
        $db = new connect();
        $query = 'SELECT * from products where id= ' . $id;
        $result = $db->pdo_query_one($query);
        return $result;
    }
    public function addUProducts($name, $price, $description, $img, $category_id, $author, $publishing, $pages, $date, $infor) // Thêm biến infor vào đây
    {
        $db = new connect();
        // Thêm infor vào câu lệnh SQL
        $insert = "insert into products( name, price, description, img, category_id, author, publishing, pages, date, infor) values('$name', '$price', '$description', '$img', '$category_id', '$author', '$publishing', '$pages', '$date', '$infor')";
        $db->pdo_execute($insert);
    }
    public function deleteProducts($id)
    {
        $db = new connect();
        $delete = "delete from products WHERE id = '{$id}'";
        $result = $db->pdo_execute($delete, $id);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function editProducts($id, $name, $price, $description, $img, $category_id, $author, $publishing, $pages, $date)
    {
        $db = new connect();
        $update = "update products SET name = '$name', price = '$price', description = '$description', img = '$img', category_id = '$category_id', 
        author = '$author', publishing = '$publishing', pages = '$pages', date = '$date' WHERE id = '$id'";
        $db->pdo_execute($update);
    }
    public function getProductNameById($id)
    {
        $db = new connect();
        $select = "select name from products WHERE id = $id";
        $product = $db->pdo_query_one($select, $id);
        return $product['name'];
    }
    public function searchByName($name)
    {
        $db = new connect();
        $query = "SELECT * FROM products WHERE name LIKE '%$name%'";
        $result = $db->pdo_query($query);
        return $result;
    } // tìm kiếm product theo tên

    public function getRandomProducts($limit)
    {
        $db = new connect();
        $query = "SELECT * FROM products ORDER BY RAND() LIMIT $limit";
        $result = $db->pdo_query($query);
        return $result;
    } // lấy các sản phẩm ngẫu nhiên từ bảng product
    public function getProductsByCategory($categoryName)
    {
        $db = new connect();
        $query = "SELECT * FROM products WHERE category_id = (SELECT id FROM categories WHERE name = '$categoryName')";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function increaseViewCount($id)
    {
        $db = new connect();
        $update = "UPDATE products SET views = views + 1 WHERE id = '$id'";
        $db->pdo_execute($update);
    }
}
