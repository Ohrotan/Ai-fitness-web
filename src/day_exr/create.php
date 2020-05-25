<?php
include "dbconfig.php";
$id = $_POST['id'];
$exr_id = $_POST['exr_id'];
$title = $_POST['title'];
$seq = $_POST['seq'];
$intro = $_POST['intro'];

if ($id == null || $id == '0') {
    $sql = "INSERT INTO day_program (exr_id, title, seq, intro, reg_date) VALUES ($exr_id,'$title',$seq, '$intro',ADDTIME(CURRENT_TIMESTAMP,'9:0:0'))";

    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    $result = $db->query("SELECT id FROM day_program WHERE exr_id = $exr_id AND title = '$title' AND seq = $seq");
    echo json_encode($result->fetchObject());
} else {
    $sql = "UPDATE day_program SET title ='$title', seq= '$seq', intro= '$intro' WHERE id = $id";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();
    echo $result;

}
?>