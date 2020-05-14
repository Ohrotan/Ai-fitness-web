<?php
include "dbconfig.php";

$id = $_POST['id'];
$video_id = $_POST['video_id'];
$counts = $_POST['counts'];
$sets = $_POST['sets'];
$seq = $_POST['seq'];

//1번 방법
$sql = "UPDATE day_program_video SET video_id ='$video_id', counts= '$counts', sets= '$sets', seq ='$seq' WHERE id = $id";
$stmt = $db->prepare($sql);
$result = $stmt->execute();
echo $result;
?>