<?php

include "dbconfig.php";

$mem_id = $_POST[mem_id];
$exr_id = $_POST[exr_id];
//$sql = "select name, trainer from member";

$results = $db->query("select feedback 
from member_exr_history 
where mem_id = '$mem_id' and exr_id = '$exr_id';");

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
