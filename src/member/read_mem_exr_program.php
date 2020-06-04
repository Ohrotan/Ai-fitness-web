
<?php

include "dbconfig.php";

$mem_id = $_POST['mem_id'];


//$results = $db->query("SELECT exr_program.id, name, title, level, rating, mem_cnt FROM exr_program left JOIN (SELECT exr_id, avg(rating) as rating FROM member_reg_program GROUP BY exr_id) AS rat ON rat.exr_id = exr_program.id left JOIN (SELECT id, name FROM member GROUP BY id) AS mem ON exr_program.trainer_id = mem.id left join mem_cnt_view on exr_program.id = mem_cnt_view.exr_id");
$results = $db->query("SELECT exr_program.id, name, title, level, rating, mem_cnt, image FROM exr_program left JOIN (SELECT exr_id, avg(rating) as rating FROM member_reg_program GROUP BY exr_id) AS rat ON rat.exr_id = exr_program.id left JOIN (SELECT id, name, image FROM member GROUP BY id) AS mem ON exr_program.trainer_id = mem.id left join mem_cnt_view on exr_program.id = mem_cnt_view.exr_id");
$result_array = array();
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}
echo json_encode(array("result"=>$result_array));

?>