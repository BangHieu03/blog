<?php
class user
{
    var $id = null;
    var $name = null;
    var $email = null;
    var $password = null;
    var $phone = null;
    var $role = null;

    public function getAllUsers()
    {
        $db = new connect();
        $select = "select * from users";
        $result = $db->pdo_query($select);
        return $result;
    }
    public function checkUser($name, $password)
    {
        $db = new connect();
        $select = "select * from users where name = '$name' and password = '$password'";
        $result = $db->pdo_query_one($select);
        if ($result != null)
            return true;
        else
            return false;
    }
    public function userId($name, $password)
    {
        $db = new connect();
        $select = "select id from users where name='$name' and password ='$password'";
        // echo $select;
        $result = $db->pdo_query_one($select);
        if (is_array($result) && isset($result['id'])) {
            return $result['id']; // Trả về ID người dùng duy nhất, không phải một mảng
        }
    }

    public function getUserById($id)
    {
        $db = new connect();
        $select = "select * from users WHERE id = $id";
        $user = $db->pdo_query_one($select, $id);
        return $user;
    }
    public function addUser($name, $email, $password, $phone, $role)
    {
        $db = new connect();
        $insert = "insert into users( name, email, password, phone, role) values('$name', '$email', '$password', '$phone', '$role')";
        $db->pdo_execute($insert);
    }
    public function deleteUser($id)
    {
        $db = new connect();
        $delete = "delete from users WHERE id = '{$id}'";
        $result = $db->pdo_execute($delete, $id);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function editUser($id, $name, $email, $password, $phone, $role)
    {
        $db = new connect();
        $update = "update users SET name = '$name', email = '$email', password = '$password', phone = '$phone', role = '$role' WHERE id = '$id'";
        $db->pdo_execute($update, $name, $email, $password, $phone, $role);
    }

    public function getUserNameById($id)
    {
        $db = new connect();
        $select = "select name from users WHERE id = $id";
        $user = $db->pdo_query_one($select, $id);
        return $user['name'];
    }
    public function getUserByEmail($email)
    {
        $db = new connect();
        $select = "select * from users WHERE email = '$email'";
        $user = $db->pdo_query_one($select);
        return $user;
    }
    public function getUserByName($name)
    {
        $db = new connect();
        $select = "select * from users WHERE name = '$name'";
        $user = $db->pdo_query_one($select);
        return $user;
    }
}
