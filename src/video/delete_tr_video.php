<?php

include "dbconfig.php";


//db에도 업로드
$id = $_POST[id];

$sql = "DELETE FROM trainer_video WHERE id = $id";

$stmt = $db->prepare($sql);
$result = $stmt->execute();
echo $result;



