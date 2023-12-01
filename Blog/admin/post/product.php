<?php
class posts
{
    var $post_id = null;
    var $title = null;
    var $content = null;
    var $like_count = null;
    var $date = null;
    var $user_id = null;
    var $category_id = null;
    var $create_at = null;
    var $update_at = null;


    public function getAllPosts()
    {
        $db = new connect();
        $select = "select * from posts";
        $result = $db->pdo_query($select);
        return $result;
    }

    public function getByIdPosts($id)
    {
        $db = new connect();
        $query = 'SELECT * from posts where id= ' . $id;
        $result = $db->pdo_query_one($query);
        return $result;
    }
    public function addUPosts($title, $content, $like_count, $date, $category_id, $user_id, $create_at) // Thêm biến infor vào đây
    {
        $db = new connect();
        $insert = "insert into posts( title, content, like_count, date, category_id, user_id, create_at) values('$title', '$content', '$like_count', '$date', '$category_id', '$user_id', '$create_at')";
        $db->pdo_execute($insert);
    }
    public function deleteProducts($id)
    {
        $db = new connect();
        $delete = "delete from posts WHERE id = '{$id}'";
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
        $update = "update posts SET name = '$name', price = '$price', description = '$description', img = '$img', category_id = '$category_id', 
        author = '$author', publishing = '$publishing', pages = '$pages', date = '$date' WHERE id = '$id'";
        $db->pdo_execute($update);
    }
    public function getProductNameById($id)
    {
        $db = new connect();
        $select = "select name from posts WHERE id = $id";
        $product = $db->pdo_query_one($select, $id);
        return $product['name'];
    }
    public function searchByName($name)
    {
        $db = new connect();
        $query = "SELECT * FROM posts WHERE name LIKE '%$name%'";
        $result = $db->pdo_query($query);
        return $result;
    } // tìm kiếm product theo tên

    public function getRandomProducts($limit)
    {
        $db = new connect();
        $query = "SELECT * FROM posts ORDER BY RAND() LIMIT $limit";
        $result = $db->pdo_query($query);
        return $result;
    } // lấy các sản phẩm ngẫu nhiên từ bảng product
    public function getProductsByCategory($categoryName)
    {
        $db = new connect();
        $query = "SELECT * FROM posts WHERE category_id = (SELECT id FROM categories WHERE name = '$categoryName')";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function increaseViewCount($id)
    {
        $db = new connect();
        $update = "UPDATE posts SET views = views + 1 WHERE id = '$id'";
        $db->pdo_execute($update);
    }
}
