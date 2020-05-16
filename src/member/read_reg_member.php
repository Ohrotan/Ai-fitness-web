<?php

include "dbconfig.php";

$exr_id = $_POST[exr_id];
//$sql = "select name, trainer from member";

$results = $db->query("SELECT M.id, M.name, EP.title
FROM member M join member_reg_program MP join exr_program EP
WHERE M.id = MP.mem_id and MP.end_date > CURDATE() and EP.id = '$exr_id' and MP.exr_id = '$exr_id'");

$results2 = $db->query("SELECT COUNT(M.id) AS memberNum
FROM member M right join member_reg_program MP 
ON M.id = MP.mem_id 
right join exr_program EP
ON EP.id = MP.exr_id and MP.end_date > CURDATE()
GROUP BY EP.id
HAVING EP.id = '$exr_id'");
$result_array = array();
//var_dump($results->rowCount());
//echo("<br>");
//array_push($result_array, $results->rowCount());

if ($results2->rowCount() > 0)
{
    foreach ($results2 as $row){
        //echo $row[name]."/".$row[trainer]."<br>";
        array_push($result_array,$row);
    }
}

if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        //echo $row[name]."/".$row[trainer]."<br>";
        array_push($result_array,$row);
    }
}

echo json_encode($result_array);
