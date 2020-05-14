<?php

include "dbconfig.php";

$exr_id = $_POST[exr_id];
//$sql = "select name, trainer from member";

//기본정보
$results0 = $db->query("SELECT title, period, equip, gender, level, max FROM exr_program WHERE id = '$exr_id'");

//현재 회원 수
$results1 = $db->query("select curMemberNum from program_cur_member_num where id = '$exr_id'");

//누적 회원 수
$results2 = $db->query("SELECT count(MP.mem_id) AS total_member_num 
FROM member_reg_program MP join exr_program EP 
WHERE EP.id = '$exr_id' and MP.exr_id = '$exr_id'
GROUP BY EP.id");

//누적 평점
$results3 = $db->query("SELECT avg(rating) as avg_rating
FROM member_reg_program MP join exr_program EP 
WHERE EP.id = '$exr_id' AND MP.exr_id = '$exr_id'
GROUP BY EP.id");
$result_array = array();
//var_dump($results->rowCount());
//echo("<br>");
//array_push($result_array, $results->rowCount());

if ($results0->rowCount() > 0)
{
    foreach ($results0 as $row){
        //echo $row[name]."/".$row[trainer]."<br>";
        array_push($result_array,$row);
    }
}

if ($results1->rowCount() > 0)
{
    foreach ($results1 as $row){
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

if ($results3->rowCount() > 0)
{
    foreach ($results3 as $row){
        //echo $row[name]."/".$row[trainer]."<br>";
        array_push($result_array,$row);
    }
}
echo json_encode($result_array);
