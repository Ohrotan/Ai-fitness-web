<?php
require 'vendor/autoload.php';
include "dbconfig.php";

$uid = (int)$_POST['uid'];

$result_array = array();

$results = $db->query("select distinct t.id, t.name, t.image from member m join member_reg_program mrp on m.id=mrp.mem_id join exr_program ep on mrp.exr_id = ep.id join member t on ep.trainer_id = t.id where m.id = '$uid'");
$result_array = array();
if ($results->rowCount() > 0)
{
    foreach ($results as $row){
        array_push($result_array,$row);
    }

}
echo json_encode($result_array);