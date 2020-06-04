
<?php

include "dbconfig.php";

$mem_id = $_POST['mem_id'];
$exr_id = $_POST['exr_id'];

$results = $db->query("SELECT * from exr_program left join mem_cnt_view on exr_program.id = mem_cnt_view.exr_id left join (SELECT exr_id, title, intro from day_program) as d on d.exr_id = '$exr_id' where exr_program.id = '$exr_id'");
$result_array = array();
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}
echo json_encode(array("result"=>$result_array));

?>