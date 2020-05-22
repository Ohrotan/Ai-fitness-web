
<?php

include "dbconfig.php";

$mem_id = $_POST['mem_id'];
//$mem_id = "4";

$results = $db->query("SELECT * from exr_program left join mem_cnt_rating_view as m on exr_program.id = m.exr_id left join (SELECT exr_id, feedback from member_exr_history) as meh on meh.exr_id = exr_program.id where trainer_id = '$mem_id'");
$result_array = array();
if ($results->rowCount() > 0)
{
foreach ($results as $row){
array_push($result_array,$row);
}

}
echo json_encode(array("result"=>$result_array));

?>