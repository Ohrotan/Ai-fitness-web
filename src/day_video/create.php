<?php
include "dbconfig.php";

$id = $_POST['id'];
$day_id = $_POST['day_id'];
$video_id = $_POST['video_id'];
$counts = $_POST['counts'];
$sets = $_POST['sets'];
$seq = $_POST['seq'];

if ($id == null || $id == '0') {
    $sql = "INSERT INTO day_program_video (day_id, video_id, counts, sets, seq, reg_date) VALUES ($day_id, $video_id, $counts, $sets, $seq,ADDTIME(CURRENT_TIMESTAMP,'9:0:0'))";

    $stmt = $db->prepare($sql);
    $result = $stmt->execute();
    echo $result;
} else {
    $sql = "UPDATE day_program_video SET counts= '$counts', sets= '$sets' WHERE id = $id";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();
    echo $result;
}
?>