<?php
include "dbconfig.php";

$exr_id = $_POST[exr_id];
$title = $_POST[title];
$order = $_POST[order];
$intro = $_POST[intro];

//1번 방법
$sql = "INSERT INTO day_program (exr_id, title, order, intro) VALUES ('$exr_id','$title','$order','$intro')";
$stmt = $db->prepare($sql);
$result = $stmt->execute();

$result = $db->query("SELECT id FROM day_program WHERE exr_id = $exr_id AND title = '$title' AND order = $order");
echo json_encode($result[0]);
?>