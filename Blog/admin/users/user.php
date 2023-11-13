<?php
class user
{
    var $user_id = null;
    var $name = null;
    var $email = null;
    var $password = null;
    var $avatar = null;
    var $infor = null;
    var $phone = null;
    var $name_real = null;
    var $date = null;
    var $sex = null;

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
        $select = "select user_id from users where name='$name' and password ='$password'";
        // echo $select;
        $result = $db->pdo_query_one($select);
        if (is_array($result) && isset($result['user_id'])) {
            return $result['user_id']; // Trả về ID người dùng duy nhất, không phải một mảng
        }
    }

    public function getUserById($user_id)
    {
        $db = new connect();
        $select = "select * from users WHERE user_id = $user_id";
        $user = $db->pdo_query_one($select, $user_id);
        return $user;
    }
    public function addUser($name, $email, $password, $avatar, $role)
    {
        $db = new connect();
        $insert = "insert into users( name, email, password, phone, role) values('$name', '$email', '$password', '$avatar', '$role')";
        $db->pdo_execute($insert);
    }
    public function deleteUser($user_id)
    {
        $db = new connect();
        $delete = "delete from users WHERE user_id = '{$user_id}'";
        $result = $db->pdo_execute($delete, $user_id);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function editUser($user_id, $name, $email, $password, $information_id, $avatar, $role)
    {
        $db = new connect();
        $update = "update users SET name = '$name', email = '$email', password = '$password', information_id = '$information_id',avatar = $avatar, role = '$role' WHERE user_id = '$user_id'";
        $db->pdo_execute($update, $name, $email, $password, $information_id, $avatar, $role);
    }

    public function getUserNameById($user_id)
    {
        $db = new connect();
        $select = "select name from users WHERE user_id = $user_id";
        $user = $db->pdo_query_one($select, $user_id);
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
