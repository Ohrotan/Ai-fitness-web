<?php

include "dbconfig.php";

$day_id = $_POST['day_id'];

$results = $db->query("SELECT analysis
FROM trainer_video
WHERE id IN (SELECT video_id
             FROM day_program_video
             WHERE day_id = '$day_id')");
$result_array = array();

if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}

echo json_encode($result_array);
