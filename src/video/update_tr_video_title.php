<?php
include "dbconfig.php";

$video = $_POST[video];
$title = $_POST[title];

//1번 방법

$sql = "UPDATE trainer_video SET title ='$title' WHERE video = '$video'";
$stmt = $db->prepare($sql);
$result = $stmt->execute();
echo $result;
?>