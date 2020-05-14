
<?php

include "dbconfig.php";

$mem_id = $_POST['mem_id'];

$results = $db->query("SELECT e.id, m2.name, title, level, max, rating from member as m, member as m2, exr_program as e, member_reg_program as mrp where mrp.mem_id = '$mem_id' and m.id = mrp.mem_id and e.id = mrp.exr_id and e.trainer_id = m2.id");
$result_array = array();
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}

echo json_encode(array("result"=>$result_array));

?>