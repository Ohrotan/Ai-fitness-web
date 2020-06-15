
<?php

include "dbconfig.php";

$mem_id = $_POST['mem_id'];
$exr_id = $_POST['exr_id'];

$results = $db->query("SELECT count(*) as cnt from member_exr_history where mem_id = '$mem_id' and exr_id = '$exr_id'");
$result_array = array();
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}
$results = $db->query("SELECT * from exr_program left join (SELECT exr_id, id as day_id, title as day_title, intro as day_intro from day_program) as d on exr_program.id = d.exr_id left join mem_cnt_view on exr_program.id = mem_cnt_view.exr_id left join (SELECT mem_id, exr_id as e_id from member_reg_program) as m on m.mem_id = '$mem_id' and m.e_id = exr_program.id left join (SELECT id as m_id, image from member) as mem on mem.m_id = trainer_id where exr_program.id = '$exr_id'");
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}
echo json_encode(array("result"=>$result_array));

?>