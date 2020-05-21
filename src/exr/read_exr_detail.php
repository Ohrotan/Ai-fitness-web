
<?php

include "dbconfig.php";

$id = $_POST['id'];

$results = $db->query("SELECT * from exr_program left join day_title_intro as d on exr_program.id = d.exr_id join mem_cnt_view on exr_program.id = mem_cnt_view.exr_id where exr_program.id = '$id'");
$result_array = array();
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}
echo json_encode(array("result"=>$result_array));

?>