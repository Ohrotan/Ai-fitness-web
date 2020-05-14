<?php

include "dbconfig.php";

$name = $_POST[name];
//$sql = "select name, trainer from member";

$results = $db->query("SELECT id, name, height, weight, muscle, fat, gender, birth, intro FROM member WHERE name = '$name'");

$results2 = $db->query("select memberNum from trainer_member_num TM join member M where TM.trainer_id = M.id and name = '$name'");
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
