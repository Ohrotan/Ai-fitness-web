<?php

include "dbconfig.php";

$id = $_POST['mem_id']; //$_POST[name];


$results = $db->query("SELECT m2.name, title, start_date, end_date from member as m1, member as m2, exr_program as e, member_reg_program as mrp where mrp.mem_id = '$id' and m1.id = mrp.mem_id and mrp.exr_id = e.id and e.trainer_id = m2.id");
$result_array = array();
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}

echo json_encode(array("result"=>$result_array));

?>