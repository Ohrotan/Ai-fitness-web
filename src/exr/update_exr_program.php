<?php
include "dbconfig.php";

$id = $_POST[$id];
$trainer_id = $_POST[trainer_id];
$title = $_POST[title];
$period = $_POST[period];
$gender = $_POST[gender];
$level = $_POST[level];
$max = $_POST[max];
$intro = $_POST[intro];

//1번 방법
$sql = "UPDATE exr_program SET title ='$title', period= '$period', gender ='$gender', level= '$level', max ='$max', intro= '$intro' WHERE id = $id";
$stmt = $db->prepare($sql);
$result = $stmt->execute();
echo $result;
?>