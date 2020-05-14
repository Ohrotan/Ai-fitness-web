<?php

/*include "dbconfig.php";

$trainer_id = $_POST[$trainer_id];
//$sql = "select name, trainer from member";

$results = $db->query("SELECT id, title, period, equip, gender, level, max FROM exr_program WHERE trainer_id = '$trainer_id'");

$results2 = $db->query("SELECT count(MP.mem_id) AS curMemberNum
FROM member_reg_program MP join exr_program EP 
WHERE '$trainer_id' = MP.exr_id AND MP.end_date > CURDATE()
GROUP BY '$trainer_id'");
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
echo json_encode($result_array);*/
