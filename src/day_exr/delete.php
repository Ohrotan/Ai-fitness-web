<?php
include "dbconfig.php";

$id = $_POST[id];

//1번 방법
$sql = "DELETE FROM day_program WHERE id = '$id'";
$stmt = $db->prepare($sql);
$result = $stmt->execute();
echo $result;
?>