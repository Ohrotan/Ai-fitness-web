<?php

include "dbconfig.php";


//db에도 업로드
$id = $_POST[id];
$trainer_id = $_POST[trainer_id]; //$_POST[name];


if ($id!=null) {
    $sql = "SELECT * FROM trainer_video WHERE id = $id";
} else if ($trainer_id!=null) {
    $sql = "SELECT * FROM trainer_video WHERE trainer_id = $trainer_id";
}

$results = $db->query($sql);
$result_array = array();
if ($results->rowCount() > 0) {
    foreach ($results as $row) {
        // echo $row[trainer_id]."/".$row[title]."/".$row[video]."<br>";
        array_push($result_array, $row);
    }

}
echo json_encode($result_array);



