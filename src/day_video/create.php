<?php
include "dbconfig.php";

$day_id = $_POST['day_id'];
$video_id = $_POST['video_id'];
$counts = $_POST['counts'];
$sets = $_POST['sets'];
$seq = $_POST['seq'];

//1번 방법
$sql = "INSERT INTO day_program_video (day_id, video_id, counts, sets, seq) VALUES ($day_id, $video_id, $counts, $sets, $seq)";

$stmt = $db->prepare($sql);
$result = $stmt->execute();
echo $result;
?>