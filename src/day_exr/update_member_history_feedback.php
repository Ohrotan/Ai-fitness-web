<?php
include "dbconfig.php";

$member_exr_history_id = (int)$_POST['member_exr_history_id'];
$feedback = $_POST['feedback'];

//1번 방법

$result_array = array();
$sql = "update member_exr_history set feedback = '$feedback' where id = '$member_exr_history_id'";
$stmt = $db->prepare($sql);
$result = $stmt->execute();
if ($result) {//실행 성공이면
    array_push($result_array, 1);
}
else {
    array_push($result_array, 0);
}

echo json_encode($result_array);
?>