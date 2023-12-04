<?php
include '../includes/config.php';

$data = array();
$stmt = "SELECT *  FROM `discussion` ORDER BY id desc";
$result = $db->query($stmt);
while ($row = $result->fetch()) {
    array_push($data, $row);
    array_push($data);
}

echo json_encode($data);
$db = null;
exit();
