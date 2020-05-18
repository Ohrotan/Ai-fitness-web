<?php

include "dbconfig.php";

$id = $_POST[id];
$exr_id = $_POST[exr_id];
//$sql = "select name, trainer from member";

$results = $db->query("SELECT name, gender, birth, height, weight, muscle, fat, intro, image
FROM member
WHERE id = '$id';");

$results2 = $db->query("SELECT start_date, end_date
FROM member_reg_program
WHERE mem_id = '$id' and exr_id = '$exr_id'");
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

if ($results2->rowCount() > 0)
{
    foreach ($results2 as $row){
        //echo $row[name]."/".$row[trainer]."<br>";
        array_push($result_array,$row);
    }
}
echo json_encode($result_array);
