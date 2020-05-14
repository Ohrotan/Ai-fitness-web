<?php
include "dbconfig.php";

$trainer_id = $_POST[trainer_id];
$title = $_POST[title];
$period = $_POST[period];
$gender = $_POST[gender];
$level = $_POST[level];
$max = $_POST[max];
$intro = $_POST[intro];

//1번 방법
$sql = "INSERT INTO exr_program (trainer_id, title, period, gender, level, max, intro) "
    . "VALUES ('$trainer_id','$title','$period','$gender','$level','$max','$intro')";
$stmt = $db->prepare($sql);
$result = $stmt->execute();
echo $result;
?>