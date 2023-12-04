<?php
function slug($text)
{

    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

    // trim
    $text = trim($text, '-');

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

// Hàm này nhận vào một timestamp và trả về một chuỗi thời gian tính từ thời điểm hiện tại
function time_ago($timestamp)
{

    // Lấy timestamp của thời gian hiện tại
    $current_time = time();
    // Tính khoảng cách thời gian giữa thời gian đăng bài viết và thời gian hiện tại
    $time_difference = $current_time - $timestamp;
    // Nếu khoảng cách thời gian nhỏ hơn 1 giây, trả về chuỗi "Vừa xong"
    if ($time_difference < 1) {
        return 'Vừa xong';
    }
    // Một mảng chứa các đơn vị thời gian và số giây tương ứng
    $time_units = array(
        12 * 30 * 24 * 60 * 60 => 'năm',
        30 * 24 * 60 * 60      => 'tháng',
        24 * 60 * 60           => 'ngày',
        60 * 60                => 'giờ',
        60                     => 'phút',
        1                      => 'giây'
    );
    // Duyệt qua các đơn vị thời gian trong mảng
    foreach ($time_units as $unit => $text) {
        // Nếu khoảng cách thời gian lớn hơn hoặc bằng đơn vị thời gian hiện tại
        if ($time_difference >= $unit) {
            // Tính số lượng đơn vị thời gian
            $number_of_units = floor($time_difference / $unit);
            // Trả về chuỗi thời gian theo định dạng, ví dụ: 2 giờ trước, 3 ngày trước
            return $number_of_units . ' ' . $text . ' trước';
        }
    }
}

function userLikesDislikes($postid, $userid, $rating_action, $db)
{
    $sql = "SELECT COUNT(*) FROM user_rating WHERE userid=:userid 
        AND postid=:postid AND rating_action=:rating_action";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    $stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
    $stmt->bindParam(':rating_action', $rating_action, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}
function getLikesDislikes($postid, $rating_action, $db)
{
    $sql = "SELECT COUNT(*) FROM user_rating WHERE postid = :postid AND rating_action=:rating_action";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
    $stmt->bindParam(':rating_action', $rating_action, PDO::PARAM_STR);
    $stmt->execute();
    $number_of_rows = $stmt->fetchColumn();
    return $number_of_rows;
}
function insert_vote($userid, $postid, $rating_action, $db)
{
    $sql = "INSERT INTO user_rating(userid, postid, rating_action) 
             VALUES (:userid, :postid, :rating_action) 
             ON DUPLICATE KEY UPDATE rating_action=:rating_action";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    $stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
    $stmt->bindParam(':rating_action', $rating_action, PDO::PARAM_STR);
    $stmt->execute();
}
function delete_vote($userid, $postid, $db)
{
    $sql = "DELETE FROM user_rating WHERE userid=:userid AND postid=:postid";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    $stmt->bindParam(':postid', $postid, PDO::PARAM_INT);
    $stmt->execute();
}
function getRating($postid, $db)
{
    $rating = array();
    $likes = getLikesDislikes($postid, 'like', $db);
    $dislikes = getLikesDislikes($postid, 'dislike', $db);
    $rating = [
        'likes' => $likes,
        'dislikes' => $dislikes
    ];
    return json_encode($rating);
}
