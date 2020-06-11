<?php

include "dbconfig.php";

$id = $_POST['mem_id']; //$_POST[name];


$results = $db->query("SELECT e.id as exr_id, m2.name, title, start_date, end_date, time, mem_cnt, dp.day_id, day_title, day_intro, m2.image from member as m1, member as m2, exr_program as e, member_reg_program as mrp left JOIN(SELECT * FROM member_exr_history)as meh ON mrp.exr_id = meh.exr_id join mem_cnt_view left join (select exr_id,id as day_id, title as day_title, intro as day_intro from day_program) as dp on dp.exr_id = mrp.exr_id where mrp.mem_id = '$id' and m1.id = mrp.mem_id and mrp.exr_id = e.id and e.trainer_id = m2.id and mem_cnt_view.exr_id = e.id");
$result_array = array();
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}

echo json_encode(array("result"=>$result_array));

?>