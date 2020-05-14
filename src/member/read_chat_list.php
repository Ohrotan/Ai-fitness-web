<?php
require 'vendor/autoload.php';
include "dbconfig.php";

$uid = (int)$_POST['uid'];
$trainer = (int)$_POST['trainer'];

$result_array = array();

if ($trainer === 0) {
    //uid가 일반 회원인 경우

    $results = $db->query("select distinct t.id id, t.name name, t.image image from member m join member_reg_program mrp on m.id=mrp.mem_id join exr_program ep on mrp.exr_id = ep.id join member t on ep.trainer_id = t.id where m.id = '$uid'");
    array_push($result_array, $results->rowCount());
    if ($results->rowCount() > 0)
    {
        foreach ($results as $row){
            array_push($result_array,$row);
        }
    }
}
else {
    //uid가 트레이너인 경우
    $results = $db->query("select distinct m.id id, m.name name, m.image image from member m join member_reg_program mrp on m.id=mrp.mem_id join exr_program ep on mrp.exr_id = ep.id join member t on ep.trainer_id = t.id where t.id = '$uid'");
    array_push($result_array, $results->rowCount());
    if ($results->rowCount() > 0)
    {
        foreach ($results as $row){
            array_push($result_array,$row);
        }
    }
}

echo json_encode($result_array);