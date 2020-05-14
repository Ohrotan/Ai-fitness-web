<?php
include "dbconfig.php";

$id = $_POST['id'];
$title = $_POST['title'];
$seq = $_POST['seq'];
$intro = $_POST['intro'];

//1번 방법

$sql = "UPDATE day_program SET title ='$title', seq= '$seq', intro= '$intro' WHERE id = $id";
$stmt = $db->prepare($sql);
$result = $stmt->execute();
echo $result;
?>