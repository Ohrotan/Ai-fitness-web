<?php

include "dbconfig.php";

$exr_id = $_POST[exr_id];
$mem_id = $_POST[mem_id];
//$sql = "select name, trainer from member";

$results = $db->query("SELECT DP.id , DP.title, MH.feedback
FROM day_program DP join member_exr_history MH
where DP.id = MH.day_id and MH.exr_id = '$exr_id' and MH.mem_id = '$mem_id'");

//$results2 = $db->query("");
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

/*if ($results2->rowCount() > 0)
{
    foreach ($results as $row){
        //echo $row[name]."/".$row[trainer]."<br>";
        array_push($result_array,$row);
    }
}*/

echo json_encode($result_array);
