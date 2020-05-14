<?php

include "dbconfig.php";

$trainer_id = $_POST[trainer_id];

$results = $db->query("SELECT exr_program.id FROM exr_program WHERE exr_program.trainer_id = '$trainer_id'");
$result_array = array();
//var_dump($results->rowCount());
//echo("<br>");
//array_push($result_array, $results->rowCount());

if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        //echo $row[name]."/".$row[trainer]."<br>";
        array_push($result_array,$row);
    }
}

echo json_encode($result_array);
