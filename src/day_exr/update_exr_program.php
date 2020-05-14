<?php
include "dbconfig.php";

$id = $_POST[id];
$title = $_POST[title];
$period = $_POST[period];
$equip = $_POST[equip];
$gender = $_POST[gender];
$level = $_POST[level];
$max = $_POST[max];
$intro = $_POST[intro];

//1번 방법
$sql = "UPDATE exr_program SET title ='$title', period= '$period', equip= '$equip', gender ='$gender', level= '$level', max ='$max', intro= '$intro' WHERE id = $id";
$stmt = $db->prepare($sql);
$result = $stmt->execute();
echo $result;
?>