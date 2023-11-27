<?php
class user
{
    var $user_id = null;
    var $name = null;
    var $email = null;
    var $password = null;
    var $phone = null;
    var $avatar = null;
    var $name_real = null;
    var $date = null;
    var $sex = null;
    var $role = null;
    var $password_reset_token = null;
    var $create_at = null;
    var $update_at = null;

    public function getAllUsers()
    {
        $db = new connect();
        $select = "select * from users";
        $result = $db->pdo_query($select);
        return $result;
    }
    public function checkUser($name)
    {
        $db = new connect();
        $select = "select * from users where name = '$name'";
        $result = $db->pdo_query_one($select);
        if ($result != null)
            return true;
        else
            return false;
    }

    public function userId($name)
    {
        $db = new connect();
        $select = "select user_id from users where name='$name'";
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
    public function addUser($name, $email, $password, $phone, $avatar, $name_real, $date, $sex, $role, $create_at)
    {
        $db = new connect();
        $insert = "insert into users( name, email, password, phone, avatar ,name_real, date, sex, role, create_at) values('$name', '$email', '$password','$phone','$avatar', '$name_real','$date', '$sex', '$role', '$create_at')";
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
    public function editUser($user_id, $name, $email, $password, $phone, $avatar, $name_real, $date, $sex, $role, $update_at)
    {
        $db = new connect();
        $update = "update users SET  name = '$name', email = '$email', password = '$password', phone = '$phone',avatar = '$avatar', name_real = '$name_real', date = '$date', sex = '$sex' , role = '$role',  update_at = '$update_at' WHERE user_id = '$user_id'";
        $db->pdo_execute($update, $name, $email, $password, $phone, $avatar, $name_real, $date, $sex, $role, $update_at);
    }
    public function updateAvatar($user_id, $avatar)
    {
        $db = new connect();
        $update = "UPDATE users SET avatar = '$avatar' WHERE user_id = '$user_id'";
        $db->pdo_execute($update);
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
    public function createPasswordReset($email)
    {
        $token = bin2hex(random_bytes(50)); // tạo token ngẫu nhiên
        $db = new connect();
        $update = "UPDATE users SET password_reset_token = '$token' WHERE email = '$email'";
        $db->pdo_execute($update);
        return $token;
    }

    public function updatePassword($username, $new_password)
    {
        $db = new connect();
        // Mã hóa mật khẩu mới
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $query = "UPDATE users SET password = '$hashed_password' WHERE name = '$username'";
        $db->pdo_execute($query);
    }
    public function verifyPassword($name, $password)
    {
        $db = new connect();
        $query = "SELECT password FROM users WHERE name = '$name'";
        $result = $db->pdo_query_one($query);
        if ($result) {
            $hashedPassword = $result['password'];
            return password_verify($password, $hashedPassword);
        }
        return false; // Trả về false nếu tên đăng nhập không tồn tại
    }
    public function changePassword($email, $newPassword, $confirmPassword)
    {
        if ($newPassword === $confirmPassword) {
            $this->updatePassword($email, $newPassword);
            echo "<div class='alert alert-success'>Đã đổi mật khẩu thành công.</div>";
            return true;
        } else {
            echo "<div class='alert alert-danger'>Mật khẩu mới và mật khẩu xác nhận không khớp.</div>";
            return false;
        }
    }
    // public function getGoogleUser($goo) {
    //     $user = (new Google_Service_Oauth2($goo))->userinfo_v2_me->get();
    //     return $user;
    // }
    
}
