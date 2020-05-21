<?php
include "dbconfig.php";

$exr_id = $_POST['exr_id'];
$title = $_POST['title'];
$seq = $_POST['seq'];
$intro = $_POST['intro'];

//1번 방법
$sql = "INSERT INTO day_program (exr_id, title, seq, intro, reg_date) VALUES ($exr_id,'$title',$seq, '$intro',ADDTIME(CURRENT_TIMESTAMP,'9:0:0'))";

$stmt = $db->prepare($sql);
$result = $stmt->execute();

$result = $db->query("SELECT id FROM day_program WHERE exr_id = $exr_id AND title = '$title' AND seq = $seq");
echo json_encode($result->fetchObject());

?>